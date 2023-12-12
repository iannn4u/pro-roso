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
            class="bg-gray-700 text-white flex w-64 items-center p-3 pe-0 text-black border text-black rounded-lg absolute bottom-[2vh] left-[4vh] z-20"
            role="alert">
            <div class="ms-2 pe-2 text-sm font-medium w-full">
                {!! $msg !!}
            </div>
            {{-- <div class="inline-block h-100 w-0.5 self-stretch bg-gray-300 opacity-100"></div> --}}
            <button type="button" autofocus=""
                class="inline-flex mx-2 mt-1 h-9 w-9 items-center justify-center rounded-md text-white outline-none ring-inset backdrop-blur-lg duration-150"
                data-dismiss-target="#atomic-alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                </svg>
            </button>
        </div>
        {{-- <div id="atomic-alert-1"
        class="{{ $attributes->merge(['class' => 'flex w-16 h-16 items-center p-4 text-black border text-black rounded-lg absolute bottom-[2vh] left-[4vh] z-20 ' . $alertType])['class'] }}"
        role="alert">
        <span class="sr-only">{{ $alert }}</span>
        <div class="ms-2 text-sm font-medium">
            {!! $msg !!}
        </div>
        <button type="button" autofocus=""
            class="-my-1 ml-2 inline-flex h-9 w-9 items-center justify-center rounded-md p-1.5 text-black outline-none ring-inset backdrop-blur-lg duration-150 focus-within:bg-gray-100/80 focus-within:ring-2 hover:ring-2 focus-within:ring-gray-900/80 hover:bg-gray-100/80 hover:ring-slate-600 focus:ring-2 focus:ring-gray-900/80"
            data-dismiss-target="#atomic-alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
            </svg>
        </button>
    </div> --}}
@endif
