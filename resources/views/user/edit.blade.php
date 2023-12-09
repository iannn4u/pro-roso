@push('style')
    <style>
        details>summary {
            list-style: none !important;
        }

        details>summary::-webkit-details-marker {
            display: none !important;
        }
    </style>
@endpush

<x-user :$user :$jumlahPesan :$pesan :$pesanGrup>

    <x-slot:title>
        Your Profile
    </x-slot>
    
    <div class="max-w-4xl py-5 xl:mx-auto mt-4">

        <x-partial.flash class="!mb-5 !-ml-3" :flash="session()->all()"></x-partial.flash>

        <form action="{{ route('user.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="flex flex-col sm:flex-row -mx-2">
                <div class="space-y-12 w-2/3 -mx-1.5">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="border-b border-gray-900/20 pb-2">
                            <h2 class="text-2xl font-medium leading-7 text-gray-900">Public profile</h2>
                        </div>
                        <div class="mt-1.5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                            <div class="mt-6 col-span-5">
                                <x-partial.form.label for="name" :value="__('Name')"></x-partial.form.label>

                                <x-partial.form.input id="name" type="text" name="fullname" :value="$user->fullname"
                                    :error="$errors->get('fullname')"></x-partial.form.input>
                            </div>

                            <div class="mt-6 col-span-5">
                                <x-partial.form.label for="username" :value="__('Username')"></x-partial.form.label>

                                <x-partial.form.input id="username" type="text" name="username" :value="$user->username"
                                    :error="$errors->get('username')">
                                </x-partial.form.input>
                            </div>

                            <div class="mt-6 col-span-5">
                                <x-partial.form.label for="email" :value="__('Email')"></x-partial.form.label>

                                <x-partial.form.input id="email" type="text" name="email" :value="$user->email"
                                    :error="$errors->get('email')"></x-partial.form.input>
                            </div>

                            <div class="mt-6 col-span-5">
                                <x-partial.form.label for="password" :value="__('Password')"></x-partial.form.label>

                                <x-partial.form.input id="password" type="password" name="password"
                                    :error="$errors->get('password')"></x-partial.form.input>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="w-1/3 -mx-1.5">
                    <div class="flex flex-col items-center">
                        <details class="appearance-none relative"
                            {{ $errors && $errors->get('pp') != null ? 'open' : '' }}>
                            <summary class="p-1 relative group cursor-pointer ">
                                <img class="w-48 h-48 rounded-full object-cover shadow-lg"
                                    src="{{ Auth::user()->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . Auth::user()->pp) }}"
                                    id="imgPreview" />
                                <div
                                    class="text-white bg-red-700 group-hover:bg-red-800 hover:bg-red-800 font-medium rounded text-xs px-3 py-2 text-center inline-flex items-center gap-x-1.5 absolute bottom-4 left-2">
                                    <svg class="w-2.5 h-2.5 text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                    </svg> Edit
                                </div>
                            </summary>
                            <div
                                class="absolute -bottom-18 left-0 bg-gray-100 w-full shadow border border-gray-200 py-1">
                                <label for="pp"
                                    class="text-gray-900 hover:bg-gray-200 text-sm px-5 w-full py-2.5 text-center mb-px block w-full cursor-pointer">
                                    Upload a photo...
                                </label>
                                <div class="px-1.5">
                                    <x-partial.form.input id="pp" type="file" name="pp"
                                        :error="$errors->get('pp')" class="!hidden !invisible !p-1.5" :value="$user->pp"
                                        accept="img/*" onchange="showPreview(event);">
                                    </x-partial.form.input>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
            </div>


            <div class="mt-6 flex items-center justify-start gap-x-4">
                <x-partial.primary-button>
                    Save
                </x-partial.primary-button>
                <x-partial.secondary-button onclick="history.back()">
                    Cancel
                </x-partial.secondary-button>
            </div>
        </form>
    </div>
</x-user>
