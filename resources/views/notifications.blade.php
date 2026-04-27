<x-app-layout>

<div class="px-6 py-5">
    <!-- Date Filter -->
    <div class="flex items-center gap-3 mb-6 text-gray-700">
        <i class="fa-regular fa-calendar text-2xl"></i>
        <span>Date</span>
    </div>

    <!-- Notifications Timeline -->
    <div class="relative max-w-5xl mx-auto">

        <!-- Vertical Line -->
        <div class="absolute right-24 top-0 bottom-0 w-px bg-gray-300"></div>

        <!-- Item -->
        @php
        $items = [
            ['EMU','EMU Admin has submitted utility data for CICS department.','2:50 pm'],
            ['EMU','No data submitted by CEAFA for the month of May. Follow-up may be required.','8:43 am'],
            ['EMU','Anomaly Detected: Water usage for CEAFA in May is 3x higher than previous month.','Yesterday'],
            ['System Notification','EMU Admin updated previously submitted data for ACES Department - Electric.','Yesterday'],
            ['Reports','Monthly report for June 2025 is ready for download.','Saturday'],
            ['Reports','Campus-wide utility trend dashboard has been updated.','June 04, 2025'],
        ];
        @endphp

        @foreach($items as $item)

        <div class="flex items-center gap-6 mb-4">

            <!-- Card -->
            <div class="flex-1 border border-gray-700 rounded-3xl px-5 py-3 flex items-center gap-4 bg-white">

                <div class="w-14 h-14 rounded-full border bg-gray-200 overflow-hidden shrink-0">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item[0]) }}"
                         class="w-full h-full object-cover">
                </div>

                <div>
                    <h3 class="font-bold text-[#69743c] text-2xl leading-none mb-2">
                        {{ $item[0] }}
                    </h3>

                    <p class="text-gray-500 font-semibold text-lg leading-tight">
                        "{{ $item[1] }}"
                    </p>
                </div>

            </div>

            <!-- Dot + Time -->
            <div class="w-24 relative text-sm text-[#7c7b58]">

                <div class="absolute -left-6 top-2 w-3 h-3 bg-[#7c7b58] rounded-full"></div>

                {{ $item[2] }}

            </div>

        </div>

        @endforeach

    </div>

    <!-- Load More -->
    <div class="text-center mt-8">

        <button class="px-10 py-3 border border-gray-700 rounded-full text-xl hover:bg-gray-100">
            Load more
        </button>

    </div>

</div>

</x-app-layout>