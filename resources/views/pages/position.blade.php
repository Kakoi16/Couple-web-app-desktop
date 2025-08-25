<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Posisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="text-gray-600 mb-4">Menampilkan data posisi terakhir dari perangkat GPS.</p>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Perangkat</th>
                                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Latitude</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Longitude</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="text-left py-3 px-4">Tracker-001</td>
                                    <td class="text-left py-3 px-4">-6.2088</td>
                                    <td class="text-left py-3 px-4">106.8456</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <td class="text-left py-3 px-4">Tracker-002</td>
                                    <td class="text-left py-3 px-4">-6.1751</td>
                                    <td class="text-left py-3 px-4">106.8650</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>