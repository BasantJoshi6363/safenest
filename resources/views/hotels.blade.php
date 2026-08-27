<x-layout title="Hotels">
    <div>
        <!-- Page Header Banner -->
        <section class="bg-indigo-50/50 py-12 lg:py-16 border-b border-indigo-100/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight">
                    Explore Stays with <span class="text-indigo-600">SafeNest</span>
                </h1>
                <p class="text-gray-500 text-base max-w-2xl mx-auto">
                    Handpicked hotels, resorts, and peaceful retreats across Nepal's best destinations.
                </p>
            </div>
        </section>

        <!-- Filter & Hotels Grid Section -->
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Filters & Search Form -->
                <form method="GET" action="{{ route('hotels.index') }}"
                    class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">
                    
                    <!-- Location Filter with Remix Icon Scroll Controls -->
                    <div x-data="{
                        scrollLeft() { $refs.pillsContainer.scrollBy({ left: -200, behavior: 'smooth' }) },
                        scrollRight() { $refs.pillsContainer.scrollBy({ left: 200, behavior: 'smooth' }) }
                    }" class="relative flex items-center w-full md:w-auto">
                        
                        <!-- Left Arrow Button -->
                        <button type="button" @click="scrollLeft()" 
                            class="hidden sm:flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 hover:bg-indigo-50 hover:text-indigo-600 text-gray-600 transition shadow-sm mr-2 shrink-0">
                            <i class="ri-arrow-left-s-line text-lg"></i>
                        </button>

                        <!-- Location Pills (Scrollbar Hidden) -->
                        <div x-ref="pillsContainer" class="flex items-center space-x-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">
                            @php
                                $destinations = ['All', 'Kathmandu', 'Pokhara', 'Chitwan', 'Mustang', 'Nagarkot', 'Lumbini', 'Bandipur', 'Dhulikhel'];
                                $selectedDest = request('destination', 'All');
                            @endphp

                            @foreach($destinations as $dest)
                                <a href="{{ route('hotels.index', array_merge(request()->query(), ['destination' => $dest])) }}"
                                    class="px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition shrink-0 {{ $selectedDest === $dest ? 'bg-indigo-600 text-white shadow-sm' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">
                                    {{ $dest === 'All' ? 'All Stays' : $dest }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Right Arrow Button -->
                        <button type="button" @click="scrollRight()" 
                            class="hidden sm:flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 hover:bg-indigo-50 hover:text-indigo-600 text-gray-600 transition shadow-sm ml-2 shrink-0">
                            <i class="ri-arrow-right-s-line text-lg"></i>
                        </button>
                    </div>

                    <!-- Search Input -->
                    <div class="relative w-full md:w-72">
                        <i class="ri-search-line absolute left-3.5 top-2.5 text-gray-400 text-lg"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search hotel name..."
                            class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition"
                            onchange="this.form.submit()" />
                    </div>
                </form>

                <!-- Dynamic Hotels Grid -->
                @if($hotels->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                        @foreach($hotels as $hotel)
                            @php
                                $minPrice = $hotel->rooms->where('is_active', true)->min('price_per_night');
                            @endphp
                            <div
                                class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group flex flex-col justify-between">
                                <div>
                                    <!-- Hotel Image & Badges -->
                                    <div class="relative aspect-[4/3] overflow-hidden">
                                        <img src="{{ $hotel->featured_image ? (Str::startsWith($hotel->featured_image, ['http://', 'https://']) ? $hotel->featured_image : asset('storage/' . $hotel->featured_image)) : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800' }}"
                                            alt="{{ $hotel->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                            onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800';" />

                                        <!-- Location Tag Badge -->
                                        <span class="absolute top-4 left-4 bg-gray-900/70 backdrop-blur-md text-white text-xs font-medium px-3 py-1 rounded-full shadow-sm flex items-center gap-1">
                                            <i class="ri-map-pin-2-fill text-indigo-400"></i> {{ $hotel->destination ?? $hotel->city }}
                                        </span>

                                        @if($minPrice)
                                            <span
                                                class="absolute top-4 right-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                                From NPR {{ number_format($minPrice) }} / night
                                            </span>
                                        @endif
                                    </div>

                                    <div class="p-6 space-y-4">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3
                                                    class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">
                                                    {{ $hotel->name }}</h3>
                                                <!-- Formatted Nepal Address -->
                                                <p class="text-gray-500 text-sm flex items-center gap-1 mt-1">
                                                    <i class="ri-map-pin-line text-indigo-600"></i>
                                                    {{ $hotel->address ? $hotel->address : ($hotel->city . ', ' . $hotel->destination) }}, Nepal
                                                </p>
                                            </div>
                                            <div
                                                class="flex items-center text-amber-500 text-sm font-semibold bg-amber-50 px-2 py-1 rounded-md">
                                                <i class="ri-star-fill mr-1"></i> {{ number_format($hotel->star_rating, 1) }}
                                            </div>
                                        </div>

                                        <!-- Dynamic Amenities -->
                                        <div
                                            class="flex items-center space-x-4 pt-2 text-gray-500 text-sm border-t border-gray-100">
                                            @if($hotel->free_wifi)<span title="Free Wifi" class="flex items-center gap-1"><i
                                            class="ri-wifi-line text-indigo-500"></i> Wifi</span>@endif
                                            @if($hotel->swimming_pool)<span title="Swimming Pool"
                                                class="flex items-center gap-1"><i
                                            class="ri-footprint-line text-indigo-500"></i> Pool</span>@endif
                                            @if($hotel->restaurant)<span title="Restaurant" class="flex items-center gap-1"><i
                                            class="ri-restaurant-line text-indigo-500"></i> Dining</span>@endif
                                            @if($hotel->parking)<span title="Parking" class="flex items-center gap-1"><i
                                            class="ri-parking-box-line text-indigo-500"></i> Parking</span>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="px-6 pb-6">
                                    <a href="{{ route('hotels.show', $hotel->slug) }}"
                                        class="block text-center bg-indigo-50 hover:bg-indigo-600 hover:text-white text-indigo-600 font-medium py-2.5 rounded-xl transition duration-150">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $hotels->links() }}
                    </div>
                @else
                    <div class="text-center py-12 text-gray-500">No hotels found for this location.</div>
                @endif
            </div>
        </section>
    </div>
</x-layout>