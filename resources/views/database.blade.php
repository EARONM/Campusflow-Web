<x-app-layout>

<div class="px-6 py-5">
    <!-- Top Cards -->
    <div class="grid grid-cols-4 gap-5 mb-6">

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Total Users</p>
            <h2 class="text-4xl font-bold mt-2">18</h2>
        </div>

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Departments</p>
            <h2 class="text-4xl font-bold mt-2">12</h2>
        </div>

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Reports Stored</p>
            <h2 class="text-4xl font-bold mt-2">245</h2>
        </div>

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Last Backup</p>
            <h2 class="text-xl font-bold mt-3 text-green-600">Today</h2>
        </div>

    </div>

    <!-- Action Row -->
    <div class="flex items-center justify-between mb-5">

        <div class="flex gap-3">

            <button class="px-5 py-2 rounded-full bg-red-500 text-white text-sm">
                Users
            </button>

            <button class="px-5 py-2 rounded-full border text-sm">
                Reports
            </button>

            <button class="px-5 py-2 rounded-full border text-sm">
                Utilities
            </button>

            <button class="px-5 py-2 rounded-full border text-sm">
                Logs
            </button>

        </div>

        <div class="flex gap-3">

            <button class="px-5 py-2 rounded-xl border text-sm">
                Export CSV
            </button>

            <button class="px-5 py-2 rounded-xl bg-[#101a13] text-white text-sm">
                Add Record
            </button>

        </div>

    </div>

    <!-- Main Table -->
    <div class="bg-white rounded-3xl border overflow-hidden">

        <!-- Header -->
        <div class="grid grid-cols-6 bg-gray-50 px-6 py-4 text-sm font-semibold text-gray-600 border-b">

            <div>Name</div>
            <div>Email</div>
            <div>Role</div>
            <div>Department</div>
            <div>Status</div>
            <div>Action</div>

        </div>

        <!-- Row -->
        <div class="grid grid-cols-6 px-6 py-4 items-center border-b text-sm">

            <div>Mark Magsino</div>
            <div>mark@campusflow.com</div>
            <div>Head of SDO</div>
            <div>Main Campus</div>

            <div>
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                    Active
                </span>
            </div>

            <div class="flex gap-2">
                <button class="px-4 py-1 rounded-lg border">
                    Edit
                </button>

                <button class="px-4 py-1 rounded-lg bg-red-500 text-white">
                    Delete
                </button>
            </div>

        </div>

        <!-- Row -->
        <div class="grid grid-cols-6 px-6 py-4 items-center border-b text-sm">

            <div>EMU Admin</div>
            <div>emu@campusflow.com</div>
            <div>Admin</div>
            <div>CICS</div>

            <div>
                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">
                    Active
                </span>
            </div>

            <div class="flex gap-2">
                <button class="px-4 py-1 rounded-lg border">
                    Edit
                </button>

                <button class="px-4 py-1 rounded-lg bg-red-500 text-white">
                    Delete
                </button>
            </div>

        </div>

        <!-- Row -->
        <div class="grid grid-cols-6 px-6 py-4 items-center text-sm">

            <div>Campus Viewer</div>
            <div>viewer@campusflow.com</div>
            <div>Viewer</div>
            <div>CEAFA</div>

            <div>
                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                    Inactive
                </span>
            </div>

            <div class="flex gap-2">
                <button class="px-4 py-1 rounded-lg border">
                    Edit
                </button>

                <button class="px-4 py-1 rounded-lg bg-red-500 text-white">
                    Delete
                </button>
            </div>

        </div>

    </div>

</div>

</x-app-layout>