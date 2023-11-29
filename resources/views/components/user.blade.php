<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="smooth-scroll">

<head>

    <x-partial.head.meta></x-partial.head.meta>

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <x-partial.head.css></x-partial.head.css>

</head>

<body>

    <div class="bg-gray-100 flex h-screen pe-3 pb-4 min-w-[1000px] max-w-[2000px]">

        <aside class="h-full w-60 sm:w-full max-w-[320px] py-3 px-5">
            @include('user.templates.sidebar')
        </aside>

        <div class="flex flex-col w-full">

            <header class="h-[70px] pt-2">
                <nav class="flex justify-between">
                    @include('user.templates.topbar')
                </nav>
            </header>

            <main class="bg-white rounded-2xl h-full overflow-y-auto parent px-4">
                @yield('salam')
                {{ $slot }}
            </main>

        </div>
        <div class="hidden">
            @include('user.templates.modal')
        </div>
    </div>


    @stack('script')

    <!-- Main Script -->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- CDN Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- JQuery-->
    <script src="/vendor/jquery/jquery.min.js"></script>
</body>

</html>
