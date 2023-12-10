<div class="flex flex-wrap items-center justify-between mx-auto p-5 md:px-5 px-0 pt-3 w-full">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex group items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-200/80 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6 group-hover:text-black" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
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
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
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
            class="relative grid place-items-center text-sm rounded-full w-5 h-5 md:me-0 focus:ring-2 focus:ring-gray-300"
            id="dropdownDefaultButton" data-dropdown-toggle="notif">
            <i class="fas fa-bell fa-fw"></i>
            @unless ($jumlahPesan == 0)
            <span
                class="absolute inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">{{
                $jumlahPesan }}</span>
            @endunless
        </button>
        <div class="z-50 w-80 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
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
                            kepada anda! <a href="{{ route('file.share.detail',[$p->user->username ,$p->id_file]) }}"
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
        <button class="flex items-center group" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom" data-popover-trigger="click">
            <span class="me-3 text-gray-700 group-hover:text-gray-600/80 text-sm md:text-base font-semibold">{{
                Auth::user()->username }}</span>
            <img class="rounded-full object-cover w-7 h-7"
                src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
                width="40">
        </button>
        <!-- Dropdown menu -->
        <div class="hidden z-20 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg"
            style="transform: translate(-100%) !important max-w-[300px]" id="user-dropdown">
            <div class="min-w-[250px] py-3">
                <div class="px-4 mb-1.5 mt-1.5">
                    <span class="block text-sm  text-gray-500 truncate">{{ Auth::user()->email }}</span>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('me') }}"
                            class="inline-flex items-center w-full justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Profile
                            <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('account.settings') }}"
                            class="inline-flex items-center w-full justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Settings
                            <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <path
                                        d="M19 11V9a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L12 2.757V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L2.929 4.343a1 1 0 0 0 0 1.414l.536.536L2.757 8H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535L8 17.243V18a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H18a1 1 0 0 0 1-1Z" />
                                    <path d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </g>
                            </svg>
                        </a>
                    </li>
                </ul>
                <hr class="my-2.5 w-10/12 mx-auto h-px border-0 bg-gray-300">
                <ul>
                    <li>
                        <button data-modal-target="signout" data-modal-toggle="signout" type="button"
                            class="w-full block text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log
                            Out</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div id="signout" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                data-modal-hide="signout">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to
                    log out?</h3>
                <form action="/signout" method="get" class="inline-block mr-1" id="formLogout">
                    <div class="!w-max">
                        <x-partial.primary-button onclick="process('logout')" data-logout=""
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Log out
                        </x-partial.primary-button>
                    </div>
                </form>
                <x-partial.secondary-button data-modal-hide="signout">
                    No, cancel
                </x-partial.secondary-button>
            </div>
        </div>
    </div>
</div>


<div id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 2xl:w-[339px] h-screen overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-600"
    tabindex="-1">
    <div class="h-full px-4 py-3 overflow-y-auto bg-gray-50 rounded-e-xl">
        <div class="flex items-center gap-x-2">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex group items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-200/80 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-5 h-5 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>

            <a href="/" class="inline-flex items-center space-x-2.5 my-3">
                <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 22 21">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M7.24 7.194a24.16 24.16 0 0 1 3.72-3.062m0 0c3.443-2.277 6.732-2.969 8.24-1.46 2.054 2.053.03 7.407-4.522 11.959-4.552 4.551-9.906 6.576-11.96 4.522C1.223 17.658 1.89 14.412 4.121 11m6.838-6.868c-3.443-2.277-6.732-2.969-8.24-1.46-2.054 2.053-.03 7.407 4.522 11.959m3.718-10.499a24.16 24.16 0 0 1 3.719 3.062M17.798 11c2.23 3.412 2.898 6.658 1.402 8.153-1.502 1.503-4.771.822-8.2-1.433m1-6.808a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                </svg> <span class="self-center text-2xl font-semibold truncate"
                    title="{{ config('database.connections.mysql.database') }}">
                    Repository<sup>❤</sup></span>
            </a>
        </div>
        @php
        $ref = match (request()->path()) {
        'publikFile' => 'publikFile',
        default => null,
        };
        @endphp
        <div class="mt-2.5">
            <x-partial.create-file :url="$ref">
                <span class="-mr-1.5 text-3xl mb-1">+</span> Baru
            </x-partial.create-file>

            <div class="block mt-5">
                <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->is('/') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                    href="/">
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 18a.969.969 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V9l4-4m-4 5h5m3-4h5V1m5 1v12a.97.97 0 0 1-.933 1H9.933A.97.97 0 0 1 9 14V5l4-4h5.067A.97.97 0 0 1 19 2Z" />
                    </svg> <span>File Saya</span>
                </a>

                <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->is('publikFile') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                    href="/publikFile">
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 21 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg> <span style="ml-1">Publik File</span>
                </a>

                <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->routeIs('file.trashed') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                    href="{{ route('file.trashed') }}">
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                    </svg>
                    <span style="ml-1">Trash</span>
                </a>

                @if (Auth::user()->status == 2)
                <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->is('a/*') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                    href="/a/users">
                    <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="ml-1">Data User</span>
                </a>
                @endif
            </div>
            <hr class="my-2 h-px bg-gray-200 border-0" />
            <div>
                <a class="flex gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->routeIs('file.trashed') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                    href="{{ route('account.settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span style="ml-1">Settings</span>
                </a>
                <button data-modal-target="signout" data-modal-toggle="signout"
                    class="flex w-full gap-3 items-center mb-3 px-4 py-2.5 rounded-full {{ request()->routeIs('file.trashed') ? 'bg-gray-300' : 'hover:bg-gray-200' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="w-4 h-4">
                        <path fill-rule="evenodd"
                            d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span style="ml-1">Log out</span>
                </button>
            </div>
        </div>
    </div>
</div>