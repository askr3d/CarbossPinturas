@extends('layouts.app')

@section('titulo')
    Productos
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
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-3">
                @if(isset($orden))
                    <a href="{{ route('client.productidorder', ['id_orden'=> $orden->id_orden, 'id_producto' => $product->id_producto])}}">
                @else
                    <a href="{{ route('client.product', ['id_producto' => $product->id_producto])}}">
                @endif
                    <div class="card">
                        <!-- Muestra la imagen del producto -->
                        <img class="card-img-top" src="{{ asset($product->imagen) }}" alt="{{$product->nombre}}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nombre }}</h5>
                            <p class="card-text">Descripcion: {{ $product->descripcion }}</p>
                            <p class="card-text">Existencias: {{ $product->existencia }}</p>
                            <p class="card-text">Precio: ${{ $product->precio }}</p>
                            </a>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
