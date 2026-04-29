<x-app-layout>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Add User -->
    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-4">Add User</h2>

        <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
            @csrf

            <input type="text" name="name" placeholder="Full Name"
                class="w-full border rounded-xl px-4 py-3" required>

            <input type="text" name="username" placeholder="Username"
                class="w-full border rounded-xl px-4 py-3" required>

            <input type="email" name="email" placeholder="Email"
                class="w-full border rounded-xl px-4 py-3" required>

            <input type="password" name="password" placeholder="Password"
                class="w-full border rounded-xl px-4 py-3" required>

            <select name="role_id" class="w-full border rounded-xl px-4 py-3" required>
                <option value="">Select Role</option>
                @foreach(\App\Models\Role::all() as $role)
                    <option value="{{ $role->id }}">
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>

            <select name="campus_id" class="w-full border rounded-xl px-4 py-3">
                <option value="">All Campuses</option>
                @foreach(\App\Models\Campus::all() as $campus)
                    <option value="{{ $campus->id }}">
                        {{ $campus->name }}
                    </option>
                @endforeach
            </select>

            <button class="w-full bg-red-500 text-white py-3 rounded-xl">
                Create User
            </button>

        </form>

    </div>

    <!-- Users -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-4">Manage Users</h2>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left">
                    <th class="py-3">Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Campus</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="py-3">{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name ?? '-' }}</td>
                    <td>{{ $user->campus->name ?? 'All' }}</td>
                    <td>
                        <button
                            onclick="openEditModal(
                                '{{ $user->id }}',
                                '{{ $user->name }}',
                                '{{ $user->username }}',
                                '{{ $user->email }}',
                                '{{ $user->role_id }}',
                                '{{ $user->campus_id }}'
                            )"
                            class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs">
                            Edit
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

<!-- Edit Modal -->
<div id="editModal"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-xl rounded-2xl shadow-xl p-6">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold">Edit User</h2>

            <button onclick="closeEditModal()"
                class="text-gray-500 text-xl">
                &times;
            </button>
        </div>

        <form method="POST" id="editForm">
            @csrf
            @method('PATCH')

            <div class="space-y-4">

                <input type="text" name="name" id="edit_name"
                    class="w-full border rounded-xl px-4 py-3">

                <input type="text" name="username" id="edit_username"
                    class="w-full border rounded-xl px-4 py-3">

                <input type="email" name="email" id="edit_email"
                    class="w-full border rounded-xl px-4 py-3">

                <select name="role_id" id="edit_role"
                    class="w-full border rounded-xl px-4 py-3">

                    @foreach(\App\Models\Role::all() as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach

                </select>

                <select name="campus_id" id="edit_campus"
                    class="w-full border rounded-xl px-4 py-3">

                    @foreach(\App\Models\Campus::all() as $campus)
                        <option value="{{ $campus->id }}">
                            {{ $campus->name }}
                        </option>
                    @endforeach

                </select>

                <div class="flex gap-3 pt-2">

                    <button
                        class="px-6 py-3 bg-red-500 text-white rounded-xl">
                        Save Changes
                    </button>

                    <button type="button"
                        onclick="closeEditModal()"
                        class="px-6 py-3 bg-gray-200 rounded-xl">
                        Cancel
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

<script src="{{ asset('assets/js/users.js') }}"></script>

</x-app-layout>