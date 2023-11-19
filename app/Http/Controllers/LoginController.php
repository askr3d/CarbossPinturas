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
            if(Auth::user()->permiso->nombre === 'Admin'){
                return redirect('admin/index');
            } else if (Auth::user()->permiso->nombre=== 'Client'){
                return redirect('client/index');
            }

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
        if (Auth::attempt($credentials)) {
            // El usuario ha iniciado sesión correctamente. Ahora determina su rol.
            $user = Auth::user();

            // Asumimos que tienes una relación 'permiso' en tu modelo User.
            $permiso = $user->permiso;

            if ($permiso->nombre === 'Admin') {
                // El usuario es un administrador, redirige a la vista de administrador.
                return redirect('admin/index');
            } elseif ($permiso->nombre === 'Client') {
                // El usuario es un cliente, redirige a la vista de cliente.
                return redirect('client/index');
            }
        }

    }

    public function logout(Request $request)
    {
        session()->flush();
        Auth::logout();
        return redirect('/login')->with('error', 'Credenciales incorrectas o permiso no válido.');
    }
}
