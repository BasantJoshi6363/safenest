<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - LankaStay</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="hidden md:flex md:w-1/2 relative bg-cover bg-center items-center justify-center p-8" style="background-image: url('{{ asset('images/login_img.jpg') }}');">
            <!-- Dark Overlay for better contrast -->
            <div class="absolute inset-0 bg-black/20"></div>

            <!-- Glassmorphism Card Container -->
            <div class="relative z-10 w-full max-w-lg h-[85vh] bg-white/40 backdrop-blur-md rounded-3xl border border-white/50 shadow-2xl flex flex-col items-center justify-center p-8 text-center">
                <h1 class="text-4xl lg:text-5xl font-bold tracking-tight text-blue-900">
                    Lanka<span class="text-blue-600">Stay.</span>
                </h1>
                
                <!-- Carousel Indicators -->
                <div class="absolute bottom-8 flex space-x-2">
                    <span class="w-2.5 h-2.5 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="w-6 h-2.5 bg-blue-600 rounded-full cursor-pointer"></span>
                </div>
            </div>
        </div>

        <!-- Right Side: Registration Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-6">
                
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center md:text-left">
                        Create Account
                    </h2>
                </div>

                <!-- Form starts -->
                <form action="" method="POST" class="space-y-4">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter your name" 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- E-mail Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E mail</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@gmail.com" 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone No Field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone No</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="With Country Code" 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('phone')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Country Field -->
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                        <input type="text" name="country" id="country" value="{{ old('country') }}" placeholder="Country Name" 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('country') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('country')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username" 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('username') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('username')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password" placeholder="6+ characters" 
                                class="block w-full px-4 py-3 bg-gray-50 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Terms and Conditions -->
                    <p class="text-xs text-gray-500">
                        By signing up you agree to <a href="#" class="text-blue-600 hover:underline">terms and conditions</a> at zoho.
                    </p>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            Register
                        </button>
                    </div>

                    <!-- Login Redirect Link -->
                    <div class="text-center pt-2">
                        <span class="text-sm text-gray-600">Already have an account? </span>
                        <a href="" class="text-sm font-medium text-gray-900 hover:underline">Login</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>