<?php

namespace App\Http\Controllers\CRUD;
use App\Http\Controllers\Controller;


use App\Models\Order;
use App\Models\Room;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected function availabilityRules(): array
    {
        return [
            'check_in'  => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'guests'    => ['required', 'integer', 'min:1'],
        ];
    }

    public function index()
    {
        $orders = Order::with(['room', 'hotel'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Cancel an active order and restore room inventory.
     */
    public function cancel(Order $order)
    {
        // Security check: ensure the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Only allow cancellation for pending or confirmed orders
        if (!in_array($order->status, ['pending', 'confirmed'])) {
            return back()->with('error', 'This order cannot be cancelled.');
        }

        // Update order status
        $order->update([
            'status' => 'cancelled',
        ]);

        // Restore room inventory if applicable
        if ($order->room) {
            $order->room->increment('available_rooms');
        }

        return back()->with('success', 'Your order #' . $order->order_number . ' has been successfully cancelled.');
    }

    /** Step 1: validate dates/guests, show confirmation page */
    public function confirm(Request $request, Room $room)
    {
        $data = $request->validate($this->availabilityRules());

        if ($data['guests'] > $room->max_guests) {
            return back()->withErrors(['guests' => "This room fits up to {$room->max_guests} guests."])->withInput();
        }

        $isAvailable = ! $room->orders()
            ->blocking()
            ->overlapping($data['check_in'], $data['check_out'])
            ->exists();

        if (! $isAvailable) {
            return back()->withErrors(['check_in' => 'This room is no longer available for the selected dates.'])->withInput();
        }

        $nights = \Carbon\Carbon::parse($data['check_in'])->diffInDays($data['check_out']);
        $total = $nights * $room->price_per_night;

        return view('orders.confirm', [
            'room' => $room->load('hotel'),
            'check_in' => $data['check_in'],
            'check_out' => $data['check_out'],
            'guests' => $data['guests'],
            'nights' => $nights,
            'total' => $total,
        ]);
    }

    /** Step 2: re-validate + create the order (never trust hidden totals from the client) */
  public function store(Request $request)
{
    $data = $request->validate([
        'room_id' => ['required', 'exists:rooms,id'],
        'check_in'  => ['required', 'date', 'after_or_equal:today'],
        'check_out' => ['required', 'date', 'after:check_in'],
        'guests'    => ['required', 'integer', 'min:1'],
        'guest_name' => ['required', 'string', 'max:255'],
        'guest_email' => ['required', 'email'],
        'guest_phone' => ['nullable', 'string', 'max:30'],
        'special_requests' => ['nullable', 'string', 'max:1000'],
        'payment_method' => ['required', 'in:esewa,card,pay_at_checkin'],
    ]);

    $room = Room::findOrFail($data['room_id']);

    if ($data['guests'] > $room->max_guests) {
        return back()->withErrors(['guests' => "This room fits up to {$room->max_guests} guests."])->withInput();
    }

    $isAvailable = ! $room->orders()->blocking()->overlapping($data['check_in'], $data['check_out'])->exists();

    if (! $isAvailable) {
        return redirect()->route('rooms.show', $room)
            ->withErrors(['check_in' => 'Sorry, this room was just booked for those dates.']);
    }

    $order = Order::create([
        'hotel_id' => $room->hotel_id,
        'room_id' => $room->id,
        'user_id' => auth()->id(),
        'guest_name' => $data['guest_name'],
        'guest_email' => $data['guest_email'],
        'guest_phone' => $data['guest_phone'] ?? null,
        'check_in' => $data['check_in'],
        'check_out' => $data['check_out'],
        'guests' => $data['guests'],
        'price_per_night' => $room->price_per_night,
        'status' => 'pending',
        'payment_status' => 'unpaid',
        'payment_method' => $data['payment_method'],
        'special_requests' => $data['special_requests'] ?? null,
    ]);

    return match ($data['payment_method']) {
        'esewa' => redirect()->route('payments.esewa.initiate', $order),
        'card' => redirect()->route('payments.stripe.initiate', $order),
        'pay_at_checkin' => redirect()->route('orders.success', $order),
    };
}
    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }
}