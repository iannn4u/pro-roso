<x-user :$title :$jumlahPesan :$pesan :files="$file" :$pesanGrup>
    <div class="container-fluid w-100">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">File Detail</h1>

        <div class="row justify-content-center">
            <div class="card mb-3" style="max-width: 800px;">
                <div class="row g-0">
                    <div class="col-md-5 d-flex justify-content-center align-items-center">
                        @if (Str::contains($file->mime_type,['image','img']))
                        <img src="{{ asset('storage/' . $file->generate_filename) }}"
                            class="img-fluid rounded-start mr-2" alt="{{ $file->judul_file }}">
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                            width="200" viewBox="0 0 256 256" xml:space="preserve">

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
                                <linearGradient id="SVGID_1" gradientUnits="userSpaceOnUse" x1="21.8064" y1="19.2332"
                                    x2="42.2984" y2="19.2332">
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
                    <div class="col-md-7">
                        <div class="card-body p-0 py-4">
                            <div class="d-flex justify-content-between position-relative">
                                <h5 class="h3 card-title text-uppercase">{{ $file->judul_file }}</h5>
                                @if (request()->is('file/*'))
                                <p class="badge badge-success position-absolute top-0 end-0 ">{{ $file->status }}</p>
                                @else
                                <a href="/download/{{ $file->id_file }}"
                                    class="btn btn-success position-absolute top-0 end-0 "><i
                                        class="fa-solid fa-download"></i></a>
                                @endif
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Detail
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Dari</b> :
                                        <?= $file->user->username ?>
                                    </li>
                                    @if(isset($fileShare) && !is_null($fileShare[0]->pesan
                                    ))
                                    <li class="list-group-item"><b>Pesan</b> :
                                        <?= $fileShare[0]->pesan ?>
                                    </li>
                                    @endif
                                    <li class="list-group-item"><b>Nama File</b> :
                                        <?= $file->original_filename ?>
                                    </li>
                                    <li class="list-group-item"><b>Size</b> :
                                        <?= $file->file_size ?>
                                    </li>
                                    <li class="list-group-item"><b>Deskripsi</b> : @if(!$file->deskripsi) - @endif
                                        <?= $file->deskripsi ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mt-4">
                                <div class="mt-3">
                                    <small><a href="{{ url()->previous() }}">&laquo; Kembali</a></small>
                                </div>
                                {{-- <small style="">{{ $file->created_at }}</small> --}}
                            </div>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user>