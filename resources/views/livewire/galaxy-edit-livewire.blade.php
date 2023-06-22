<div class="w-full">
    <div class="shadow">
        <div class="bg-white p-4 rounded-tl rounded-tr border-b">
            <h1 class="text-gray-800">Update {{ \Str::lower($model) }}</h1>
        </div>
        <div class="border p-4 bg-gray-100 border-bl border-br">
            <div class="w-full">
                <form method="POST" action="{{ route('galaxy.update', [$model, $data->id]) }}">
                    @csrf
                    @method('PUT')
                    @foreach($fillable as $column)
                    <div class="mb-6">
                        <label for="{{ $column }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ \Str::ucfirst($column) }}</label>
                        <input type="text" id="{{ $column }}" name="{{ $column }}" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ \Str::ucfirst($column) }}" required value="{{ $data->$column }}"
                        />
                    </div>
                    @endforeach
                    <div class="mb-6">
                        <button class="bg-gray-800 px-5 py-3 rounded text-white hover:bg-gray-900 active:bg-gray-950">
                            Update {{ \Str::lower($model) }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
