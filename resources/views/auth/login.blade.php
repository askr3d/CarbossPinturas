@extends('layouts.app')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="flex flex-col gap-3 md:flex-row md:gap-10 md:items-center justify-center">
        <div class="md:w-6/12 md:flex md:justify-end">
            <img class="rounded-md md:w-3/4" src="{{ asset('img/login.jpg') }}" alt="Imagen de Login">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success" style="color:green">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" class="border p-3 w-full rounded-lg" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" class="border p-3 w-full rounded-lg" type="password" name="password" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg" name="Registrarse">
            </form>
        </div>
    <div>
@endsection
