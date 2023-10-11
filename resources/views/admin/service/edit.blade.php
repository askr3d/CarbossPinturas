@extends('layouts.admin.app')
@section('titulo')
    Editar Servicio
@endsection
@section('contenido')
    <div class="flex justify-center">
        <form action="{{ route('service.update', $service->id_servicios) }}" method="POST" class="bg-neutral-100 w-1/2 p-4 rounded-md">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_servicio" value="{{ $service->id_servicio }}">
            <div class="mb-3">
                <label for="nombre" class="block font-bold text-gray-500 uppercase">
                    Nombre
                </label>
                <input type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="nombre" name="nombre" value="{{ $service->nombre }}">
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
                <input type="text" class="p-3 w-full block border border-gray-500 rounded-lg" id="precio" name="costo_por_m2" value="{{ $service->costo_por_m2 }}">
                @error('precio')
                    <div style="color: red;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 p-2 rounded-md block w-full text-white font-bold transition-colors">Guardar cambios</button>
        </form>
    </div>
@endsection