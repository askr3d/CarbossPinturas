@extends('layouts.app')

@section('titulo')
    Detalles de Orden
    @if (isset($orden_seleccionada))
        <br>{{ $orden_seleccionada->nombre }}
    @else
        <br>No seleccionada
    @endif
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
    @if(isset($ordenConProductos))
    <p>{{$orden_seleccionada->nombre}}</p>
    <p >
        Servicio
    </p>
    <form action="{{route('client.price.finalize')}}" method="POST">
        @csrf
        <select name="servicio" id="servicioSelect" onchange="updatePrice()" required>
            @foreach($servicios as $servicio)
                <option value="{{$servicio->id_servicio}}">{{$servicio->nombre}}</option>
            @endforeach
        </select>
        <label>Metros a pintar:</label>
        <input type="number" name="metros" id="metros" placeholder="Metros a pintar" required min="1"  oninput="updatePrice()" value="1">

        <p>Costo por mt2: $<span id="precio">0.00</span></p>
        <p>Impuesto: <span id="impuesto"></span></p>
        <p>Subtotal: <span id="subtotal"></span></p>
        <p>Precio Total: <span id="precioTotal"></span></p>
        <input type="submit" class="border 1" value ="Finalizar y descargar">
    </form>


    <script>
        var servicios = @json($servicios);
        var orden = @json($orden_seleccionada);

        var precioTotal = parseFloat(orden.precio_total);
        var impuesto = precioTotal * 0.15;
        var subtotal = precioTotal - impuesto;

        document.getElementById('impuesto').innerText = impuesto.toFixed(2);
        document.getElementById('subtotal').innerText = subtotal.toFixed(2);
        document.getElementById('precioTotal').innerText = precioTotal.toFixed(2);

        // Obtén referencia al select y al elemento de costo
        var selectsProductos = document.querySelectorAll('servicios');
        var costosElementos = document.querySelectorAll('costo');

        function updatePrice() {
            var servicios = @json($servicios);
            var orden = @json($orden_seleccionada);

            var servicioSelect = document.getElementById('servicioSelect');
            var precioSpan = document.getElementById('precio');
            var metrosInput = document.getElementById('metros');

            // Obtener el precio según la opción seleccionada
            var servicioId = servicioSelect.value;
            var metros = parseInt(metrosInput.value) || 0;
            var precio = servicios.find(servicio => servicio.id_servicio == servicioId)?.costo_por_m2 * metros|| 0;

            // var precioTotal = parseFloat(document.getElementById('precioTotal').innerText) + precio;
            var precioTotal = parseFloat(orden.precio_total) + precio;
            var impuesto = precioTotal * 0.15;
            var subtotal = precioTotal - impuesto;
            // Actualizar el precio en la vista
            precioSpan.innerText = precio.toFixed(2).replace(',', '.');
            document.getElementById('impuesto').innerText = impuesto.toFixed(2);
            document.getElementById('subtotal').innerText = subtotal.toFixed(2);
            document.getElementById('precioTotal').innerText = precioTotal.toFixed(2);

        }

    // Llamar a la función para inicializar el precio
    updatePrice();
    </script>
            @foreach ($ordenConProductos as $products)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $products->producto->nombre }}</p>
                            <img class="card-img-top" src="{{ asset($products->producto->imagen) }}" alt="{{$products->producto->nombre}}">
                            <p>cantidad: {{ $products->cantidad }} pzs</p>
                            <p>Precio: ${{ $products->precio }}</p>
                        </div>
                        <form action="{{route('client.product.destroy', $products->producto->id_producto)}}" method="POST"">
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
            @endforeach
    @else
            <p>No existen productos en la orden</p>
    @endif
@endsection
<script>
    function confirmarEliminacion() {
        // Utiliza la función confirm para mostrar un cuadro de confirmación
        var confirmacion = confirm('¿Estás seguro de que deseas eliminar este producto?');

        // Si el usuario hace clic en "Aceptar" en el cuadro de confirmación
        if (confirmacion) {
            // Envía el formulario de eliminación
            document.getElementById('eliminarForm').submit();
        } else {
            // Si el usuario hace clic en "Cancelar", no hagas nada
        }
    }
</script>

