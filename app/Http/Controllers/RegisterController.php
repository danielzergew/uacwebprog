<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function create(Request $request) {

        $credentials = $request->validate([
            'gender' => 'required',
            'hobby' => 'required',
            'username' => 'required|unique:users',
            'phone' => 'required|min:10|max:12|unique:users',
            'password' => 'required',
        ]);

        User::create($credentials);

        return redirect('/login');
    }
}
