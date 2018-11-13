<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('/contact.index');
    }

    public function confirm(Request $request)
    {
        $contact = session('contact');
        $info = [
            'name' => request('name'),
            'email' => request('email'),
            'phone0'=> request('phone0'),
            'phone1'=> request('phone1'),
            'phone2'=> request('phone2'),
            'info' => request('info')
        ];
        $request->session()->put('contact', $info);
        return view('/contact.confirm', compact('contact'));
    }

    public function store()
    {
        return view('/contact.confirm');
    }
}
