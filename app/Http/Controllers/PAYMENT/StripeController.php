<?php

namespace App\Http\Controllers\PAYMENT;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function initiate(Order $order)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd', // Stripe doesn't support NPR directly — convert or use USD
                    'product_data' => ['name' => "{$order->room->name} — {$order->hotel->name}"],
                    'unit_amount' => (int) round($order->total_price * 100), // adjust for currency conversion
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payments.stripe.success') . '?order=' . $order->order_number,
            'cancel_url' => route('rooms.show', $order->room),
            'metadata' => ['order_number' => $order->order_number],
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $order = Order::where('order_number', $request->query('order'))->firstOrFail();

        $order->update([
            'status' => 'confirmed',
            'payment_status' => 'paid',
        ]);

        return redirect()->route('orders.success', $order);
    }
}