    <!-- Sidebar - Brand -->
    <a class="flex py-2 mb-6" href="/">
            <img src="\vendor\fontawesome-free\svgs\solid\box.svg" alt="{{ env('APP_NAME') }}" width="30" class="flex justify-center items-center">
        <div class="text-xl font-semibold mx-3">{{ env('APP_NAME') }} <sup>❤</sup></div>
    </a>

    <a href="/file/create" class="p-2 rounded-xl shadow-md text-base bg-white flex items-center gap-3 px-3 w-1/3 transition-all hover:bg-gray-200"><span class="text-3xl mb-1">+</span> Baru</a>

    <div class="mt-5">
        <div class="mb-3 px-3 py-1 rounded-full {{ request()->is('/') ? 'bg-cyan-200' : 'hover:bg-gray-200' }}">
            <a class="flex gap-3 items-center" href="/">
                <img src="\vendor\fontawesome-free\svgs\solid\folder-closed.svg" alt="{{ env('APP_NAME') }}" width="20">
                <span>File Saya</span>
            </a>
        </div>
    
        <!-- Nav Item - Public File -->
        <div class="mb-3 px-3 py-1 rounded-full {{ request()->is('publikFile') ? 'bg-yellow-100' : 'hover:bg-gray-200' }}">
            <a class="flex gap-3 items-center" href="/publikFile">
                <i class="fa-solid fa-earth-americas"></i>
                <span style="margin-left: 2px">Publik File</span>
            </a>
        </div>
    
        @if (Auth::user()->status == 2)
        <div class="mb-3 px-3 py-1 rounded-full {{ request()->is('a/*') ? 'bg-yellow-100' : 'hover:bg-gray-200' }}">
            <a class="flex gap-3 items-center" href="/a/users">
                <i class="fa-regular fa-user"></i>
                <span class="ml-1">Data User</span>
            </a>
        </div>
    </div>
    @endif