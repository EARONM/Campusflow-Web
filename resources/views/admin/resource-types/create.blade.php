<x-app-layout>

<div class="max-w-3xl mx-auto">

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

                Create Resource Type

            </h1>

            <p class="
                text-sm
                text-gray-500
                mt-2
            ">

                Add a new utility category

            </p>

        </div>

        <form
            method="POST"
            action="{{ route('resource-types.store') }}"
            class="space-y-6"
        >

            @csrf

            <div>

                <label class="
                    block
                    text-sm
                    font-semibold
                    text-gray-700
                    mb-2
                ">

                    Resource Type Name

                </label>

                <input
                    type="text"
                    name="name"
                    required
                    class="
                        w-full
                        rounded-2xl
                        border-gray-200
                        focus:border-[#183322]
                        focus:ring-[#183322]
                    "
                    placeholder="Enter resource type"
                >

            </div>

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

                    Save Resource Type

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>