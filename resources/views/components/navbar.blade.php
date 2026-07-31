<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-2xl font-bold text-gray-900 tracking-tight">
                    <x-logo />
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Home
                </a>
                <a href="/hotels"
                    class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Hotels
                </a>
                <a href="/rooms"
                    class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Rooms
                </a>
                <a href="/about"
                    class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    About
                </a>
                <a href="/contact"
                    class="text-gray-600 hover:text-indigo-600 font-medium transition duration-150 ease-in-out">
                    Contact
                </a>
            </div>

            <!-- Right Actions (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                @guest
                    <a href="/login"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg shadow-sm hover:shadow transition duration-150 ease-in-out">
                        Login
                    </a>
                @endguest

                @auth
                    <!-- User Dropdown Menu (Pure JS) -->
                    <div class="relative">
                        <button id="userMenuButton" type="button"
                            class="flex items-center space-x-3 focus:outline-none group">
                            <!-- Avatar -->
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold border-2 border-transparent group-hover:border-indigo-600 transition">
                                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-indigo-600 transition">
                                {{ Auth::user()->name }}
                            </span>
                            <i class="ri-arrow-down-s-line text-gray-400 group-hover:text-indigo-600 transition"></i>
                        </button>

                        <!-- Dropdown Panel (Hidden by default) -->
                        <div id="userDropdownMenu" style="display: none;" 
                            class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50">
                            
                            <a href="/profile" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                                <i class="ri-user-line mr-3 text-lg"></i> Profile
                            </a>
                            <a href="/settings" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                                <i class="ri-settings-3-line mr-3 text-lg"></i> Settings
                            </a>
                            
                            <div class="border-t border-gray-100 my-1"></div>

                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                                    <i class="ri-logout-box-r-line mr-3 text-lg"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Mobile Hamburger Menu Button -->
            <div class="flex items-center md:hidden">
                <button id="mobileMenuButton" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open main menu</span>
                    <i id="menuOpenIcon" class="ri-menu-line text-2xl"></i>
                    <i id="menuCloseIcon" class="ri-close-line text-2xl" style="display: none;"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" style="display: none;" class="md:hidden border-t border-gray-100 bg-white">
        <div class="px-4 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-indigo-600 bg-indigo-50">
                Home
            </a>
            <a href="/hotels"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                Hotels
            </a>
            <a href="/rooms"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                Rooms
            </a>
            <a href="/about"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                About
            </a>
            <a href="/contact"
                class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                Contact
            </a>
            
            <div class="pt-4 pb-2 border-t border-gray-100">
                @guest
                    <a href="/login"
                        class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2.5 rounded-lg shadow-sm">
                        Login
                    </a>
                @endguest

                @auth
                    <div class="space-y-1">
                        <div class="flex items-center px-3 py-2 mb-2">
                            <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold mr-3">
                                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <a href="/profile" class="flex items-center px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                            <i class="ri-user-line mr-3 text-lg"></i> Profile
                        </a>
                        <a href="/settings" class="flex items-center px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-50">
                            <i class="ri-settings-3-line mr-3 text-lg"></i> Settings
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="mt-2">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-3 py-2 rounded-md text-base font-medium text-red-600 hover:bg-red-50">
                                <i class="ri-logout-box-r-line mr-3 text-lg"></i> Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Pure JavaScript Toggles -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @auth
        // User Dropdown Logic
        const userMenuButton = document.getElementById('userMenuButton');
        const userDropdownMenu = document.getElementById('userDropdownMenu');

        if (userMenuButton && userDropdownMenu) {
            userMenuButton.addEventListener('click', function (e) {
                e.stopPropagation();
                const isHidden = userDropdownMenu.style.display === 'none';
                userDropdownMenu.style.display = isHidden ? 'block' : 'none';
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!userMenuButton.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                    userDropdownMenu.style.display = 'none';
                }
            });
        }
        @endauth

        // Mobile Menu Logic
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuOpenIcon = document.getElementById('menuOpenIcon');
        const menuCloseIcon = document.getElementById('menuCloseIcon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function () {
                const isHidden = mobileMenu.style.display === 'none';
                mobileMenu.style.display = isHidden ? 'block' : 'none';
                menuOpenIcon.style.display = isHidden ? 'none' : 'block';
                menuCloseIcon.style.display = isHidden ? 'block' : 'none';
            });
        }
    });
</script>