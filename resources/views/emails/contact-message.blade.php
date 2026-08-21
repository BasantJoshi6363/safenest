<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message - SafeNest</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Left Side: Background Image & Branding -->
        <div class="hidden md:flex md:w-1/2 relative bg-cover bg-center items-center justify-center p-8" style="background-image: url('{{ asset('images/login_img.jpg') }}');">
            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-black/20"></div>

            <!-- Glassmorphism Card Container -->
            <div class="relative z-10 w-full max-w-lg h-[85vh] bg-white/40 backdrop-blur-md rounded-3xl border border-white/50 shadow-2xl flex flex-col items-center justify-center p-8 text-center">
                <h1 class="text-4xl lg:text-5xl font-bold tracking-tight text-blue-900">
                    Safe<span class="text-blue-600">Nest.</span>
                </h1>
                
                <!-- Carousel Indicators -->
                <div class="absolute bottom-8 flex space-x-2">
                    <span class="w-2.5 h-2.5 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="w-6 h-2.5 bg-blue-600 rounded-full cursor-pointer"></span>
                </div>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-6">
                
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center md:text-left">
                        Get in Touch
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 text-center md:text-left">
                        Have a question or inquiry? Fill out the form below and our team will get back to you shortly.
                    </p>
                </div>

                <!-- Session Status Message -->
                @if (session('status'))
                    <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- General Error Messages Container -->
                @if ($errors->any())
                    <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-sm font-medium text-red-600">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Starts -->
                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="John Doe" required
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@gmail.com" required
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('email')
                          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" placeholder="Write your message here..." required
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('message') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            Send Message
                        </button>
                    </div>
                </form>

                <!-- Back Home Link -->
                <div class="text-center pt-2">
                    <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>

            </div>
        </div>

    </div>

</body>
</html>