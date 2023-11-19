<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;

class ClienteController extends Controller
{
    public function ShowCatalogo(){

        $cantidadCarrito = count(session()->get('carrito', []));
        $orden_seleccionada = session()->get('orden_seleccionada');

        $products = Producto::all();
        return view('client.index', compact('products','cantidadCarrito', 'orden_seleccionada'));


    }
    public function ShowCatalogoConId(Request $request){


        $cantidadCarrito = count(session()->get('carrito', []));
        $products = Producto::all();
        $orden_seleccionada = Orden::where('id_orden', $request->input("id_orden"))->firstOrFail();

        if ($orden_seleccionada) {
            session(['orden_seleccionada' => $orden_seleccionada]);
            return view('client.index', compact('products', 'cantidadCarrito','orden_seleccionada'));

        }else
            return redirect()->back()->with('error', 'La orden seleccionada no existe.');
    }
    public function ShowProduct($id_producto){

        $product = Producto::where('id_producto', $id_producto)->firstOrFail();
        $orden_seleccionada= session()->get('orden_seleccionada');

        return view('client.product', compact('product', 'orden_seleccionada'));
    }

    public function ShowProductIdOrder($id_orden, $id_producto){

        $product = Producto::where('id_producto', $id_producto)->firstOrFail();
        $orden = Orden::where('id_orden', $id_orden)->firstOrFail();
        return view('client.product', compact('product', 'orden'));
    }
}
