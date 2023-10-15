
<table>
    <thead>
        <tr>
            <th>OT</th>
            <th>Cliente</th>
            <th>Tipo Inspeccion</th>
            <th>Cant. Scrap</th>
            <th>Cant. Liberdad</th>
            <th>Cant. Retrabajo</th>
            <th>Usuario</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $orden)
        <tr>
            <td>{{$orden->ot}}</td>
            <td>{{$orden->order->cliente}}</td>
            <td>{{$orden->tipo_inspeccion}}</td>
            <td>{{$orden->cant_scrap}}</td>
            <td>{{$orden->cant_liberada}}</td>
            <td>{{$orden->cant_retrabajo}}</td>
            <td>{{$orden->usuario}}</td>
            <td>{{$orden->observaciones}}</td>
        </tr>
        @endforeach
    </tbody>
</table>