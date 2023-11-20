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
        <div class="grid md:grid-cols-5 gap-4">
            @foreach($products as $product)
                <div class="rounded-md bg-white border-2 border-neutral-200 shadow-sm hover:shadow-xl transition-shadow">
                    @if(isset($orden))
                        <a href="{{ route('client.productidorder', ['id_orden'=> $orden->id_orden, 'id_producto' => $product->id_producto])}}">
                    @else
                        <a href="{{ route('client.product', ['id_producto' => $product->id_producto])}}">
                    @endif
                        <div class="card">
                            <!-- Muestra la imagen del producto -->
                            <img class="object-cover w-full h-48 rounded-t-md" src="{{ asset($product->imagen) }}" alt="{{$product->nombre}}">
                            <div class="p-4">
                                <h5 class="text-gray-800 font-semibold">{{ $product->nombre }}</h5>
                                {{-- <p class="card-text">Descripcion: {{ $product->descripcion }}</p>
                                <p class="card-text">Existencias: {{ $product->existencia }}</p> --}}
                                <p class="text-2xl"><span class="font-bold">${{ $product->precio }}</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
