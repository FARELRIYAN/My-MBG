<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">Selamat Datang di Portal MBG!</h3>
                    <p class="mt-1 text-gray-600">
                        Anda telah berhasil masuk. Silakan gunakan menu navigasi untuk mengelola data sekolah, menu gizi, dan layanan pengaduan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>