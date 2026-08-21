<x-layout title="My Profile">
    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Left Side: Dynamic Profile Showcase -->
        <div
            class="hidden md:flex md:w-1/2 relative bg-cover bg-center items-center justify-center p-8"
            style="background-image: url('{{ asset('images/login_img.jpg') }}');"
        >
            <div class="absolute inset-0 bg-black/20"></div>

            <div
                class="relative z-10 w-full max-w-lg h-[85vh] bg-white/40 backdrop-blur-md rounded-3xl border border-white/50 shadow-2xl flex flex-col items-center justify-center p-8 text-center text-blue-950"
            >

                <!-- Profile Avatar -->
                <div class="relative group mb-4">
                    @if($user->avatar)
                        <img
                            src="{{ \Illuminate\Support\Str::startsWith($user->avatar, ['http://', 'https://']) ? $user->avatar : asset('storage/' . ltrim($user->avatar, '/')) }}"
                            alt="{{ $user->name }}"
                            referrerpolicy="no-referrer"
                            class="w-28 h-28 rounded-full object-cover border-4 border-white/80 shadow-xl"
                        >
                    @else
                        <div
                            class="w-28 h-28 rounded-full bg-blue-600 text-white font-bold text-4xl flex items-center justify-center border-4 border-white/80 shadow-xl"
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

                <!-- Profile Meta Badges -->
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-2">
                    <span
                        class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/50 border border-white/60 text-xs font-semibold text-blue-900"
                    >
                        <i class="ri-verified-badge-line text-blue-600"></i>
                        Safe<span class="text-blue-600">Nest</span> Verified Profile
                    </span>

                    @if($user->created_at)
                        <span class="text-xs font-medium text-blue-900/70">
                            Joined {{ $user->created_at->format('M Y') }}
                        </span>
                    @endif
                </div>

                <!-- Profile Indicators -->
                <div class="absolute bottom-8 flex space-x-2">
                    <span class="w-2.5 h-2.5 bg-white/60 rounded-full"></span>
                    <span class="w-6 h-6 bg-blue-600 rounded-full"></span>
                </div>
            </div>
        </div>

        <!-- Right Side: Editable Profile Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-md space-y-6">

                <!-- Header -->
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 text-center md:text-left">
                        User Profile
                    </h2>

                    <p class="mt-2 text-sm text-gray-500 text-center md:text-left">
                        View and manage your personal details and account information.
                    </p>
                </div>

                <!-- Success Message -->
                @if (session('status') === 'profile-updated')
                    <div
                        class="flex items-center gap-2 p-4 rounded-xl bg-green-50 border border-green-200 text-sm font-medium text-green-600"
                    >
                        <i class="ri-checkbox-circle-line text-lg"></i>
                        <span>Profile details updated successfully!</span>
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

                <!-- Profile Form -->
                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    enctype="multipart/form-data"
                    class="space-y-4"
                >
                    @csrf

                    <!-- Avatar Upload -->
                    <div>
                        <label for="avatar" class="block text-sm font-medium text-gray-700">
                            Profile Picture
                        </label>

                        <div class="relative mt-1">
                            <input
                                type="file"
                                name="avatar"
                                id="avatar"
                                accept="image/*"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition cursor-pointer border border-gray-200 rounded-xl bg-gray-50"
                            >
                        </div>

                        @error('avatar')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Full Name
                        </label>

                        <div class="relative mt-1">
                            <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

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
                        <label class="block text-sm font-medium text-gray-700">
                            Email Address
                        </label>

                        <div class="relative mt-1">
                            <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                type="email"
                                value="{{ $user->email }}"
                                disabled
                                class="block w-full pl-11 pr-4 py-3 bg-gray-100 border border-gray-200 rounded-xl text-sm text-gray-500 cursor-not-allowed"
                            >
                        </div>

                        <p class="mt-1 text-xs text-gray-400">
                            To change your email, visit
                            <a
                                href="/settings"
                                class="text-blue-600 hover:underline"
                            >
                                Settings
                            </a>.
                        </p>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            Phone Number
                        </label>

                        <div class="relative mt-1">
                            <i class="ri-phone-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{ old('phone', $user->phone ?? '') }}"
                                placeholder="+1 (555) 000-0000"
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >
                        </div>

                        @error('phone')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">
                            Address
                        </label>

                        <div class="relative mt-1">
                            <i class="ri-map-pin-line absolute left-4 top-4 text-gray-400"></i>

                            <textarea
                                name="address"
                                id="address"
                                rows="2"
                                placeholder="123 Street Name, City, Country"
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border @error('address') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition"
                            >{{ old('address', $user->address ?? '') }}</textarea>
                        </div>

                        @error('address')
                            <p class="mt-1 text-xs text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 py-3.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg shadow-blue-500/30 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all"
                        >
                            <i class="ri-save-3-line text-lg"></i>
                            Update Profile
                        </button>
                    </div>
                </form>

                <!-- Navigation Links -->
                <div class="flex items-center justify-between pt-2">

                    <a
                        href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition"
                    >
                        <i class="ri-arrow-left-line mr-2"></i>
                        Back to Dashboard
                    </a>

                    <a
                        href="/settings"
                        class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-700 transition"
                    >
                        Account Settings
                        <i class="ri-arrow-right-line ml-1"></i>
                    </a>

                </div>

            </div>
        </div>

    </div>
</x-layout>