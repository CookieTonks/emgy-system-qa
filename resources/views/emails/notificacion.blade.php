<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Correo JETS</title>
</head>

<body>
  <h2>Orden de Trabajo: #{{$orden->id}}</h2>
  <ul>
    <li>Cliente: {{$orden->cliente}}</li>
    <li>Descripcion: {{$orden->comentario}}</li>
    <li>Cantida de Piezas: {{$orden->cantidad}}</li>
    <li>Estatus: {{$orden->prioridad}}</li>
  </ul>
</body>

</html>