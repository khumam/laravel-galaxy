<div class="w-full">
    <div class="shadow">
        <div class="bg-white p-4 rounded-tl rounded-tr border-b">
            <h1 class="text-gray-800">Detail data {{ \Str::lower($model) }}</h1>
        </div>
        <div class="border p-4 bg-gray-50 border-bl border-br overflow-auto">
          @foreach($fillable as $column)
            <div class="w-full grid grid-cols-12">
              <div class="col-span-2">
                <span class="font-medium">{{ \Str::ucfirst($column) }}</span>
              </div>
              <div class="col-span-10">
                {{ $data->$column }}
              </div>
            </div>
            <hr class="my-5" />
          @endforeach
        </div>
    </div>
</div>
