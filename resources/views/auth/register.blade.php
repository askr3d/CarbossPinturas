@extends('layouts.app')
@section('titulo')
    Crear cuenta
@endsection

@section('contenido')
    <div class="flex flex-col gap-3 md:flex-row md:gap-10 md:items-center justify-center">
        <div class="md:w-6/12 md:flex md:justify-end">
            <img class="rounded-md" src="{{ asset('img/register.webp') }}" alt="Imagen de registro">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="mb-2 block text-gray-500 uppercase font-bold">
                        Nombre
                    </label>
                    <input id="name" class="border p-3 rounded-lg w-full" type="text" name="name" placeholder="Nombre" value="{{ old('name') }}">
                    @error('name')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="mb-2 block text-gray-500 uppercase font-bold">
                        Email
                    </label>
                    <input id="email" class="border p-3 rounded-lg w-full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="mb-2 uppercase block text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" class="border p-3 rounded-lg w-full" type="password" name="password" placeholder="Contraseña" >
                    @error('password')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="mb-2 uppercase block text-gray-500 font-bold w-full">
                        Confirmar Password
                    </label>
                    <input id="password_confirmation" class="border p-3 rounded-lg w-full" type="password" name="password_confirmation" placeholder="Confirmar contraseña">
                    @error('password_confirmation')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" class="bg-sky-600 hover:bg-sky-700 w-full p-2 text-white font-bold rounded-lg cursor-pointer uppercase transition-colors" name="Registrarse">
            </form>
        <div>
    </div>
@endsection