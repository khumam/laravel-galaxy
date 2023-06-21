<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <header>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Welcome to Galaxy Dashboard') }}
                 </h2>
            </div>

        </header>
        <main>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-6 gap-6">
                <x-alert />
            </div>
            <div class="max-w-7xl mx-auto grid grid-cols-12 px-4 sm:px-6 lg:px-8 pb-6 gap-6">
                <div class="col-span-2">
                    <ul class="flex flex-col gap-2 justify-center">
                        @foreach($models as $modelData)
                        <a href="{{ route('galaxy.index', $modelData) }}">
                            <li class="@if($model == $modelData) bg-slate-200 text-purple-800 @endif hover:bg-slate-200 p-3 rounded cursor-pointer flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M7 3.5A1.5 1.5 0 018.5 2h3.879a1.5 1.5 0 011.06.44l3.122 3.12A1.5 1.5 0 0117 6.622V12.5a1.5 1.5 0 01-1.5 1.5h-1v-3.379a3 3 0 00-.879-2.121L10.5 5.379A3 3 0 008.379 4.5H7v-1z" />
                                    <path d="M4.5 6A1.5 1.5 0 003 7.5v9A1.5 1.5 0 004.5 18h7a1.5 1.5 0 001.5-1.5v-5.879a1.5 1.5 0 00-.44-1.06L9.44 6.439A1.5 1.5 0 008.378 6H4.5z" />
                                </svg>
                                {{ $modelData }} Model
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-span-10">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
    @livewireScripts
</body>
</html>
