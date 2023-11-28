<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewSignin()
    {
        $data['title'] = 'Signin';
        return view('auth.signin', $data);
    }

    public function signin(Request $request)
    {
        $errors = [
            'usermail.required' => 'Username atau Email harus diisi',
            'password.required' => 'Password harus diisi',
        ];
        $validasi = $request->validate([
            'usermail' => 'required',
            'password' => 'required'
        ], $errors);
        
        $user = User::where('email', $validasi['usermail'])->orWhere('username', $validasi['usermail'])->first();

        
        if ($user) {
            if ($user->status == 1 || $user->status == 2) {
                $crendetials = [
                    'email' => $user->email,
                    'password' => $validasi['password']
                ];
                if (Auth::attempt($crendetials)) {
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                } else {
                    session()->flash('gagal', 'Sign in gagal');
                    return redirect()->back()->withInput();
                }
            } else {
                session()->flash('gagal', 'Akun belum aktif silahkan hubungi admin');
                return redirect()->back();
            }
        } else {
            session()->flash('gagal', 'Sign in gagal');
            return redirect()->back();
        }
    }

    public function signup(Request $request)
    {
        $errors = [
            'fullname.required' => 'Nama panjang harus diisi',
            'fullname.regex' => 'Nama panjang hanya boleh mengandung huruf',
            'fullname.min' => 'Nama panjang harus memiliki minimal 5 karekter',
            'username.required' => 'Username harus diisi',
            'username.min' => 'Username harus memiliki minimal 5 karakter',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak sesuai',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password harus memiliki minimal 6 karakter',
            'password.confirmed' => 'Ulangi password tidak sesuai'
        ];
        $validasiData = $request->validate([
            'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ], $errors);
        $validasiData['password'] = Hash::make($validasiData['password']);
        User::create($validasiData);

        session()->flash('success', 'Berhasil signup! Silahkan signin');
        return redirect('signin');
    }

    public function viewSignup()
    {
        $data['title'] = 'Signup';
        return view('auth.signup', $data);
    }

    public function signout() {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('signin');
    }
}
