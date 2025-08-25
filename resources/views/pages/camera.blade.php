<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Kamera') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <p class="text-gray-600 mb-4">Halaman ini akan menampilkan feed langsung dari kamera CCTV.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="w-full h-64 bg-black rounded-md flex items-center justify-center text-white">
                            Kamera 1 Feed
                        </div>
                        <div class="w-full h-64 bg-black rounded-md flex items-center justify-center text-white">
                            Kamera 2 Feed
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>