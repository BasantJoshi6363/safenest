<x-layout title="Confirm Booking">
    <section class="py-12 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Confirm Your Booking</h1>

            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 mb-6 space-y-2 text-sm">
                <div class="flex justify-between"><span class="text-gray-400">Room</span><span
                        class="font-medium">{{ $room->name }}</span></div>
                <div class="flex justify-between"><span class="text-gray-400">Hotel</span><span
                        class="font-medium">{{ $room->hotel->name }}</span></div>
                <div class="flex justify-between"><span class="text-gray-400">Check-in</span><span
                        class="font-medium">{{ \Carbon\Carbon::parse($check_in)->format('d M Y') }}</span></div>
                <div class="flex justify-between"><span class="text-gray-400">Check-out</span><span
                        class="font-medium">{{ \Carbon\Carbon::parse($check_out)->format('d M Y') }}</span></div>
                <div class="flex justify-between"><span class="text-gray-400">Nights</span><span
                        class="font-medium">{{ $nights }}</span></div>
                <div class="flex justify-between"><span class="text-gray-400">Guests</span><span
                        class="font-medium">{{ $guests }}</span></div>
                <div class="flex justify-between pt-2 border-t border-gray-200 text-base"><span
                        class="font-bold">Total</span><span class="font-bold text-indigo-600">NPR
                        {{ number_format($total) }}</span></div>
            </div>

            <form method="POST" action="{{ route('orders.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <input type="hidden" name="check_in" value="{{ $check_in }}">
                <input type="hidden" name="check_out" value="{{ $check_out }}">
                <input type="hidden" name="guests" value="{{ $guests }}">

                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Full Name</label>
                    <input type="text" name="guest_name" required
                        value="{{ old('guest_name', auth()->user()->name ?? '') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Email</label>
                    <input type="email" name="guest_email" required
                        value="{{ old('guest_email', auth()->user()->email ?? '') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Phone</label>
                    <input type="text" name="guest_phone" value="{{ old('guest_phone',auth()->user()->phone ?? '') }}"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-1">Special Requests (optional)</label>
                    <textarea name="special_requests" rows="3"
                        class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('special_requests') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 mb-2">Payment Method</label>
                    <div class="grid grid-cols-3 gap-3">
                        <label
                            class="border rounded-xl p-3 text-center cursor-pointer has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                            <input type="radio" name="payment_method" value="esewa" required class="hidden" checked>
                            <i class="ri-smartphone-line text-xl text-indigo-600"></i>
                            <p class="text-xs font-medium mt-1">eSewa</p>
                        </label>
                        <label
                            class="border rounded-xl p-3 text-center cursor-pointer has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                            <input type="radio" name="payment_method" value="card" required class="hidden">
                            <i class="ri-bank-card-line text-xl text-indigo-600"></i>
                            <p class="text-xs font-medium mt-1">Visa / Card</p>
                        </label>
                        <label
                            class="border rounded-xl p-3 text-center cursor-pointer has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                            <input type="radio" name="payment_method" value="pay_at_checkin" required class="hidden">
                            <i class="ri-hotel-line text-xl text-indigo-600"></i>
                            <p class="text-xs font-medium mt-1">Pay at Check-in</p>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-xl shadow-md transition">
                    Confirm Booking
                </button>
            </form>
        </div>
    </section>
</x-layout>