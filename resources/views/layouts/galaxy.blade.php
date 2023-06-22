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

<body class="font-sans antialiased overflow-y-scroll">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')
        <header>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Welcome to Galaxy Dashboard') }}
                </h2>
                <p class="font-sm font-light text-gray-500 mt-1">All of your Models will be listed here</p>
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
