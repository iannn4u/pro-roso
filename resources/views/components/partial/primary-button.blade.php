@if ($attributes->hasAny(['data-logout']))
<div id="preprocessOut" class="mt-6">
  <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex w-full justify-center px-4 py-2.5 bg-gray-600 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
  </button>
</div>
@elseif($attributes->hasAny(['data-delete']))
<div id="preprocessDel" class="mt-6">
  <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex w-full justify-center px-4 py-2.5 bg-gray-600 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
  </button>
</div>
@else
<div id="preprocess" class="mt-6">
  <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex w-full justify-center px-4 py-2.5 bg-gray-600 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
  </button>
</div>
@endif