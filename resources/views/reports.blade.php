<x-app-layout>

<div class="px-6 py-5">
    <!-- Divider -->
    <div class="border-b mb-5"></div>

    <!-- Filters -->
    <div class="flex items-center gap-4 mb-5">

        <button class="flex items-center gap-2 border rounded-xl px-4 py-2 text-sm bg-white">
            <i class="fa-regular fa-calendar"></i>
            Sort
            <i class="fa-solid fa-caret-down ml-10 text-[#7a7a3c]"></i>
        </button>

        <button class="bg-[#d8d8c0] text-[#405240] px-8 py-2 rounded-full text-sm font-semibold">
            View All Data
        </button>

    </div>

    <!-- Table Card -->
    <div class="bg-white border rounded-3xl p-5 min-h-[620px]">

        <!-- Header -->
        <div class="grid grid-cols-7 text-sm text-[#4f6650] pb-4 border-b">

            <div>Department</div>
            <div>Electricity</div>
            <div>Water</div>
            <div>Other</div>
            <div>Status</div>
            <div>Acknowledge</div>
            <div></div>

        </div>

        <!-- Row 1 -->
        <div class="grid grid-cols-7 items-center py-4 border-b text-sm">

            <div>CEAFA</div>

            <div>
                <span class="bg-lime-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-cyan-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-red-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-gray-100 px-3 py-1 rounded">
                    ☑ Complete
                </span>
            </div>

            <div>
                <button class="bg-black text-white px-5 py-1 rounded-full text-xs">
                    Accept
                </button>
            </div>

            <div>
                <button class="bg-black text-white px-5 py-1 rounded-full text-xs">
                    Flag
                </button>
            </div>

        </div>

        <!-- Row 2 -->
        <div class="grid grid-cols-7 items-center py-4 border-b text-sm">

            <div>CABEIM</div>

            <div>
                <span class="bg-lime-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-cyan-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-red-100 px-3 py-1 rounded">
                    ✕ Missing
                </span>
            </div>

            <div>
                <span class="bg-gray-100 px-3 py-1 rounded">
                    ✕ Incomplete
                </span>
            </div>

            <div>
                <button class="bg-black text-white px-5 py-1 rounded-full text-xs">
                    Accept
                </button>
            </div>

            <div>
                <button class="bg-black text-white px-5 py-1 rounded-full text-xs">
                    Flag
                </button>
            </div>

        </div>

        <!-- Row 3 -->
        <div class="grid grid-cols-7 items-center py-4 text-sm">

            <div>CIT</div>

            <div>
                <span class="bg-lime-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-cyan-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-red-100 px-3 py-1 rounded">
                    ☑ Submitted
                </span>
            </div>

            <div>
                <span class="bg-gray-100 px-3 py-1 rounded">
                    ☑ Complete
                </span>
            </div>

            <div>
                <button class="bg-black text-white px-5 py-1 rounded-full text-xs">
                    Accept
                </button>
            </div>

            <div>
                <button class="bg-black text-white px-5 py-1 rounded-full text-xs">
                    Flag
                </button>
            </div>

        </div>

    </div>

</div>

</x-app-layout>