<x-user :$jumlahPesan :$pesan :$pesanGrup>

    <x-slot:title>
        {{ $file->judul_file . " ($file->original_filename)"}}
    </x-slot>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">File Details</h1>

    <div class="">
        <div class="mb-3" style="max-width: 800px;">
            <div class="">
                <div class="">
                    @php
                    $mime=explode('/', $file->mime_type);
                    $extension =$file->ekstensi_file;
                    @endphp
                    @if ($mime[0] == 'image')
                    <img data-src="{{ asset('storage/' . $file->generate_filename) }}" alt="{{ $file->judul_file }}"
                        class="object-contain h-full">
                    @else
                    <x-partial.asset.svg :ext="$extension" />
                    @endif
                </div>
                <div class="">
                    <div class="card-body p-0 py-4">
                        <div class="">
                            <h5 class="uppercase">{{ $file->judul_file }}</h5>
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{
                                $file->status }}</span>
                            <a href="{{ route('file.download',$file->id_file) }}"
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
                                    {{ $file->fullname }}
                                </li>
                                @endif
                                @if(!is_null($file->pesan))
                                <li class=""><b>Pesan</b> :
                                    {{ $file->pesan }}
                                </li>
                                @endif
                                <li class=""><b>Nama File</b> :
                                    {{ $file->original_filename }}
                                </li>
                                <li class=""><b>Size</b> :
                                    {{ $file->file_size }}
                                </li>
                                <li class=""><b>Deskripsi</b> : @if(!$file->deskripsi) - @endif
                                    {{ $file->deskripsi }}
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

    @push('script')
        <script src="{{ asset('js/buffer.js') }}"></script>
        <script src="{{ asset('js/form.js') }}"></script>
    @endpush

</x-user>