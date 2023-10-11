@extends('layouts.admin.app')
@section('titulo')
    Agregar Servicio
@endsection
@section('contenido')
    <div class="flex justify-center">
        <form action="add" method="POST" class="bg-neutral-100 w-1/2 p-4 rounded-md">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="block font-bold text-gray-500 uppercase">
                        Nombre
                    </label>
                    <input id="nombre" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="nombre" name="nombre" value="{{ old('name') }}" placeholder="Nombre" >
                    @error('nombre')
                        <div style="color: red;">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Costo" class="block font-bold text-gray-500 uppercase">
                        Costo por metro cuadrado
                    </label>
                    <input id="Costo" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="precio" name="costo_por_m2" value="{{ old('costo_por_m2') }}" placeholder="Costo por m2">
                    @error('costo_por_m2')
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
    </div>
@endsection