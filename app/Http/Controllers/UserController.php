<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUser()
    {
        return view('verwaltung.user.userPage', ['user' => Auth::user()]);
    }

    public function showUsers()
    {
        return view('management.user.allUsers', ['users' => User::all(), 'user' => Auth::user()]);
    }
}
