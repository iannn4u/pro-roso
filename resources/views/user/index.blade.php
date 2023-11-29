<x-user :$title :$user :$jumlahPesan :$files :$pesan :$pesanGrup>

    <!-- Page Heading -->
    @if (session('sukses'))
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
    <div class="grid grid-cols-3 gap-y-[20px] gap-x-[16px] xl:grid-cols-5 lg:grid-cols-4 mt-6">

        @foreach ($files as $file)
            <?php $namaFile = explode('/', $file->generate_filename); ?>
            <input type="hidden"
                value="{{ env('APP_URL', 'http://localhost') . 'd/' . $file->id_user . '/' . end($namaFile) }}"
                id="link" data-id_file="{{ $file->id_file }}">
            <a href="file/{{ $file->id_file }}"
                class="w-full h-full max-w-sm p-2 bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-gray-200/20 duration-150 hover:shadow-md"
                id="card" data-id_file="{{ $file->id_file }}">
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
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1" width="75" viewBox="0 0 256 256" xml:space="preserve">

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
                                <linearGradient id="SVGID_1" gradientUnits="userSpaceOnUse" x1="21.8064"
                                    y1="19.2332" x2="42.2984" y2="19.2332">
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


            <div id="dropdown" class="absolute hidden z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-52"
                data-id_file="{{ $file->id_file }}">
                <ul class="py-2 text-sm text-gray-700">
                    <li>
                        <a href="/file/{{ $file->id_file }}/edit"
                            class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3" id="edit"><i
                                class="fa-regular fa-pen-to-square"></i>
                            <p>Edit</p>
                        </a>
                    </li>
                    <li>
                        <a href="/download/{{ $file->id_file }}"
                            class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3" id="download"><i
                                class="fa-solid fa-download"></i>
                            <p>Download</p>
                        </a>
                    </li>
                    <li>
                        <button class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3 w-full"
                            id="salin"><i class="fa-solid fa-paperclip"></i>
                            <p class="ms-px">Bagikan dengan link</p>
                        </button>
                    </li>
                    <li>
                        <button id="bSearch" class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-2 w-full"
                            data-id_file="{{ $file->id_file }}" data-user="{{ Auth::user()->username }}"
                            data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"><i
                                class="fa-solid fa-users"></i>Bagikan dengan
                            user</button>
                    </li>
                    <li>
                        <button class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3 w-full"
                            data-modal-target="deleteFile" data-modal-toggle="deleteFile"><i
                                class="fa-solid fa-trash"></i>
                            <p>Hapus</p>
                        </button>
                    </li>
                </ul>
            </div>
        @endforeach
    </div>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Share another user
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" id="form">
                        <div class="relative">
                            <label for="searchUser"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To user</label>
                            <input type="text" id="searchUser" autofocus name="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="{{ Auth::user()->username }}" required>
                                <small id="notfon"
                            class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"></small>
                            <ul id="result" class="absolute w-full z-10 py-2 text-sm text-gray-700 bg-white"></ul>
                        </div>
                        <div>
                            <label for="pesan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                message</label>
                            <textarea id="pesan" rows="2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Write a message..." required name="pesan" id="pesan"></textarea>
                        </div>
                        <button type="submit" id="kirimUser"
                            class="w-full text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="deleteFile" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="deleteFile">
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
                        delete this file?</h3>
                    <form action="" id="formDelete" class="inline" method="post">
                        @method('delete')
                        @csrf
                        <button data-modal-hide="deleteFile" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                        </button>
                    </form>
                    <button data-modal-hide="deleteFile" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
</x-user>



<div class="fixed lg:hidden end-6 bottom-6 group">
    <a href="/file/create" class="flex items-center justify-center text-white bg-gray-900 rounded-full w-14 h-14 hover:bg-white hover:text-gray-900 hover:border-2 hover:border-gray-900 ease-linear focus:ring-4 focus:ring-gray-300 focus:outline-none">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
        </svg>
    </a>
</div>
