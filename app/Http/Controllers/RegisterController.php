<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function show(){

        if (auth()->check()) {
            if(Auth::user()->permiso->nombre === 'Admin'){
                return redirect('admin/index');
            } else if (Auth::user()->permiso->nombre=== 'Client'){
                return redirect('client/index');
            }
        }
        return view('auth.register');
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:users,name|regex:/^[a-zA-Z0-9]+$/',
            'email'=> 'required|unique:users,email',
            'password'=> 'required|min:3',
            'password_confirmation'=> 'required|same:password',
        ],[
            'name.regex' => 'El campo nombre no debe contener espacios ni caracteres especiales. Utilice solo letras y números.',
        ]);

        $validatedData['fk_permiso'] = '2';

        $user = User::create($validatedData);
        return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor inicia sesión.');;
    }


}
