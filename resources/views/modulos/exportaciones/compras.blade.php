<table>
    <thead>
        <tr>
            <th>OT</th>
            <th>DESCRIPCION</th>
            <th>OC</th>
            <th>PROVEEDOR</th>
            <th>CANTIDAD</th>

        </tr>
    </thead>
    <tbody>
        @foreach($materiales as $material)
        <tr>
            <td>{{$material->ot}}</td>
            <td>{{$material->descripcion}}</td>
            <td>{{$material->oc}}</td>
            <td>{{$material->proveedor}}</td>
            <td>{{$material->cantidad_solicitada}}</td>
        </tr>
        @endforeach
    </tbody>
</table>