<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'nif' => 'required|digits:9|unique:users,nif',
            'rua' => 'required|string',
            'codigoPostal' => 'required|string',
            'porta' => 'required|string'
        ], [
            'email.unique' => 'Este email já está a ser utilizado.',
            'password.min' => 'A password deve ter pelo menos 8 caracteres.',
            'nif.unique' => 'Este NIF já está a ser utilizado.'
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

    public function update(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'nif' => 'required|string|max:15',
            'rua' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:15',
            'porta' => 'nullable|string|max:10',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            $filename = time() . '_' . $request->file('profile_picture')->getClientOriginalName();

            try {

                $request->file('profile_picture')->move(public_path('images/user_images'), $filename);
                $user->image =  $filename;

            } catch (\Exception $e) {
                \Log::error('File upload failed: ' . $e->getMessage());
                return back()->with('error', 'File upload failed.');
            }
        }



        $user->email = $validated['email'];
        $user->nif = $validated['nif'];
        $user->rua = $validated['rua'] ?? $user->rua;
        $user->codigoPostal = $validated['codigo_postal'] ?? $user->codigo_postal;
        $user->porta = $validated['porta'] ?? $user->porta;

        $user->save();


        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();

        return redirect("/");
    }

    public function show()
    {
        return view('perfil');
    }
}
