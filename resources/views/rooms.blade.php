<x-layout title="Rooms">
    <div>
        <!-- Page Header Banner -->
        <section class="bg-indigo-50/50 py-12 lg:py-16 border-b border-indigo-100/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight">
                    Our Comfortable <span class="text-indigo-600">Rooms</span>
                </h1>
                <p class="text-gray-500 text-base max-w-2xl mx-auto">
                    Choose from luxury suites to cozy mountain view rooms, crafted to make your stay in Nepal memorable.
                </p>
            </div>
        </section>

        <!-- Rooms Listing Section -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Filter & Search Form -->
                <form method="GET" action="{{ route('rooms.index') }}"
                    class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">

                    <!-- Category Filter Pills -->
                    <div class="flex items-center space-x-2 overflow-x-auto pb-6 mb-8 border-b border-gray-100 w-full md:w-auto">
                        @php
                            $categories = ['All', 'Deluxe', 'Suite', 'Standard', 'Cottage', 'Villa'];
                            $selectedCat = request('category', 'All');
                        @endphp

                        @foreach($categories as $cat)
                            <a href="{{ route('rooms.index', array_merge(request()->query(), ['category' => $cat])) }}"
                               class="px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition {{ $selectedCat === $cat ? 'bg-indigo-600 text-white shadow-sm' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">
                                {{ $cat === 'All' ? 'All Rooms' : $cat }}
                            </a>
                        @endforeach
                    </div>  

                    <!-- Search Input -->
                    <div class="relative w-full md:w-72">
                        <i class="ri-search-line absolute left-3.5 top-2.5 text-gray-400 text-lg"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search room name or hotel..."
                            class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"
                            onchange="this.form.submit()" />
                    </div>
                </form>

                <!-- Rooms List Grid -->
                @if($rooms->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                        @foreach($rooms as $room)
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden flex flex-col justify-between group">
                                <div>
                                    <!-- Room Image & Top Badges -->
                                    <div class="relative aspect-[16/10] overflow-hidden">
                                        @php
                                            $imagePath = $room->featured_image ?? $room->image;
                                            
                                            // Construct compact location (e.g., "Thamel, Kathmandu")
                                            $compactLocation = implode(', ', array_filter([
                                                $room->hotel->destination 
                                            ])) ?: 'Nepal';
                                        @endphp

                                        <img src="{{ $imagePath && (Str::startsWith($imagePath, ['http://', 'https://']) ? $imagePath : (Storage::disk('public')->exists($imagePath) ? asset('storage/' . $imagePath) : null)) ?? 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800' }}"
                                             alt="{{ $room->name }}"
                                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                             onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800';" />

                                        <!-- Status Badge (Left) -->
                                        <span class="absolute top-4 left-4 {{ $room->available_rooms > 0 ? 'bg-emerald-500' : 'bg-rose-500' }} text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                            {{ $room->available_rooms > 0 ? 'Available' : 'Sold Out' }}
                                        </span>

                                        <!-- Compact Location Badge (Right) -->
                                        <span class="absolute top-4 right-4 bg-black/60 backdrop-blur-md text-white text-xs font-medium px-2.5 py-1 rounded-full shadow flex items-center gap-1 max-w-[50%] truncate">
                                            <i class="ri-map-pin-2-fill text-rose-400 text-xs shrink-0"></i>
                                            <span class="truncate">{{ $compactLocation }}</span>
                                        </span>
                                    </div>

                                    <!-- Room Details -->
                                    <div class="p-6 space-y-4">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">{{ $room->name }}</h3>
                                            <p class="text-gray-400 text-xs mt-0.5 flex items-center gap-1">
                                                <i class="ri-hotel-line text-indigo-500 text-xs"></i>
                                                {{ $room->hotel->name ?? 'SafeNest Stay' }}
                                            </p>
                                        </div>

                                        <!-- Specs Grid -->
                                        <div class="grid grid-cols-3 gap-2 py-3 bg-gray-50 rounded-xl text-center text-xs text-gray-600 font-medium">
                                            <div class="space-y-1">
                                                <i class="ri-user-3-line text-indigo-600 text-base"></i>
                                                <p>{{ $room->max_guests }} Guests</p>
                                            </div>
                                            <div class="space-y-1">
                                                <i class="ri-hotel-bed-line text-indigo-600 text-base"></i>
                                                <p>{{ $room->bed_type }}</p>
                                            </div>
                                            <div class="space-y-1">
                                                <i class="ri-ruler-line text-indigo-600 text-base"></i>
                                                <p>{{ number_format($room->size, 0) }} {{ $room->size_unit ?? 'sqm' }}</p>
                                            </div>
                                        </div>

                                        <!-- Amenities Badges -->
                                        <div class="flex flex-wrap gap-2 pt-1 text-xs text-gray-500">
                                            @if($room->wifi)<span class="bg-gray-100 px-2 py-1 rounded-md"><i class="ri-wifi-line text-indigo-500"></i> Wi-Fi</span>@endif
                                            @if($room->balcony)<span class="bg-gray-100 px-2 py-1 rounded-md"><i class="ri-sun-line text-indigo-500"></i> Balcony</span>@endif
                                            @if($room->air_conditioning)<span class="bg-gray-100 px-2 py-1 rounded-md"><i class="ri-temp-cold-line text-indigo-500"></i> AC</span>@endif
                                            @if($room->breakfast)<span class="bg-gray-100 px-2 py-1 rounded-md"><i class="ri-restaurant-line text-indigo-500"></i> Breakfast</span>@endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Card Footer -->
                                <div class="p-6 pt-0 flex items-center justify-between border-t border-gray-100 mt-4">
                                    <div>
                                        <span class="text-xs text-gray-400 block">Price / night</span>
                                        <span class="text-lg font-bold text-gray-900">NPR {{ number_format($room->price_per_night) }}</span>
                                    </div>
                                    <a href="{{ route('rooms.show', $room) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-xl text-sm transition">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $rooms->links() }}
                    </div>
                @else
                    <div class="text-center py-12 text-gray-500">No rooms found for this search or category.</div>
                @endif

            </div>
        </section>
    </div>
</x-layout>