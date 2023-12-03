<x-user :$title :$jumlahPesan :$pesan :$pesanGrup>
    <div class="container-fluid w-100">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">File Detail</h1>

        @foreach ($file as $f)
        <div class="">
            <div class="mb-3" style="max-width: 800px;">
                <div class="">
                    <div class="">
                        @if (Str::contains($f->mime_type,['image','img']))
                        <img src="{{ asset('storage/' . $f->generate_filename) }}" class="mr-2"
                            alt="{{ $f->judul_file }}">
                        @else
                        <x-partial.asset.svg></x-partial.asset.svg>
                        @endif
                    </div>
                    <div class="">
                        <div class="card-body p-0 py-4">
                            <div class="">
                                <h5 class="uppercase">{{ $f->judul_file }}</h5>
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{
                                    $f->status }}</span>
                                <a href="{{ route('file.download',$f->id_file) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 flex items-center gap-3" id="download"><i
                                        class="fa-solid fa-download"></i>
                                    <p>Download</p>
                                </a>
                            </div>
                            <div class="">
                                <div class="">
                                    Detail
                                </div>
                                <ul class="">
                                    @if (request()->is('*/share/*'))
                                    <li class=""><b>Dari</b> :
                                        {{ $f->fullname }}
                                    </li>
                                    @endif
                                    @if(isset($f) && !is_null($f->pesan))
                                    <li class=""><b>Pesan</b> :
                                        {{ $f->pesan }}
                                    </li>
                                    @endif
                                    <li class=""><b>Nama File</b> :
                                        {{ $f->original_filename }}
                                    </li>
                                    <li class=""><b>Size</b> :
                                        {{ $f->file_size }}
                                    </li>
                                    <li class=""><b>Deskripsi</b> : @if(!$f->deskripsi) - @endif
                                        {{ $f->deskripsi }}
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mt-4">
                                <div class="mt-3">
                                    <small><a href="{{ url()->previous() }}">&laquo; Kembali</a></small>
                                </div>
                                {{-- <small style="">{{ $f->created_at }}</small> --}}
                            </div>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</x-user>