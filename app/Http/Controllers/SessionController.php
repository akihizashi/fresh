<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class SessionController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.auth.login');
    }

    public function storeAdmin(Request $request)
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
              'message' => 'Your infomation you fill invalid, please check again'
            ]);
        }
        $role = User::where('email', "=", $request->email)->first()->role;
        abort_if($role !== "admin", 403);
        return redirect('admin/dashboard');
    }

    public function store(Request $request)
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
              'message' => 'Your infomation you fill invalid, please check again'
            ]);
        }
        return back();
    }    
    
    public function index()
    {
        return view('/auth.login');
    }

    public function destroy()
    {
        auth()->logout();
        session()->flush();
        return redirect('/home');
    }
}
