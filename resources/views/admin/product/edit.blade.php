@extends('layouts.admin.app')
@section('titulo')
    Editar Producto
@endsection
@section('contenido')
    <div class="flex justify-start">
        <form action="{{ route('product.update', $product->id_producto) }}" method="POST" class="bg-neutral-100 w-1/2 p-4 rounded-md">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_producto" value="{{ $product->id_producto }}">
            <div class="mb-3">
                <label for="nombre" class="block font-bold text-gray-500 uppercase">
                    Nombre
                </label>
                <input type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="nombre" name="nombre" value="{{ $product->nombre }}">
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
                <input type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="precio" name="precio" value="{{ $product->precio }}">
                @error('precio')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descripcion" class="block font-bold text-gray-500 uppercase">
                    Descripción
                </label>
                <textarea class="p-3 w-full block border border-gray-500 rounded-lg" id="descripcion" name="descripcion">{{ $product->descripcion }}</textarea>
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
                <input type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="existencia" name="existencia" value="{{ $product->existencia }}">
                @error('existencia')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">Guardar cambios</button>
        </form>
    </div>
@endsection