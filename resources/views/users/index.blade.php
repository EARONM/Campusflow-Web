<x-app-layout>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Add User -->
    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-4">Add User</h2>

        <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
            @csrf

            <input type="text"
                   name="name"
                   placeholder="Full Name"
                   class="w-full border rounded-xl px-4 py-3"
                   required>

            <input type="email"
                   name="email"
                   placeholder="Email"
                   class="w-full border rounded-xl px-4 py-3"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Password"
                   class="w-full border rounded-xl px-4 py-3"
                   required>

            <select name="role"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                @if(Auth::user()->role === 'Superadmin')
                    <option value="Admin">Admin</option>
                @endif

                <option value="Staff">Staff</option>
                <option value="Tech">Tech</option>

            </select>

            <select name="campus"
                    class="w-full border rounded-xl px-4 py-3">

                <option value="Main Campus">Main Campus</option>
                <option value="Lipa Campus">Lipa Campus</option>
                <option value="Nasugbu Campus">Nasugbu Campus</option>
                <option value="Alangilan Campus">Alangilan Campus</option>

            </select>

            <button class="w-full bg-red-500 text-white py-3 rounded-xl">
                Create User
            </button>

        </form>

    </div>


    <!-- Users Table -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-4">Manage Users</h2>

        <table class="w-full text-sm">

            <thead>
                <tr class="border-b text-left">
                    <th class="py-3">Name</th>
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
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->campus }}</td>

                        <td class="py-3">
                            <a href="{{ route('users.edit', $user->id) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs hover:bg-blue-600 transition">
                                Edit
                            </a>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>