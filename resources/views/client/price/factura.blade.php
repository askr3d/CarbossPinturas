<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            width: max-content;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-body {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }
        .invoice-servicio {
            margin-top: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="invoice">
        <div class="invoice-header">
            <h1>Factura {{$orden->nombre}}</h1>
        </div>

        <div class="invoice-body">
            <p><strong>Fecha:</strong> {{ $orden->updated_at }}</p>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>IVA</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordenConProductos as $product)
                    <tr>
                        <td>{{ $product->producto->nombre }}</td>
                        <td>{{ $product->cantidad }} pzs</td>
                        <td>${{ $product->producto->precio }}</td>
                        <td>${{number_format( $product->precio * 0.15 ,2)}}</td>
                        <td>${{ $product->precio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="invoice-servicio">
            <p><strong>Servicio: </strong>${{ $ordenConServicios[0]->precio}}</p>
            <p>{{ $ordenConServicios[0]->servicio->nombre}} {{ $ordenConServicios[0]->metros}} mts² x ${{ $ordenConServicios[0]->servicio->costo_por_m2}}</p>
        </div>

        <div class="invoice-total">
            <p><strong>Subtotal: </strong> ${{ number_format(($orden->precio_total) - ($orden->precio_total * 0.15), 2) }}</p>
            <p><strong>Impuestos: </strong> ${{number_format(($orden->precio_total) * 0.15, 2)}}</p>
            <p><strong>Precio Total: </strong> ${{ $orden->precio_total }}</p>
        </div>
    </div>

</body>
</html>
