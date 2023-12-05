
<x-user :$jumlahPesan :$files :$pesan>

    <x-slot:title>
        Data user (Admin)
    </x-slot>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show w-25 m-3" role="alert"
        style="position: fixed; z-index: 1; top: 0; right: 0;">
        <strong>Berhasil!</strong> {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="flex gap-3 py-4">
        <div class="w-48 bg-gray-100 border-l-8 border-gray-500">
            <div class="card-body p-3">
                <div class="flex items-center justify-between">
                    <div class="col mr-2">
                        <div class="text-medium font-weight-bold text-primary text-uppercase mb-1">
                            Total User</div>
                        <div class="mb-0 font-bold text-gray-800">{{ $users }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-48 bg-gray-100 border-l-8 border-gray-500">
            <div class="card-body p-3">
                <div class="flex items-center justify-between">
                    <div class="col mr-2">
                        <div class="text-medium font-weight-bold text-success text-uppercase mb-1">
                            Total File</div>
                        <div class="mb-0 font-bold text-gray-800">{{ count($files) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($usersC) == 0)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="6">
                        Tidak ada data user
                    </th>
                </tr>
                @endif
                @foreach ($usersC as $user)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->fullname }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->username }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if ($user->status == 0)
                        <span
                            class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">pending</span>
                        @else
                        <span
                            class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">verified</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('verify', $user->id_user) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline @if ($user->status == 1) disabled @endif">
                            Verified
                        </a>
                        <a href="{{ route('editUser', $user->id_user) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline deleteA"
                            data-toggle="modal" data-user="{{ $user->id_user }}" data-acc="{{ $user->fullname }}"
                            data-target="#adminDeleteModal">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="ml-3">
            {{ $usersC->links('components.pagination') }}
        </div>
    </div>
</x-user>