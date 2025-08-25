<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Verifikasi Email</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex">
        <div class="hidden lg:flex w-1/2 bg-gray-800 text-white p-12 flex-col justify-center items-center">
             <a href="/" class="mb-6">
                <x-application-logo class="w-24 h-24 fill-current text-gray-500" />
            </a>
            <h1 class="text-4xl font-extrabold mb-3">Project Monitoring</h1>
            <p class="text-gray-300 text-lg text-center">Pantau semua aset Anda dari satu dasbor terpusat.</p>
        </div>

        <div class="w-full lg:w-1/2 bg-gray-100 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-md text-center">
                <div class="lg:hidden mb-8">
                     <a href="/" class="inline-block">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Verifikasi Alamat Email Anda</h2>
                <p class="text-gray-600 mb-6">
                    Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan? Jika Anda tidak menerimanya, kami akan dengan senang hati mengirimkan yang lain.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-3 rounded-md">
                        {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
                    </div>
                @endif

                <div class="mt-6 flex items-center justify-center space-x-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <x-primary-button>
                            {{ __('Kirim Ulang Email Verifikasi') }}
                        </x-primary-button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>