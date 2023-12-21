<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array<string, string>
   */
  public function messages(): array
  {
    return [
      'fullname.required' => 'Oopsie! Don\'t forget to fill in your name!',
      'fullname.string' => 'Hmm... your name can\'t have numbers or symbols!',
      'fullname.min' => 'Oh no! Your name must be at least 5 characters long!',
      'fullname.regex' => 'Wait, does your name even have letters in it?',
      'username.required' => 'Hey there! You need to fill in your username!',
      'username.min' => 'Oops! Your username should be at least 5 characters long!',
      'username.max' => 'Username is too long (maximum is 39 characters). Username may only contain alphanumeric characters or single hyphens, and cannot begin or end with a hyphen.',
      'username.unique' => 'Oh snap! This username is already taken!',
      'username.regex' => 'Username may only contain alphanumeric characters or single hyphens, and cannot begin or end with a hyphen',
      'email.required' => 'Hold on! You gotta fill in your email!',
      'email.email' => 'Hmm... the email format seems a bit off!',
      'email.unique' => 'Oops! This email is already in use!',
      'password.required' => 'Uh-oh! Don\'t forget to fill in your password!',
      'password.min' => 'Oopsie daisy! Your password should be at least 6 characters long!',
      'password.confirmed' => 'Whoopsie! The password confirmation doesn\'t match!',
    ];
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'fullname' => 'required|regex:/^[a-zA-Z\s]+$/|min:5|string',
      'username' => 'required|min:5|max:39|unique:users|regex:/^(?!.*[-]{2})(?!.*[-_]$)(?!.*__)(?!.*[-_][-_])[a-zA-Z0-9]+([-_][a-zA-Z0-9]+)*$/',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed'
    ];
  }
}
