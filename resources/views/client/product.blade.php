@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')
        <div class="bg-white rounded-lg w-3/4 mx-auto border border-gray-300 shadow-md flex flex-col md:justify-around md:flex-row p-8">
            <div>
                <img class="object-cover w-80 h-96 rounded-lg" src="{{ asset($product->imagen) }}" alt="{{$product->nombre}}">
            </div>
            <div class="bg-neutral-50 w-1/2 border border-gray-200 p-5 rounded flex flex-col justify-between">
                <div>
                    <p class="font-bold text-3xl">{{ $product->nombre }}</p>
                    <p class="card-text">Existencia: <span class="font-bold">{{ $product->existencia }}</span></p>
                    <p class="font-bold text-3xl mb-5">${{ $product->precio }}</p>
                </div>

                <p class="text-neutral-700 font-light">{{ $product->descripcion }}</p>

                <form class="flex flex-col" action="{{ route('client.product.add') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id_producto" name="id_producto" value="{{$product->id_producto}}">

                    <div class="flex gap-2 mb-4 items-center">
                        <label class="font-bold text-neutral-600 text-2xl">Cantidad:</label>
                        <input class="w-12 border border-neutral-400 rounded-md text-center" id="cantidad" type="number" name="cantidad" value="1" placeholder="Cantidad" min="1">
                    </div>

                    <button class="bg-green-500 hover:bg-green-600 transition-colors rounded-md flex justify-center items-center gap-2 text-white p-2" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        <span class="text-xl font-bold">
                            Agregar
                        </span>
                    </button>
                </form>
            </div>
        </div>

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
