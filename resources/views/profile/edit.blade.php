<x-app-layout>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    <!-- Left Profile Summary -->
    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex flex-col items-center text-center">

            <img src="{{ asset('assets/img/ken.png') }}"
                 class="w-24 h-24 rounded-full object-cover border-4 border-red-100">

            <h2 class="mt-4 text-xl font-bold text-gray-900">
                {{ Auth::user()->name }}
            </h2>

            <p class="text-sm text-gray-500">
                {{ Auth::user()->email }}
            </p>

            <span class="mt-3 px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-semibold">
                {{ Auth::user()->role }}
            </span>

        </div>

        <div class="mt-6 border-t pt-6 space-y-4">

            <div>
                <p class="text-xs text-gray-500">Campus</p>
                <p class="font-semibold text-gray-800">
                    {{ Auth::user()->campus ?? 'Not Assigned' }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-500">Account Status</p>
                <p class="font-semibold text-green-600">
                    Active
                </p>
            </div>

        </div>

    </div>


    <!-- Right Content -->
    <div class="xl:col-span-2 space-y-6">

        <!-- Profile Form -->
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold text-gray-900 mb-1">
                Account Information
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Update your profile details.
            </p>

            @include('profile.partials.update-profile-information-form')

        </div>

        <!-- Password -->
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold text-gray-900 mb-1">
                Security Settings
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Change your password regularly to secure your account.
            </p>

            @include('profile.partials.update-password-form')

        </div>

        <!-- Danger -->
        <div class="bg-white rounded-2xl shadow p-6 border border-red-200">

            <h2 class="text-xl font-bold text-red-600 mb-1">
                Danger Zone
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Deleting your account is permanent and cannot be undone.
            </p>

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</div>

</x-app-layout>