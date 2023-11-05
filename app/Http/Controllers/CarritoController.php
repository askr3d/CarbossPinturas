<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $cantidadCarrito = count($carrito);

        return view('client.cart.carrito', ['carrito' => $carrito,'cantidadCarrito' => $cantidadCarrito]);
    }

    public function add($id)
    {
        $producto = Producto::find($id);

        $carrito = session()->get('carrito', []);

        // Agregar el producto al carrito
        $carrito[$id] = [
            'id' => $producto->id_producto,
            'nombre' => $producto->nombre,
            'precio' => $producto->precio,
            'imagen' => $producto->imagen,
            'cantidad' => 1,
            // Otros detalles del producto que desees guardar
        ];

        session(['carrito' => $carrito]);

        return redirect()->route('client.cart.carrito', );
    }

    public function destroy($id)
    {
        $carrito = session()->get('carrito', []);

        // Eliminar el producto del carrito
        unset($carrito[$id]);

        session(['carrito' => $carrito]);

        return redirect()->route('client.cart.carrito');
    }
}
