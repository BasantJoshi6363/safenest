<x-layout title="My Orders / Safenest">
    <div class="bg-slate-50 min-h-screen py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center gap-3">
                    <i class="ri-checkbox-circle-line text-xl"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl flex items-center gap-3">
                    <i class="ri-error-warning-line text-xl"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">My Bookings & Orders</h1>
                    <p class="text-gray-500 text-sm mt-1">Track stay status, view details, and manage active reservations.</p>
                </div>
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 text-sm font-semibold">
                    <i class="ri-add-circle-line text-lg"></i> Book Another Room
                </a>
            </div>

            <!-- Orders List -->
            @if($orders->isNotEmpty())
                <div class="space-y-6">
                    @foreach($orders as $order)
                        @php
                            $statusColors = [
                                'pending'   => 'bg-amber-50 text-amber-700 border-amber-200',
                                'confirmed' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'completed' => 'bg-blue-50 text-blue-700 border-blue-200',
                                'cancelled' => 'bg-rose-50 text-rose-700 border-rose-200',
                            ];
                            $badgeStyle = $statusColors[$order->status] ?? 'bg-gray-50 text-gray-700 border-gray-200';
                            $canCancel = in_array($order->status, ['pending', 'confirmed']);
                        @endphp

                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden">
                            <!-- Card Top Meta Bar -->
                            <div class="bg-gray-50/80 px-6 py-4 border-b border-gray-100 flex flex-wrap items-center justify-between gap-3 text-xs">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <span class="text-gray-400 block uppercase font-medium text-[10px]">Order Number</span>
                                        <span class="font-mono font-bold text-gray-800 text-sm">#{{ $order->order_number }}</span>
                                    </div>
                                    <div class="hidden sm:block">
                                        <span class="text-gray-400 block uppercase font-medium text-[10px]">Placed On</span>
                                        <span class="font-semibold text-gray-700">{{ $order->created_at->format('d M Y, h:i A') }}</span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider border {{ $badgeStyle }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Main Card Content -->
                            <div class="p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                                
                                <!-- Room & Hotel Details (5 cols) -->
                                <div class="lg:col-span-5 flex items-center gap-4">
                                    <div class="w-20 h-20 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                                        <img src="{{ $order->room->featured_image ? (Str::startsWith($order->room->featured_image, ['http://', 'https://']) ? $order->room->featured_image : asset('storage/' . $order->room->featured_image)) : 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=300' }}" 
                                             alt="{{ $order->room->name }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-900 text-lg leading-snug">{{ $order->room->name }}</h3>
                                        <p class="text-xs text-indigo-600 font-medium flex items-center gap-1 mt-0.5">
                                            <i class="ri-hotel-line"></i> {{ $order->hotel->name }}
                                        </p>
                                        <p class="text-xs text-gray-400 flex items-center gap-1 mt-1">
                                            <i class="ri-map-pin-2-line"></i> {{ $order->hotel->city ?? 'Nepal' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Stay Dates & Specs (4 cols) -->
                                <div class="lg:col-span-4 bg-gray-50 rounded-xl p-3 border border-gray-100 text-xs space-y-2">
                                    <div class="flex justify-between items-center text-gray-600">
                                        <span><i class="ri-calendar-check-line text-indigo-500 mr-1"></i> Check-in:</span>
                                        <span class="font-semibold text-gray-800">{{ $order->check_in->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-gray-600">
                                        <span><i class="ri-calendar-event-line text-indigo-500 mr-1"></i> Check-out:</span>
                                        <span class="font-semibold text-gray-800">{{ $order->check_out->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-gray-600 pt-1 border-t border-gray-200/60">
                                        <span>Total ({{ $order->nights }} {{ Str::plural('night', $order->nights) }}):</span>
                                        <span class="font-bold text-indigo-600 text-sm">NPR {{ number_format($order->total_price) }}</span>
                                    </div>
                                </div>

                                <!-- Actions & Status Details (3 cols) -->
                                <div class="lg:col-span-3 flex flex-col sm:flex-row lg:flex-col justify-end gap-2 text-right">
                                    @if($canCancel)
                                        <form method="POST" action="{{ route('orders.cancel', $order) }}" onsubmit="return confirm('Are you sure you want to cancel this booking? This will restore room availability.');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="w-full px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 text-xs font-semibold rounded-xl border border-rose-200 transition flex items-center justify-center gap-1">
                                                <i class="ri-close-circle-line text-sm"></i> Cancel Order
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 italic text-center lg:text-right block">
                                            {{ $order->status === 'cancelled' ? 'Order Cancelled' : 'Order Completed' }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Live Tracking Bar -->
                            <div class="bg-gray-50/50 px-6 py-4 border-t border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Order Status Progress</p>
                                
                                <div class="relative flex items-center justify-between max-w-2xl mx-auto py-2">
                                    @php
                                        $steps = [
                                            'pending'   => ['label' => 'Order Placed', 'icon' => 'ri-file-text-line'],
                                            'confirmed' => ['label' => 'Confirmed',    'icon' => 'ri-checkbox-circle-line'],
                                            'completed' => ['label' => 'Stay Complete','icon' => 'ri-hotel-bed-line'],
                                        ];

                                        $currentStepIndex = match($order->status) {
                                            'pending'   => 0,
                                            'confirmed' => 1,
                                            'completed' => 2,
                                            'cancelled' => -1,
                                        };
                                    @endphp

                                    @if($order->status === 'cancelled')
                                        <div class="w-full bg-rose-50 border border-rose-200 text-rose-700 py-2.5 px-4 rounded-xl text-xs flex items-center justify-center gap-2 font-medium">
                                            <i class="ri-close-circle-fill text-lg"></i>
                                            This reservation was cancelled.
                                        </div>
                                    @else
                                        <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-gray-200 w-full z-0"></div>
                                        <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-indigo-600 transition-all duration-500 z-0"
                                             style="width: {{ $currentStepIndex === 0 ? '0%' : ($currentStepIndex === 1 ? '50%' : '100%') }};"></div>

                                        @foreach(array_values($steps) as $idx => $step)
                                            @php
                                                $isActive = $idx <= $currentStepIndex;
                                                $isCurrent = $idx === $currentStepIndex;
                                            @endphp
                                            <div class="relative z-10 flex flex-col items-center">
                                                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold transition-colors shadow-sm {{ $isActive ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-500' }} {{ $isCurrent ? 'ring-4 ring-indigo-100' : '' }}">
                                                    <i class="{{ $step['icon'] }}"></i>
                                                </div>
                                                <span class="text-[11px] font-medium mt-1.5 {{ $isActive ? 'text-indigo-600 font-bold' : 'text-gray-400' }}">
                                                    {{ $step['label'] }}
                                                </span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-12 text-center max-w-md mx-auto space-y-4">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-500 rounded-full flex items-center justify-center mx-auto text-3xl">
                        <i class="ri-shopping-bag-3-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">No Orders Found</h3>
                    <p class="text-gray-500 text-sm">You haven't booked any rooms yet. Explore our comfortable stays and book your next getaway!</p>
                    <a href="{{ route('rooms.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-3 rounded-xl text-sm transition">
                        Explore Rooms
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-layout>