<!DOCTYPE html>
<html lang="en">

<head>

    @if (session('download'))
    <meta http-equiv="refresh" content="0;url={{ url('/download/' . session('download')) }}">
    @endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="\vendor\fontawesome-free\svgs\solid\box.svg" type="image/svg+xml">

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- My CSS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('style')

    <!-- Tailwindcss-->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gray-100 flex h-screen pe-3 pb-4">

    <aside class="h-full w-1/5 py-3 px-5">
        @include('user.templates.sidebar')
    </aside>

    <div class="flex flex-col w-full">

        <header class="h-[70px] pt-2">
            <nav class="flex justify-between">
                @include('user.templates.topbar')
            </nav>
        </header>

        <main class="bg-white rounded-2xl p-5">
            @yield('salam')
            {{ $slot }}
        </main>

    </div>
    <div class="hidden">
        @include('user.templates.modal')
    </div>

    @stack('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!-- JQuery-->
    <script src="/vendor/jquery/jquery.min.js"></script>
</body>

</html>