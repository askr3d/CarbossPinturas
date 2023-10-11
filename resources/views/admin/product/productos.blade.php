@extends('layouts.admin.app')

@section('titulo')
    Productos
@endsection
@section('contenido')
    <p class="text-center font-mono text-xs">La entidad productos</p>
    <div><a href="add">Agregar</a></div>
    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id_producto }}</td>
                        <td>{{ $product->nombre }}</td>
                        <td>{{ $product->descripcion }}</td>
                        <td>{{ $product->precio }}</td>
                        <td>{{ $product->existencia }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id_producto) }}" class="btn btn-primary">Editar</a>

                            <form action="{{ route('product.destroy', $product->id_producto) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro que quieres eliminar este producto?')">Eliminar</button>
                            </form>
                            <br>
                        </td>

                    </tr>
                @endforeach
@endsection
