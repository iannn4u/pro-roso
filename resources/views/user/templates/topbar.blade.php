<div class="flex flex-wrap items-center justify-between mx-auto p-5 md:px-5 px-0 pt-3 w-full">
    <a href="/" class="hidden md:flex items-center space-x-3 rtl:space-x-reverse">
        <img src="\vendor\fontawesome-free\svgs\solid\box.svg" class="h-8" alt="{{ env('APP_NAME') }}" />
        <span
            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ env('APP_NAME') }}<sup>❤</sup></span>
    </a>
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    <form class="w-1/2">
        <div class="relative">
            <div
                class="absolute z-10 hover:bg-gray-200 inset-y-0 start-0 flex items-center ml-1 h-9 w-9 mt-[6px] ml-2 rounded-full">
                <button type="submit" class="mx-auto" title="Search something">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 ps-12 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:outline-none h-12"
                placeholder="Search..." value="{{ request('search') }}" name="search">
        </div>
    </form>
    <div class="flex gap-2 md:gap-7 items-center md:oorder-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button type="button"
            class="relative grid place-items-center text-sm rounded-full w-5 h-5 md:me-0 focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="dropdownDefaultButton" data-dropdown-toggle="notif">
            <i class="fas fa-bell fa-fw"></i>
            @unless ($jumlahPesan == 0)
                <span
                    class="absolute inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">{{ $jumlahPesan }}</span>
            @endunless
        </button>
        <div class="z-50 w-80 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
            id="notif">
            <div class="block px-3 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
                Notifications
            </div>
            <div>
                @unless (count($pesan))
                    <div class="px-3 py-4">
                        <div class="text-gray-700 text-center">
                            <span>Kamu tidak memiliki notfikasi terbaru</span>
                        </div>
                    </div>
                @endunless
                @foreach (array_slice($pesan->all(), 0, 4) as $p)
                    <div class="px-3 py-2.5 flex">
                        <div class="mr-3">
                            <div class="overflow-hidden">
                                <img class="w-16 mt-2 aspect-square rounded-full object-cover"
                                    src="{{ $p->user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $p->user->pp) }}"
                                    alt="{{ $p->id_pengirim }}">
                            </div>
                        </div>
                        <div>
                            <div title="{{ $p->created_at }}" class="text-xs text-gray-700">
                                {{ $p->created_at->format('F d, Y h:iA') }}
                            </div>
                            <span class="text-[0.85rem]"><b>{{ $p->user->username }}</b> mengirim sebuah file
                                kepada anda! <a href="/lihatFile/{{ $p->id_file }}"
                                    class="text-red-500 font-bold hover:underline">Lihat file.</a></span>
                        </div>
                    </div>
                @endforeach
                @if (count($pesan))
                    <button data-modal-target="timeline-modal" data-modal-toggle="timeline-modal"
                        class="block py-2 w-full text-xs font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100">Lihat
                        Notifikasi
                        Lainnya</button>
                @endif
            </div>
        </div>
        <div class="inline-block h-8 w-0.5 self-stretch bg-gray-300 opacity-100">
        </div>
        <button type="button" class="flex justify-center items-center gap-2 text-sm rounded-full md:me-0"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom">
            <img class="w-8 h-8 rounded-full"
                src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
                alt="{{ Auth::user()->username }}">
            <p class="hidden md:block">{{ Auth::user()->username }}</p>
        </button>
        <!-- Dropdown menu -->
        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
            id="user-dropdown">
            <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->username }}</span>
                <span
                    class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                </li>
                <li>
                    <button data-modal-target="signout" data-modal-toggle="signout" type="button"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                        out</button>
                </li>
            </ul>
        </div>
    </div>
</div>


<div id="signout" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="signout">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                    signout?</h3>
                <form action="/signout" method="get" class="inline">
                    <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        Out</button>
                </form>
                <button data-modal-hide="signout" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                    cancel</button>
            </div>
        </div>
    </div>
</div>
