<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="smooth-scroll">

<head>

    <x-partial.head.meta></x-partial.head.meta>

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <x-partial.head.css></x-partial.head.css>

</head>

<body>

    <div class="bg-gray-100 h-screen md:pe-3 px-3 md:px-0 pb-4 md:min-w-[1000px] md:max-w-[2000px]">

        <header class="h-[70px]">
            <nav class="flex md:justify-between items-center gap-6 md:gap-0">
                @include('user.templates.topbar')
            </nav>
        </header>
        
        <div class="flex w-full h-[90%]">
            <aside class="hidden md:block h-full w-60 py-3 px-5">
                @include('user.templates.sidebar')
            </aside>
            

            <main class="bg-white rounded-2xl h-full overflow-y-auto parent px-4 w-full md:mr-3">
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