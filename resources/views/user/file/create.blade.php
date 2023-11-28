@push('style')
<style>
        .thumbnailCard {
            background: #ddd;
            min-height: 200px;
        }

        .dropArea {
            max-width: 100%;
            height: 200px;
            padding: 25px;
            display: grid;
            place-items: center;
            text-align: center;
            font-family: sans-serif;
            font-weight: 500;
            font-size: 1.2rem;
            cursor: pointer;
            color: #ccc;
            border: 4px dashed #000;
            border-radius: 10px;
        }

        .dropArea-over {
            border-style: solid;
        }

        .dropFile {
            display: none;
        }

        .dropArea-thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background: #ccc;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .dropArea-thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: white;
            background: rgba(0, 0, 0, .75);
            font-size: .9rem;
            text-align: center;
        }

        .thumb-card {
            display: grid;
            place-items: center;
            background: #ddd;
            height: 200px;
        }

        .thumb-card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            object-position: top;
        }
</style>
@endpush

<x-user :$title :$jumlahPesan :$pesan>
    {{-- @error('judul_file')
    <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
        {{ $message }}
    </div>
    @enderror
    @error('files')
    <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
        {{ $message }}
    </div>
    @enderror --}}

    <x-slot:title>
        {{ $title }}
    </x-slot>


    @error('judul_file')
    <div id="alert-a"
        class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-red-800 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            {{ $message }} </div>
        <button type="button"
            class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-500 hover:bg-red-200 focus:ring-2 focus:ring-red-400 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-a" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @enderror
    @error('files')
    <div id="alert-b"
        class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-red-800 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <svg class="h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            {{ $message }} </div>
        <button type="button"
            class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 p-1.5 text-red-500 hover:bg-red-200 focus:ring-2 focus:ring-red-400 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-b" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @enderror


    <div class="max-w-2xl xl:mx-auto py-5">
        <div class="mb-5">
            <nav class="flex">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="mx-px h-3 w-3 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ml-2">Tambah
                                File</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <form method="POST" action="/file" enctype="multipart/form-data">
            @csrf
            <div class="dropArea mb-4">
                <div class="dropText">Drop disini atau click untuk memilih file</div>
                <input type="file" name="files" id="files" class="dropFile @error('files') border-red-500 @enderror">
            </div>
            <div class="mb-4">
                <label for="judul_file" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                    File</label>
                <input type="text"
                    class="@error('judul_file') border-red-500 @enderror block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-[#202020] dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    id="judul_file" placeholder="dokumen rahasia" name="judul_file" value="{{ old('judul_file') }}"
                    autofocus title="masukkan nama">
            </div>
            <div class="mb-4">
                <label for="status" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Status
                    File</label>
                <select
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-[#202020] dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    name="status" id="status">
                    @if (old('status') == 'private')
                    <option value="public">Public</option>
                    <option value="private" selected>Private</option>
                    @else
                    <option value="public" selected>Public</option>
                    <option value="private">Private</option>
                    @endif
                </select>
            </div>
            <div class="mb-4">
                <label for="floatingTextarea2"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-[#202020] dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Tambahkan deskripsi disini" id="floatingTextarea2" style="height: 100px"
                    name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit"
                class="inline-block rounded-sm px-3 py-2 active:scale-[.98] dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">Tambah</button>
        </form>
    </div>

    {{-- <div class="container-fluid mb-5">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 text-gray-800">Tambah File</h1>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form method="POST" action="/file" enctype="multipart/form-data">
                    @csrf
                    <div class="dropArea mb-4">
                        <div class="dropText">Drop disini atau click untuk memilih file</div>
                        <input type="file" name="files" id="files"
                            class="dropFile @error('files') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="judul_file" class="form-label">Nama File</label>
                        <input type="text" class="form-control @error('judul_file') is-invalid @enderror"
                            id="judul_file" placeholder="dokumen rahasia" name="judul_file"
                            value="{{ old('judul_file') }}" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status File</label>
                        <select class="form-select" name="status" id="status">
                            @if (old('status') == 'private')
                            <option value="public">Public</option>
                            <option value="private" selected>Private</option>
                            @else
                            <option value="public" selected>Public</option>
                            <option value="private">Private</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Tambahkan deskripsi disini" id="floatingTextarea2"
                            style="height: 100px" name="deskripsi">{{ old('deskripsi') }}</textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div> --}}

    @push('script')
        <script src="{{ asset('js/script.js') }}"></script>
    @endpush
</x-user>