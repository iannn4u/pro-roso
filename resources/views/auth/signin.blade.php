<x-auth>
  {{-- @if (session('gagal'))
    <div class="absolute top-5 right-5 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
      <span class="font-medium">Error!</span> {{ session('gagal') }}
    </div>
  @endif
  @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
      <span class="font-medium">Success alert!</span> Change a few things up and try submitting again.
    </div>
    <div class="alert alert-success mt-3 mx-2" role="alert" style="position: absolute; z-index: 1; top: 0; right: 0;">
      {{ session('success') }}
    </div>
  @endif --}}

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

          <x-partial.input name="usermail" label="Username / Email" type="text"></x-partial.input>

          <x-partial.input name="password" type="password"></x-partial.input>

          <button type="submit"
            class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Login</button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Belum punya akun? <a href="signup"
              class="font-semibold leading-6 text-red-600 decoration-2 underline-offset-2 hover:underline hover:decoration-amber-700">Register
              here</a>
          </p>
        </form>
      </div>
    </div>
  </section>
</x-auth>
