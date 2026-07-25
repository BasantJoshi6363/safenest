<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Safenest</title>
</head>
<body>
    <header>
        <x-navbar />
    </header>
    <main>

        <!-- resources/views/components/hero.blade.php -->
<section class="relative bg-white py-12 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Hero Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Text Column -->
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight">
                    Stop the Busy Work.<br />
                    <span class="text-indigo-900"> Start the Vacation.</span>
                </h1>
                
                <p class="text-gray-400 text-base max-w-md leading-relaxed">
                    We provide what you need to enjoy your holiday with family. Time to make another memorable moments.
                </p>

                <!-- CTA Button -->
                <div>
                    <a href="#explore" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-8 py-3 rounded-lg shadow-lg hover:shadow-indigo-200 transition duration-150 ease-in-out">
                        Show More
                    </a>
                </div>

                <!-- Stats Icons Row -->
                <div class="pt-6 flex items-center space-x-10 sm:space-x-12">
                    <!-- Stat 1 -->
                    <div class="space-y-1">
                        <div class="text-pink-500 text-3xl">
                            <i class="ri-suitcase-line"></i>
                        </div>
                        <p class="text-sm font-bold text-gray-900">2500 <span class="text-gray-400 font-normal">Users</span></p>
                    </div>

                    <!-- Stat 2 -->
                    <div class="space-y-1">
                        <div class="text-pink-500 text-3xl">
                            <i class="ri-camera-3-line"></i>
                        </div>
                        <p class="text-sm font-bold text-gray-900">200 <span class="text-gray-400 font-normal">treasure</span></p>
                    </div>

                    <!-- Stat 3 -->
                    <div class="space-y-1">
                        <div class="text-pink-500 text-3xl">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <p class="text-sm font-bold text-gray-900">100 <span class="text-gray-400 font-normal">cities</span></p>
                    </div>
                </div>
            </div>

            <!-- Right Image Column -->
            <div class="relative flex justify-center lg:justify-end">
                <div class="absolute inset-0 border-2 border-gray-200 rounded-[100px_30px_30px_30px] translate-x-4 translate-y-4 -z-10 hidden sm:block"></div>
                <div class="relative w-full max-w-lg aspect-[4/3] rounded-[100px_30px_30px_30px] overflow-hidden shadow-xl">
                    <img 
                        src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&q=80&w=1000" 
                        alt="Vacation View" 
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>

        </div>

        <!-- Search Bar Overlay Box -->
        <div class="mt-12 lg:mt-16 bg-blue-50/60 p-4 sm:p-6 rounded-2xl border border-blue-100 shadow-sm">
            <form action="#" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
                
                <!-- Field 1: Date -->
                <div class="bg-white px-4 py-3 rounded-xl border border-gray-100 flex items-center space-x-3">
                    <i class="ri-calendar-line text-gray-400 text-xl"></i>
                    <input type="text" placeholder="Check Available" class="w-full focus:outline-none text-sm text-gray-700 bg-transparent" />
                </div>

                <!-- Field 2: Person Selector -->
                <div class="bg-white px-4 py-3 rounded-xl border border-gray-100 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="ri-user-line text-gray-400 text-xl"></i>
                        <span class="text-sm text-gray-700">Person <span class="font-semibold text-gray-900">2</span></span>
                    </div>
                    <i class="ri-arrow-down-s-line text-gray-400 text-xl"></i>
                </div>

                <!-- Field 3: Location -->
                <div class="bg-white px-4 py-3 rounded-xl border border-gray-100 flex items-center space-x-3">
                    <i class="ri-map-pin-line text-gray-400 text-xl"></i>
                    <input type="text" placeholder="Select Location" class="w-full focus:outline-none text-sm text-gray-700 bg-transparent" />
                </div>

                <!-- Search Button -->
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-xl shadow-md transition duration-150 ease-in-out">
                    Search
                </button>

            </form>
        </div>

    </div>
</section>

    </main>
        <footer>
            <x-footer />
        </footer>
</body>
</html>