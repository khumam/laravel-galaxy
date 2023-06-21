<x-galaxy-layout :model="$galaxyModel">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to Galaxy Dashboard') }}
        </h2>
    </x-slot>
    <livewire:galaxy-create-livewire :model="$galaxyModel" />
</x-galaxy-layout>
