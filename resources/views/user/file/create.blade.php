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

  .dropArea.error {
    border: 2px solid red
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

<x-user :$jumlahPesan :$pesan :$pesanGrup>
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
    New file
    </x-slot>

    <div class="max-w-2xl py-5 xl:mx-auto">
      <div class="mb-5">
        <nav class="flex">
          <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
              <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600">
                Beranda
              </a>
            </li>
            <li>
              <div class="flex items-center">
                <svg class="mx-px h-3 w-3 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Tambah
                  File</span>
              </div>
            </li>
          </ol>
        </nav>
      </div>
      <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="dropArea @error('files') error animate-shake @enderror mb-4">
          <div class="dropText">Drop disini atau click untuk memilih
            file</div>
          <input type="file" name="files" id="files" class="dropFile">
        </div>

        <input type="hidden" name="return" value="{{ $return }}">

        <x-partial.input name="judul_file" label="Judul File" type="text"></x-partial.input>

        <div class="my-4">
          <p class="mb-2 block text-sm font-medium text-gray-900">Status File</p>
          <ul class="mb-4 grid grid-cols-1 gap-x-2 sm:grid-cols-2">
            <li>
              <input type="radio" id="status-1" name="status" value="private" class="peer hidden">
              <label for="status-1"
                class="@error('status') animate-shake @enderror inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-3 text-gray-900 hover:bg-gray-100 hover:text-gray-900 peer-checked:border-red-600 peer-checked:text-red-600">
                <div class="block">
                  <div class="w-full text-base font-medium">Private</div>
                  <div class="mt-1 w-full text-xs text-gray-500">You're file is set to private in your
                    personal account</div>
                </div>
                <svg class="ms-3 h-4 w-4 text-gray-500 rtl:rotate-180" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
              </label>
            </li>
            <li>
              <input type="radio" id="status-2" name="status" value="public" class="peer hidden">
              <label for="status-2"
                class="@error('status') animate-shake @enderror inline-flex w-full cursor-pointer items-center justify-between rounded-lg border border-gray-200 bg-white p-3 text-gray-900 hover:bg-gray-100 hover:text-gray-900 peer-checked:border-red-600 peer-checked:text-red-600">
                <div class="block">
                  <div class="w-full text-base font-medium">Publlic</div>
                  <div class="mt-1 w-full text-xs text-gray-500">You're file is set to public in your
                    personal account</div>
                </div>
                <svg class="ms-3 h-4 w-4 text-gray-500 rtl:rotate-180" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                  <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                  </g>
                </svg>
              </label>
            </li>
          </ul>
        </div>

        <x-partial.textarea name="deskripsi"></x-partial.textarea>

        <button type="submit"
          class="inline-block rounded-sm px-3 py-2 active:scale-[.98] dark:bg-red-600 dark:text-white dark:hover:bg-red-700">Tambah</button>
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
              <input type="file" name="files" id="files" class="dropFile @error('files') is-invalid @enderror">
            </div>
            <div class="mb-3">
              <label for="judul_file" class="form-label">Nama File</label>
              <input type="text" class="form-control @error('judul_file') is-invalid @enderror" id="judul_file"
                placeholder="dokumen rahasia" name="judul_file" value="{{ old('judul_file') }}" autofocus required>
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
    <script>
      document.querySelectorAll(".dropFile").forEach((i) => {
          const dropArea = i.closest(".dropArea");
          dropArea.addEventListener("click", (e) => {
            i.click();
          });

          i.addEventListener("change", (e) => {
            if (i.files.length) {
              thumb(dropArea, i.files[0]);
            }
          });

          dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("dropArea-over");
          });
          ["dragleave", "dragend"].forEach((type) => {
            dropArea.addEventListener(type, (e) => {
              dropArea.classList.remove("dropArea-over");
            });
          });
          dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            if (e.dataTransfer.files.length) {
              i.files = e.dataTransfer.files;
              thumb(dropArea, e.dataTransfer.files[0]);
            }
            dropArea.classList.remove("dropArea-over");
          });
        });

        function thumb(dropArea, file) {
          let thumbElement = dropArea.querySelector(".dropArea-thumb");

          if (dropArea.querySelector(".dropText")) {
            dropArea.querySelector(".dropText").remove();
          }

          if (!thumbElement) {
            thumbElement = document.createElement("div");
            thumbElement.classList.add("dropArea-thumb");
            dropArea.appendChild(thumbElement);
          }
          thumbElement.dataset.label = file.name;

          if (file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
              thumbElement.style.backgroundImage = `url('${reader.result}')`;
            };
          } else {
            thumbElement.style.backgroundImage = null;
          }
        }
    </script>
    @endpush
</x-user>