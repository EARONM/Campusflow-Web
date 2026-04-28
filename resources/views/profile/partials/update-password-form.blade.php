<section>

<form method="POST" action="{{ route('password.update') }}" class="space-y-5">
    @csrf
    @method('put')

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Current Password
        </label>

        <input type="password"
               name="current_password"
               autocomplete="current-password"
               class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white text-gray-900 focus:ring-2 focus:ring-red-500 focus:outline-none">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            New Password
        </label>

        <input type="password"
               name="password"
               autocomplete="new-password"
               class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white text-gray-900 focus:ring-2 focus:ring-red-500 focus:outline-none">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Confirm New Password
        </label>

        <input type="password"
               name="password_confirmation"
               autocomplete="new-password"
               class="w-full border border-gray-300 rounded-xl px-4 py-3 bg-white text-gray-900 focus:ring-2 focus:ring-red-500 focus:outline-none">
    </div>

    <div class="flex items-center gap-4">

        <button type="submit"
            class="px-6 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition">
            Update Password
        </button>

        @if (session('status') === 'password-updated')
            <span class="text-sm text-green-600 font-medium">
                Password updated successfully.
            </span>
        @endif

    </div>

</form>

</section>