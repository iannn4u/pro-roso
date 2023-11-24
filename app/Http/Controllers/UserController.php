<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\File;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = User::where('id_user', auth()->id())->first();
        $data['jumlahPesan'] = Pesan::where('id_penerima', auth()->id())->count();
        $data['pesan'] = Pesan::where('id_penerima', auth()->id())->get();
        $files = File::where('id_user', auth()->id());
        if (request('search')) {
            $files->where('judul_file', 'like', '%' . request('search') . '%');
        }
        $data['files'] = $files->get();

        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * nampilin data profil kita
     */
    public function show(User $user)
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $user;
        $data['jumlahPesan'] = Pesan::where('id_penerima', auth()->id())->count();
        $data['pesan'] = Pesan::where('id_penerima', auth()->id())->take(5)->get();
        return view('user.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data['title'] = 'Edit Profil Saya';
        if ($user->id_user != auth()->id()) {
            abort(404);
        }
        $data['user'] = $user;
        $data['jumlahPesan'] = Pesan::where('id_penerima', auth()->id())->count();
        $data['pesan'] = Pesan::where('id_penerima', auth()->id())->get();
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data['title'] = 'Edit Profil Saya';
        if ($user->id_user != auth()->id()) {
            abort(404);
        }
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
            'pp.mimes' => 'Format gambar harus GIF, JPEG, JPG, SVG, PNG',
            'pp.max' => 'Size gambar terlalu besar'
        ];
        $rules = [
            'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5',
            'username' => $user->username == $request->input('username') ? 'required' : 'required|min:5|unique:users',
            'email' => $user->email == $request->input('email') ? 'required' : 'required|email|unique:users'
        ];

        if ($request->file('pp')) {
            if (asset('storage/' . $user->pp)) {
                Storage::delete($user->pp);
            }
            $rules['pp'] = 'mimes:gif,jpeg,jpg,svg,png';
            $rules['pp'] = 'max:2048';
            $pp = $request->file('pp');
            $path = 'users/' . $user->id_user;
            $namaPP = $pp->store($path);
        } else {
            $namaPP = $user->pp;
        }
        if (!$request->input('password') || Hash::check($request->input('password'), $user->password)) {
            $validasiData = $request->validate($rules, $errors);
            $validasiData['pp'] = $namaPP;
        } else {
            $rules['password'] = 'required|min:6';
            $validasiData = $request->validate($rules, $errors);
            $validasiData['password'] = Hash::make($validasiData['password']);
            $validasiData['pp'] = $namaPP;
        }

        $user->update($validasiData);

        session()->flash('success', 'update data user');
        return redirect('/user/' . auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->files()->delete();
        Storage::deleteDirectory('users/' . $user->id_user);
        $user->delete();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('signin');
    }

    public function ajax()
    {
        $query = request('q');
        $users = User::where('username', 'like', "%$query%")->where('username', '!=', Auth::user()->username)->take(5)->get();
        return response()->json($users);
    }
}
