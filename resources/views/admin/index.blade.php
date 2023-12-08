<x-user :$jumlahPesan :$files :$pesan>

    <x-slot:title>
        Data user (Admin)
    </x-slot>

    <x-partial.flash class="!my-2 absolute min-w-[18rem] top-20 right-10 z-10 shadow-md" :flash="session()->all()"/>

    <div class="flex gap-3 py-4">
        <div class="w-48 bg-gray-100 border-l-8 border-gray-500">
            <div class="card-body p-3">
                <div class="flex items-center justify-between">
                    <div class="col mr-2">
                        <div class="text-medium font-weight-bold text-primary text-uppercase mb-1">
                            Total User</div>
                        <div class="mb-0 font-bold text-gray-800">{{ $countUsers }}</div>
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
        <table class="w-full text-sm text-left text-gray-500">
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
                @unless ($countUsers > 0)
                <tr
                    class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" colspan="6">
                        Tidak ada data user
                    </th>
                </tr>
                @endunless
                @foreach ($dataUsers as $user)
                <tr
                    class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
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
                            class="font-medium text-blue-600 hover:underline @if ($user->status == 1) disabled @endif">
                            Verified
                        </a>
                        <a href="{{ route('editUser', $user->id_user) }}"
                            class="font-medium text-blue-600 hover:underline">Edit</a>
                        <button class="font-medium text-blue-600 hover:underline deleteA"
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
            {{ $dataUsers->links('components.pagination') }}
        </div>
    </div>
</x-user>
