<table>
    <thead>
        <tr>
            <th>OT</th>
            <th>Tipo Salida</th>
            <th>Tipo Tratamiento</th>
            <th>Fecha retorno</th>
            <th>Fecha Proveedor</th>
            <th>Fecha Chofer</th>
            <th>Cantidad</th>
            <th>Estatus</th>


        </tr>
    </thead>
    <tbody>
        @foreach($embarques as $orden)
        <tr>
            <th>{{$orden->ot}}</th>
            <th>{{$orden->tipo_salida}}</th>
            <th>{{$orden->tipo_tratamiento}}</th>
            <th>{{$orden->fecha_retorno}}</th>
            <th>{{$orden->proveedor}}</th>
            <th>{{$orden->Chofer}}</th>
            <th>{{$orden->cantidad}}</th>
            <th>{{$orden->estatus}}</th>    
        </tr>
        @endforeach
    </tbody>
</table>