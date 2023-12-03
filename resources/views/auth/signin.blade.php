<x-auth>

  <x-slot:title>
    Login
    </x-slot>

    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <div class="w-96 bg-white rounded-lg shadow">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mb-8 text-center text-2xl font-bold leading-9 font-main tracking-tight text-gray-900">
              Login
              to {{ config('app.name') }}
            </h2>
          </div>
          <form class="space-y-4 md:space-y-6" action="signin" method="post">
            @csrf

            <x-partial.flash :flash="session()->all()"></x-partial.flash>

            <div class="mt-6">
              <x-partial.form.label for="usermail" :value="__('Username / Email')"></x-partial.form.label>

              <x-partial.form.input id="usermail" type="text" name="usermail" :error="$errors->get('usermail')" :value="old('usermail')" autofocus ></x-partial.form.input>
            </div>
            
            <div class="mt-6">
              <x-partial.form.label for="password" :value="__('Password')"></x-partial.form.label>
  
              <x-partial.form.input id="password" type="password" name="password" :error="$errors->get('password')"></x-partial.form.input>
            </div>
            
            <x-partial.primary-button class="w-full justify-center">
              Login
            </x-partial.primary-button>

            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
              Belum punya akun? <a href="signup"
                class="font-semibold leading-6 text-gray-600 decoration-2 underline-offset-2 hover:underline hover:decoration-gray-700">Register
                here</a>
            </p>
          </form>
        </div>
      </div>
    </section>
</x-auth>