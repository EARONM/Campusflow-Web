<x-app-layout>

<div class="max-w-2xl bg-white rounded-2xl shadow p-6">

    <h2 class="text-2xl font-bold mb-6">Edit User</h2>

    <form method="POST"
          action="{{ route('users.update', $user->id) }}"
          class="space-y-4">

        @csrf
        @method('PATCH')

        <input type="text"
               name="name"
               value="{{ $user->name }}"
               class="w-full border rounded-xl px-4 py-3">

        <input type="email"
               name="email"
               value="{{ $user->email }}"
               class="w-full border rounded-xl px-4 py-3">

        <select name="role"
                class="w-full border rounded-xl px-4 py-3">

            @if(Auth::user()->role === 'Superadmin')
                <option value="Superadmin"
                    {{ $user->role == 'Superadmin' ? 'selected' : '' }}>
                    Superadmin
                </option>

                <option value="Admin"
                    {{ $user->role == 'Admin' ? 'selected' : '' }}>
                    Admin
                </option>
            @endif

            <option value="Staff"
                {{ $user->role == 'Staff' ? 'selected' : '' }}>
                Staff
            </option>

            <option value="Tech"
                {{ $user->role == 'Tech' ? 'selected' : '' }}>
                Tech
            </option>

        </select>

        <select name="campus"
                class="w-full border rounded-xl px-4 py-3">

            @php
                $campuses = [
                    'Main Campus',
                    'Lipa Campus',
                    'Nasugbu Campus',
                    'Alangilan Campus'
                ];
            @endphp

            @foreach($campuses as $campus)
                <option value="{{ $campus }}"
                    {{ $user->campus == $campus ? 'selected' : '' }}>
                    {{ $campus }}
                </option>
            @endforeach

        </select>

        <div class="flex gap-3">

            <button class="px-6 py-3 bg-red-500 text-white rounded-xl">
                Save Changes
            </button>

            <a href="{{ route('users') }}"
               class="px-6 py-3 bg-gray-200 rounded-xl">
               Cancel
            </a>

        </div>

    </form>

</div>

</x-app-layout>