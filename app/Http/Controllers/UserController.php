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
        $user = User::where('email', $credentials['email'])->first();
        if (auth()->attempt($credentials)){
            $request->session()->regenerate();
            if ($user->isAdmin == 1) {
                return redirect("dashboard");
            }
            return redirect("/");
        }

        return back()->withErrors([
            'email' => 'Email ou password incorretos',
            'password' => 'Email ou password incorretos',
        ]);
    }

    public function register(Request $request) {
        $incoming = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'nif' => 'required|digits:9',
            'rua' => 'required|string',
            'codigoPostal' => 'required|string',
            'porta' => 'required|string'
        ], [
            'email.unique' => 'Este email já está a ser utilizado.',
            'password.min' => 'A password deve ter pelo menos 8 caracteres.',
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
