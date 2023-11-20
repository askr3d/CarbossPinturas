@extends('layouts.admin.app')
@section('titulo')
    Editar Producto
@endsection
@section('contenido')
    <div class="flex justify-start">
        <form action="{{ route('product.update', $product->id_producto) }}" method="POST" enctype="multipart/form-data" class="bg-neutral-100 w-1/2 p-4 rounded-md">
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
            <div class="mb-3">
                <label for="imagen" class="block font-bold text-gray-500 uppercase">
                    Imagen
                </label>
                <input id="imagen" type="file" class="p-3 w-full block border border-gray-500 rounded-lg" id="imagen" name="imagen" value="{{ old('imagen') }}">
                @error('imagen')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">Guardar cambios</button>
        </form>
            <div>
                <img id="imagePreview" src="" alt="Vista previa de la imagen">
            </div>
    </div>
    <script>
        // Obtener referencias a los elementos del DOM
        const inputFile = document.getElementById('imagen');
        const imagePreview = document.getElementById('imagePreview');

        // Agregar un evento de cambio al campo de carga de archivos
        inputFile.addEventListener('change', function () {
          // Verificar si se ha seleccionado un archivo
          if (inputFile.files && inputFile.files[0]) {
            // Crear un objeto URL para la imagen seleccionada
            const imageUrl = URL.createObjectURL(inputFile.files[0]);

            // Establecer la fuente de la imagen en el elemento img
            imagePreview.src = imageUrl;
          }else {
                // Si no se selecciona un archivo, borrar la imagen
                imagePreview.src = "";
            }
        });
      </script>
@endsection
