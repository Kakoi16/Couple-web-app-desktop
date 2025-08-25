<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Maps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                 <div class="p-4 bg-white rounded-xl shadow">
    <h2 class="text-lg font-semibold mb-2">
        Peta lokasi real-time. (Contoh lokasi di sekitar Cikampek)
    </h2>
    <div id="map" style="height: 500px;"></div>
</div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>