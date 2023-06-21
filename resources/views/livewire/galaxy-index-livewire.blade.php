
<div class="w-full">
    <div class="shadow">
        <div class="bg-white p-4 rounded-tl rounded-tr border-b flex items-center justify-between">
            <h1 class="text-gray-800">{{ $model }} Management</h1>
            <a href="{{ route('galaxy.create', $model) }}" class="text-white rounded bg-gray-800 px-5 py-3 active:bg-gray-950 hover:bg-gray-900">Add new {{ \Str::lower($model) }}</a>
        </div>
        <div class="border p-4 bg-gray-100 border-bl border-br">
            <livewire:galaxy-table-livewire :galaxy-model="$model"/>
        </div>
    </div>
</div>
