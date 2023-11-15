@extends('user.templates.index')
@section('content')
    @error('judul_file')
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
    @enderror
    @error('files')
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
    @enderror
    <div class="container-fluid mb-5">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 text-gray-800">Tambah File</h1>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form method="POST" action="/file" enctype="multipart/form-data">
                    @csrf
                    <div class="dropArea mb-2">
                        <div class="dropText">Drop disini atau click untuk memilih file</div>
                        <input type="file" name="files" id="files"
                            class="dropFile @error('files') is-invalid @enderror">
                    </div>
                    <div class="mb-3">
                        <label for="judul_file" class="form-label">Nama File</label>
                        <input type="text" class="form-control @error('judul_file') is-invalid @enderror" id="judul_file"
                            placeholder="dokumen rahasia" name="judul_file" value="{{ old('judul_file') }}" autofocus
                            required>
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
                        <textarea class="form-control" placeholder="Tambahkan deskripsi disini" id="floatingTextarea2" style="height: 100px"
                            name="deskripsi">{{ old('deskripsi') }}</textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
