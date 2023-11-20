@extends('layouts.app')

@section('titulo')
    Crear Orden
@endsection

@section('contenido')
    <form action="add" method="POST" class="bg-neutral-100 mx-auto w-1/2 p-4 rounded-md">
        @csrf
        <div class="mb-3">
            <label for="name" class="block font-bold text-gray-500 uppercase">
                Nombre
            </label>
            <input id="nombre" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre de la orden" >
            @error('nombre')
                <div style="color: red;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit"
        class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">
            Guardar
        </button>
    </form>
@endsection
