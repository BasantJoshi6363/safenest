<!-- resources/views/components/footer.blade.php -->
<footer class="bg-white border-t border-gray-100 mt-auto">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            
            <!-- Left Side: Logo & Tagline -->
            <div class="text-center md:text-left space-y-2">
                <a href="#" class="text-2xl font-bold text-gray-900 tracking-tight block">
            <x-logo />
            </a>
                <p class="text-gray-400 text-sm max-w-xs leading-relaxed">
                    We kaboom your beauty holiday instantly and memorable.
                </p>
            </div>

            <!-- Right Side: CTA Button -->
            <div class="text-center md:text-right space-y-3">
                <p class="text-gray-800 font-semibold text-base">
                    Become hotel Owner
                </p>
                <a href="/hotel-register" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-2.5 rounded-lg shadow-sm hover:shadow transition duration-150 ease-in-out">
                    Register Now
                </a>
            </div>

        </div>
    </div>

    <!-- Bottom Bar: Copyright -->
    <div class="bg-indigo-600 py-3 text-center">
        <p class="text-xs text-white/90 font-light tracking-wide">
            Copyright {{ date('Y') }} • All rights reserved • Salman Faris
        </p>
    </div>
</footer>