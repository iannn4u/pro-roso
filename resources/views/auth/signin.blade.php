@extends('auth.templates.index')

@section('content')
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
    @if (session('gagal'))
        <div class="alert alert-danger mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ session('gagal') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center align-items-center" style="height: 100vh;">

        <div class="col-xl-5 col-lg-5 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                </div>
                                <form class="user" method="POST" action="signin">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Masukkan Alamat Email atau Username...." name="email_or_username"
                                            value="{{ old('email_or_username') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            placeholder="Masukkan Password..." name="password" required>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Sign In
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="signup">Belum punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
