<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function showProductos()
    {
        $products = Producto::all();
        return view('admin.product.productos', compact('products'));
    }

    public function edit($id)
    {
        $product = Producto::where('id_producto', $id)->firstOrFail();
        return view('admin.product.edit', compact('product'));
    }

    public function destroy($id)
    {
        $productdelete = Producto::where('id_producto', $id)->firstOrFail();

        if (file_exists($productdelete->imagen)) {
            unlink($productdelete->imagen); // Eliminar la imagen del servidor
        }


        $productdelete->delete();

        return redirect()->route('productos')->with('success', 'Producto eliminado exitosamente.');
    }

    public function update(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([
        'id_producto' => 'required|numeric',
        'nombre' => 'required|string|max:30|',
        'precio' => 'required|numeric',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'descripcion' => 'nullable|string|max:50',
        'existencia' => 'required|numeric',
    ]);

    $id_producto = $request->input('id_producto');

    // Obtener el producto por su id_producto
    $product = Producto::where('id_producto', $id_producto)->first();

    if ($product) {
        // Actualizar los datos del producto
        $product->nombre = $request->input('nombre');
        $product->precio = $request->input('precio');
        $product->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $destinationPath = 'img/products/';
            $imagenNombre = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($destinationPath, $imagenNombre);

            $imagen_old = $product->imagen;
            $product->imagen = $destinationPath . $imagenNombre;

            if (file_exists(public_path($imagen_old))) {
                unlink(public_path($imagen_old));
            }
        }

        $product->existencia = $request->input('existencia');
        $product->save();

        return redirect()->route('productos')->with('success', 'Producto actualizado exitosamente.');
    } else {
        return redirect()->route('productos')->with('error', 'Producto no encontrado.');
    }
}

    public function add(Request $request)
    {
    // Validar los datos del formulario
    $request->validate([

        'nombre' => 'required|unique:productos|string|max:30',
        'precio' => 'required|numeric',
        'imagen' => 'required|unique:productos|max:255|image|mimes:jpeg,png,jpg,gif|max:2048',
        'descripcion' => 'nullable|string|max:50',
        'existencia' => 'required|numeric',

    ]);

        // Crear un nuevo producto
    $product = new Producto();

    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $destinationPath = 'img/products/';
        $imagenNombre = time() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move($destinationPath, $imagenNombre);

        $product->imagen = $destinationPath . $imagenNombre;
    }

    $product->nombre = $request->input('nombre');
    $product->precio = $request->input('precio');
    $product->descripcion = $request->input('descripcion');
    $product->existencia = $request->input('existencia');
    $product->save();

    return redirect()->route('productos')->with('success', 'Producto agregado exitosamente.');
    }

    public function showAddForm()
    {
        return view('admin.product.add');
    }
}
