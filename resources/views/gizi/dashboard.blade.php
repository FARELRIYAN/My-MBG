<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nutritionist Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                    <p class="mb-6">You are logged in as a Nutritionist.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Menu Management Card -->
                        <a href="{{ route('gizi.menus.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition">
                            <h4 class="text-xl font-semibold text-green-800 mb-2">Manage Weekly Menus</h4>
                            <p class="text-gray-600">Create and update daily menus along with their nutrition facts (Calories, Protein, etc).</p>
                        </a>

                        <!-- Placeholder for future features -->
                        <div class="block p-6 bg-gray-50 border border-gray-200 rounded-lg opacity-60">
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Coming Soon</h4>
                            <p class="text-gray-600">More nutritionist features will be available here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>