<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Konfirmasi Password</title>

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
            <div class="w-full max-w-md">
                <div class="text-center lg:hidden mb-8">
                     <a href="/" class="inline-block">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-900 mb-2 text-center">Area Aman</h2>
                <p class="text-gray-600 mb-6 text-center">
                   Ini adalah area aman aplikasi. Mohon konfirmasi password Anda sebelum melanjutkan.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="relative">
                         <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <x-text-input id="password" class="block w-full pl-10"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" 
                                        placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    
                    <div class="mt-6">
                        <x-primary-button class="w-full text-center flex justify-center">
                            {{ __('Konfirmasi') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>