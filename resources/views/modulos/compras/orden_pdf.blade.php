hi
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
                        Direccion, #000 D-7<br>
                        Parque test Huinala, Apodaca, 66636<br>
                        RFC: 0000000</p>
                </td>
                <td scope="col" style="text-align: right; font-size:xx-small;">
                    <p>Telefono: 00-00-00-00 <br>
                    </p>
                    <br>
                    <br>
                    <br>
                    <p class="h6" style="text-align: right;">Orden de compra: {{$alta_oc->id}} </p>
                    <p class="h7" style="text-align: right;">Fecha: {{$alta_oc->created_at}}</p>
                </td>
            </tr>
        </thead>
    </table>

    <table class="table  table-sm" style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color: green; color:white;">
            <tr>
                <th colspan="1" style="text-align:left">OC</th>
                <th colspan="1" style="text-align:left">Proveedor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$alta_oc->id}}</td>
                <td>{{$alta_oc->proveedor}}</td>
            </tr>
        </tbody>
    </table>

    <table class="table " style="text-align:center;font-size:xx-small;" width="100%">
        <thead style="background-color: green; color:white;">
            <tr>
                <th>OT</th>
                <th>Material</th>
                <th>Cantidad</th>
                <th>Tipo</th>
                <th>L</th>
                <th>A</th>
                <th>E</th>
                <th>Medidas</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
            <tr>
                <td>{{$material->ot}}</td>
                <td>{{$material->material}}</td>
                <td>{{$material->cantidad_solicitada}}</td>
                <td>{{$material->tipo}}</td>
                <td>{{$material->c1}}</td>
                <td>{{$material->c2}}</td>
                <td>{{$material->c3}}</td>
                <td>{{$material->um}}</td>
                <td>{{$material->descripcion}}</td>
            </tr>
            @endforeach


        </tbody>
    </table>





    <p style="font-size:x-small; text-align:center;">DOCUMENTO PARA USO INTERNO EMGY</p>

</html>