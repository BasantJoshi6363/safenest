<x-layout title="Account Settings">

    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Left Side: Dynamic Profile Card & Branding -->
        <div
            class="hidden md:flex md:w-1/2 relative bg-cover bg-center items-center justify-center p-8"
            style="background-image: url('{{ asset('images/login_img.jpg') }}');"
        >
            <div class="absolute inset-0 bg-black/20"></div>

            <div
                class="relative z-10 w-full max-w-lg h-[85vh] bg-white/40 backdrop-blur-md rounded-3xl border border-white/50 shadow-2xl flex flex-col items-center justify-center p-8 text-center text-blue-950"
            >

                <!-- Avatar -->
                <div class="relative mb-4">
                    @if($user->avatar)
                        <img
                            src="{{ $user->avatar }}"
                            alt="{{ $user->name }}"
                            referrerpolicy="no-referrer"
                            class="w-24 h-24 rounded-full object-cover border-4 border-white/70 shadow-lg"
                        >
                    @else
                        <div
                            class="w-24 h-24 rounded-full bg-blue-600 text-white font-bold text-3xl flex items-center justify-center border-4 border-white/60 shadow-lg"
                        >
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <h1 class="text-3xl font-bold tracking-tight text-blue-900">
                    {{ $user->name }}
                </h1>

                <p class="text-sm font-medium text-blue-800/80 mt-1">
                    {{ $user->email }}
                </p>

                <!-- Member Badge -->
                <div
                    class="mt-6 inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/50 border border-white/60 text-xs font-semibold text-blue-900"
                >
                    <i class="ri-user-star-line text-blue-600"></i>
                    Safe<span class="text-blue-600">Nest</span> Member
                </div>

                <!-- Profile Indicators -->
                <div class="absolute bottom-8 flex space-x-2">
                    <span class="w-2.5 h-2.5 bg-white/60 rounded-full"></span>
                    <span class="w-6 h-2.5 bg-blue-600 rounded-full"></span>
                </div>

            </div>
        </div>


        <!-- Right Side: Account Settings -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">

            <div class="w-full max-w-md space-y-6">

                <!-- Header -->
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center md:text-left">
                        Account Settings
                    </h2>

                    <p class="mt-2 text-sm text-gray-500 text-center md:text-left">
                        Update your profile information and account password.
                    </p>
                </div>


                <!-- Success Message -->
                @if (session('status') === 'settings-updated')
                    <div
                        class="flex items-center gap-2 p-4 rounded-xl bg-green-50 border border-green-200 text-sm font-medium text-green-600"
                    >
                        <i class="ri-checkbox-circle-line text-lg"></i>

                        <span>
                            Your account settings have been updated successfully!
                        </span>
                    </div>
                @endif


                <!-- General Error Messages -->
                @if ($errors->any())
                    <div
                        class="p-4 rounded-xl bg-red-50 border border-red-200 text-sm font-medium text-red-600"
                    >
                        <div class="flex items-start gap-2">
                            <i class="ri-error-warning-line text-lg mt-0.5"></i>

                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif


                <!-- Settings Form -->
                <form
                    method="POST"
                    action="{{ route('settings.update') }}"
                    class="space-y-4"
                >
                    @csrf
                    @method('PUT')


                    <!-- Full Name -->
                    <div>
                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Full Name
                        </label>

                        <div class="relative mt-1">
                            <i
                                class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
                            ></i>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >
                        </div>

                        @error('name')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- Email Address -->
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Email Address
                        </label>

                        <div class="relative mt-1">
                            <i
                                class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
                            ></i>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >
                        </div>

                        @error('email')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- Divider -->
                    <div class="flex items-center gap-3 py-2">
                        <div class="flex-1 border-t border-gray-100"></div>

                        <span class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                            Change Password
                        </span>

                        <div class="flex-1 border-t border-gray-100"></div>
                    </div>


                    <!-- Current Password -->
                    <div>
                        <label
                            for="current_password"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Current Password
                        </label>

                        <div class="relative mt-1">
                            <i
                                class="ri-lock-password-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
                            ></i>

                            <input
                                type="password"
                                name="current_password"
                                id="current_password"
                                placeholder="••••••••"
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('current_password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >
                        </div>

                        <p class="mt-1 text-xs text-gray-400">
                            Required only when changing your password.
                        </p>

                        @error('current_password')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- New Password -->
                    <div>
                        <label
                            for="new_password"
                            class="block text-sm font-medium text-gray-700"
                        >
                            New Password
                        </label>

                        <div class="relative mt-1">
                            <i
                                class="ri-lock-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
                            ></i>

                            <input
                                type="password"
                                name="new_password"
                                id="new_password"
                                placeholder="••••••••"
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('new_password') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >
                        </div>

                        @error('new_password')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>


                    <!-- Confirm New Password -->
                    <div>
                        <label
                            for="new_password_confirmation"
                            class="block text-sm font-medium text-gray-700"
                        >
                            Confirm New Password
                        </label>

                        <div class="relative mt-1">
                            <i
                                class="ri-lock-2-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"
                            ></i>

                            <input
                                type="password"
                                name="new_password_confirmation"
                                id="new_password_confirmation"
                                placeholder="••••••••"
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all"
                        >
                            <i class="ri-save-3-line text-lg"></i>
                            Save Settings
                        </button>
                    </div>

                </form>


                <!-- Back to Dashboard -->
                <div class="text-center pt-2">
                    <a
                        href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition"
                    >
                        <i class="ri-arrow-left-line mr-2"></i>
                        Back to Dashboard
                    </a>
                </div>

            </div>
        </div>

    </div>

</x-layout>