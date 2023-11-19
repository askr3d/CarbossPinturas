@extends('layouts.admin.app')
@section('titulo')
    Agregar Usuario Nuevo
@endsection
@section('contenido')
    <div class="flex justify-center">
        <form action="add" method="POST" class="bg-neutral-100 w-1/2 p-4 rounded-md">
                @csrf
                <div class="mb-3">
                    <label for="name" class="block font-bold text-gray-500 uppercase">
                        Nombre
                    </label>
                    <input id="name" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre" >
                    @error('name')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="block font-bold text-gray-500 uppercase">
                        Email
                    </label>
                    <input id="email" type="email" class="p-3 w-full block border border-gray-500 rounded-lg" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="block font-bold text-gray-500 uppercase">
                        Contraseña
                    </label>
                    <input id="password" type="password" class="p-3 w-full block border border-gray-500 rounded-lg" id="paswword" name="password" placeholder="Contraseña">
                    @error('password')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="block font-bold text-gray-500 uppercase">
                        Confirmar Contraseña
                    </label>
                    <input id="password_confirmation" type="password" class="p-3 w-full block border border-gray-500 rounded-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña">
                    @error('password_confirmation')
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
                <button type="submit"
                class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">
                    Guardar
                </button>
        </form>
    </div>
@endsection
