@extends('auth.templates.index')

@section('content')
    @error('fullname')
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
    @enderror
    @error('username')
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
    @enderror
    @error('email')
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
    @enderror
    @error('password')
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ $message }}
        </div>
    @enderror
    <div class="row justify-content-center align-items-center" style="height: 100vh;">

        <div class="col-xl-6 col-lg-7 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                                </div>
                                <form class="user" action="signup" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Nama Lengkap..." name="fullname" value="{{ old('fullname') }}"
                                                required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Username..." name="username" value="{{ old('username') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            placeholder="Alamat Email..." name="email" value="{{ old('email') }}"
                                            required>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password..." name="password" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Ulangi Password..." name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Daftar
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="signin">Sudah punya akun? Signin!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
