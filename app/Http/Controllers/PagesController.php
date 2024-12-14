<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if ($user->role_id === Role::ROLE_HEADMASTER) {
            return view('dashboard.personalerMain');
        } else if ($user->role_id === Role::ROLE_ADMIN) {
            return view('dashboard.adminMain');
        } else {
            return view('dashboard.lehrerMain');
        }
    }
}
