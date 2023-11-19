@extends('layouts.admin.app')
@section('titulo')
    Editar Usuario
@endsection
@section('contenido')
    <div class="flex justify-center">
        <form action="{{ route('users.update', $users->id) }}" method="POST" class="bg-neutral-100 w-1/2 p-4 rounded-md">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $users->id }}">
            <div class="mb-3">
                <label for="name" class="block font-bold text-gray-500 uppercase">
                    Nombre
                </label>
                <input id="name" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="name" name="name" value="{{ $users->name }}" placeholder="Nombre" >
                @error('name')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="permiso" class="block font-bold text-gray-500 uppercase">
                    Permisos
                </label>
                <select name="permiso" required>
                    @foreach($permisos as $permiso)
                        <option value="{{ $permiso->id_permiso }}">{{ $permiso->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">Guardar cambios</button>
        </form>
    </div>
@endsection
