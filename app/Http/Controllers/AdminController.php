<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Pesan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;

class AdminController extends Controller
{
    protected $jumlahPesan;
    protected $pesan;

    public function __construct()
    {
        $this->jumlahPesan = Pesan::where('id_penerima', Auth::id())->count();
        $this->pesan = Pesan::where('id_penerima', Auth::id())->get();
    }

    public function index()
    {
        $data['title'] = 'Data User (Admin)';
        $users = User::whereIn('status', [0, 1]);
        $data['files'] = File::all();
        $data['jumlahPesan'] = $this->jumlahPesan;
        $data['pesan'] = $this->pesan;

        if (request('search')) {
            $users->where(function ($q) {
                $q->where('fullname', 'like', '%' . request('search') . '%')
                    ->orWhere('username', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }

        $data['usersC'] = User::whereIn('status', [0, 1])->get();
        $data['users'] = $users->paginate(10);
        return view('admin.index', $data);
    }

    public function verified($id_user)
    {
        User::where('id_user', $id_user)->update(['status' => 1]);
        session()->flash('success', 'verified');
        return redirect()->back();
    }

    public function destroy($id_user)
    {
        Storage::deleteDirectory('users/' . $id_user);
        User::destroy($id_user);

        session()->flash('success', 'menghapus user');
        return redirect()->back();
    }

    public function edit($id_user)
    {
        $data['jumlahPesan'] = $this->jumlahPesan;
        $data['pesan'] = $this->pesan;
        $data['title'] = 'Edit Profil User';
        $data['user'] = User::where('id_user', $id_user)->first();
        return view('admin.edit', $data);
    }

    public function update(UpdateUserRequest $request, $id_user)
    {
        $data['title'] = 'Edit Profil User';
        $user = User::where('id_user', $id_user)->first();
        $errors = [
            'fullname.required' => 'Nama panjang harus diisi!',
            'fullname.regex' => 'Nama panjang hanya boleh mengandung huruf!',
            'fullname.min' => 'Nama panjang harus memiliki minimal 5 karekter!',
            'username.required' => 'Username harus diisi!',
            'username.min' => 'Username harus memiliki minimal 5 karakter!',
            'username.unique' => 'Username sudah digunakan!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email tidak sesuai!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password harus memiliki minimal 6 karakter!',
            'password.confirmed' => 'Ulangi password tidak sesuai!',
        ];
        $rules = [
            'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5',
            'username' => $user->username == $request->input('username') ? 'required' : 'required|min:5|unique:users',
            'email' => $user->email == $request->input('email') ? 'required' : 'required|email|unique:users'
        ];

        if (!$request->input('password') || Hash::check($request->input('password'), $user->password)) {
            $validasiData = $request->validate($rules, $errors);
        } else {
            $rules['password'] = 'required|min:6';
            $validasiData = $request->validate($rules, $errors);
            $validasiData['password'] = Hash::make($validasiData['password']);
        }

        $user->update($validasiData);

        session()->flash('success', 'update data user');
        return redirect('a/users');
    }
}
