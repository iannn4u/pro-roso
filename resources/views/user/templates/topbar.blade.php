<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
    class="inline-flex items-center p-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<form class="w-9/12 md:w-1/2">
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

<div class="w-40 me-2 justify-between items-center hidden md:flex">
    <div>
        <button data-popover-target="popover-default" data-popover-trigger="click" class="relative">
            <i class="fas fa-bell fa-fw"></i>
            @unless ($jumlahPesan == 0)
                <!-- Counter - Alerts -->
                <span
                    class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-medium w-4 h-4 rounded-full">{{ $jumlahPesan }}</span>
            @endunless
        </button>

        <!-- Dropdown - Alerts -->
        <div data-popover id="popover-default" role="tooltip"
            class="absolute z-10 invisible inline-block w-80 text-sm text-gray-500 transition-opacity duration-150 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
            <div class="block px-3 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50">
                Notifications
            </div>
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
                        <span><b>{{ $p->user->username }}</b> mengirim sebuah file
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
    <div
        class="h-10 mt-2 w-px self-stretch bg-gradient-to-tr from-transparent via-neutral-500 to-transparent opacity-20">
    </div>
    <div>
        <button class="flex items-center" data-popover-target="profile" data-popover-trigger="click">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
            <img class="rounded-full object-cover w-7 h-7"
                src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
                width="40">
        </button>
        <div data-popover id="profile" role="tooltip"
            class="absolute z-10 invisible inline-block w-32 text-sm text-gray-500 transition-opacity duration-150 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 divide-y py-1">
            <a class="text-base w-full block py-1 px-1 hover:bg-gray-200" href="/user/{{ Auth::user()->id_user }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <button class="text-base w-full text-left py-1 px-1 hover:bg-gray-200" data-modal-target="logout"
                data-modal-toggle="logout">
                <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400 me-2"></i>
                Logout
            </button>
        </div>
    </div>
</div>




<div id="timeline-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-x-hidden fixed top-2 right-0 left-0 z-50 justify-center items-center rounded w-full h-[calc(100%-1rem)] max-h-full parent">
    <div class="relative p-4 w-full max-w-6xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow h-[850px]">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t sticky top-0 w-full bg-white z-10 msgs">
                <h3 class="text-lg font-semibold text-gray-900">
                    All Messages for {{ Auth::user()->fullname }}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="timeline-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <ol class="relative mb-4 md:mb-5">
                    @foreach ($pesanGrup as $index => $pesan)
                        @php
                            $dariPengirim = $pesan->first()->user;
                        @endphp
                        <li class="mb-5 shadow border-b rounded overflow-hidden">
                            <div id="accordion-flush-{{ $index }}" data-accordion="collapse"
                                data-active-classes="bg-white text-gray-900 dark:text-black dark:border-red-600 border-b-2"
                                data-inactive-classes="text-gray-500 border-gray-200">
                                <h2 id="acc-{{ $index }}">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3 px-3"
                                        data-accordion-target="#acc-{{ $index . Str::mask($dariPengirim->username, '-', -15, 4) }}"
                                        aria-expanded="false"
                                        aria-controls="acc-{{ $index . Str::mask($dariPengirim->username, '-', -15, 4) }}">
                                        <span>Messages by {{ $dariPengirim->fullname }}
                                            • ({{ count($pesan) }})</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="acc-{{ $index . Str::mask($dariPengirim->username, '-', -15, 4) }}"
                                    class="hidden" aria-labelledby="acc-{{ $index }}">
                                    <div
                                        class="py-5 border-b border-gray-200 flex flex-wrap -mx-2 dark:border-gray-700">
                                        <div class="relative overflow-x-auto md:w-full">
                                            <table class="w-full text-sm text-left text-gray-500">
                                                <thead class="text-xs text-gray-700 uppercase">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            File name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Date modified
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Type
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Size
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            <span class="sr-only">lihat file</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pesan as $p)
                                                        <tr class="bg-white">
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $p->file->judul_file }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $p->created_at->format('d/m/Y
                                                                                                                        h:i A') }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ strtoupper($p->file->ekstensi_file) }} File
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                {{ $p->file->file_size }}
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <a href="/lihatFile/{{ $p->id_file }}"
                                                                    target="_blank"
                                                                    class="text-red-600 decoration-2 underline-offset-2 hover:underline hover:decoration-amber-700 group inline-flex items-center">Lihat
                                                                    file
                                                                    <svg class="w-4 h-4 text-red-500 group-hover:opacity-100 group-hover:translate-x-0 opacity-0 duration-150 -translate-x-4 ml-1.5"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 18 18">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                                                    </svg>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="group relative flex flex-col gap-x-6 rounded-lg p-4 hover:bg-gray-50">
                            <div class="inline-flex items-center">
                                <img class="aspect-square rounded-full object-cover mr-1.5"
                                    src="{{ $p->user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $p->user->pp) }}"
                                    width="25">
                                <span>{{ $p->user->fullname }}</span>
                            </div>
                            <div>
                                <p class="mt-1 text-gray-600"><b>{{ $p->user->username
                                        }}</b> mengirim sebuah file
                                    kepada anda! <a href="/lihatFile/{{ $p->id_file }}" class="text-red-600">Lihat
                                        file</a></p>
                            </div>
                        </div>
                        <div title="{{ $p->created_at }}"
                            class="text-xs text-gray-700 sm:gap-x-2 items-center justify-between p-2 flex">
                            <span class="text-right">{{ $p->created_at->format('F d, Y h:iA') }}</span>
                        </div> --}}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- Main modal -->
<div id="logout" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-2xl font-semibold text-gray-900">
                    Yakin ingin Sign Out?
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="logout">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-xl leading-relaxed text-gray-500">
                    Pilih "Signout" dibawah jika kamu yakin utnuk mengakhiri sesi signin.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <form action="/signout" method="get">
                    <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        Out</button>
                </form>
                <button data-modal-hide="logout" type="button"
                    class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Close</button>
            </div>
        </div>
    </div>
</div>
