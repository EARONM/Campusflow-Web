<section>

<form method="post" action="{{ route('profile.update') }}" class="space-y-5">
    @csrf
    @method('patch')

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Username
        </label>

        <input type="text"
               name="name"
               value="{{ old('name', $user->name) }}"
               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 focus:outline-none">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Email Address
        </label>

        <input type="email"
               name="email"
               value="{{ old('email', $user->email) }}"
               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 focus:outline-none">
    </div>

    <button type="submit"
        class="px-6 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition">
        Save Changes
    </button>

</form>

</section>