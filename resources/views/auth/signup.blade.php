<x-auth>
    <x-slot:title>
        New User Registration
        </x-slot>

        <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 lg:my-7">
            <div class="w-96 bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        {{ config('app.name') }} User Registration
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="signup" method="post">
                        @csrf

                        <x-partial.flash :flash="session()->all()"></x-partial.flash>


                        <div class="mt-6">
                            <x-partial.form.label for="fullname" :value="__('name')" />

                            <x-partial.form.input id="fullname" type="text" :value="old('fullname')" name="fullname"
                                :error="$errors->get('fullname')" />
                        </div>

                        <div class="mt-6">
                            <x-partial.form.label for="username" :value="__('username')" />

                            <x-partial.form.input id="username" type="text" :value="old('username')" name="username"
                                :error="$errors->get('username')" />
                        </div>

                        <div class="mt-6">
                            <x-partial.form.label for="email" :value="__('email')" />

                            <x-partial.form.input id="email" type="email" :value="old('email')" name="email"
                                :error="$errors->get('email')" />
                        </div>

                        <div class="mt-6">
                            <x-partial.form.label for="password" :value="__('create a password')" />

                            <x-partial.form.input id="password" type="password" name="password"
                                :error="$errors->get('password')" />
                        </div>

                        <div class="mt-6">
                            <x-partial.form.label for="password_confirmation" :value="__('confirm password')" />

                            <x-partial.form.input id="password_confirmation" type="password" name="password_confirmation"
                                :error="$errors->get('password_confirmation')" />
                        </div>


                        {{-- <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-gray-600 dark:ring-offset-gray-800"="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                                        class="font-medium text-gray-600 hover:underline dark:text-gray-500"
                                        href="#">Terms
                                        and Conditions</a></label>
                            </div>
                        </div> --}}

                        <x-partial.primary-button class="w-full justify-center">
                            Register account
                        </x-partial.primary-button>

                        <p class="text-sm font-light text-gray-500">
                            Sudah punya akun? <a href="signin"
                                class="font-semibold leading-6 text-red-600 decoration-2 underline-offset-2 hover:underline hover:decoration-amber-700">Login
                                here</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
</x-auth>