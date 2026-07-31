<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    
    <!-- Favicons & Manifest using direct absolute paths -->
    <link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/images/favicon/site.webmanifest" />
    
    <title>Safenest</title>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Left Side: Background Image & Branding (Hidden on mobile, visible on medium screens and up) -->
        <div class="hidden md:flex md:w-1/2 relative bg-cover bg-center items-center justify-center p-8" style="background-image: url('{{ asset('images/login_img.jpg') }}');">
            <!-- Dark Overlay for better contrast -->
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

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-6">
                
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center md:text-left">
                        Welcome Back
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 text-center md:text-left">
                        Please enter your details to sign in.
                    </p>
                </div>

                <!-- Session Status / General Error Messages -->
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Form starts -->
                <form action="" method="POST" class="space-y-4">
                    @csrf

                    <!-- E-mail / Username Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E mail or Username</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="name@gmail.com or username" 
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:underline">Forgot password?</a>
                            @endif
                        </div>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password" placeholder="••••••••" 
                                class="block w-full px-4 py-3 bg-gray-50 border @error('password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            Login
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="relative flex py-2 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-4 text-xs text-gray-400 uppercase tracking-wider">Or continue with</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <!-- Social Logins Grid -->
                <div class="grid grid-cols-2 gap-3">
                    <!-- Google Login Button -->
                    <a href="{{ route('google.redirect') }}" class="flex items-center justify-center py-3 px-4 border border-gray-200 hover:bg-gray-50 bg-white rounded-xl text-sm font-medium text-gray-700 shadow-sm transition">
                        <img src="{{ asset('images/google.png') }}" alt="Google" class="w-5 h-5 mr-2">
                        Google
                    </a>

                    <!-- Facebook Login Button -->
                    <a href="{{ route('facebook.redirect') }}" class="flex items-center justify-center py-3 px-4 border border-gray-200 hover:bg-gray-50 bg-white rounded-xl text-sm font-medium text-gray-700 shadow-sm transition">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook" class="w-5 h-5 mr-2">
                        Facebook
                    </a>
                </div>

                <!-- Register Redirect Link -->
                <div class="text-center pt-2">
                    <span class="text-sm text-gray-600">Don't have an account? </span>
                    <a href="/register" class="text-sm font-medium text-gray-900 hover:underline">Register</a>
                </div>

            </div>
        </div>

    </div>

</body>
</html>