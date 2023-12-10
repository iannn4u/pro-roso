<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $data['title'] = 'Data User (Admin)';
        $users = User::whereIn('status', [0, 1]);
        $data['files'] = File::all();
        $data['jumlahPesan'] = $this->getJumlahPesan();
        $data['pesan'] = $this->getPesan();

        if (request('search')) {
            $users->where(function ($q) {
                $q->where('fullname', 'like', '%' . request('search') . '%')
                    ->orWhere('username', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        }

        $data['countUsers'] = $users->count();
        $data['dataUsers'] = $users->paginate(10);
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
        $data['jumlahPesan'] = $this->getJumlahPesan();
        $data['pesan'] = $this->getPesan();
        $data['title'] = 'Edit Profil User';
        $data['user'] = User::where('id_user', $id_user)->first();
        return view('admin.edit', $data);
    }

    public function update(Request $request, $id_user)
    {
        $data['title'] = 'Edit Profil User';
        $user = User::where('id_user', $id_user)->first();
        $errors = [
            'fullname.required' => 'Nama panjang must not be blank!',
            'fullname.regex' => 'Nama panjang hanya boleh mengandung huruf!',
            'fullname.min' => 'Nama panjang harus memiliki minimal 5 karekter!',
            'username.required' => 'Username must not be blank!',
            'username.min' => 'Username harus memiliki minimal 5 karakter!',
            'username.unique' => 'Username sudah digunakan!',
            'email.required' => 'Email must not be blank!',
            'email.email' => 'Format email tidak sesuai!',
            'email.unique' => 'Email sudah digunakan!',
            'password.required' => 'Password must not be blank!',
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
