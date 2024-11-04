<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function register(Request $request) {
        $incoming = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nif' => 'required|digits:9',
            'rua' => 'required|string',
            'codigoPostal' => 'required|string',
            'porta' => 'required|string'
        ]);

        try {
            $incoming['password'] = Hash::make($incoming['password']);
            User::create($incoming);
            return redirect("/login")->with('success', 'Account created successfully');
        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Registration failed. Please try again.'
            ])->withInput($request->except('password'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();

        return redirect("/");
    }
}
