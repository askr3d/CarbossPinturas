<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('admin');
        }

        return view('auth.login');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()
            ->withErrors(['email' => 'El correo electrónico no está registrado.'])
            ->withInput($request->only('email'));
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()
            ->withErrors(['password' => 'La contraseña proporcionada es incorrecta.'])
            ->withInput($request->only('email'));
        }

        // Intentar autenticar al usuario
        Auth::login($user);
         return redirect()->intended('/admin/index');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
