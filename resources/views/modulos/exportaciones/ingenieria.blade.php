<table>
    <thead>
        <tr>
            <th>OT</th>
            <th>Cliente</th>
            <th>Descripcion</th>
            <th>Estatus</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($ingenierias as $orden)
        <tr>
            <td>{{$orden->ot}}</td>
            <td>{{$orden->cliente}}</td>
            <td>{{$orden->descripcion}}</td>
            <td>{{$orden->estatus}}</td>           
        </tr>
        @endforeach
    </tbody>
</table>