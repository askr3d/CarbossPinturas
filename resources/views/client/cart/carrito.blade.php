@extends('layouts.app')

@section('titulo')
    Carrito
@endsection

@section('contenido')
<style>
    /* Estilos para las imágenes */
    .card-img-top {
        width: 200px;
        height: 200px; /* Establece la altura fija */
        object-fit: cover; /* Controla cómo se ajusta la imagen dentro del espacio asignado */
    }
</style>
    @if(!empty($carrito))
        @foreach ($carrito as $products)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        @if(isset($products['imagen']))
                            <img class="card-img-top" src="{{ asset($products['imagen']) }}" alt="{{$products['nombre']}}">
                        @else
                            <p>No se encontró la imagen</p>
                        @endif

                        <h2>{{ $products['nombre'] }}</h2>
                        <p>Precio: ${{ $products['precio'] }}</p>
                        <label>Cantidad: </label><input type="number" value="{{$products['cantidad']}}" min="1">
                        <a href="{{ route('client.cart.destroy', $products['id']) }}">Eliminar del carrito</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
            <p>No hay productos</p>
    @endif
@endsection
