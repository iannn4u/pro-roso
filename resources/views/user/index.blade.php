<x-user :$title :$user :$jumlahPesan :$files :$pesan>

  <!-- Page Heading -->
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show w-25 m-3" role="alert"
    style="position: fixed; z-index: 1; top: 0; right: 0;">
    <strong>Berhasil!</strong> {{ session('success') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if (session('errors'))
  <div class="alert alert-danger alert-dismissible fade show w-25 m-3" role="alert"
    style="position: fixed; z-index: 1; top: 0; right: 0;">
    <strong>Gagal!</strong> {{ session('errors') }}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  @section('salam')
  <h3 class="text-3xl font-semibold">{{ $salam . ', ' . Auth::user()->fullname }}</h3>
  @endsection

  <!-- DataTales Example -->
  <div class="grid grid-cols-2 gap-y-[20px] gap-x-[16px] md:grid-cols-4 2xl:grid-cols-5 mt-6">

    @foreach ($files as $file)
    <?php $namaFile = explode('/', $file->generate_filename); ?>
      <input type="hidden"
        value="{{ env('APP_URL', 'http://localhost') . 'd/' . $file->id_user . '/' . end($namaFile) }}" id="link">
    <a href="file/{{ $file->id_file }}"
      class="w-full h-full max-w-sm p-2 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-gray-200/20 duration-150 hover:shadow-md" id="card">
      <div class="flex justify-between items-center px-2 mb-2">
        <h2 class="inline-block w-[139px] truncate font-medium text-gray-900 lg:w-full"
        title="{{ $file->original_filename }}">{{ $file->original_filename }}</h2>
      </div>
      {{-- <p class="mb-1 -mt-1.5 text-sm text-gray-400">
        {{ $file->created_at->diffForHumans() }}
      </p> --}}
      <div class="overflow-hidden h-40 mt-px cursor-default bg-white grid place-items-center">
        @if (explode('/', $file['mime_type'])[0] == 'image')
        <img src="{{ asset('storage/' . $file->generate_filename) }}" alt="{{ $file->judul_file }}"
          class="object-contain h-full">
        @else
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="75"
          viewBox="0 0 256 256" xml:space="preserve">

          <defs>
          </defs>
          <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
            transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
            <path
              d="M 77.474 17.28 L 61.526 1.332 C 60.668 0.473 59.525 0 58.311 0 H 15.742 c -2.508 0 -4.548 2.04 -4.548 4.548 v 80.904 c 0 2.508 2.04 4.548 4.548 4.548 h 58.516 c 2.508 0 4.549 -2.04 4.549 -4.548 V 20.496 C 78.807 19.281 78.333 18.138 77.474 17.28 z M 61.073 5.121 l 12.611 12.612 H 62.35 c -0.704 0 -1.276 -0.573 -1.276 -1.277 V 5.121 z M 74.258 87 H 15.742 c -0.854 0 -1.548 -0.694 -1.548 -1.548 V 4.548 C 14.194 3.694 14.888 3 15.742 3 h 42.332 v 13.456 c 0 2.358 1.918 4.277 4.276 4.277 h 13.457 v 64.719 C 75.807 86.306 75.112 87 74.258 87 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 68.193 33.319 H 41.808 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 26.385 c 0.828 0 1.5 0.671 1.5 1.5 S 69.021 33.319 68.193 33.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 34.456 33.319 H 21.807 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 12.649 c 0.829 0 1.5 0.671 1.5 1.5 S 35.285 33.319 34.456 33.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <linearGradient id="SVGID_1" gradientUnits="userSpaceOnUse" x1="21.8064" y1="19.2332" x2="42.2984"
              y2="19.2332">
              <stop offset="0%" style="stop-color:rgb(255,255,255);stop-opacity: 1" />
              <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity: 1" />
            </linearGradient>
            <line x1="-10.246" y1="0" x2="10.246" y2="0"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: url(#SVGID_1); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " />
            <path
              d="M 42.298 20.733 H 21.807 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 20.492 c 0.829 0 1.5 0.671 1.5 1.5 S 43.127 20.733 42.298 20.733 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 68.193 44.319 H 21.807 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 46.387 c 0.828 0 1.5 0.671 1.5 1.5 S 69.021 44.319 68.193 44.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 48.191 55.319 H 21.807 c -0.829 0 -1.5 -0.672 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 26.385 c 0.828 0 1.5 0.672 1.5 1.5 S 49.02 55.319 48.191 55.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 68.193 55.319 H 55.544 c -0.828 0 -1.5 -0.672 -1.5 -1.5 s 0.672 -1.5 1.5 -1.5 h 12.649 c 0.828 0 1.5 0.672 1.5 1.5 S 69.021 55.319 68.193 55.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 68.193 66.319 H 21.807 c -0.829 0 -1.5 -0.672 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 46.387 c 0.828 0 1.5 0.672 1.5 1.5 S 69.021 66.319 68.193 66.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
              d="M 68.193 77.319 H 55.544 c -0.828 0 -1.5 -0.672 -1.5 -1.5 s 0.672 -1.5 1.5 -1.5 h 12.649 c 0.828 0 1.5 0.672 1.5 1.5 S 69.021 77.319 68.193 77.319 z"
              style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
              transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
          </g>
        </svg>
        @endif
      </div>
    </a>



    <div id="dropdown" class="absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-52">
      <ul class="py-2 text-sm text-gray-700">
        <li>
          <a href="/file/{{ $file->id_file }}/edit" class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3"><i class="fa-regular fa-pen-to-square"></i><p>Edit</p></a>
        </li>
        <li>
          <a href="/download/{{ $file->id_file }}" class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3"><i class="fa-solid fa-download"></i><p>Download</p></a>
        </li>
        <li>
          <button class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3" id="salin"><i class="fa-solid fa-paperclip"></i><p class="ms-px">Bagikan dengan link</p></button>
        </li>
        <li>
          <button id="bSearch" class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-2" data-id_file="{{ $file->id_file }}"
            data-user="{{ Auth::user()->username }}"><i class="fa-solid fa-users"></i>Bagikan dengan
            user</button>
        </li>
      </ul>
  </div>


    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink">
                <button id="bSearch" type="button" class="dropdown-item" data-id_file="{{ $file->id_file }}"
                  data-bs-toggle="modal" data-bs-target="#shareUser" data-user="{{ Auth::user()->username }}">

                </button>
                <div class="dropdown-divider"></div>
                <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteFile"><i
                    class="fa-solid fa-trash" style="margin-right: 10px"></i>Hapus</button>
              </div>
    @endforeach

  </div>
  {{-- <div class="card shadow mb-4">
    <div class="card-body d-flex flex-wrap">
      @if (!count($files))
      <p>Tidak ada file</p>
      @endif
      @foreach ($files as $file)
      <?php $namaFile = explode('/', $file->generate_filename); ?>
      <input type="hidden"
        value="{{ env('APP_URL', 'http://localhost') . 'd/' . $file->id_user . '/' . end($namaFile) }}" id="link">
      <div class="col-lg-3">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="file/{{ $file->id_file }}" class="m-0 font-weight-bold text-primary">{{ $file->judul_file }}</a>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/file/{{ $file->id_file }}/edit"><i class="fa-regular fa-pen-to-square"
                    style="margin-right: 10px"></i>Edit</a>
                <a class="dropdown-item" href="/download/{{ $file->id_file }}"><i class="fa-solid fa-download"
                    style="margin-right: 10px"></i>Download</a>
                <button class="dropdown-item" id="salin"><i class="fa-solid fa-paperclip"
                    style="margin-right: 12px"></i>Bagikan dengan
                  link</button>
                <button id="bSearch" type="button" class="dropdown-item" data-id_file="{{ $file->id_file }}"
                  data-bs-toggle="modal" data-bs-target="#shareUser" data-user="{{ Auth::user()->username }}">
                  <i class="fa-solid fa-users" style="margin-right: 8px"></i>Bagikan dengan
                  user
                </button>
                <div class="dropdown-divider"></div>
                <button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteFile"><i
                    class="fa-solid fa-trash" style="margin-right: 10px"></i>Hapus</button>
              </div>
            </div>
          </div>
          <!-- Card Body -->
          <a href="file/{{ $file->id_file }}" class="card-body p-2">
            <div class="thumb-card">
              @if (explode('/', $file['mime_type'])[0] == 'image')
              <img src="{{ asset('storage/' . $file->generate_filename) }}" class="img-fluid rounded-start"
                alt="{{ $file->judul_file }}">
              @else
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                width="75" viewBox="0 0 256 256" xml:space="preserve">

                <defs>
                </defs>
                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                  transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                  <path
                    d="M 77.474 17.28 L 61.526 1.332 C 60.668 0.473 59.525 0 58.311 0 H 15.742 c -2.508 0 -4.548 2.04 -4.548 4.548 v 80.904 c 0 2.508 2.04 4.548 4.548 4.548 h 58.516 c 2.508 0 4.549 -2.04 4.549 -4.548 V 20.496 C 78.807 19.281 78.333 18.138 77.474 17.28 z M 61.073 5.121 l 12.611 12.612 H 62.35 c -0.704 0 -1.276 -0.573 -1.276 -1.277 V 5.121 z M 74.258 87 H 15.742 c -0.854 0 -1.548 -0.694 -1.548 -1.548 V 4.548 C 14.194 3.694 14.888 3 15.742 3 h 42.332 v 13.456 c 0 2.358 1.918 4.277 4.276 4.277 h 13.457 v 64.719 C 75.807 86.306 75.112 87 74.258 87 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 68.193 33.319 H 41.808 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 26.385 c 0.828 0 1.5 0.671 1.5 1.5 S 69.021 33.319 68.193 33.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 34.456 33.319 H 21.807 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 12.649 c 0.829 0 1.5 0.671 1.5 1.5 S 35.285 33.319 34.456 33.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <linearGradient id="SVGID_1" gradientUnits="userSpaceOnUse" x1="21.8064" y1="19.2332" x2="42.2984"
                    y2="19.2332">
                    <stop offset="0%" style="stop-color:rgb(255,255,255);stop-opacity: 1" />
                    <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity: 1" />
                  </linearGradient>
                  <line x1="-10.246" y1="0" x2="10.246" y2="0"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: url(#SVGID_1); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " />
                  <path
                    d="M 42.298 20.733 H 21.807 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 20.492 c 0.829 0 1.5 0.671 1.5 1.5 S 43.127 20.733 42.298 20.733 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 68.193 44.319 H 21.807 c -0.829 0 -1.5 -0.671 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 46.387 c 0.828 0 1.5 0.671 1.5 1.5 S 69.021 44.319 68.193 44.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 48.191 55.319 H 21.807 c -0.829 0 -1.5 -0.672 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 26.385 c 0.828 0 1.5 0.672 1.5 1.5 S 49.02 55.319 48.191 55.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 68.193 55.319 H 55.544 c -0.828 0 -1.5 -0.672 -1.5 -1.5 s 0.672 -1.5 1.5 -1.5 h 12.649 c 0.828 0 1.5 0.672 1.5 1.5 S 69.021 55.319 68.193 55.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 68.193 66.319 H 21.807 c -0.829 0 -1.5 -0.672 -1.5 -1.5 s 0.671 -1.5 1.5 -1.5 h 46.387 c 0.828 0 1.5 0.672 1.5 1.5 S 69.021 66.319 68.193 66.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                  <path
                    d="M 68.193 77.319 H 55.544 c -0.828 0 -1.5 -0.672 -1.5 -1.5 s 0.672 -1.5 1.5 -1.5 h 12.649 c 0.828 0 1.5 0.672 1.5 1.5 S 69.021 77.319 68.193 77.319 z"
                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                    transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
              </svg>
              @endif
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div> --}}
  <div class="modal fade" id="shareUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Bagikan Dengan User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" id="form">
        <div class="modal-body">
            @csrf
            <div class="mb-3">
              <input type="text" class="form-control" id="searchUser" placeholder="username penerima..." autofocus
                name="username">
              <ul class="list-group mt-2" id="result"></ul>

              <div class="mb-3 mt-1">
                <label for="pesan" class="form-label">Pesanmu</label>
                <textarea class="form-control" name="pesan" id="pesan" rows="2"></textarea>
              </div>
              <small class="mt-2 text-danger d-none" id="notfon"></small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary disabled" id="kirimUser">Kirim</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  {{-- <div class="modal fade" id="deleteFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus file?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Silahkan klik hapus jika sudah benar benar ingin menghapus.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="/file/{{ !empty($file->id_file) ? $file->id_file : '' }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
</x-user>
