<!-- Topbar Search -->

<form class="w-1/2">
    <div class="relative">
        <div
            class="absolute z-10 hover:bg-gray-200 inset-y-0 start-0 flex items-center ml-1 h-9 w-9 mt-[6px] ml-2 rounded-full">
            <button type="submit" class="mx-auto">
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

<div class="w-40 me-2 flex justify-between items-center">
    <div>
      <button id="alertButton" class="relative">
        <i class="fas fa-bell fa-fw"></i>
        @unless ($jumlahPesan == 0)
            <!-- Counter - Alerts -->
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-medium w-4 h-4 rounded-full">{{ $jumlahPesan }}</span>
        @endunless
    </button>
    
        <!-- Dropdown - Alerts -->
        <div class="hidden" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Notifikasi
            </h6>
            @unless (count($pesan))
                <div class="mr-3 my-2">
                    <div class="text-gray-700 text-center">
                        <span>Kamu tidak memiliki notfikasi terbaru</span>
                    </div>
                </div>
            @endunless
            @foreach ($pesan as $p)
                <div class="dropdown-item d-flex align-items-center">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div title="{{ $p->created_at }}" class="small text-gray-700">
                            {{ $p->created_at->format('F d, Y h:iA') }}
                        </div>
                        <span>Hai {{ Auth::user()->username }}! <b>{{ $p->user->username }}</b> mengirim sebuah file
                            kepada anda! <a href="/lihatFile/{{ $p->id_file }}">Lihat file</a></span>
                    </div>
                </div>
            @endforeach
            <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Notifikasi Lainnya</a>
        </div>
    </div>
    <div
        class="h-10 mt-2 w-px self-stretch bg-gradient-to-tr from-transparent via-neutral-500 to-transparent opacity-20">
    </div>
    <div>
        <button class="flex items-center" id="userButton">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
            <img class="rounded-full object-cover"
                src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
                width="40">
        </button>
        <div class="hidden">
            <a class="dropdown-item" href="/user/{{ Auth::user()->id_user }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </button>
        </div>
    </div>
</div>

{{-- <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
        <img class="img-profile rounded-circle"
            src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
            class="img-fluid rounded-full" style="object-fit: cover">
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="/user/{{ Auth::user()->id_user }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
        </a>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </button>
    </div>
</li> --}}

</ul>
