        @vite('resources/css/app.css')
<!-- resources/views/hotels.blade.php -->
    <!-- Include Navbar -->
    <x-navbar />

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
            
            <!-- Filters Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">
                <!-- Location Pills -->
                <div class="flex items-center space-x-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0">
                    <button class="bg-indigo-600 text-white px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap shadow-sm">
                        All Stays
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                        Pokhara
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                        Kathmandu
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                        Chitwan
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-full text-sm font-medium whitespace-nowrap transition">
                        Mustang
                    </button>
                </div>

                <!-- Search Input -->
                <div class="relative w-full md:w-72">
                    <i class="ri-search-line absolute left-3.5 top-2.5 text-gray-400 text-lg"></i>
                    <input type="text" placeholder="Search hotel name..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition" />
                </div>
            </div>

            <!-- Hotels Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Hotel Card 1 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800" 
                             alt="Fewa Lake Resort" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                        <span class="absolute top-4 right-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            NPR 8,500 / night
                        </span>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">SafeNest Lake Resort</h3>
                                <p class="text-gray-500 text-sm flex items-center gap-1 mt-1">
                                    <i class="ri-map-pin-line text-indigo-600"></i> Lakeside, Pokhara
                                </p>
                            </div>
                            <div class="flex items-center text-amber-500 text-sm font-semibold bg-amber-50 px-2 py-1 rounded-md">
                                <i class="ri-star-fill mr-1"></i> 4.9
                            </div>
                        </div>

                        <!-- Amenities Icons -->
                        <div class="flex items-center space-x-4 pt-2 text-gray-400 text-sm border-t border-gray-100">
                            <span title="Free Wifi" class="flex items-center gap-1"><i class="ri-wifi-line text-indigo-500"></i> Wifi</span>
                            <span title="Swimming Pool" class="flex items-center gap-1"><i class="ri-footprint-line text-indigo-500"></i> Pool</span>
                            <span title="Breakfast Included" class="flex items-center gap-1"><i class="ri-restaurant-line text-indigo-500"></i> Breakfast</span>
                        </div>

                        <a href="#" class="block text-center bg-indigo-50 hover:bg-indigo-600 hover:text-white text-indigo-600 font-medium py-2.5 rounded-xl transition duration-150">
                            View Details
                        </a>
                    </div>
                </div>

                <!-- Hotel Card 2 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&q=80&w=800" 
                             alt="Himalayan Heritage Hotel" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                        <span class="absolute top-4 right-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            NPR 6,200 / night
                        </span>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">SafeNest Boutique Stay</h3>
                                <p class="text-gray-500 text-sm flex items-center gap-1 mt-1">
                                    <i class="ri-map-pin-line text-indigo-600"></i> Thamel, Kathmandu
                                </p>
                            </div>
                            <div class="flex items-center text-amber-500 text-sm font-semibold bg-amber-50 px-2 py-1 rounded-md">
                                <i class="ri-star-fill mr-1"></i> 4.8
                            </div>
                        </div>

                        <!-- Amenities Icons -->
                        <div class="flex items-center space-x-4 pt-2 text-gray-400 text-sm border-t border-gray-100">
                            <span title="Free Wifi" class="flex items-center gap-1"><i class="ri-wifi-line text-indigo-500"></i> Wifi</span>
                            <span title="Air Conditioned" class="flex items-center gap-1"><i class="ri-temp-cold-line text-indigo-500"></i> AC</span>
                            <span title="Parking" class="flex items-center gap-1"><i class="ri-parking-box-line text-indigo-500"></i> Parking</span>
                        </div>

                        <a href="#" class="block text-center bg-indigo-50 hover:bg-indigo-600 hover:text-white text-indigo-600 font-medium py-2.5 rounded-xl transition duration-150">
                            View Details
                        </a>
                    </div>
                </div>

                <!-- Hotel Card 3 -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition duration-300 overflow-hidden group">
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&q=80&w=800" 
                             alt="Chitwan Wildlife Retreat" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500" />
                        <span class="absolute top-4 right-4 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            NPR 11,000 / night
                        </span>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition">SafeNest Safari Lodge</h3>
                                <p class="text-gray-500 text-sm flex items-center gap-1 mt-1">
                                    <i class="ri-map-pin-line text-indigo-600"></i> Sauraha, Chitwan
                                </p>
                            </div>
                            <div class="flex items-center text-amber-500 text-sm font-semibold bg-amber-50 px-2 py-1 rounded-md">
                                <i class="ri-star-fill mr-1"></i> 5.0
                            </div>
                        </div>

                        <!-- Amenities Icons -->
                        <div class="flex items-center space-x-4 pt-2 text-gray-400 text-sm border-t border-gray-100">
                            <span title="Free Wifi" class="flex items-center gap-1"><i class="ri-wifi-line text-indigo-500"></i> Wifi</span>
                            <span title="Jungle Safari" class="flex items-center gap-1"><i class="ri-compass-line text-indigo-500"></i> Safari</span>
                            <span title="Meals Included" class="flex items-center gap-1"><i class="ri-goblet-line text-indigo-500"></i> Bar</span>
                        </div>

                        <a href="#" class="block text-center bg-indigo-50 hover:bg-indigo-600 hover:text-white text-indigo-600 font-medium py-2.5 rounded-xl transition duration-150">
                            View Details
                        </a>
                    </div>
                </div>

            </div>

            <!-- Pagination Placeholder -->
            <div class="mt-12 flex justify-center items-center space-x-2">
                <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 flex items-center justify-center">
                    <i class="ri-arrow-left-s-line"></i>
                </button>
                <button class="w-10 h-10 rounded-lg bg-indigo-600 text-white font-medium flex items-center justify-center">
                    1
                </button>
                <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium flex items-center justify-center">
                    2
                </button>
                <button class="w-10 h-10 rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 flex items-center justify-center">
                    <i class="ri-arrow-right-s-line"></i>
                </button>
            </div>

        </div>
    </section>

    <!-- Include Footer -->
    <x-footer />