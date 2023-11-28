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
        <div class="absolute top-5 right-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <span class="font-medium">Error!</span> {{ session('gagal') }}
        </div>
    @endif
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
            role="alert">
            <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
        </div>
        <div class="alert alert-success mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
            {{ session('success') }}
        </div>
    @endif
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-96 bg-white rounded-lg shadow">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1
                    class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Sign in
                </h1>
                <form class="space-y-4 md:space-y-6" action="signin" method="post">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Username
                            atau email</label>
                        <input type="text" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5"
                            name="email_or_username" value="{{ old('email_or_username') }}" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5"
                            required>
                    </div>
                    {{-- <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500">Remember me</label>
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit"
                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                        in</button>
                    <p class="text-sm font-light text-gray-500">
                        Belum punya akun? <a href="signup"
                            class="font-medium text-red-600 hover:underline">Sign Up</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
