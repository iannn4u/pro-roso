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
                        <x-partial.asset.svg></x-partial.asset.svg>
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