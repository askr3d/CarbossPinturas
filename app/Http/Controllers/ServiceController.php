<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showServicios()
    {
        $services = Servicio::all();
        return view('admin.service.servicios', compact('services'));
    }

    public function edit($id)
    {
        $service = Servicio::where('id_servicio', $id)->firstOrFail();
        return view('admin.service.edit', compact('service'));
    }

    public function destroy($id)
    {
        $serviciodelete = Servicio::where('id_servicio', $id)->firstOrFail();
        $serviciodelete->delete();

        return redirect()->route('servicios')->with('success', 'Producto eliminado exitosamente.');
    }

    public function update(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'id_servicio' => 'required|numeric',
        'nombre' => 'required|string|max:30|',
        'costo_por_m2' => 'required|numeric'
    ]);

    $id_servicio = $request->input('id_servicio');

    // Obtener el producto por su id_producto
    $service = Servicio::where('id_servicio', $id_servicio)->first();

    if ($service) {
        // Actualizar los datos del producto
        $service->nombre = $request->input('nombre');
        $service->costo_por_m2 = $request->input('costo_por_m2');
        $service->save();

        return redirect()->route('servicios')->with('success', 'Producto actualizado exitosamente.');
    } else {
        return redirect()->route('servicios')->with('error', 'Producto no encontrado.');
    }
}

public function add(Request $request)
    {
    // Validar los datos del formulario

    $request->validate([

        'nombre' => 'required|unique:servicios|string|max:30',
        'costo_por_m2' => 'required|numeric',

    ]);

    // Crear un nuevo servicio
    $service = new Servicio();
    $service->nombre = $request->input('nombre');
    $service->costo_por_m2 = $request->input('costo_por_m2');
    $service->save();

    return redirect()->route('servicios')->with('success', 'Producto agregado exitosamente.');
    }

    public function showAddForm()
    {
        return view('admin.service.add');
    }
}
