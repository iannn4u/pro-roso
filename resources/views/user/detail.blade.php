@push('style')
<style>
    @media (min-width:768px) {
        .header-img::before {
            --backdrop-image : url('{{ $user->pp === ' img/defaultProfile.svg' ? '' : asset('storage/' . $user->pp) }}');
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: 200px 57%;
            background-repeat: no-repeat;
            filter: grayscale(100%);
            z-index: -2;
            background-image: var(--backdrop-image);
        }
    }
    .header-sec::after {
        /* background: linear-gradient(90deg, #191616 28%, hsla(0, 0%, 2%, 0.98) 20%, hsla(0, 0%, 6.3%, 0.97) 25%, hsla(0, 0%, 9%, .95) 35%, hsla(0, 0%, 9%, .94) 40%, hsla(0, 3%, 6.5%, 0.92) 45%, hsla(0, 0%, 9%, .9) 50%, hsla(0, 0%, 9%, .87) 55%, hsla(0, 0%, 9%, .82) 60%, hsla(0, 0%, 9%, .75) 65%, hsla(0, 0%, 9%, .63) 70%, hsla(0, 0%, 9%, .45) 75%, hsla(0, 0%, 9%, .27) 80%, hsla(0, 0%, 9%, .15) 85%, hsla(0, 0%, 9%, .08) 90%, hsla(0, 0%, 9%, .03) 95%, hsla(0, 0%, 9%, 0)); */
        background: linear-gradient(to left, transparent 0%, #000000 69%);
        bottom: 0;
        content: "";
        left: 0;
        position: absolute;
        right: -200px;
        top: 0;
        z-index: -1;
    }
</style>
@endpush

<x-user :$title :$user :$jumlahPesan :$pesan :$pesanGrup>

    <x-partial.flash class="!my-2" :flash="session()->all()"></x-partial.flash>

    <section class="bg-[#191616] isolate relative min-[2368px]:px-14 px-5 py-9 -mx-4">
        <div class="flex gap-x-6 items-center flex-col sm:flex-row header-img">
            <div class="basis-52">
                <img src="{{ $user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $user->pp) }}"
                    loading="lazy" decoding="async" alt="{{ $user->username }}"
                    class="rounded-full object-cover w-52 h-52">
            </div>
            <div
                class="flex items-center sm:text-left text-center sm:items-start justify-center gap-y-3 mt-6 flex-col flex-1 sm:mt-3 z-10">
                <div>
                    <p class="sm:-mb-1 text-sm leading-6 font-medium text-slate-300 tracking-tight">Originally known as
                    </p>
                    <h1 class="inline-block text-2xl sm:text-5xl font-semibold text-white">
                        {{ $user->username }}</h1>
                </div>
                <p class="mt-2.5 text-base text-slate-200 inline-flex items-center gap-x-1">
                    <svg class="w-4 h-4 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M10 6v4l3.276 3.276M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        Joined on {{ $user->created_at->format('M d, Y') }}
                    </span>
                </p>
            </div>
            <div class="hidden sm:block header-sec absolute inset-y-0 left-0 w-1/2 h-full absolute">
            </div>
        </div>
        <div class="bg-gradient-to-t absolute from-gray-800 h-6 bottom-0 left-0 hidden sm:block w-full"></div>
    </section>

    <section class="mt-2 py-6 px-2">
        <div class="flex items-center">
            <h4 class="text-2xl font-bold">Files by {{ $user->username }}</h4>
        </div>
        <div class="flex flex-wrap gap-y-4 -mx-6 p-3 sm:px-0">
            @unless (count($user->files))
            <p>Tidak ada file</p>
            @endunless
            @foreach ($user->files as $file)
            <div class="w-full sm:w-2/4 md:w-3/12 px-4 md:px-8">
                {{-- main menu --}}
                <div class="flex-col border-b border-gray-300 py-6 h-full">

                    <div class="mt-px cursor-default">
                        <a href="{{ route('file.detail', ['id_file' => $file->id_file,'username' => $file->user->username]) }}"
                            class="overflow-hidden h-40 group bg-white grid place-items-center">
                            @php $mime=explode('/', $file->mime_type);
                            @endphp
                            @if (explode('/', $file['mime_type'])[0] == 'image')
                            <img data-src="{{ asset('storage/' . $file->generate_filename) }}"
                                alt="{{ $file->judul_file }}"
                                class="object-contain h-full group-hover:scale-105 duration-150">
                            @else
                            <x-partial.asset.svg></x-partial.asset.svg>
                            @endif
                        </a>
                    </div>

                    <div class="py-2 mt-2 px-3 space-y-1.5">
                        <a href="{{ route('file.detail', ['id_file' => $file->id_file,'username' => $file->user->username]) }}"
                            class="inline-block font-semibold text-gray-800 decoration-blue-500 decoration-2 hover:underline hover:underline-offset-2 text-lg"
                            title="{{ $file->judul_file }}">{{ $file->judul_file }}</a>
                        <p class="-mt-2 text-base w-full text-gray-600">
                            {{ $file->deskripsi }}
                        </p>
                        <p class="font-mono text-base antialiased font-light leading-relaxed text-gray-500
                        " title="{{ $file->created_at->format('l, d F Y h:m:s') }}">
                            {{ $file->created_at->format('F d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</x-user>