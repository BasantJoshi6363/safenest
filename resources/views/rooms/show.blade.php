<x-layout :title="$room->name">
    <div>
        <!-- Breadcrumb / Header -->
        <section class="bg-indigo-50/50 py-8 border-b border-indigo-100/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <a href="{{ route('rooms.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 flex items-center gap-1">
                    <i class="ri-arrow-left-line"></i> Back to Rooms
                </a>
            </div>
        </section>

        <section class="py-10 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-10">

                <!-- Left: Details -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- Gallery -->
                    <div class="grid grid-cols-4 grid-rows-2 gap-3 rounded-2xl overflow-hidden h-[420px]">
                        @php
                            $images = collect([$room->featured_image])
                                ->merge($room->gallery_images ?? [])
                                ->filter()
                                ->take(5);
                            $fallback = 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800';
                        @endphp
                        <div class="col-span-2 row-span-2">
                            <img src="{{ $images->first() ?? $fallback }}" class="w-full h-full object-cover" alt="{{ $room->name }}"
                                 onerror="this.onerror=null;this.src='{{ $fallback }}';" />
                        </div>
                        @foreach($images->slice(1, 4) as $img)
                            <div class="col-span-1 row-span-1">
                                <img src="{{ $img }}" class="w-full h-full object-cover" alt="{{ $room->name }}"
                                     onerror="this.onerror=null;this.src='{{ $fallback }}';" />
                            </div>
                        @endforeach
                    </div>

                    <!-- Title & Status -->
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wide">{{ $room->hotel->name ?? 'SafeNest Stay' }}</p>
                            <h1 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $room->name }}</h1>
                            <p class="text-gray-500 text-sm mt-1 flex items-center gap-1">
                                <i class="ri-map-pin-line text-indigo-500"></i> {{ $room->hotel->city ?? $room->hotel->destination ?? '' }}
                            </p>
                        </div>
                        <span class="{{ $isAvailable ? 'bg-emerald-500' : 'bg-rose-500' }} text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow shrink-0">
                            {{ $isAvailable ? 'Available' : 'Not Available for These Dates' }}
                        </span>
                    </div>

                    <!-- Specs -->
                    <div class="grid grid-cols-3 gap-3 py-4 bg-gray-50 rounded-xl text-center text-sm text-gray-700 font-medium">
                        <div class="space-y-1">
                            <i class="ri-user-3-line text-indigo-600 text-lg"></i>
                            <p>{{ $room->max_guests }} Guests</p>
                        </div>
                        <div class="space-y-1">
                            <i class="ri-hotel-bed-line text-indigo-600 text-lg"></i>
                            <p>{{ $room->bed_type }}</p>
                        </div>
                        <div class="space-y-1">
                            <i class="ri-ruler-line text-indigo-600 text-lg"></i>
                            <p>{{ number_format($room->size, 0) }} {{ $room->size_unit ?? 'sqm' }}</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-2">About This Room</h2>
                        <p class="text-gray-600 leading-relaxed text-sm">{{ $room->description }}</p>
                    </div>

                    <!-- Amenities -->
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Amenities</h2>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-sm text-gray-600">
                            @php
                                $amenities = [
                                    'wifi' => ['ri-wifi-line', 'Free Wi-Fi'],
                                    'balcony' => ['ri-sun-line', 'Private Balcony'],
                                    'air_conditioning' => ['ri-temp-cold-line', 'Air Conditioning'],
                                    'room_heater' => ['ri-fire-line', 'Room Heater'],
                                    'breakfast' => ['ri-restaurant-line', 'Breakfast Included'],
                                    'smart_tv' => ['ri-tv-2-line', 'Smart TV'],
                                    'coffee_machine' => ['ri-cup-line', 'Coffee Machine'],
                                    'private_bathroom' => ['ri-drop-line', 'En-suite Bathroom'],
                                    'toiletries' => ['ri-sparkling-2-line', 'Toiletries'],
                                    'garden_access' => ['ri-plant-line', 'Garden Access'],
                                    'lounge_area' => ['ri-armchair-line', 'Lounge Area'],
                                    'meals_included' => ['ri-restaurant-2-line', 'All Meals Included'],
                                    'mini_bar' => ['ri-goblet-line', 'Mini Bar'],
                                    'refreshments' => ['ri-cup-line', 'Refreshments'],
                                ];
                            @endphp
                            @foreach($amenities as $field => [$icon, $label])
                                @if($room->$field)
                                    <div class="flex items-center gap-2 bg-gray-50 px-3 py-2 rounded-lg">
                                        <i class="{{ $icon }} text-indigo-500"></i> {{ $label }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Sticky Booking Box -->
                <div class="lg:col-span-1">
                    <div class="sticky top-6 bg-white border border-gray-100 rounded-2xl shadow-lg p-6 space-y-5">
                        <div>
                            <span class="text-xs text-gray-400 block">Price / night</span>
                            <span class="text-2xl font-extrabold text-gray-900">NPR {{ number_format($room->price_per_night) }}</span>
                        </div>

                        @if ($errors->any())
                            <div class="bg-rose-50 border border-rose-200 text-rose-600 text-xs rounded-lg p-3 space-y-1">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('orders.confirm', $room) }}" class="space-y-3">
                            @csrf
                            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3">
                                <label class="block text-[10px] font-semibold uppercase text-gray-400">Check-in</label>
                                <input type="date" name="check_in" required
                                       value="{{ old('check_in', $checkIn) }}"
                                       min="{{ now()->toDateString() }}"
                                       class="w-full bg-transparent text-sm text-gray-800 focus:outline-none" />
                            </div>
                            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3">
                                <label class="block text-[10px] font-semibold uppercase text-gray-400">Check-out</label>
                                <input type="date" name="check_out" required
                                       value="{{ old('check_out', $checkOut) }}"
                                       min="{{ old('check_in', $checkIn) }}"
                                       class="w-full bg-transparent text-sm text-gray-800 focus:outline-none" />
                            </div>
                            <div class="bg-gray-50 rounded-xl border border-gray-100 p-3">
                                <label class="block text-[10px] font-semibold uppercase text-gray-400">Guests</label>
                                <select name="guests" class="w-full bg-transparent text-sm text-gray-800 focus:outline-none">
                                    @for($i = 1; $i <= $room->max_guests; $i++)
                                        <option value="{{ $i }}" {{ old('guests', 1) == $i ? 'selected' : '' }}>{{ $i }} {{ Str::plural('Guest', $i) }}</option>
                                    @endfor
                                </select>
                            </div>

                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-xl shadow-md transition">
                                Check & Continue
                            </button>
                        </form>

                        <p class="text-xs text-gray-400 text-center">{{ $room->hotel->cancellation_policy ?? 'Free cancellation up to 48 hours before check-in.' }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>