@php
$ref = match (request()->path()) {
'publikFile' => 'publikFile',
default =>null ,
};
@endphp

<!-- Sidebar - Brand -->
<a class="flex py-2 mb-6" href="/">
    <img src="\vendor\fontawesome-free\svgs\solid\box.svg" alt="{{ env('APP_NAME') }}" width="30"
        class="flex justify-center items-center">
    <div class="text-xl font-semibold mx-3">{{ env('APP_KEY') }} <sup>❤</sup></div>
</a>

<x-partial.create-file :url="$ref"></x-partial.create-file>

<div class="mt-5">
    <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->is('/') ? 'bg-cyan-200' : 'hover:bg-gray-200' }}"
        href="/">
        <img src="\vendor\fontawesome-free\svgs\solid\folder-closed.svg" alt="{{ env('APP_NAME') }}" width="20">
        <span>File Saya</span>
    </a>

    <!-- Nav Item - Public File -->
    <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->is('publikFile') ? 'bg-cyan-200' : 'hover:bg-gray-200' }}"
        href="/publikFile">
        <i class="fa-solid fa-earth-americas"></i>
        <span style="margin-left: 2px">Publik File</span>
    </a>

    @if (Auth::user()->status == 2)
    <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->is('a/*') ? 'bg-cyan-200' : 'hover:bg-gray-200' }}"
        href="/a/users">
        <i class="fa-regular fa-user"></i>
        <span class="ml-1">Data User</span>
    </a>
    @endif
</div>