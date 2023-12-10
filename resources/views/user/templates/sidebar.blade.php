@php
$ref = match (request()->path()) {
'publikFile' => 'publikFile',
default => null,
};
@endphp
<div class="mt-1.5 hidden lg:block">
    <x-partial.create-file :url="$ref" class="!w-full !p-2" data-tooltip-target="nf">
        <span class="text-3xl text-center block w-full mb-px">+</span>
    </x-partial.create-file>
    <div data-tooltip="nf" data-tooltip-placement="right"
        class="absolute z-30 whitespace-normal opacity-0 break-words inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
        <span class="text-xs">New file</span>
    </div>


    <div class="block mt-5">
        <div>
            <a class="flex flex-col gap-3 w-full aspect-square justify-center items-center mb-1 px-4 py-2.5 rounded-full {{ request()->is('/') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                data-tooltip-target="fs" href="/">
                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 18a.969.969 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V9l4-4m-4 5h5m3-4h5V1m5 1v12a.97.97 0 0 1-.933 1H9.933A.97.97 0 0 1 9 14V5l4-4h5.067A.97.97 0 0 1 19 2Z" />
                </svg>
            </a>
            <div data-tooltip="fs" data-tooltip-placement="right"
                class="absolute z-30 whitespace-normal opacity-0 break-words inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
                <span class="text-xs">My Files</span>
            </div>
        </div>

        <div>
            <a class="flex flex-col gap-3 w-full aspect-square justify-center items-center mb-1 px-4 py-2.5 rounded-full {{ request()->is('publikFile') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                data-tooltip-target="pf" href="/publikFile">
                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 21 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
            <div data-tooltip="pf" data-tooltip-placement="right"
                class="absolute z-30 whitespace-normal opacity-0 break-words rounded-lg bg-blainline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
                <span class="text-xs">Public Files</span>
            </div>
        </div>
        <div>
            <a class="flex flex-col gap-3 w-full aspect-square justify-center items-center mb-1 px-4 py-2.5 rounded-full {{ request()->routeIs('file.trashed') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                data-tooltip-target="tr" href="{{ route('file.trashed') }}">
                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                </svg>
            </a>
            <div data-tooltip="tr" data-tooltip-placement="right"
                class="absolute z-30 whitespace-normal opacity-0 break-words rounded-lg bg-blainline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
                <span class="text-xs">Trash</span>
            </div>
        </div>

        @if (Auth::user()->status == 2)
        <div>
            <a class="flex flex-col gap-3 w-full aspect-square justify-center items-center mb-1 px-4 py-2.5 rounded-full {{ request()->is('a/*') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                data-tooltip-target="du" href="/a/users">
                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
            </a>
            <div data-tooltip="du" data-tooltip-placement="right"
                class="absolute z-30 whitespace-normal opacity-0 break-words rounded-lg bg-blainline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
                <span class="text-xs">User Data</span>
            </div>
        </div>
        @endif
    </div>
    <hr class="my-2 h-px bg-gray-200 border-0" />
    <div>
        <div>
            <a class="flex flex-col gap-3 w-full aspect-square justify-center items-center mb-1 px-4 py-2.5 rounded-full {{ request()->routeIs('account.settings') ? 'bg-gray-300' : 'hover:bg-gray-200' }}"
                data-tooltip-target="acc" href="{{ route('account.settings') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <div data-tooltip="acc" data-tooltip-placement="right"
                class="absolute z-30 whitespace-normal opacity-0 break-words rounded-lg bg-blainline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
                <span class="text-xs">Settings</span>
            </div>
        </div>

        <div>
            <button data-modal-target="signout" data-modal-toggle="signout"
                class="flex flex-col gap-3 w-full aspect-square justify-center items-center mb-1 px-4 py-2.5 rounded-full hover:bg-gray-200"
                data-tooltip-target="lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="w-4 h-4">
                    <path fill-rule="evenodd"
                        d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div data-tooltip="lg" data-tooltip-placement="right"
                class="absolute z-30 whitespace-normal opacity-0 break-words rounded-lg bg-blainline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm">
                <span class="text-xs">Log Out</span>
            </div>
        </div>

    </div>
</div>