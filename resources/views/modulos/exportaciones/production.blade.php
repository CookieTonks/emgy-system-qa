<table>
    <thead>
        <tr>
            <th>OT</th>
            <th>Cliente</th>
            <th>Maquina</th>
            <th>Tecnico</th>
            <th>Cant. OC</th>
            <th>Cant. Entregadas</th>
            <th>Fecha de entrega</th>
            <th>Tiempo estimado</th>
            <th>Tiempo progreso</th>
            <th>Procesos</th>
            <th>Avance</th>
            <th>Prioridad</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Produccion as $orden)
        <tr>
            <td>{{$orden->ot}}</td>
            <td>{{$orden->cliente}}</td>
            <td>{{$orden->maquina_asignada}}</td>
            <td>{{$orden->persona_asignada}}</td>
            <td>{{$orden->cantidad}}</td>
            <td>{{$orden->cant_entregada}}</td>
            <td>{{$orden->fecha_cliente}}</td>
            <td>{{$orden->tiempo_asignado}}</td>
            <td>{{$orden->tiempo_progreso}}</td>
            <td>{{$orden->procesos}}</td>
            <td>{{$orden->pp}}/{{$orden->pr}}</td>
            <td>{{$orden->prioridad}}</td>
            <td>{{$orden->estatus}}</td>
        </tr>
        @endforeach
    </tbody>
</table>