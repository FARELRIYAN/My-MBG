<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complaint Officer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                    <p class="mb-6">You are responsible for handling public complaints regarding the nutrition program.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Complaint Management Card -->
                        <a href="{{ route('pengaduan.complaints.index') }}" class="block p-6 bg-yellow-50 border border-yellow-200 rounded-lg hover:bg-yellow-100 transition">
                            <h4 class="text-xl font-semibold text-yellow-800 mb-2">Incoming Complaints</h4>
                            <p class="text-gray-600">View list of complaints, respond to tickets, and update status.</p>
                        </a>

                        <!-- Placeholder for reports -->
                        <div class="block p-6 bg-gray-50 border border-gray-200 rounded-lg opacity-60">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Reports (Coming Soon)</h4>
                            <p class="text-gray-600">Monthly complaint statistics and resolution reports.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>