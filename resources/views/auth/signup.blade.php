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
                        <x-partial.label name="fullname" type="text"></x-partial.label>

                        <x-partial.label name="username" type="text"></x-partial.label>

                        <x-partial.label name="email" type="email"></x-partial.label>

                        <x-partial.label name="password" type="password"></x-partial.label>

                        <x-partial.label name="password_confirmation" type="password"></x-partial.label>

                        {{-- <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-red-600 dark:ring-offset-gray-800"="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                                        class="font-medium text-red-600 hover:underline dark:text-red-500"
                                        href="#">Terms
                                        and Conditions</a></label>
                            </div>
                        </div> --}}

                        <button type="submit"
                            class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register
                            Account</button>
                        <p class="text-sm font-light text-gray-500">
                            Sudah punya akun? <a href="signin"
                                class="font-medium text-red-600 hover:underline">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
</x-auth>
