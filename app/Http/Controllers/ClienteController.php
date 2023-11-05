<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;

class ClienteController extends Controller
{
    public function catalogo(){
        $cantidadCarrito = count(session()->get('carrito', []));
        $products = Producto::all();

        return view('client.index', ['cantidadCarrito'=> $cantidadCarrito], compact('products'));
    }
}
