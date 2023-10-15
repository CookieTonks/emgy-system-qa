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
                <td scope="col" style="font-size:xx-small;"><img src="images/logo.png" width="150px">
                    <p>EMPRESA S.A DE C.V <br>
                        MAQUINADOS Y PAILERIA INDUSTRIAL <br>
                        Direccion, #410 D-7<br>
                        Parque Destirral Regio, Apodaca, 66636<br>
                        RFC: 0000000</p>
                </td>
                <td scope="col" style="text-align: right; font-size:xx-small;">
                    <p>Telefono: 00-00-00-00 <br>
                    </p>
                    <br>
                    <br>
                    <br>
                    <p class="h6" style="text-align: right;">Orden de trabajo: {{$orden->id}} </p>
                    <p class="h7" style="text-align: right;">Fecha: {{$orden->created_at}}</p>
                </td>
            </tr>
        </thead>
    </table>

    <p class="h5" style="text-align: center;">Salida embarques: Tratamiento </p>
    <table class="table  table-sm" style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left">OT</th>
                <th colspan="1" style="text-align:left">Cliente</th>
                <th colspan="1" style="text-align:left">Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" colspan="1"> {{$orden->id}} </td>
                <td style="text-align: left;" colspan="1"> {{$orden->cliente}} </td>
                <td style="text-align: left;" colspan="1"> {{$orden->descripcion}} </td>
            </tr>
        </tbody>
    </table>

    <table class="table " style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color:rgb(38, 78, 163); color:white;">
            <tr>
                <th colspan="1" style="text-align:left"># Folio</th>
                <th colspan="1" style="text-align:left">Proveedor</th>
                <th colspan="1" style="text-align:left">Tratamiento</th>
                <th colspan="1" style="text-align:left">Cantidad</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;" colspan="1"> {{$salida->id}} </td>
                <td style="text-align: left;" colspan="1"> {{$salida->cantidad}} </td>
                <td style="text-align: left;" colspan="1"> {{$salida->tipo_tratamiento}} </td>
                <td style="text-align: left;" colspan="1"> {{$salida->cantidad}} </td>
            </tr>
        </tbody>
    </table>


    <p style="font-size:x-small; text-align:center;">DOCUMENTO DE USO EXCLUSIVO</p>

</html>