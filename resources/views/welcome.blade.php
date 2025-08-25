<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Monitoring</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">

    <header class="bg-white dark:bg-gray-800 shadow-md">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-gray-800 dark:text-white">
                Project Monitoring
            </a>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('maps.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white mr-4 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <main>
        <section class="bg-gray-800 text-white">
            <div class="container mx-auto px-6 py-24 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">Solusi Monitoring Terintegrasi</h1>
                <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Pantau lokasi, lihat kamera, dan kelola aset Anda secara real-time dari satu dasbor yang intuitif.
                </p>
                <a href="{{ auth()->check() ? route('maps.index') : route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Mulai Monitoring
                </a>
            </div>
        </section>

        <section class="bg-gray-50 dark:bg-gray-900 py-20">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white">Fitur Utama Kami</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-4">Platform kami menyediakan semua yang Anda butuhkan.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-16 w-16 bg-blue-100 dark:bg-blue-900/50 rounded-full mx-auto mb-6">
                            <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.25c-.842-.42-1.873.42-1.873 1.25v15c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.875 2.437a1.875 1.875 0 001.628-1.006z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Pemantauan Peta</h3>
                        <p class="text-gray-600 dark:text-gray-400">Lacak lokasi aset atau personel Anda secara real-time di atas peta interaktif.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-16 w-16 bg-blue-100 dark:bg-blue-900/50 rounded-full mx-auto mb-6">
                            <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Akses Kamera</h3>
                        <p class="text-gray-600 dark:text-gray-400">Lihat siaran langsung dari kamera pengawas di berbagai lokasi kapan saja.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                        <div class="flex items-center justify-center h-16 w-16 bg-blue-100 dark:bg-blue-900/50 rounded-full mx-auto mb-6">
                             <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">Pelacakan Posisi</h3>
                        <p class="text-gray-600 dark:text-gray-400">Dapatkan data koordinat yang akurat dan riwayat perjalanan dari setiap perangkat.</p>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800">
        <div class="container mx-auto px-6 py-4">
            <p class="text-center text-gray-400 text-sm">
                &copy; {{ date('Y') }} Project Monitoring. All Rights Reserved.
            </p>
        </div>
    </footer>

</body>
</html>