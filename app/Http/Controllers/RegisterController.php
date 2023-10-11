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
            return redirect()->route('admin');
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

        unset($validatedData['updated_at']);
        unset($validatedData['created_at']);

        $user = User::create($validatedData);
        return redirect()->route('login')->with('success', '¡Registro exitoso! Por favor inicia sesión.');;
    }


}
