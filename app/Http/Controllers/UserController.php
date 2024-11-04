<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect("/");
        }
    }

    public function register(Request $request){
        $incoming = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'

        ]);
        $incoming['password'] = Hash::make($incoming['password']);
        User::create($incoming);
        return redirect("/login");
    }
}
