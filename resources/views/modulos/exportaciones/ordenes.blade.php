<table>
    <thead>
        <tr>
            <th>OT</th>
            <th>Cliente</th>
            <th>Usuario</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Vendedor</th>
            <th>Factura/Remision</th>

        </tr>
    </thead>
    <tbody>
        @foreach($Ordenes as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->cliente}}</td>
            <td>{{$order->usuario}}</td>
            <td>{{$order->descripcion}}</td>
            <td>{{$order->cantidad}}</td>
            <td>{{$order->vendedor}}</td>
            <td>{{$order->factura}}</td>

        </tr>
        @endforeach
    </tbody>
</table>