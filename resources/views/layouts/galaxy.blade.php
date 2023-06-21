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
                <div class="col-span-3">
                    <ul class="flex flex-col gap-2">
                        @foreach($models as $modelData)
                        <a href="{{ route('galaxy.index', explode('\\', $modelData)[count(explode('\\', $modelData)) - 1]) }}">
                            <li class="@if('\\App\\Models\\' . $model == $modelData) bg-slate-200 text-purple-800 @endif hover:bg-slate-200 p-3 rounded cursor-pointer flex gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                  <path fill-rule="evenodd" d="M10 2c-1.716 0-3.408.106-5.07.31C3.806 2.45 3 3.414 3 4.517V17.25a.75.75 0 001.075.676L10 15.082l5.925 2.844A.75.75 0 0017 17.25V4.517c0-1.103-.806-2.068-1.93-2.207A41.403 41.403 0 0010 2z" clip-rule="evenodd" />
                                </svg>
                                {{ explode('\\', $modelData)[count(explode('\\', $modelData)) - 1] }} Model
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-span-9">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
    @livewireScripts
</body>
</html>
