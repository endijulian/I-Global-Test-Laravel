<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ControllerUser extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }
}
