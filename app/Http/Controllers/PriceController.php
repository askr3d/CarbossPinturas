<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Producto;
use App\Models\ProductosEnOrden;
use App\Models\Servicio;
use App\Models\ServiciosEnOrden;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


use function Ramsey\Uuid\v1;

class PriceController extends Controller
{
    function ShowPrice(){

        $user = Auth::user();
        $ordenes = $user->orders;
        $orden_seleccionada = session()->get('orden_seleccionada');
        return view('client.price.price', compact('ordenes', 'orden_seleccionada'));
    }

    function ShowAddPrice(){
        $orden_seleccionada = session()->get('orden_seleccionada');
        return view('client.price.add', compact('orden_seleccionada'));
    }
    function ShowDetailsOrder(){
        $orden_session = session('orden_seleccionada');
        if($orden_session){
            $orden_seleccionada = orden::where('id_orden', $orden_session->id_orden)->first();
            $servicios = Servicio::all();

            if($orden_seleccionada){
                $ordenConProductos = ProductosEnOrden::where('fk_orden', $orden_seleccionada->id_orden)->with('producto')->get();
            }else
                return view('client.price.details', compact('orden_seleccionada'));

            return view('client.price.details', compact('orden_seleccionada','ordenConProductos', 'servicios' ));
        }else
        return redirect()->route('client.price');
    }

    function create_orden(Request $request){

        $user = Auth::user();
        $request->merge(['status'=>'Pendiente', 'user' => $user->id, 'precio_total' => '0.00']);
        $request->validate([
            'nombre'=> 'required',
            'status'=> 'required',
            'user' => 'required',
            'precio_total' => 'required',
        ]);

        $orden = new Orden([]);
        $orden->nombre = $request->input('nombre');
        $orden->status = $request->input('status');
        $orden->fk_user = $request->input('user');
        $orden->precio_total = $request->input('precio_total');
        $orden->save();

        $orden_seleccionada = $orden;
        session(['orden_seleccionada' => $orden]);

        return redirect()->route('client.index')->with( 'id_orden', $orden_seleccionada->id_orden);
    }
    public function destroy_producto($fk_producto)
    {

        $orden_seleccionada = Session()->get('orden_seleccionada');
        if($orden_seleccionada){
            $orden = Orden::where('id_orden', $orden_seleccionada->id_orden)->first();
            $productosdelete = ProductosEnOrden::where('fk_producto', $fk_producto) ->where('fk_orden', $orden->id_orden)->firstOrFail();
            $producto = Producto::where('id_producto', $fk_producto)->first();

            $orden->update([
                'precio_total' => $orden->precio_total - $producto->precio * $productosdelete->cantidad,
            ]);
            $productosdelete ->delete();

            return Redirect::action([PriceController::class, 'ShowDetailsOrder']);
        }else
            return redirect()->route('client.price');

    }
    public function destroy_orden($id_orden)
    {
        $ordendelete = Orden::where('id_orden', $id_orden)->firstOrFail();
        if($ordendelete && Session()->has('orden_seleccionada'))
            Session()->forget('orden_seleccionada');

        $ordendelete->delete();

        return Redirect::action([PriceController::class, 'ShowPrice']);
    }

    public function finalize_orden(Request $request)
    {
        $orden_seleccionada= session()->get('orden_seleccionada');
        if($orden_seleccionada){
            $request->validate([
                'servicio'=> 'required',
                'metros'=> 'required|min:1',
            ]);
            $servicio = Servicio::where('id_servicio', $request->input("servicio"))->firstOrFail();
            $orden = Orden::where('id_orden',$orden_seleccionada->id_orden)->first();
            $ExisteServicio = ServiciosEnOrden::where('fk_orden',$orden_seleccionada->id_orden)->first();
            $monto = $servicio->costo_por_m2 * $request->input("metros");
            if($orden_seleccionada)
                if($ExisteServicio){
                    return Redirect()->back();
                }
            $ServiceToOrden = new ServiciosEnOrden();
            $ServiceToOrden->precio = $monto;
            $ServiceToOrden->metros = $request->input("metros");
            $ServiceToOrden->fk_orden = $orden_seleccionada->id_orden;
            $ServiceToOrden->fk_servicio = $request->input("servicio");
            $ServiceToOrden->save();

            $orden->update([
                'status' => "Finalizada",
                'precio_total' => $orden->precio_total + $monto,
            ]);

            Session()->forget('orden_seleccionada');

            return redirect()->route('client.price.factura', ['id_orden' => $orden->id_orden]);
        }else
            return redirect()->route('client.price');
    }

    public function GenerarFactura($id_orden)
    {
        $orden = Orden::where('id_orden',$id_orden)->first();
        if($orden)
            $ordenConProductos = ProductosEnOrden::where('fk_orden', $orden->id_orden)->with('producto')->get();
            $ordenConServicios = ServiciosEnOrden::where('fk_orden', $orden->id_orden)->with('servicio')->get();

        $pdf = PDF::loadView('client/price/factura', compact('orden', 'ordenConProductos', 'ordenConServicios'));

        // // Genera el PDF y devuelve una respuesta para descargarlo
        return $pdf->stream('factura.pdf');
    }
}
