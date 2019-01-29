<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  public function indexAdmin()
  {
    $users = User::paginate(15);
    return view('/admin.users.index', compact('users'));
  }
}
