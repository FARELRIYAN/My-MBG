<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                    <p class="mb-6">Manage the application data using the cards below.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- User Management Card -->
                        <a href="{{ route('admin.users.index') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                            <h4 class="text-xl font-semibold text-blue-800 mb-2">Manage Users & Team Profiles</h4>
                            <p class="text-gray-600">Create, edit, and remove system users and manage public team profiles.</p>
                        </a>

                        <!-- School Management Card -->
                        <a href="{{ route('admin.schools.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition">
                            <h4 class="text-xl font-semibold text-green-800 mb-2">Manage Schools</h4>
                            <p class="text-gray-600">Add and update schools receiving the nutrition program.</p>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>