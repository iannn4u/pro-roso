<!DOCTYPE html>
<html lang="en">

<head>
    <x-partial.head.meta></x-partial.head.meta>
    <title>@yield('title')</title>
    <x-partial.head.css></x-partial.head.css>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
        <div class="w-full min-h-screen flex flex-col py-12">
            <div class="w-full max-w-3xl p-5 my-auto mx-auto flex flex-col">
                <h1 class="w-full text-2xl font-bold md:font-semibold text-center">
                    @yield('code')
                </h1>

                <p class="w-full mt-1 dark:text-foreground/70 text-sm text-center">
                    @yield('message')
                </p>
            </div>
        </div>
    </div>
</body>

</html>