<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $cantidadCarrito = count(session()->get('carrito', []));

        return view('index', ['cantidadCarrito'=> $cantidadCarrito]);
    }
}
