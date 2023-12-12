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
        session()->flash('success', 'Successfully verified user');
        return redirect()->back();
    }

    public function destroy($id_user)
    {
        Storage::deleteDirectory('users/' . $id_user);
        User::destroy($id_user);

        session()->flash('success', 'Successfully deleted user');
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
            'fullname.required' => 'Full name must not be blank!',
            'fullname.regex' => 'Full name can only contain letters!',
            'fullname.min' => 'Full name must be at least 5 characters long!',
            'username.required' => 'Username must not be blank!',
            'username.min' => 'Username must be at least 5 characters long!',
            'username.unique' => 'Username is already in use!',
            'email.required' => 'Email must not be blank!',
            'email.email' => 'Invalid email format!',
            'email.unique' => 'Email is already in use!',
            'password.required' => 'Password must not be blank!',
            'password.min' => 'Password must be at least 6 characters long!',
            'password.confirmed' => 'Password confirmation does not match!',
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

        session()->flash('success', 'Successfully updated user data');
        return redirect('a/users');
    }
}
