<x-layout title="Booking Confirmed">
    <section class="py-16 bg-white">
        <div class="max-w-xl mx-auto px-4 text-center space-y-4">
            <i class="ri-checkbox-circle-fill text-emerald-500 text-6xl"></i>
            <h1 class="text-2xl font-extrabold text-gray-900">Booking Confirmed!</h1>
            <p class="text-gray-500 text-sm">Order <span class="font-mono font-semibold">{{ $order->order_number }}</span> for {{ $order->room->name }} at {{ $order->hotel->name }}.</p>
            <p class="text-gray-500 text-sm">{{ $order->check_in->format('d M Y') }} → {{ $order->check_out->format('d M Y') }} · {{ $order->nights }} nights · NPR {{ number_format($order->total_price) }}</p>
            <a href="{{ route('rooms.index') }}" class="inline-block mt-4 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl text-sm font-medium">Browse More Rooms</a>
        </div>
    </section>
</x-layout>