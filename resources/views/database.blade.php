<x-app-layout>

<div class="px-6 py-5">
    <!-- Top Cards -->
    <div class="grid grid-cols-4 gap-5 mb-6">

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Total Users</p>
            <h2 class="text-4xl font-bold mt-2">{{ $users->count() }}</h2>
        </div>

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Buildings</p>
            <h2 class="text-4xl font-bold mt-2">{{ $buildings->count() }}</h2>
        </div>

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Reports Stored</p>
            <h2 class="text-4xl font-bold mt-2">{{ $resourceMeters->count() }}</h2>
        </div>

        <div class="bg-white rounded-2xl border p-5">
            <p class="text-sm text-gray-500">Last Backup</p>
            <h2 class="text-xl font-bold mt-3 text-green-600">Today</h2>
        </div>

    </div>

    <!-- Action Row -->
    <div class="flex items-center justify-between mb-5">

        <div class="flex gap-3">

            <button
                id="users-btn"
                onclick="showSection('users')"
                class="px-5 py-2 rounded-full bg-red-500 text-white text-sm">

                Users

            </button>

            <button
                id="campuses-btn"
                onclick="showSection('campuses')"
                class="px-5 py-2 rounded-full border text-sm">

                Campuses

            </button>

            <button
                id="buildings-btn"
                onclick="showSection('buildings')"
                class="px-5 py-2 rounded-full border text-sm">

                Buildings

            </button>

            <button
                id="resource-types-btn"
                onclick="showSection('resource-types')"
                class="px-5 py-2 rounded-full border text-sm">

                Resource Types

            </button>

            <button
                id="resource-meters-btn"
                onclick="showSection('resource-meters')"
                class="px-5 py-2 rounded-full border text-sm">

                Resource Meters

            </button>

        </div>

        <div class="flex gap-3">

            <button class="px-5 py-2 rounded-xl border text-sm">
                Export CSV
            </button>

            <button
                onclick="addRecord()"
                class="px-5 py-2 rounded-xl bg-[#101a13] text-white text-sm">

                Add Record

            </button>

        </div>

    </div>

    <div id="users-section">

        <!-- Main Table -->
        <div class="bg-white rounded-3xl border overflow-hidden">

            <!-- Header -->
            <div class="grid grid-cols-6 bg-gray-50 px-6 py-4 text-sm font-semibold text-gray-600 border-b">

                <div>Name</div>
                <div>Email</div>
                <div>Role</div>
                <div>Campus</div>
                <div>Status</div>
                <div>Action</div>

            </div>

            @foreach($users as $user)

            <!-- Row -->
            <div class="grid grid-cols-6 px-6 py-4 items-center border-b text-sm">

                <div>
                    {{ $user->name }}
                </div>

                <div>
                    {{ $user->email }}
                </div>

                <div>
                    {{ $user->role->name ?? '-' }}
                </div>

                <div>
                    {{ $user->campus->name ?? 'All Campuses' }}
                </div>

                <div>

                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                        Active

                    </span>

                </div>

                <div class="flex gap-2">

                    <button
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <button
                        class="px-4 py-1 rounded-lg bg-red-500 text-white">

                        Delete

                    </button>

                </div>

            </div>

            @endforeach

        </div>
    </div>

    <div id="campuses-section"
        class="hidden">

        <div class="bg-white rounded-3xl border overflow-hidden">

            <div class="grid grid-cols-2 bg-gray-50 px-6 py-4 text-sm font-semibold text-gray-600 border-b">

                <div>Name</div>
                <div>Action</div>

            </div>

            @foreach($campuses as $campus)

            <div class="grid grid-cols-2 px-6 py-4 items-center border-b text-sm">

                <div>
                    {{ $campus->name }}
                </div>

                <div class="flex gap-2">

                    <button
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <button
                        class="px-4 py-1 rounded-lg bg-red-500 text-white">

                        Delete

                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    <div id="buildings-section"
        class="hidden">

        <div class="bg-white rounded-3xl border overflow-hidden">

            <div class="grid grid-cols-3 bg-gray-50 px-6 py-4 text-sm font-semibold text-gray-600 border-b">

                <div>Name</div>
                <div>Campus</div>
                <div>Action</div>

            </div>

            @foreach($buildings as $building)

            <div class="grid grid-cols-3 px-6 py-4 items-center border-b text-sm">

                <div>
                    {{ $building->name }}
                </div>

                <div>
                    {{ $building->campus->name ?? '-' }}
                </div>

                <div class="flex gap-2">

                    <button
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <button
                        class="px-4 py-1 rounded-lg bg-red-500 text-white">

                        Delete

                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    <div id="resource-types-section"
        class="hidden">

        <div class="bg-white rounded-3xl border overflow-hidden">

            <div class="grid grid-cols-2 bg-gray-50 px-6 py-4 text-sm font-semibold text-gray-600 border-b">

                <div>Name</div>
                <div>Action</div>

            </div>

            @foreach($resourceTypes as $type)

            <div class="grid grid-cols-2 px-6 py-4 items-center border-b text-sm">

                <div>
                    {{ $type->name }}
                </div>

                <div class="flex gap-2">

                    <button
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <button
                        class="px-4 py-1 rounded-lg bg-red-500 text-white">

                        Delete

                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    <div id="resource-meters-section"
        class="hidden">

        <div class="bg-white rounded-3xl border overflow-hidden">

            <div class="grid grid-cols-5 bg-gray-50 px-6 py-4 text-sm font-semibold text-gray-600 border-b">

                <div>Code</div>
                <div>Location</div>
                <div>Building</div>
                <div>Type</div>
                <div>Action</div>

            </div>

            @foreach($resourceMeters as $meter)

            <div class="grid grid-cols-5 px-6 py-4 items-center border-b text-sm">

                <div>
                    {{ $meter->meter_code }}
                </div>

                <div>
                    {{ $meter->location }}
                </div>

                <div>
                    {{ $meter->building->name ?? '-' }}
                </div>

                <div>
                    {{ $meter->resourceType->name ?? '-' }}
                </div>

                <div class="flex gap-2">

                    <button
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <button
                        class="px-4 py-1 rounded-lg bg-red-500 text-white">

                        Delete

                    </button>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

<script src="{{ asset('assets/js/database.js') }}"></script>

</x-app-layout>