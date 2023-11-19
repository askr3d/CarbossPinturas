@extends('layouts.app')

@section('titulo')
    Cotizaciones
@endsection
<style>
    /* Estilos para las imágenes */
    .card-img-top {
        width: 200px;
        height: 200px; /* Establece la altura fija */
        object-fit: cover; /* Controla cómo se ajusta la imagen dentro del espacio asignado */
    }
</style>
@section('contenido')
@if(!$ordenes->isEmpty())
    <div class="container">
        <div class="row">
            @foreach($ordenes as $orden)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $orden->nombre }}</h5>
                            <p class="card-text">status: {{ $orden->status }}</p>
                            <p class="card-text">Precio Total {{ $orden->precio_total }}</p>
                            @if ($orden->status =="Finalizada")
                                <a href="{{route('client.price.factura',  ['id_orden' => $orden->id_orden])}}" class="border">Descargar</a>
                            @endif
                            @if ($orden->status =="Pendiente")
                                <form action="{{route("client.indexid")}}" method="POST">
                                    @csrf
                                    <input type="hidden" id="id_orden" name="id_orden" value="{{$orden->id_orden}}">
                                    <button type="submit" >Seleccionar</button>
                                </form>
                            @endif
                            <form action="{{route('client.price.destroy',$orden->id_orden)}}" method="POST"">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 py-1 px-4 rounded-md text-white font-bold flex gap-1" onclick="return confirm('¿Estás seguro que quieres eliminar este producto?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p>No existen ordenes</p>
@endif
@endsection
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
