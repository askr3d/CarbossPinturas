@extends('layouts.admin.app')
@section('titulo')
    Agregar Producto
@endsection
@section('contenido')
    <div class="flex justify-start">
        <form action="add" method="POST" class="bg-neutral-100 p-4 rounded-md w-1/2">
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
                <label for="precio" class="block font-bold text-gray-500 uppercase">
                    Precio
                </label>
                <input id="precio" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="precio" name="precio" value="{{ old('precio') }}" placeholder="Precio">
                @error('precio')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descripcion" class="block font-bold text-gray-500 uppercase">
                    Descripcion
                </label>
                <textarea class="p-3 w-full block border border-gray-500 rounded-lg" id="descripcion" name="descripcion" placeholder="Descripcion del producto">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="existencia" class="block font-bold text-gray-500 uppercase">
                    Existencia
                </label>
                <input id="existencia" type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="existencia" name="existencia" value="{{ old('existencia') }}" placeholder="Existencia">
                @error('existencia')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">
                Guardar
            </button>
        </form>
    </div>
@endsection