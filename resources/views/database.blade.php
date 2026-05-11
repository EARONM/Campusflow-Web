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
                        onclick="openEditCampusModal(
                            '{{ $campus->id }}',
                            '{{ $campus->name }}'
                        )"
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <form
                        method="POST"
                        action="{{ route('campuses.destroy', $campus) }}"
                        onsubmit="return confirm('Delete this campus?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="px-4 py-1 rounded-lg bg-red-500 text-white">

                            Delete

                        </button>

                    </form>

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
                        onclick="openEditBuildingModal(
                            '{{ $building->id }}',
                            '{{ $building->name }}',
                            '{{ $building->campus_id }}'
                        )"
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <form
                        method="POST"
                        action="{{ route('buildings.destroy', $building) }}"
                        onsubmit="return confirm('Delete this building?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="px-4 py-1 rounded-lg bg-red-500 text-white">

                            Delete

                        </button>

                    </form>

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
                        onclick="openEditResourceTypeModal(
                            '{{ $type->id }}',
                            '{{ $type->name }}'
                        )"
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <form
                        method="POST"
                        action="{{ route('resource-types.destroy', $type) }}"
                        onsubmit="return confirm('Delete this resource type?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="px-4 py-1 rounded-lg bg-red-500 text-white">

                            Delete

                        </button>

                    </form>

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
                        onclick="openEditMeterModal(
                            '{{ $meter->id }}',
                            '{{ $meter->meter_code }}',
                            '{{ $meter->location }}',
                            '{{ $meter->building_id }}',
                            '{{ $meter->resource_type_id }}'
                        )"
                        class="px-4 py-1 rounded-lg border">

                        Edit

                    </button>

                    <form
                        method="POST"
                        action="{{ route('resource-meters.destroy', $meter) }}"
                        onsubmit="return confirm('Delete this meter?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="px-4 py-1 rounded-lg bg-red-500 text-white">

                            Delete

                        </button>

                    </form>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

<!-- Campus Modal -->
<div
    id="campus-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Add Campus

            </h2>

            <button
                onclick="closeCampusModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            action="{{ route('campuses.store') }}">

            @csrf

            <div class="space-y-4">

                <input
                    type="text"
                    name="name"
                    placeholder="Campus Name"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Save Campus

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Edit Campus Modal -->
<div
    id="edit-campus-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Edit Campus

            </h2>

            <button
                onclick="closeEditCampusModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            id="edit-campus-form">

            @csrf
            @method('PUT')

            <div class="space-y-4">

                <input
                    type="text"
                    name="name"
                    id="edit-campus-name"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Update Campus

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Building Modal -->
<div
    id="building-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Add Building

            </h2>

            <button
                onclick="closeBuildingModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            action="{{ route('buildings.store') }}">

            @csrf

            <div class="space-y-4">

                <input
                    type="text"
                    name="name"
                    placeholder="Building Name"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <select
                    name="campus_id"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                    <option value="">
                        Select Campus
                    </option>

                    @foreach($campuses as $campus)

                    <option value="{{ $campus->id }}">
                        {{ $campus->name }}
                    </option>

                    @endforeach

                </select>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Save Building

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Edit Building Modal -->
<div
    id="edit-building-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Edit Building

            </h2>

            <button
                onclick="closeEditBuildingModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            id="edit-building-form">

            @csrf
            @method('PUT')

            <div class="space-y-4">

                <input
                    type="text"
                    name="name"
                    id="edit-building-name"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <select
                    name="campus_id"
                    id="edit-building-campus"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                    @foreach($campuses as $campus)

                    <option value="{{ $campus->id }}">
                        {{ $campus->name }}
                    </option>

                    @endforeach

                </select>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Update Building

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Resource Type Modal -->
<div
    id="resource-type-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Add Resource Type

            </h2>

            <button
                onclick="closeResourceTypeModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            action="{{ route('resource-types.store') }}">

            @csrf

            <div class="space-y-4">

                <input
                    type="text"
                    name="name"
                    placeholder="Resource Type"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Save Resource Type

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Edit Resource Type Modal -->
<div
    id="edit-resource-type-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Edit Resource Type

            </h2>

            <button
                onclick="closeEditResourceTypeModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            id="edit-resource-type-form">

            @csrf
            @method('PUT')

            <div class="space-y-4">

                <input
                    type="text"
                    name="name"
                    id="edit-resource-type-name"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Update Resource Type

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Resource Meter Modal -->
<div
    id="meter-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-lg p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Add Resource Meter

            </h2>

            <button
                onclick="closeMeterModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            action="{{ route('resource-meters.store') }}">

            @csrf

            <div class="space-y-4">

                <input
                    type="text"
                    name="meter_code"
                    placeholder="Meter Code"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <input
                    type="text"
                    name="location"
                    placeholder="Location"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <select
                    name="building_id"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                    <option value="">
                        Select Building
                    </option>

                    @foreach($buildings as $building)

                    <option value="{{ $building->id }}">
                        {{ $building->name }}
                    </option>

                    @endforeach

                </select>

                <select
                    name="resource_type_id"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                    <option value="">
                        Select Resource Type
                    </option>

                    @foreach($resourceTypes as $type)

                    <option value="{{ $type->id }}">
                        {{ $type->name }}
                    </option>

                    @endforeach

                </select>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Save Meter

                </button>

            </div>

        </form>

    </div>

</div>

<!-- Edit Resource Meter Modal -->
<div
    id="edit-meter-modal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-lg p-6">

        <div class="flex items-center justify-between mb-5">

            <h2 class="text-xl font-bold">

                Edit Resource Meter

            </h2>

            <button
                onclick="closeEditMeterModal()"
                class="text-2xl text-gray-500">

                &times;

            </button>

        </div>

        <form
            method="POST"
            id="edit-meter-form">

            @csrf
            @method('PUT')

            <div class="space-y-4">

                <input
                    type="text"
                    name="meter_code"
                    id="edit-meter-code"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <input
                    type="text"
                    name="location"
                    id="edit-meter-location"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                <select
                    name="building_id"
                    id="edit-meter-building"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                    @foreach($buildings as $building)

                    <option value="{{ $building->id }}">
                        {{ $building->name }}
                    </option>

                    @endforeach

                </select>

                <select
                    name="resource_type_id"
                    id="edit-meter-type"
                    class="w-full border rounded-xl px-4 py-3"
                    required>

                    @foreach($resourceTypes as $type)

                    <option value="{{ $type->id }}">
                        {{ $type->name }}
                    </option>

                    @endforeach

                </select>

                <button
                    class="w-full bg-red-500 text-white py-3 rounded-xl">

                    Update Meter

                </button>

            </div>

        </form>

    </div>

</div>

<script src="{{ asset('assets/js/database.js') }}"></script>

</x-app-layout>