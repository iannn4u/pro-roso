@php
if ($attributes->get('flash') != null) {
  if (isset($attributes->get('flash')['fail']) || isset($attributes->get('flash')['success']) || isset($attributes->get('flash')['info']) || isset($attributes->get('flash')['warn'])) {
      $msg = null;
      $alert = null;
      $messages = [
          'fail' => $attributes->get('flash')['fail'] ?? null,
          'success' => $attributes->get('flash')['success'] ?? null,
          'info' => $attributes->get('flash')['info'] ?? null,
          'warn' => $attributes->get('flash')['warn'] ?? null,
      ];

      foreach ($messages as $a => $m) {
          if ($m != null) {
              $msg = $m;
              $alert = $a;
          }
      }

      $alertType = match ($alert) {
          'fail' => 'border-red-600 bg-red-50',
          'success' => 'border-green-300 bg-green-50',
          'info' => 'border-blue-300 bg-blue-50',
          'warn' => 'border-yellow-300 bg-yellow-50',
          default => 'border-gray-300 bg-gray-50',
      };
    }
}
@endphp

@if (isset($messages))
  <div id="atomic-alert-1"
    class="{{ $attributes->merge(['class' => 'flex items-center p-4 text-black border text-black rounded-lg absolute min-w-[18rem] top-20 right-10 z-10 shadow-md' . $alertType])['class'] }}"
    role="alert">
    <span class="sr-only">{{ $alert }}</span>
    <div class="ms-2 text-sm font-medium">
      {!! $msg !!}
    </div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 text-black rounded-lg focus:ring-2 focus:ring-slate-800 p-1.5 inline-flex items-center justify-center h-8 w-8 hover:rotate-180 duration-150"
      data-dismiss-target="#atomic-alert-1" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
@endif
