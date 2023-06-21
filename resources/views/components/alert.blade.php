@if(Session::get('error'))
<div class="p-4 mb-4 text-sm text-rose-800 rounded-lg bg-rose-50 dark:bg-gray-800 dark:text-rose-400" role="alert">
    {{ Session::get('success') }}
</div>
@endif
@if(Session::get('success'))
<div class="p-4 mb-4 text-sm text-emerald-800 rounded-lg bg-emerald-50 dark:bg-gray-800 dark:text-emerald-400" role="alert">
    {{ Session::get('success') }}
</div>
@endif
