    <!-- Include Navbar -->
        @vite('resources/css/app.css')

    <x-navbar />
    <!-- Page Header Banner -->
    <section class="bg-indigo-50/50 py-12 lg:py-16 border-b border-indigo-100/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight">
                Contact <span class="text-indigo-600">SafeNest</span>
            </h1>
            <p class="text-gray-500 text-base max-w-2xl mx-auto">
                Have questions about your stay in Nepal? Reach out to our local team and we will get back to you shortly.
            </p>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="py-16 lg:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">
                
                <!-- Left Column: Contact Information -->
                <div class="space-y-8 lg:col-span-1">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Get in Touch</h2>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            We are based in the heart of Nepal, providing round-the-clock support for all your hotel and resort bookings.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                                <i class="ri-map-pin-2-line"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">Our Head Office</h3>
                                <p class="text-gray-500 text-sm mt-1">Lakeside, Pokhara & Thamel, Kathmandu<br />Nepal</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                                <i class="ri-phone-line"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">Phone & WhatsApp</h3>
                                <p class="text-gray-500 text-sm mt-1">+977 (01) 4123456</p>
                                <p class="text-gray-500 text-sm">+977 9801234567</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center text-xl flex-shrink-0">
                                <i class="ri-mail-send-line"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-semibold text-gray-900">Email Address</h3>
                                <p class="text-gray-500 text-sm mt-1">info@safenest.com.np</p>
                                <p class="text-gray-500 text-sm">support@safenest.com.np</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="pt-6 border-t border-gray-100">
                        <h4 class="text-sm font-semibold text-gray-900 mb-3">Follow SafeNest</h4>
                        <div class="flex space-x-3">
                            <a href="#" class="w-10 h-10 bg-gray-50 hover:bg-indigo-600 hover:text-white text-gray-600 rounded-lg flex items-center justify-center transition duration-150">
                                <i class="ri-facebook-fill text-lg"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-50 hover:bg-indigo-600 hover:text-white text-gray-600 rounded-lg flex items-center justify-center transition duration-150">
                                <i class="ri-instagram-line text-lg"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-50 hover:bg-indigo-600 hover:text-white text-gray-600 rounded-lg flex items-center justify-center transition duration-150">
                                <i class="ri-twitter-x-line text-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Form -->
                <div class="bg-gray-50/60 p-8 sm:p-10 rounded-2xl border border-gray-100 lg:col-span-2">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h2>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Full Name -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <div class="relative">
                                    <i class="ri-user-line absolute left-4 top-3.5 text-gray-400 text-lg"></i>
                                    <input type="text" id="name" name="name" placeholder="John Doe" required
                                           class="w-full pl-11 pr-4 py-3 bg-white rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <div class="relative">
                                    <i class="ri-mail-line absolute left-4 top-3.5 text-gray-400 text-lg"></i>
                                    <input type="email" id="email" name="email" placeholder="john@example.com" required
                                           class="w-full pl-11 pr-4 py-3 bg-white rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone -->
                            <div class="space-y-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <div class="relative">
                                    <i class="ri-phone-line absolute left-4 top-3.5 text-gray-400 text-lg"></i>
                                    <input type="text" id="phone" name="phone" placeholder="+977 9800000000"
                                           class="w-full pl-11 pr-4 py-3 bg-white rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="space-y-2">
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <div class="relative">
                                    <i class="ri-chat-1-line absolute left-4 top-3.5 text-gray-400 text-lg"></i>
                                    <input type="text" id="subject" name="subject" placeholder="Hotel inquiry" required
                                           class="w-full pl-11 pr-4 py-3 bg-white rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                            <textarea id="message" name="message" rows="5" placeholder="How can SafeNest help you today?" required
                                      class="w-full p-4 bg-white rounded-xl border border-gray-200 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-8 py-3.5 rounded-xl shadow-md transition duration-150 ease-in-out flex items-center justify-center space-x-2">
                            <span>Send Message</span>
                            <i class="ri-send-plane-fill"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Include Footer -->
    <x-footer />