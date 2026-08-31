<x-layout title="Booking Confirmed">
    <section class="py-16 bg-slate-50 min-h-[75vh] flex items-center justify-center">
        <div class="max-w-xl mx-auto px-4 w-full">
            <div class="bg-white rounded-3xl border border-gray-100 shadow-xl p-8 text-center space-y-6">
                <!-- Success Icon -->
                <div class="w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mx-auto text-4xl shadow-inner">
                    <i class="ri-checkbox-circle-fill"></i>
                </div>

                <div>
                    <span class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">
                        Confirmed & Reserved
                    </span>
                    <h1 class="text-3xl font-extrabold text-gray-900 mt-2">Booking Confirmed!</h1>
                    <p class="text-gray-500 text-sm mt-1">
                        Order <span class="font-mono font-bold text-gray-800">#{{ $order->order_number }}</span>
                    </p>
                </div>

                <!-- Booking Summary Card -->
                <div class="bg-gray-50 rounded-2xl p-4 text-left border border-gray-100 space-y-3">
                    <div class="flex items-center gap-3 pb-3 border-b border-gray-200/60">
                        <i class="ri-hotel-line text-indigo-600 text-xl"></i>
                        <div>
                            <h4 class="font-bold text-gray-900 text-sm">{{ $order->room->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $order->hotel->name }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2 text-xs text-gray-600">
                        <div>
                            <span class="text-gray-400 block">Dates:</span>
                            <span class="font-medium text-gray-800">
                                {{ $order->check_in->format('d M Y') }} → {{ $order->check_out->format('d M Y') }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-400 block">Duration & Total:</span>
                            <span class="font-medium text-gray-800">
                                {{ $order->nights }} {{ Str::plural('night', $order->nights) }} · NPR {{ number_format($order->total_price) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                    <a href="{{ route('orders.index') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-3 rounded-xl text-sm transition shadow-sm hover:shadow flex items-center justify-center gap-2">
                        <i class="ri-shopping-bag-3-line text-base"></i> View My Orders
                    </a>

                    <a href="{{ route('rooms.index') }}"
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-xl text-sm transition flex items-center justify-center gap-2">
                        <i class="ri-compass-3-line text-base"></i> Browse More Rooms
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>