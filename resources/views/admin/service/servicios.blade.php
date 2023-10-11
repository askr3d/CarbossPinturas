@extends('layouts.admin.app')

@section('titulo')
    Servicio
@endsection
@section('contenido')
    <p class="text-center font-mono text-xs">La entidad servicios</p>
    <div class="flex flex-col">
        <div class="pt-10 pl-10">
            <a href="add" class="bg-green-500 hover:bg-green-600 text-sm p-2 px-5 font-bold border border-gray-500 rounded-lg text-white shadow-md flex gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>                  
                Agregar
            </a>
        </div>
        <div class="pt-8 pl-10">
            <table id="tablaServicios" class="display cell-border border shadow-lg border-gray-400 text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Costo por mt2</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id_servicio }}</td>
                            <td>{{ $service->nombre }}</td>
                            <td>{{ $service->costo_por_m2 }}</td>
                            <td>
                                <div class="flex justify-around">
                                    <a href="{{ route('service.edit', $service->id_servicio) }}" class="bg-sky-600 hover:bg-sky-700 py-1 px-4 rounded-md text-white font-bold flex gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                          </svg>

                                        Editar
                                    </a>
            
                                    <form action="{{ route('service.destroy', $service->id_servicio) }}" method="POST"">
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
                            </td>
        
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Costo por mt2</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
