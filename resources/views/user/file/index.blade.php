<x-user :$title :$jumlahPesan :$pesan :$files :$pesanGrup>

    <x-partial.flash class="!my-2 absolute min-w-[18rem] top-20 right-10 z-10 shadow-md" :flash="session()->all()" />

    <div class="py-3">
        <h3 class="text-2xl sm:text-3xl font-semibold">Discover all files</h3>
    </div>

    <div
        class="grid grid-cols-1 sm:grid-cols-2 gap-y-[20px] gap-x-[16px] md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 min-[2368px]:grid-cols-6 p-3 sm:p-5">
        @unless (count($files))
        <p>Tidak ada file</p>
        @endunless
        @foreach ($files as $file)
        <div
            class="flex w-full max-w-full flex-col bg-gray-100 border border-gray-200 rounded-lg shadow hover:bg-gray-200/20 duration-150 hover:shadow-md pb-2">
            {{-- dropdown menu --}}
            <div class="flex justify-end px-4">
                <!-- Dropdown menu -->
                <div id="file-#{{ $file->id_file }}"
                    class="z-50 hidden w-44 list-none divide-y divide-gray-100 overflow-hidden rounded-lg bg-white text-base shadow">
                    <ul>
                        @unless ($file->id_user != Auth::id())
                        <li>
                            <a href="{{ route('file.edit', $file->id_file) }}"
                                class="inline-flex w-full items-center px-4 py-2 text-sm hover:bg-gray-100">
                                <svg class="mr-2 h-3 w-3 text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                    <path
                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                </svg>
                                Edit</a>
                        </li>
                        @endunless
                        <li>
                            <a href="{{ route('file.download', $file->id_file) }}"
                                class="inline-flex w-full items-center px-4 py-2 text-sm hover:bg-gray-100"><svg
                                    class="mr-2 h-3 w-3 text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                                </svg>Download</a>
                        </li>
                        <li>
                            <a href="{{ $url ?? '#' }}"
                                class="inline-flex items-center whitespace-nowrap px-4 py-2 text-sm hover:bg-gray-100">
                                <svg class="mr-2 h-3 w-3 text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11.013 7.962a3.519 3.519 0 0 0-4.975 0l-3.554 3.554a3.518 3.518 0 0 0 4.975 4.975l.461-.46m-.461-4.515a3.518 3.518 0 0 0 4.975 0l3.553-3.554a3.518 3.518 0 0 0-4.974-4.975L10.3 3.7" />
                                </svg>
                                Bagikan dengan link</a>
                        </li>
                        @unless ($file->id_user != Auth::id())
                        <li>
                            <form action="{{ route('file.destroy', $file->id_file) }}" method="post" class="w-full">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="inline-flex w-full items-center bg-red-500 px-4 py-2 text-left text-sm text-white hover:bg-red-600"
                                    onclick="return confirm('yakin ingin hapus?')">
                                    <svg class="mr-2 h-3 w-3 text-gray-800" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                    </svg>
                                    Hapus</button>
                            </form>
                        </li>
                        @endunless
                    </ul>
                </div>
            </div>

            {{-- main menu --}}
            <div class="my-1 px-3 py-1">
                <div class="flex justify-between">
                    <div class="flex items-center gap-1 flex-1 min-w-0">
                        <img alt=""
                            src="{{ $file->user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $file->user->pp) }}"
                            class="relative inline-block h-9 w-9 !rounded-full  border-2 border-white object-cover object-center hover:z-10" />
                        <div class="w-[90%] sm:min-w-[inherit] lg:w-full">
                            <a href="{{ route('profile', $file->user->username) }}"
                                class="block font-sans text-sm antialiased font-medium leading-relaxed tracking-normal text-inherit w-[95%] lg:max-w-full truncate decoration-blue-500 decoration-2 hover:underline hover:underline-offset-2">
                                {{ $file->user->fullname }}</a>
                            <p
                                class="block font-sans text-xs antialiased font-normal leading-normal text-gray-500 -mt-1.5">
                                {{ $file->user->username }}
                            </p>
                        </div>
                    </div>
                    <button id="dropdw" data-dropdown-toggle="file-#{{ $file->id_file }}"
                        class="inline-block rounded-full ml-1 -mr-1 p-1.5 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mt-px cursor-default">
                <a href="{{ route('file.detail', ['id_file' => $file->id_file,'username' => $file->user->username]) }}"
                    class="overflow-hidden h-40 bg-white grid place-items-center">
                    @php
                    $mime=explode('/', $file->mime_type);
                    $extension = $file->ekstensi_file;
                    @endphp
                    @if (explode('/', $file['mime_type'])[0] == 'image')
                    <img data-src="{{ asset('storage/' . $file->generate_filename) }}" alt="{{ $file->judul_file }}"
                        class="object-contain h-full">
                    @else
                    <x-partial.asset.svg :ext="$extension" />
                    @endif
                </a>
            </div>

            <div class="pt-1 px-3 space-y-px">
                <a href="{{ route('file.detail', ['id_file' => $file->id_file,'username' => $file->user->username]) }}"
                    class="inline-block font-medium text-gray-900 decoration-blue-500 decoration-2 hover:underline hover:underline-offset-2 lg:w-full"
                    title="{{ $file->judul_file }}">{{ $file->judul_file }}</a>
                <p class="-mt-2 text-sm w-[calc(95%_+_1rem)] truncate text-gray-400"
                    title="{{ $file->created_at->format('l, d F Y h:m:s') }}">
                    {{ $file->original_filename }}
                </p>
            </div>
        </div>
        @endforeach
    </div>

    @push('script')
        <script src="{{ asset('js/buffer.js') }}"></script>
    @endpush
</x-user>