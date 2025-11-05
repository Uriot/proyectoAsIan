<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura Kemik</title>
</head>

<body style="font-family: Arial, sans-serif; font-size: 12px; color: #333; margin: 20px;">

    <!-- Encabezado -->
    <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
        <tr>
            <td width="50%" style="vertical-align: top;">
                <img src="http://127.0.0.1:8000/images/logo.png" width="150" alt="Tecno Flow"
                    style="margin-bottom:10px;">
                <p style="font-size:12px; margin:0;"><b>Tu tienda en línea</b></p>
            </td>
            <td width="50%" style="text-align: right; vertical-align: top;">
                <h2 style="color:#E53935; margin:0;">Factura</h2>
                <p style="margin:0;"><b>Factura No.</b> {{ $pedido->id }}</p>
                <p style="margin:0;"><b>Serie:</b> D8DB901D</p>
                <p style="margin:0;"><b>Fecha de emisión:</b> {{ $pedido->fecha_pedido }}</p>
                <p style="margin:0;"><b>No. Autorización:</b> D8DB901D-6CAB-4506-81D0-F07640EBA295</p>
            </td>
        </tr>
    </table>

    <hr style="margin:15px 0;">

    <!-- Datos del receptor y emisor -->
    <table width="100%" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
        <tr>
            <td width="50%" style="vertical-align: top;">
                <b>Datos del receptor</b><br>
                Nombre: {{ $pedido->cliente->nombre }} {{ $pedido->cliente->nombre }}<br>
                NIT: {{ $pedido->cliente->nit }}<br>
                Dirección: {{ $pedido->cliente->direccion }}
            </td>
            <td width="50%" style="vertical-align: top;">
                <b>Datos del emisor</b><br>
                Nombre: Tecno Flow, S.A.<br>
                NIT: 86350343<br>
                Dirección: ciudad<br>
            </td>
        </tr>
    </table>

    <p style="font-size:10px; color:#666;">*Sujeto a pagos trimestrales ISR</p>

    <!-- Tabla de productos -->
    <table width="100%" cellspacing="0" cellpadding="5"
        style="border-collapse: collapse; border:1px solid #ccc; margin-top:10px;">
        <thead>
            <tr style="background-color:#E53935; color:#fff; text-align:center;">
                <th style="width:10%; border:1px solid #ccc;">Cantidad</th>
                <th style="width:50%; border:1px solid #ccc;">Descripción</th>
                <th style="width:15%; border:1px solid #ccc;">Precio Unitario</th>
                <th style="width:10%; border:1px solid #ccc;">Descuento</th>
                <th style="width:15%; border:1px solid #ccc;">Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($pedido->detalles as $detalle)
            @php
                $subtotal = $detalle['precio'] * $detalle['cantidad'];
                $total += $subtotal;
            @endphp
            <tr>
                <td style="text-align:center; border:1px solid #ccc;">{{ $detalle->cantidad }}</td>
                <td style="border:1px solid #ccc;">{{ $detalle->producto->nombre }}</td>
                <td style="text-align:right; border:1px solid #ccc;">Q {{ number_format($detalle->precio, 2) }}</td>
                <td style="text-align:right; border:1px solid #ccc;">Q {{ number_format($detalle->descuento, 2) }}</td>
                <td style="text-align:right; border:1px solid #ccc;">Q {{ number_format(($detalle->precio - $detalle->descuento) * $detalle->cantidad, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Observaciones -->
    <p style="margin-top:10px;"><b>Observaciones:</b> 25-210774</p>

    <!-- Totales -->
    <table width="100%" cellspacing="0" cellpadding="3" style="border-collapse: collapse; margin-top:15px;">
        <tr>
            <td style="text-align:right; width:80%;">Subtotal:</td>
            <td style="text-align:right; width:20%;">Q {{ number_format($subtotal, 2) }}</td>
        </tr>
        <tr>
            <td style="text-align:right;">Total de Impuestos:</td>
            <td style="text-align:right;">Q {{ number_format($subtotal * (12/112), 2) }}</td>
        </tr>
        <tr>
            <td style="text-align:right;">Descuento Total:</td>
            <td style="text-align:right;">Q 0.00</td>
        </tr>
        <tr>
            <td style="text-align:right; font-weight:bold;">Total:</td>
            <td style="text-align:right; font-weight:bold;">Q {{ number_format($total, 2) }}</td>
        </tr>
    </table>

</body>

</html>
