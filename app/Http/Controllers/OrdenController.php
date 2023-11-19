<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Producto;
use App\Models\ProductosEnOrden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrdenController extends Controller
{
    function AddProductToOrden(Request $request){

        $product = Producto::where('id_producto', $request->input("id_producto"))->firstOrFail();
        $orden_seleccionada= session()->get('orden_seleccionada');


        if($orden_seleccionada){
            $orden = Orden::where('id_orden',$orden_seleccionada->id_orden)->first();
            $monto = $product->precio * $request->input('cantidad');
            $ProductoToOrdenExistente = ProductosEnOrden::where('fk_producto', $product->id_producto)->where('fk_orden', $orden_seleccionada->id_orden)->first();


            if($ProductoToOrdenExistente){
                    $ProductoToOrdenExistente->update([
                        'cantidad' => $ProductoToOrdenExistente->cantidad + $request->input('cantidad'),
                        'precio' => $ProductoToOrdenExistente->precio + $monto,
                    ]);
                    $orden->update([
                        'precio_total' => $orden->precio_total + $monto,
                    ]);
            }else{
                $ProductoToOrden = new ProductosEnOrden();
                $ProductoToOrden->cantidad = $request->input('cantidad');
                $ProductoToOrden->precio = $monto;
                $ProductoToOrden->fk_orden = $orden_seleccionada->id_orden;
                $ProductoToOrden->fk_producto = $request->input("id_producto");
                $ProductoToOrden->save();

                $orden->update([
                    'precio_total' => $orden->precio_total + $monto,
                ]);
            }
            return Redirect::action([PriceController::class, 'ShowDetailsOrder']);
        }else{
            Session()->flash('error', 'Necesitas seleccionar una orden para agregar productos.');

            // Redirige de nuevo a la misma página
            return redirect()->route('client.product',$request->input("id_producto"));
        }

    }
}
