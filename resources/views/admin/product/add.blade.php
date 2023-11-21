@extends('layouts.admin.app')
@section('titulo')
    Agregar Producto
@endsection
@section('contenido')
    <div class="grid grid-cols-2 gap-2">
        <form action="add" method="POST" enctype="multipart/form-data" class="bg-neutral-100 p-4 rounded-md">
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

            <button type="submit" class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">
                Guardar
            </button>
        </form>
        <div class="flex flex-col justify-star items-center">
            <p class="text-3xl mb-2 font-bold">Vista previa</p>
            <img class="object-cover h-80 w-80 rounded-lg" id="imagePreview">
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
