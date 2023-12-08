<x-user :$title :$user :$jumlahPesan :$pesan>
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
    <div class="max-w-2xl py-5 xl:mx-auto">
        <div class="mb-5">
            <nav class="flex">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/a/users"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600">
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit User</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <form method="post" action="{{ route('editAction', $user->id_user) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mt-6">
                <x-partial.form.label for="fullname" :value="__('Nama Lengkap')"></x-partial.form.label>

                <x-partial.form.input id="fullname" type="text" name="fullname" :error="$errors->get('fullname')" :value="old('fullname', $user->fullname)"
                    autofocus></x-partial.form.input>
            </div>
            <div class="mt-6">
                <x-partial.form.label for="username" :value="__('Username')"></x-partial.form.label>

                <x-partial.form.input id="username" type="text" name="username" :error="$errors->get('username')"
                    :value="old('username', $user->username)"></x-partial.form.input>
            </div>
            <div class="mt-6">
                <x-partial.form.label for="email" :value="__('Email')"></x-partial.form.label>

                <x-partial.form.input id="email" type="email" name="email" :error="$errors->get('email')"
                    :value="old('email', $user->email)"></x-partial.form.input>
            </div>
            <div class="mt-6">
                <x-partial.form.label for="password" :value="__('Password')"></x-partial.form.label>

                <x-partial.form.input id="password" type="text" name="password" :error="$errors->get('password')"></x-partial.form.input>
                <div id="password" class="form-text">
                    *jika password terisi otomatis dan tidak ingin merubah password silahkan kosongkan password.
                </div>
            </div>
            <button type="submit"
                class="text-white bg-gray-800 hover:bg-white hover:text-gray-800 hover:border-gray-800 hover:border-2 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-4">Edit</button>
        </form>
    </div>
</x-user>
