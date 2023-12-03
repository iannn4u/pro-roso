<x-user :$title :$user :$jumlahPesan :$pesan :$pesanGrup>

    <x-partial.flash class="!my-2" :flash="session()->all()"></x-partial.flash>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

        <!-- DataTales Example -->
        <div class="row justify-content-center">
            <div class="card mb-3" style="max-width: 600px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ $user->pp === 'img/defaultProfile.svg' ? asset('img/defaultProfile.svg') : asset('storage/' . $user->pp) }}"
                            class="img-fluid rounded-full" style="width: 200px; height:200px; margin-right: .7rem;"
                            alt="{{ $user->username }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-0 py-4">
                            <div class="card">
                                <div class="card-header">
                                    Detail
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Nama</b> : {{ $user->fullname }}</li>
                                    <li class="list-group-item"><b>Username</b> : {{ $user->username }}</li>
                                    <li class="list-group-item"><b>Email</b> : {{ $user->email }}</li>
                                </ul>
                            </div>
                            <div class="text-center mt-4">
                                <div class="mb-3 float-end">
                                    <a href="/user/{{ auth()->id() }}/edit" class="btn btn-success">Edit Profile</a>
                                    <button class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteAccountModal">
                                        Hapus Akun
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user>