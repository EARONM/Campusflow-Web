<x-app-layout>

<div class="max-w-3xl mx-auto">

    <!-- Back -->
    <a
        href="{{ route('buildings.index') }}"
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

        Back to Buildings

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

                Edit Building

            </h1>

            <p class="
                text-sm
                text-gray-500
                mt-2
            ">

                Update building information

            </p>

        </div>

        <form
            method="POST"
            action="{{ route('buildings.update', $building) }}"
            class="space-y-6"
        >

            @csrf
            @method('PUT')

            <!-- Campus -->
            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Campus

                </label>

                <select
                    name="campus_id"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                    "
                >

                    @foreach($campuses as $campus)

                    <option
                        value="{{ $campus->id }}"
                        @selected(
                            $building->campus_id == $campus->id
                        )
                    >

                        {{ $campus->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <!-- Building Name -->
            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Building Name

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $building->name }}"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                    "
                >

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

                    Update Building

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>