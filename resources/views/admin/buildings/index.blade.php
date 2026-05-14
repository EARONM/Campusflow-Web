<x-app-layout>

<div class="space-y-6">

    <!-- Header -->
    <div class="
        flex
        items-center
        justify-between
    ">

        <div>

            <!-- Back Button -->
            <a
                href="{{ route('database') }}"
                class="
                    inline-flex
                    items-center
                    gap-2
                    text-sm
                    text-gray-500
                    hover:text-gray-800
                    mb-3
                    transition
                "
            >

                <i class="fa-solid fa-arrow-left"></i>

                Back to Database

            </a>

            <h1 class="
                text-3xl
                font-bold
                text-gray-900
            ">

                Buildings

            </h1>

            <p class="
                text-sm
                text-gray-500
                mt-1
            ">

                Manage campus buildings

            </p>

        </div>

        <a
            href="{{ route('buildings.create') }}"
            class="
                bg-[#101a13]
                hover:bg-[#183322]
                text-white
                px-5
                py-3
                rounded-2xl
                transition
            "
        >

            Add Building

        </a>

    </div>

    <!-- Table Card -->
    <div class="
        bg-white
        border
        border-gray-100
        rounded-3xl
        shadow-sm
        overflow-hidden
    ">

        <!-- Table Header -->
        <div class="
            grid
            grid-cols-4
            gap-4
            px-6
            py-4
            border-b
            text-sm
            font-semibold
            text-gray-500
            uppercase
            tracking-wide
        ">

            <div>Name</div>
            <div>Campus</div>
            <div>Created</div>
            <div>Actions</div>

        </div>

        <!-- Table Body -->
        @forelse($buildings as $building)

        <div class="
            grid
            grid-cols-4
            gap-4
            px-6
            py-5
            items-center
            border-b
            last:border-b-0
            hover:bg-gray-50
            transition
        ">

            <div class="font-semibold text-gray-800">

                {{ $building->name }}

            </div>

            <div class="text-gray-600">

                {{ $building->campus->name ?? '-' }}

            </div>

            <div class="text-sm text-gray-500">

                {{ $building->created_at->format('M d, Y') }}

            </div>

            <div class="flex gap-2">

                <a
                    href="{{ route('buildings.edit', $building) }}"
                    class="
                        px-4
                        py-2
                        rounded-xl
                        border
                        text-sm
                        hover:bg-gray-100
                        transition
                    "
                >

                    Edit

                </a>

                <form
                    method="POST"
                    action="{{ route('buildings.destroy', $building) }}"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        class="
                            px-4
                            py-2
                            rounded-xl
                            bg-red-500
                            hover:bg-red-600
                            text-white
                            text-sm
                            transition
                        "
                    >

                        Delete

                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="
            p-10
            text-center
            text-gray-400
        ">

            No buildings found

        </div>

        @endforelse

    </div>

</div>

</x-app-layout>