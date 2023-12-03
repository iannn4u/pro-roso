<x-auth>
    <x-slot:title>
        New User Registration
        </x-slot>

        <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 lg:my-7">
            <div
                class="w-96 bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        {{ config('app.name') }} User Registration
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="signup" method="post">
                        @csrf

                        <x-partial.flash :flash="session()->all()"></x-partial.flash>

                        <x-partial.input name="fullname" label="Name" type="text"></x-partial.input>

                        <x-partial.input name="username" type="text"></x-partial.input>

                        <x-partial.input name="email" label="Enter your email" type="email"></x-partial.input>

                        <x-partial.input name="password" label="Create a password" type="password"></x-partial.input>

                        <x-partial.input name="password_confirmation" label="Confirm password" type="password"></x-partial.input>

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

                        <button type="submit"
                            class="w-full text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register
                            Account</button>
                        <p class="text-sm font-light text-gray-500">
                            Sudah punya akun? <a href="signin"
                                class="font-semibold leading-6 text-gray-600 decoration-2 underline-offset-2 hover:underline hover:decoration-gray-700">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
</x-auth>
