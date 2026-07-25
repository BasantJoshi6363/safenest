
<!-- resources/views/components/navbar.blade.php -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="#" class="text-2xl font-bold text-gray-900 tracking-tight">
                    <x-logo />
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Home
                </a>
                <a href="/hotels" class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Hotels
                </a>
                <a href="/rooms" class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Rooms
                </a>
                <a href="/about" class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    About
                </a>
                <a href="/contact" class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Contact
                </a>
            </div>

            <!-- Login Button (Desktop) -->
            <div class="hidden md:flex items-center">
                <a href="/login" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg shadow-sm hover:shadow transition duration-150 ease-in-out">
                    Login
                </a>
            </div>

            <!-- Mobile Hamburger Menu Button -->
            <div class="flex items-center md:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon Menu Open -->
                    <i :class="{'hidden': open, 'block': !open }" class="ri-menu-line text-2xl"></i>
                    <!-- Icon Menu Close -->
                    <i :class="{'block': open, 'hidden': !open }" class="ri-close-line text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-cloak class="md:hidden border-t border-gray-100 bg-white" id="mobile-menu">
        <div class="px-4 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-600 bg-indigo-50">
                Home
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                Hotels
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                Rooms
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                About
            </a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                Contact
            </a>
            <div class="pt-4 pb-2 border-t border-gray-100">
                <a href="#" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2.5 rounded-lg shadow-sm">
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>