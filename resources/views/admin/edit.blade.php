<x-user :$title :$user :$jumlahPesan :$pesan>
    <div class="container-fluid">
        @error('fullname')
        <div class="alert alert-danger mt-3 mx-2" role="alert"
            style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
        @enderror
        @error('username')
        <div class="alert alert-danger mt-3 mx-2" role="alert"
            style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
        @enderror
        @error('email')
        <div class="alert alert-danger mt-3 mx-2" role="alert"
            style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
        @enderror
        @error('password')
        <div class="alert alert-danger mt-3 mx-2" role="alert"
            style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
        @enderror
        <!-- Page Heading -->
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3 text-gray-800">Edit Profil Saya</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('editAction',$user->id_user ) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname"
                            placeholder="nama lengkap" name="fullname" value="{{ old('fullname', $user->fullname) }}"
                            autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            placeholder="username" name="username" value="{{ old('username', $user->username) }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password">
                        <div id="password" class="form-text">
                            *jika password terisi otomatis dan tidak ingin merubah password silahkan kosongkan password.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-user>