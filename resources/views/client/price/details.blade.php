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
    @if(isset($ordenConProductos) and $ordenConProductos->count() > 0)
    <div class="flex flex-col md:flex-row-reverse justify-around gap-3">
        <div class="bg-white border-2 border-neutral-300 shadow-md rounded-lg h-fit p-5 flex flex-col w-2/6">

            <p class="font-bold text-3xl text-neutral-700 uppercase pl-2 mb-2">{{$orden_seleccionada->nombre}}</p>
            <form class="text-gray-500 font-semibold text-lg flex flex-col mb-0" action="{{route('client.price.finalize')}}" method="POST">
                @csrf
                <div class="mb-2">
                    <label class="italic">Servicio</label>
                    <select class="text-base border border-gray-200 h-6 rounded-md" name="servicio" id="servicioSelect" onchange="updatePrice()" required>
                        <option class="text-md italic" disabled selected>--Seleccionar--</option>
                        @foreach($servicios as $servicio)
                            <option value="{{$servicio->id_servicio}}">{{$servicio->nombre}}</option>
                        @endforeach
                    </select>
                    
                    <p class="text-sm pl-4">
                        Costo por MT2 <span class="font-bold text-base text-neutral-700">$<span id="precio">0.00</span></span>
                    </p>
                </div>

                <div class="mb-2 flex gap-2 items-center">
                    <label>Metros a pintar: </label>
                    <input class="w-10 border border-gray-200 text-base h-6 rounded-md text-center" type="number" name="metros" id="metros" placeholder="Metros a pintar" required min="1"  oninput="updatePrice()" value="1">
                </div>
    
                <div class="flex justify-between">
                    <p>Impuesto: </p><span class="font-bold text-neutral-700" id="impuesto"></span>
                </div>
                <div class="flex justify-between">
                    <p>Subtotal: </p><span class="font-bold text-neutral-700" id="subtotal"></span>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-600 font-bold text-xl">Precio Total: </p><span class="font-bold text-neutral-700" id="precioTotal"></span>
                </div>

                <input type="submit" class="mt-3 border border-gray-300 bg-sky-500 hover:bg-sky-600 transition-colors text-white font-bold p-2 rounded-md" value ="Finalizar y descargar">
            </form>
        </div>
        <div class="grid grid-cols-3 gap-4 h-screen overflow-y-auto pr-2 w-4/5">
            @foreach ($ordenConProductos as $products)
                <div class="bg-white rounded-md">
                    <div class="card">
                        <div class="card-body">
                            <img class="object-cover w-full h-48 rounded-t-md" src="{{ asset($products->producto->imagen) }}" alt="{{$products->producto->nombre}}">
                            <div class="p-4">
                                <p class="text-gray-800 font-semibold">{{ $products->producto->nombre }}</p>
                                <p class="text-2xl font-bold text-neutral-700">${{ $products->precio }}</p>
                                <p class="text-gray-600 font-semibold mt-2">Cantidad: <span class="text-gray-800 font-bold">{{ $products->cantidad }} pzs</span></p>
                            </div>
                        </div>
                        <form class="mb-0" action="{{route('client.product.destroy', $products->producto->id_producto)}}" method="POST"">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 w-full py-2 px-4 rounded-b-md text-white font-bold flex justify-center gap-1" onclick="return confirm('¿Estás seguro que quieres eliminar este producto?')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    @else
            <p>No existen productos en la orden</p>
    @endif
@endsection


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

