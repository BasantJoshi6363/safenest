<!-- resources/views/rooms.blade.php -->
        @vite('resources/css/app.css')
    <!-- Include Navbar -->
    <x-navbar />

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
            
            <!-- Category Filter Pills -->
            <div class="flex items-center space-x-2 overflow-x-auto pb-6 mb-8 border-b border-gray-100">
                <button class="bg-indigo-600 text-white px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap shadow-sm">
                    All Rooms
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                    Deluxe Suite
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                    Mountain View
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                    Family Room
                </button>
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                    Standard Double
                </button>
            </div>

            <!-- Rooms List Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Room Card 1 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Room Image -->
                        <div class="relative aspect-[16/10] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800" 
                                 alt="Himalayan Executive Suite" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                            <span class="absolute top-4 left-4 bg-emerald-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                Available
                            </span>
                        </div>

                        <!-- Room Details -->
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">Himalayan Executive Suite</h3>
                                    <p class="text-gray-400 text-xs mt-0.5">SafeNest Resort, Pokhara</p>
                                </div>
                            </div>

                            <!-- Specs Grid -->
                            <div class="grid grid-cols-3 gap-2 py-3 bg-gray-50 rounded-xl text-center text-xs text-gray-600 font-medium">
                                <div class="space-y-1">
                                    <i class="ri-user-3-line text-indigo-600 text-base"></i>
                                    <p>2 Guests</p>
                                </div>
                                <div class="space-y-1">
                                    <i class="ri-hotel-bed-line text-indigo-600 text-base"></i>
                                    <p>1 King Bed</p>
                                </div>
                                <div class="space-y-1">
                                    <i class="ri-aspect-ratio-line text-indigo-600 text-base"></i>
                                    <p>42 m²</p>
                                </div>
                            </div>

                            <!-- Features List -->
                            <div class="space-y-2 text-xs text-gray-500 pt-2">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Private Balcony with Annapurna View
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Free High-Speed Wi-Fi & Smart TV
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Complimentary Breakfast & Coffee Machine
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer: Pricing & Action -->
                    <div class="p-6 pt-0 border-t border-gray-50 mt-4 flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-extrabold text-indigo-600">NPR 12,500</span>
                            <span class="text-gray-400 text-xs font-normal">/ night</span>
                        </div>
                        <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-xl shadow-sm transition duration-150">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Room Card 2 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Room Image -->
                        <div class="relative aspect-[16/10] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&q=80&w=800" 
                                 alt="Deluxe Garden Double" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                            <span class="absolute top-4 left-4 bg-emerald-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                Available
                            </span>
                        </div>

                        <!-- Room Details -->
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">Deluxe Garden Double</h3>
                                    <p class="text-gray-400 text-xs mt-0.5">SafeNest Stay, Kathmandu</p>
                                </div>
                            </div>

                            <!-- Specs Grid -->
                            <div class="grid grid-cols-3 gap-2 py-3 bg-gray-50 rounded-xl text-center text-xs text-gray-600 font-medium">
                                <div class="space-y-1">
                                    <i class="ri-user-3-line text-indigo-600 text-base"></i>
                                    <p>2 Guests</p>
                                </div>
                                <div class="space-y-1">
                                    <i class="ri-hotel-bed-line text-indigo-600 text-base"></i>
                                    <p>1 Queen Bed</p>
                                </div>
                                <div class="space-y-1">
                                    <i class="ri-aspect-ratio-line text-indigo-600 text-base"></i>
                                    <p>30 m²</p>
                                </div>
                            </div>

                            <!-- Features List -->
                            <div class="space-y-2 text-xs text-gray-500 pt-2">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Peaceful Courtyard Garden Access
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Air Conditioning & Room Heater
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> En-suite Bathroom & Modern Toiletries
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer: Pricing & Action -->
                    <div class="p-6 pt-0 border-t border-gray-50 mt-4 flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-extrabold text-indigo-600">NPR 7,800</span>
                            <span class="text-gray-400 text-xs font-normal">/ night</span>
                        </div>
                        <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-xl shadow-sm transition duration-150">
                            Book Now
                        </a>
                    </div>
                </div>

                <!-- Room Card 3 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden flex flex-col justify-between group">
                    <div>
                        <!-- Room Image -->
                        <div class="relative aspect-[16/10] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?auto=format&fit=crop&q=80&w=800" 
                                 alt="Family Mountain Suite" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                            <span class="absolute top-4 left-4 bg-amber-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                Few Left
                            </span>
                        </div>

                        <!-- Room Details -->
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">Family Safari Suite</h3>
                                    <p class="text-gray-400 text-xs mt-0.5">SafeNest Safari Lodge, Chitwan</p>
                                </div>
                            </div>

                            <!-- Specs Grid -->
                            <div class="grid grid-cols-3 gap-2 py-3 bg-gray-50 rounded-xl text-center text-xs text-gray-600 font-medium">
                                <div class="space-y-1">
                                    <i class="ri-user-3-line text-indigo-600 text-base"></i>
                                    <p>4 Guests</p>
                                </div>
                                <div class="space-y-1">
                                    <i class="ri-hotel-bed-line text-indigo-600 text-base"></i>
                                    <p>2 Double Beds</p>
                                </div>
                                <div class="space-y-1">
                                    <i class="ri-aspect-ratio-line text-indigo-600 text-base"></i>
                                    <p>55 m²</p>
                                </div>
                            </div>

                            <!-- Features List -->
                            <div class="space-y-2 text-xs text-gray-500 pt-2">
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Spacious Living & Lounge Area
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> All Meals & Jungle Safari Guidance Included
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-check-line text-indigo-600"></i> Mini Bar & Complimentary Refreshments
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer: Pricing & Action -->
                    <div class="p-6 pt-0 border-t border-gray-50 mt-4 flex items-center justify-between">
                        <div>
                            <span class="text-2xl font-extrabold text-indigo-600">NPR 15,000</span>
                            <span class="text-gray-400 text-xs font-normal">/ night</span>
                        </div>
                        <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2.5 rounded-xl shadow-sm transition duration-150">
                            Book Now
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Include Footer -->
    <x-footer />
