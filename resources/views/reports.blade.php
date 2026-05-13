<x-app-layout>

<div class="px-6 py-5 space-y-6">

    <!-- Header -->
    <div>

        <h1 class="
            text-3xl
            font-bold
            text-gray-900
        ">

            Reports

        </h1>

        <p class="
            text-sm
            text-gray-500
            mt-1
        ">

            Export campus utility reports

        </p>

    </div>

    <!-- Export Card -->
    <div class="
        bg-white
        border
        border-gray-100
        rounded-3xl
        p-6
        shadow-sm
    ">

        <form
            method="GET"
            action="{{ route('reports.export.csv') }}"
            class="
                grid
                grid-cols-4
                gap-4
            "
        >

            <!-- Campus -->
            <div>

                <label class="
                    text-sm
                    text-gray-600
                    block
                    mb-2
                ">

                    Campus

                </label>

                <select
                    name="campus"
                    class="
                        w-full
                        border
                        border-gray-200
                        rounded-xl
                        px-4
                        py-3
                        bg-white
                    "
                >

                    <option value="">
                        All Campuses
                    </option>

                    @foreach($campuses as $campus)

                        <option
                            value="{{ $campus->id }}"
                        >

                            {{ $campus->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- From -->
            <div>

                <label class="
                    text-sm
                    text-gray-600
                    block
                    mb-2
                ">

                    From

                </label>

                <input
                    type="date"
                    name="from"
                    class="
                        w-full
                        border
                        border-gray-200
                        rounded-xl
                        px-4
                        py-3
                    "
                >

            </div>

            <!-- To -->
            <div>

                <label class="
                    text-sm
                    text-gray-600
                    block
                    mb-2
                ">

                    To

                </label>

                <input
                    type="date"
                    name="to"
                    class="
                        w-full
                        border
                        border-gray-200
                        rounded-xl
                        px-4
                        py-3
                    "
                >

            </div>

            <!-- Export Buttons -->
            <div class="
                flex
                items-end
                gap-3
            ">

                <!-- CSV -->
                <button
                    type="submit"
                    class="
                        flex-1
                        bg-[#101a13]
                        hover:bg-[#183322]
                        text-white
                        py-3
                        rounded-xl
                        transition
                    "
                >

                    Export CSV

                </button>

                <a
                    href="{{ route('reports.export.pdf') }}"
                    class="
                        flex-1
                        bg-red-600
                        hover:bg-red-700
                        text-white
                        py-3
                        rounded-xl
                        transition
                        text-center
                    "
                >

                    Export PDF

                </a>

            </div>

        </form>

    </div>

    <!-- Information -->
    <div class="
        bg-white
        border
        border-gray-100
        rounded-3xl
        p-6
        shadow-sm
    ">

        <h2 class="
            text-xl
            font-bold
            text-gray-900
            mb-4
        ">

            Report Coverage

        </h2>

        <div class="
            grid
            grid-cols-4
            gap-4
        ">

            <div class="
                border
                border-gray-100
                rounded-2xl
                p-4
            ">

                <p class="
                    text-sm
                    text-gray-500
                ">

                    Included Data

                </p>

                <h3 class="
                    text-lg
                    font-bold
                    mt-2
                ">

                    Readings

                </h3>

            </div>

            <div class="
                border
                border-gray-100
                rounded-2xl
                p-4
            ">

                <p class="
                    text-sm
                    text-gray-500
                ">

                    Export Type

                </p>

                <h3 class="
                    text-lg
                    font-bold
                    mt-2
                ">

                    CSV

                </h3>

            </div>

            <div class="
                border
                border-gray-100
                rounded-2xl
                p-4
            ">

                <p class="
                    text-sm
                    text-gray-500
                ">

                    Filtering

                </p>

                <h3 class="
                    text-lg
                    font-bold
                    mt-2
                ">

                    Campus + Date

                </h3>

            </div>

            <div class="
                border
                border-gray-100
                rounded-2xl
                p-4
            ">

                <p class="
                    text-sm
                    text-gray-500
                ">

                    Generated

                </p>

                <h3 class="
                    text-lg
                    font-bold
                    mt-2
                ">

                    Real-Time

                </h3>

            </div>

        </div>

    </div>

</div>

</x-app-layout>