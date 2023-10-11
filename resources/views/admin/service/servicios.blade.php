@extends('layouts.admin.app')

@section('titulo')
    Servicio
@endsection
@section('contenido')
    <p class="text-center font-mono text-xs">La entidad servicios</p>
    <div><a href="add">Agregar</a></div>
    @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id_servicio }}</td>
                        <td>{{ $service->nombre }}</td>
                        <td>{{ $service->costo_por_m2 }}</td>
                        <td>
                            <a href="{{ route('service.edit', $service->id_servicio) }}" class="btn btn-primary">Editar</a>

                            <form action="{{ route('service.destroy', $service->id_servicio) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que quieres eliminar este producto?')">Eliminar</button>
                            </form>
                            <br>
                        </td>

                    </tr>
                @endforeach
@endsection
