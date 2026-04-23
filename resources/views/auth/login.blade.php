<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="w-full max-w-3xl">
        @csrf

        <div class="bg-white shadow-xl rounded-xl overflow-hidden">

            <!-- Top Banner -->
            <div class="relative h-40">
                <img src="{{ asset('assets/img/bsu-banner.jpg') }}"
                     class="w-full h-full object-cover"
                     alt="CampusFlow Banner">

                <div class="absolute inset-0 bg-white/40"></div>

                <div class="absolute inset-0 flex items-center px-6 gap-4 justify-center">
                    <img src="{{ asset('assets/img/bsu.png') }}"
                         class="w-16 h-16 object-contain"
                         alt="BSU Logo">

                    <h1 class="text-5xl font-black tracking-wide text-center text-black">
                        CAMPUSFLOW
                    </h1>
                </div>
            </div>

            <!-- Login Body -->
            <div class="px-8 py-10 flex justify-center">
                <div class="w-full max-w-md">

                    <h2 class="text-4xl font-bold text-center mb-8">
                        Log-in
                    </h2>

                    <!-- Email -->
                    <div class="mb-5">
                        <label for="email" class="block text-lg font-semibold mb-2">
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Enter University Email"
                            class="w-full rounded-full border-0 bg-gray-200 px-5 py-3 text-gray-800 focus:ring-2 focus:ring-red-700"
                        >

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-lg font-semibold mb-2">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Enter Password"
                            class="w-full rounded-full border-0 bg-gray-200 px-5 py-3 text-gray-800 focus:ring-2 focus:ring-red-700"
                        >

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <div class="text-center">
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold px-12 py-3 rounded-full transition"
                        >
                            Sign-in
                        </button>
                    </div>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="text-center mt-5">
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-blue-700 underline hover:text-blue-900">
                                Forgot Password?
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </form>
</x-guest-layout>