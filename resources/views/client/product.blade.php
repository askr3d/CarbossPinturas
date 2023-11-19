@extends('layouts.app')

@section('titulo')
{{ $product->nombre }}
@endsection

@section('contenido')
    <img class="card-img-top" src="{{ asset($product->imagen) }}" alt="{{$product->nombre}}">
        <p class="card-text">Descripcion: {{ $product->descripcion }}</p>
        <p class="card-text">Existencias: {{ $product->existencia }}</p>
        <p class="card-text">Precio: ${{ $product->precio }}</p>

        <form action="{{ route('client.product.add') }}" method="POST">
            @csrf
            <label>cantidad</label>
            <input type="hidden" id="id_producto" name="id_producto" value="{{$product->id_producto}}">
            <input id="cantidad" type="number" name="cantidad" value="1" placeholder="Cantidad" min="1">
            <button type="submit">Agregar</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            // Verifica si hay un mensaje de error en la sesión
            var errorMessage = "{{ session('error') }}";

            // Muestra una alerta si hay un mensaje de error
            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });
            }
        </script>
@endsection
