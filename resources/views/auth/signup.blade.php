@extends('auth.templates.index')

@section('content')
    @error('fullname')
        <div class="absolute top-5 right-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-medium">Error!</span> {{ $message }}.
        </div>
    @enderror
    @error('username')
        <div class="absolute top-5 right-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-medium">Error!</span> {{ $message }}.
        </div>
    @enderror
    @error('email')
        <div class="absolute top-5 right-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-medium">Error!</span> {{ $message }}.
        </div>
    @enderror
    @error('password')
        <div class="absolute top-5 right-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-medium">Error!</span> {{ $message }}.
        </div>
    @enderror
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-96 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign Up
                </h1>
                <form class="space-y-4 md:space-y-6" action="signup" method="post">
                    @csrf
                    <div>
                        <label for="fullname"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
                        <input type="text" id="fullname"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama lengkap..." name="fullname" value="{{ old('fullname') }}" required>
                    </div>
                    <div>
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Username..." name="username" value="{{ old('username') }}" required>
                    </div>
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Alamat email..." name="email" value="{{ old('email') }}" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Password..." name="password" required>
                    </div>
                    <div>
                        <label for="confirm-password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                            password</label>
                        <input type="password" id="confirm-password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ulangi Password..." name="password_confirmation" required>
                    </div>
                    {{-- <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-red-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                                        class="font-medium text-red-600 hover:underline dark:text-red-500"
                                        href="#">Terms and Conditions</a></label>
                            </div>
                        </div> --}}
                    <button type="submit"
                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Create
                        an account</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Sudah punya akun? <a href="signin"
                            class="font-medium text-red-600 hover:underline dark:text-red-500">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </section>
@endsection
