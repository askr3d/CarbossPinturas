<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        $user = User::with('permiso')->get();

        return view('admin.users.users', compact('users'));
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->firstOrFail();
        $permisos = Permiso::all();
        return view('admin.users.edit', compact('users', 'permisos'));
    }

    public function destroy($id)
    {
        $userdelete = User::where('id', $id)->firstOrFail();
        $userdelete->delete();

        return redirect()->route('users')->with('success', 'Servicio eliminado exitosamente.');
    }

    public function update(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|regex:/^[a-zA-Z0-9]+$/',
        'permiso' => 'required|exists:permisos,id_permiso',
        ],[
            'name.regex' => 'El campo nombre no debe contener espacios ni caracteres especiales. Utilice solo letras y números.',
    ]);

    $id_user = $request->input('id');

    // Obtener el producto por su id_producto
    $user = User::where('id', $id_user)->first();

    if ($user) {
        // Actualizar los datos del producto
        $user->name = $request->input('name');
        $user->fk_permiso = $request->input('permiso');
        $user->save();

        return redirect()->route('users')->with('success', 'Producto actualizado exitosamente.');
    } else {
        return redirect()->route('users')->with('error', 'Producto no encontrado.');
    }
}

public function add(Request $request)
    {
    // Validar los datos del formulario

    $request->validate([

        'name' => 'required|unique:users,name|regex:/^[a-zA-Z0-9]+$/',
            'email'=> 'required|unique:users,email',
            'password'=> 'required|min:3',
            'password_confirmation'=> 'required|same:password',
            'permiso' => 'required|exists:permisos,id_permiso',
        ],[
            'name.regex' => 'El campo nombre no debe contener espacios ni caracteres especiales. Utilice solo letras y números.',
    ]);

    // Crear un nuevo servicio
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = $request->input('password');
    $user->fk_permiso = $request->input('permiso');
    $user->save();

    return redirect()->route('users')->with('success', 'Usuario agregado exitosamente.');
    }

    public function showAddForm()
    {
        $permisos = Permiso::all();
        return view('admin.users.add', compact('permisos'));
    }
}
