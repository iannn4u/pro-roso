<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->file('pp')) {
            $pp = $this->file('pp');

            if (in_array($pp->extension(), ['png', 'jpg', 'jpeg', 'gif']) && $pp->getSize() <= 2000000) {
                if (Storage::disk('public')->exists($this->user()->pp)) {
                    Storage::delete($this->user()->pp);
                }

                $path = 'users/' . $this->user()->id_user;
                $namaPP = $pp->store($path);

                session()->flash('namaPP', $namaPP);
            }

            return [
                'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5',
                'username' => $this->user()->username == $this->input('username') ? 'required' : 'required|min:5|unique:users',
                'email' => $this->user()->email == $this->input('email') ? 'required' : 'required|email|unique:users',
                'pp' => 'max:2048|mimes:png,jpg,jpeg,gif',
            ];
        } else {
            $namaPP = $this->user()->pp;
            session()->flash('namaPP', $namaPP);

            if ($this->input('password') || Hash::check($this->input('password'), $this->user()->password)) {
                return [
                    'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5',
                    'username' => $this->user()->username == $this->input('username') ? 'required' : 'required|min:5|unique:users',
                    'email' => $this->user()->email == $this->input('email') ? 'required' : 'required|email|unique:users',
                    'password' => 'required|min:6',
                ];
            }

            return [
                'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5',
                'username' => $this->user()->username == $this->input('username') ? 'required' : 'required|min:5|unique:users',
                'email' => $this->user()->email == $this->input('email') ? 'required' : 'required|email|unique:users'
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'fullname.required' => 'Yo, gotta drop that name, can\'t leave it blank!',
            'fullname.regex' => 'No special characters, bro! Letters only for your name!',
            'fullname.min' => 'Yo, your long name needs at least 5 characters!',
            'username.required' => 'Dude, slam in your username already!',
            'username.min' => 'Five characters minimum for your username, fam!',
            'username.unique' => 'Oopsie, this username is already taken!',
            'email.required' => 'Email alert! Fill it in, dude!',
            'email.email' => 'Dang, email format looking kinda sus!',
            'email.unique' => 'Oops, email\'s on lockdown, it\'s already in use!',
            'password.required' => 'Password, dude! Don\'t ghost it, type it!',
            'password.min' => 'Bro, your password needs at least 6 characters!',
            'password.confirmed' => 'Hold up, password confirmation doesn\'t match!',
            'pp.mimes' => 'Yo, the file format has to be GIF, JPEG, JPG, PNG!',
            'pp.max' => 'Whoa! File size is too wild, gotta shrink it down! (MAX 2MB)',
        ];
    }
}
