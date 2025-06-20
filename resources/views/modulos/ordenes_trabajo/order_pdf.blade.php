<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title></title>
  <link rel="stylesheet" href="../../cssbs/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style type="text/css">
    thead:before,
    thead:after {
      display: none;
    }

    tbody:before,
    tbody:after {
      display: none;
    }
  </style>

</head>

<body>
  <table class="table table-borderless">
    <thead>
      <tr>
        <td scope="col" style="font-size:xx-small;"><img src="images/iconos/logo.png" width="100px">
          <p>EMGY METALMECANICA S.A DE C.V <br>
            MAQUINADOS Y PAILERIA INDUSTRIAL <br>
            Rio de las Amazonas #306<br>
            Villa del Rio, Guadalupe, NL. 67112<br>
          </p>
        </td>
        <td scope="col" style="text-align: right; font-size:xx-small;">
          <p>Telefono: 81 2321 9299 <br>
          </p>
          <br>
          <br>
          <br>
          <p class="h6" style="text-align: right;">Orden de trabajo: {{$order->id}} </p>
          <p class="h7" style="text-align: right;">Fecha: {{$order->created_at}}</p>
        </td>
      </tr>
    </thead>
  </table>

  <table class="table  table-sm" style="text-align:center;font-size:xx-small;" width="100%">
    <thead style="background-color: green; color:white;">
      <tr>
        <th colspan="1" style="text-align:left">OT</th>
        <th colspan="1" style="text-align:left">Cliente</th>
        <th colspan="1" style="text-align:left">Descripcion</th>
        <th colspan="1" style="text-align:left">Cant.OC</th>
        <th colspan="1" style="text-align:left">Cant.RT</th>
        <th colspan="1" style="text-align:left">Vendedor</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: left;" colspan="1"> {{$order->id}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->cliente}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->descripcion}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->cantidad}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->cant_retrabajo}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->vendedor}} </td>
      </tr>
    </tbody>
  </table>

  <table class="table " style="text-align:center;font-size:xx-small;" width="100%">
    <thead style="background-color: green; color:white;">
      <tr>
        <th colspan="1" style="text-align:left">OC</th>
        <th colspan="1" style="text-align:left">Partida</th>
        <th colspan="1" style="text-align:left">Usuario</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: left;" colspan="1"> {{$order->oc}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->partida}} </td>
        <td style="text-align: left;" colspan="1"> {{$order->usuario}} </td>
      </tr>
    </tbody>
  </table>




  <table class="table table-striped" style="text-align:center;font-size:xx-small;" width="100%">
    <thead style="background-color:green; color:white;">
      <tr>
        <th colspan="1" style="text-align:left">Proceso</th>
        <th colspan="1" style="text-align:left">Tiempo</th>
      </tr>
    </thead>
    <tbody>
      @foreach($procesos as $proceso)
      <tr>
        <td style="text-align: left;" colspan="1"> {{$proceso->proceso}} </td>
        <td style="text-align: left;" colspan="1"> {{$proceso->minutos}} minutos </td>
      </tr>
      @endforeach
    </tbody>
  </table>



  <table class="table " style="text-align:center;font-size:xx-small;" width="100%">
    <thead style="background-color: green; color:white;">
      <tr>
        <th colspan="1" style="text-align:left">Tratamiento</th>
        <th colspan="1" style="text-align:left">Comentarios</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: left;" colspan="1"> {{$order->tratamiento}}  </td>
        <td style="text-align: left;" colspan="1"> {{$order->comentario_diseno}}  </td>
      </tr>
    </tbody>
  </table>


  <table class="table table-bordered" style="text-align: center;font-size:x-small;">
    <thead style="background-color: green; color:white;">
      <tr>
        <th>Salida produccion</th>
        <th>Salida cliente </th>
        <th style="width:210px;">Prioridad</th>
      </tr>
    </thead>
    <tbody style="font-size:xx-small;">
      <tr>
        <td> {{$order->salida_produccion}} </td>
        <td> {{$order->salida_cliente}} </td>
        <td> {{$order->prioridad}} </td>

      </tr>
    </tbody>
  </table>



  <p style="font-size:x-small; text-align:center;">DOCUMENTO PARA USO INTERNO EMGY</p>

</html>