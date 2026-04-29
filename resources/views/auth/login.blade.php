<x-guest-layout>
    <x-slot name="title">
        CampusFlow - Login
    </x-slot>

    <form method="POST" action="{{ route('login') }}" class="w-full max-w-6xl px-4">
        @csrf

        <div class="overflow-hidden bg-white shadow-2xl rounded-3xl grid grid-cols-1 lg:grid-cols-2 min-h-[680px]">

            <!-- Left Branding Side -->
            <div class="relative hidden lg:flex items-center justify-center p-10">

                <img src="{{ asset('assets/img/bsu-banner.jpg') }}"
                     alt="Campus Background"
                     class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-red-900/40 backdrop-blur-sm"></div>

                <div class="relative z-10 text-white max-w-md">

                    <div class="flex items-center gap-4 mb-8">
                        <img src="{{ asset('assets/img/bsu.png') }}"
                             alt="BSU Logo"
                             class="w-16 h-16 object-contain">

                        <div>
                            <h1 class="text-4xl font-bold tracking-wide">
                                CampusFlow
                            </h1>

                            <p class="text-sm text-red-100">
                                Smart Campus Resource System
                            </p>
                        </div>
                    </div>

                    <h2 class="text-4xl font-bold leading-tight mb-5">
                        Manage Campus Resources Efficiently
                    </h2>

                    <p class="text-red-100 text-lg leading-relaxed">
                        Access schedules, requests, departments, and services in one secure platform for Batangas State University.
                    </p>

                    <div class="mt-10 text-sm text-red-100">
                        © 2026 CampusFlow
                    </div>

                </div>
            </div>

            <!-- Right Login Side -->
            <div class="flex items-center justify-center px-8 py-12 sm:px-12 bg-white">

                <div class="w-full max-w-md">

                    <!-- Mobile Logo -->
                    <div class="lg:hidden text-center mb-8">
                        <img src="{{ asset('assets/img/bsu.png') }}"
                             class="w-16 h-16 mx-auto mb-3"
                             alt="Logo">

                        <h1 class="text-3xl font-bold text-red-700">
                            CampusFlow
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Batangas State University
                        </p>
                    </div>

                    <div class="mb-8">
                        <h2 class="text-4xl font-bold text-gray-900 mb-2">
                            Welcome Back
                        </h2>

                        <p class="text-gray-500">
                            Sign in using your university account
                        </p>
                    </div>

                    <!-- Email -->
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            University Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Enter your email"
                            class="w-full h-12 rounded-xl border border-gray-300 px-4 text-gray-800 focus:border-red-600 focus:ring-2 focus:ring-red-200"
                        >

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password
                        </label>

                        <div class="relative">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                placeholder="Enter your password"
                                class="w-full h-12 rounded-xl border border-gray-300 px-4 pr-12 text-gray-800 focus:border-red-600 focus:ring-2 focus:ring-red-200"
                            >

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 px-4 text-gray-500 hover:text-red-700"
                            >
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5
                                        c4.478 0 8.268 2.943 9.542 7
                                        -1.274 4.057-5.064 7-9.542 7
                                        -4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>

                                <svg id="eyeClosed"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 hidden"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19
                                        c-4.478 0-8.268-2.943-9.542-7
                                        a9.97 9.97 0 012.293-3.95M6.223 6.223
                                        A9.953 9.953 0 0112 5c4.478 0 8.268 2.943
                                        9.542 7a9.97 9.97 0 01-4.132 5.411M15 12
                                        a3 3 0 00-4.243-4.243M3 3l18 18"/>
                                </svg>
                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between mb-6 text-sm">

                        <label class="flex items-center gap-2 text-gray-600">
                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                            Remember me
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="font-medium text-green-700 hover:text-green-800">
                                Forgot Password?
                            </a>
                        @endif

                    </div>

                    <!-- Sign In -->
                    <button
                        type="submit"
                        class="w-full h-12 rounded-xl bg-green-700 hover:bg-green-800 text-white font-semibold shadow-lg transition duration-200"
                    >
                        Sign In
                    </button>

                    <!-- Footer -->
                    <p class="text-center text-xs text-gray-400 mt-6">
                        Secure login for authorized university users only
                    </p>

                </div>

            </div>

        </div>
    </form>

    <script src="{{ asset('assets/js/login.js') }}"></script>
</x-guest-layout>