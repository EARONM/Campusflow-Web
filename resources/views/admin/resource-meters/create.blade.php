<x-app-layout>

<div class="max-w-4xl mx-auto">

    <!-- Back -->
    <a
        href="{{ route('database') }}"
        class="
            inline-flex
            items-center
            gap-2
            text-sm
            text-gray-500
            hover:text-gray-800
            mb-5
            transition
        "
    >

        <i class="fa-solid fa-arrow-left"></i>

        Back to Database

    </a>

    <!-- Card -->
    <div class="
        bg-white
        rounded-3xl
        border
        border-gray-100
        shadow-sm
        p-8
    ">

        <div class="mb-8">

            <h1 class="
                text-3xl
                font-bold
                text-gray-900
            ">

                Create Resource Meter

            </h1>

            <p class="
                text-sm
                text-gray-500
                mt-2
            ">

                Add a new utility meter

            </p>

        </div>

        <form
            method="POST"
            action="{{ route('resource-meters.store') }}"
            class="space-y-6"
        >

            @csrf

            <!-- Building -->
            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Building

                </label>

                <select
                    name="building_id"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                    "
                >

                    @foreach($buildings as $building)

                    <option
                        value="{{ $building->id }}"
                    >

                        {{ $building->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <!-- Resource Type -->
            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Resource Type

                </label>

                <select
                    name="resource_type_id"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                    "
                >

                    @foreach($types as $type)

                    <option
                        value="{{ $type->id }}"
                    >

                        {{ $type->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <!-- Meter Code -->
            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Meter Code

                </label>

                <input
                    type="text"
                    name="meter_code"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                    "
                    placeholder="Enter meter code"
                >

                @error('meter_code')

                <p class="text-red-500 text-sm mt-2">

                    {{ $message }}

                </p>

                @enderror

            </div>

            <!-- Location -->
            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Location

                </label>

                <input
                    type="text"
                    name="location"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                    "
                    placeholder="Enter location"
                >

            </div>

            <!-- Thresholds -->
            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="
                        block
                        text-sm
                        font-semibold
                        text-gray-700
                        mb-2
                    ">

                        Minimum Threshold

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="min_threshold"
                        class="
                            w-full
                            rounded-2xl
                            border-gray-200
                        "
                    >

                </div>

                <div>

                    <label class="
                        block
                        text-sm
                        font-semibold
                        text-gray-700
                        mb-2
                    ">

                        Maximum Threshold

                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="max_threshold"
                        class="
                            w-full
                            rounded-2xl
                            border-gray-200
                        "
                    >

                </div>

            </div>

            <!-- Submit -->
            <div class="pt-4">

                <button
                    type="submit"
                    class="
                        w-full
                        bg-[#101a13]
                        hover:bg-[#183322]
                        text-white
                        py-4
                        rounded-2xl
                        transition
                        font-semibold
                    "
                >

                    Save Resource Meter

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout> 