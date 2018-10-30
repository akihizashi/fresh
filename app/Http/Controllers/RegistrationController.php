<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function index()
    {
      return view('auth.register');
    }

    public function store()
    {
      $this->validate(request(),[
        'name' => 'required|max:20',
        'password' => 'required|alpha_dash|confirmed',
        'email' => 'required|email'
      ]);

      $user = User::create([
        'name' => request('name'),
        'password' => bcrypt(request('password')),
        'email' => request('email'),
      ]);

      auth()->login($user);

      return redirect('/home');
    }
}
