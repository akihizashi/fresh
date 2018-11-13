<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view('/auth.login');
    }

    public function store(Request $request)
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
              'message' => 'Your infomation you fill invalid, please check again'
            ]);
        }
        return redirect('/home');
    }

    public function destroy()
    {
        auth()->logout();
        session()->flush();
        return redirect('/home');
    }
}
