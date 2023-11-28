<!-- Topbar Search -->

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

<div class="w-40 me-2 flex justify-between items-center">
    <div>
        <button data-popover-target="popover-default" data-popover-trigger="click" class="relative">
            <i class="fas fa-bell fa-fw"></i>
            @unless ($jumlahPesan == 0)
            <!-- Counter - Alerts -->
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-medium w-4 h-4 rounded-full">{{
                $jumlahPesan }}</span>
            @endunless
        </button>

        <!-- Dropdown - Alerts -->
        <div data-popover id="popover-default" role="tooltip"
            class="absolute z-10 invisible inline-block w-80 text-sm text-gray-500 transition-opacity duration-150 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
            <h2 class="p-3 py-2 font-semibold bg-gray-200">
                Notifikasi
            </h2>
            @unless (count($pesan))
            <div class="px-3 py-4">
                <div class="text-gray-700 text-center">
                    <span>Kamu tidak memiliki notfikasi terbaru</span>
                </div>
            </div>
            @endunless
            @foreach (array_slice($pesan->all(),0,4) as $p)
            <div class="px-3 py-2.5 flex">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <img class="w-16 mt-2 aspect-square" src="{{ $p->user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $p->user->pp) }}" alt="{{ $p->id_pengirim }}">
                    </div>
                </div>
                <div>
                    <div title="{{ $p->created_at }}" class="text-xs text-gray-700">
                        {{ $p->created_at->format('F d, Y h:iA') }}
                    </div>
                    <span><b>{{ $p->user->username }}</b> mengirim sebuah file
                        kepada anda! <a href="/lihatFile/{{ $p->id_file }}" class="text-red-500 font-bold hover:underline">Lihat file.</a></span>
                </div>
            </div>
            @endforeach
            @if (count($pesan))
            <button  data-modal-target="timeline-modal" data-modal-toggle="timeline-modal" class="bg-gray-200 block w-full text-center py-1.5 text-xs hover:underline">Lihat Notifikasi Lainnya</button>
            @endif
        </div>
    </div>
    <div
        class="h-10 mt-2 w-px self-stretch bg-gradient-to-tr from-transparent via-neutral-500 to-transparent opacity-20">
    </div>
    <div>
        <button class="flex items-center" data-popover-target="profile" data-popover-trigger="click">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
            <img class="rounded-full object-cover"
                src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
                width="40">
        </button>
        <div data-popover id="profile" role="tooltip"
            class="absolute z-10 invisible inline-block w-32 text-sm text-gray-500 transition-opacity duration-150 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 divide-y py-1">
            <a class="text-base w-full block py-1 px-1 hover:bg-gray-200" href="/user/{{ Auth::user()->id_user }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <button class="text-base w-full text-left py-1 px-1 hover:bg-gray-200" data-modal-target="logout" data-modal-toggle="logout" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw text-gray-400 me-2"></i>
                Logout
            </button>
        </div>
    </div>
</div>



<!-- Modal toggle -->

  <!-- Main modal -->
  <div id="timeline-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-[2px]">
      <div class="relative p-4 w-full max-w-md h-[950px]">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                      <h3 class="text-lg font-semibold text-gray-900">
                          All Messages
                      </h3>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="timeline-modal">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-4 md:p-5 h-[850px] overflow-y-scroll">
                      <ol class="relative mb-4 md:mb-5">
                        @foreach ($pesan as $p)
                        <li class="mb-5 shadow border-b border-gray-200 rounded">
                          <div class="group relative flex flex-col gap-x-6 rounded-lg p-4 hover:bg-gray-50">
                            <div>
                              <p class="font-semibold text-gray-900">
                                <span class="absolute inset-0"></span>
                              </p>
                              <p class="mt-1 text-gray-600">Hai {{ Auth::user()->username }}! <b>{{ $p->user->username }}</b> mengirim sebuah file
                                kepada anda! <a href="/lihatFile/{{ $p->id_file }}" class="text-red-600">Lihat file</a></p>
                              </div>
                            </div>
                            <div title="{{ $p->created_at }}" class="text-xs text-gray-700 sm:gap-x-2 items-center justify-between p-2 flex">
                              <div class="inline-flex items-center">
                                <img class="rounded-full object-cover mr-1.5"
                                src="{{ $p->user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $p->user->pp) }}"
                                width="25">
                                <span>{{ $p->user->fullname }}</span>
                              </div>
                              <span class="text-right">{{ $p->created_at->format('F d, Y h:iA') }}</span>
                            </div>
                          </li>
                          @endforeach
                        </ol>
                  </div>
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


<!-- Main modal -->
<div id="logout" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-2xl font-semibold text-gray-900">
                  Yakin ingin Sign Out?
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="logout">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
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
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign Out</button>
                <button data-modal-hide="logout" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Close</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
