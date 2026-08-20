<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - SafeNest</title>

    <link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png" />
    <link rel="manifest" href="/images/favicon/site.webmanifest" />

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        
        <!-- Left Side: Dynamic Profile Card & Branding -->
        <div class="hidden md:flex md:w-1/2 relative bg-cover bg-center items-center justify-center p-8" style="background-image: url('{{ asset('images/login_img.jpg') }}');">
            <div class="absolute inset-0 bg-black/20"></div>

            <div class="relative z-10 w-full max-w-lg h-[85vh] bg-white/40 backdrop-blur-md rounded-3xl border border-white/50 shadow-2xl flex flex-col items-center justify-center p-8 text-center text-blue-950">
                
                <!-- Avatar Circle -->
                <div class="w-24 h-24 rounded-full bg-blue-600 text-white font-bold text-3xl flex items-center justify-center border-4 border-white/60 shadow-lg mb-4">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <h1 class="text-3xl font-bold tracking-tight text-blue-900">
                    {{ $user->name }}
                </h1>
                <p class="text-sm font-medium text-blue-800/80 mt-1">
                    {{ $user->email }}
                </p>

                <div class="mt-6 inline-flex items-center px-4 py-1.5 rounded-full bg-white/50 border border-white/60 text-xs font-semibold text-blue-900">
                    Safe<span class="text-blue-600">Nest</span> Member
                </div>

                <div class="absolute bottom-8 flex space-x-2">
                    <span class="w-2.5 h-2.5 bg-white/60 rounded-full cursor-pointer"></span>
                    <span class="w-6 h-2.5 bg-blue-600 rounded-full cursor-pointer"></span>
                </div>
            </div>
        </div>

        <!-- Right Side: Account Settings Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-6">
                
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center md:text-left">
                        Account Settings
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 text-center md:text-left">
                        Update your profile information and account password.
                    </p>
                </div>

                <!-- Session Status Message -->
                @if (session('status') === 'settings-updated')
                    <div class="p-4 rounded-xl bg-green-50 border border-green-200 text-sm font-medium text-green-600">
                        Your account settings have been updated successfully!
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
                <form method="POST" action="{{ route('settings.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr class="my-6 border-gray-100">

                    <!-- Current Password Field -->
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password (to change password)</label>
                        <input type="password" name="current_password" id="current_password" placeholder="••••••••"
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('current_password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('current_password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password Field -->
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="new_password" id="new_password" placeholder="••••••••"
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border @error('new_password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                        @error('new_password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm New Password Field -->
                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="••••••••"
                            class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
                            Save Settings
                        </button>
                    </div>
                </form>

                <!-- Back to Dashboard Link -->
                <div class="text-center pt-2">
                    <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>

            </div>
        </div>

    </div>

</body>
</html>