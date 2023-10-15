<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> EMGY - SISTEMA INTERNO</title>
    <!-- Favicon icon -->
    <link rel="icon" type="../template/image/png" sizes="16x16" href="images/iconos/logo-compact.png">
    <link href="../template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../template/css/style.css" rel="stylesheet">


    <!-- Inicio de recursos -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <livewire:styles />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        jQuery.noConflict();
        (function($) {
            // Your DataTables initialization code here
            $(document).ready(function() {
                $('#datable_1').DataTable();
            });
        })(jQuery);
    </script>
    <script>
        jQuery.noConflict();
        (function($) {
            // Your DataTables initialization code here
            $(document).ready(function() {
                $('#datable_2').DataTable();
            });
        })(jQuery);
    </script>

    <style>
        hr.divider {
            border: 0;
            height: 1px;
            background-color: #ccc;
            /* You can change the color as desired */
            margin: 20px 0;
            /* Adjust the margin as needed to control the spacing between sections */
        }
    </style>


    <!-- Fin de recursos -->

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/iconos/logo-compact.png" alt="">
                <img class="logo-compact" src="images/iconos/logo-compact.png" alt="">
                <img class="brand-title" src="images/iconos/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->





        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard: Ordenes de trabajo
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#555555" />
                                    </svg>
                                    @if($notificaciones->count() > 0)
                                    <span class="badge light text-white bg-primary">{{ $notificaciones->count() }}</span>
                                    @endif </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
                                        <ul class="timeline">
                                            @foreach($notificaciones as $notification)

                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="media mr-2">
                                                        !
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-1">{{$notification->message}}</h6>
                                                        <small class="d-block">{{$notification->created_at}}</small>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="flaticon-381-user-7" style="font-size: 28px;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">{{ Auth::user()->name }} </span>
                                    </a>

                                    <a href="{{route ('logout')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">


            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-flag"></i>
                            <span class="nav-text">Ordenes de trabajo</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_ordenes')}}">Dashboard: OT</a></li>
                            <li><a href="{{route ('buscador_ordenes')}}">Buscador: OT</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-pencil"></i>
                            <span class="nav-text">Ingenieria</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_ingenieria')}}">Dashboard: Ingenieria</a></li>
                            <li><a href="{{route ('buscador_ingenieria')}}">Buscador: Ingenieria</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-box"></i>
                            <span class="nav-text">Almacen</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_almacen')}}">Dashboard: Almacen</a></li>
                            <li><a href="{{route ('buscador_almacen')}}">Buscador: Almacen</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-price-tag"></i>
                            <span class="nav-text">Compras</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_compras')}}">Dashboard: Compras</a></li>
                            <li><a href="{{route ('buscador_compras')}}">Buscador: Compras</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-settings-7"></i>
                            <span class="nav-text">Produccion</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_produccion')}}">Dashboard: Produccion</a></li>
                            <li><a href="{{route ('dashboard_programador')}}">Dashboard: Programador</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-notepad"></i>
                            <span class="nav-text">Calidad</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_calidad')}}">Dashboard: Calidad</a></li>
                            <li><a href="{{route ('buscador_calidad')}}">Buscador: Calidad</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-compass-2"></i>
                            <span class="nav-text">Embarques</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_embarques')}}">Dashboard: Embarques</a></li>
                            <li><a href="{{route ('buscador_embarques')}}">Buscador: Embarques</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-network"></i>
                            <span class="nav-text">Facturacion</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_facturacion')}}">Dashboard: Facturacion</a></li>
                            <li><a href="{{route ('buscador_facturacion')}}">Buscador: Facturacion</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-briefcase"></i>
                            <span class="nav-text">Administrador</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route ('dashboard_administrador')}}">Dashboard: Administrador</a></li>

                        </ul>
                    </li>

                </ul>
                </li>
                </ul>

                <div class="copyright">
                    <p><strong>ERP PARA USO INTERNO</strong> ©EMGY 2023</p>
                    <p>by EMGY</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @if (session('mensaje-error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('mensaje-error')}}
                    <script type="text/javascript">
                        $('.alert').alert()
                    </script>
                </div>
                @elseif (session('mensaje-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('mensaje-success')}}
                    <script type="text/javascript">
                        $('.alert').alert()
                    </script>
                </div>
                @endif
                <div class="page-titles">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ordenes de trabajo</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div>

                <div class="table-wrap">
                    <table id="datable_1" class="table table-hover w-100 display pb-30">
                        <thead class="thead-primary">
                            <tr>
                                <th>
                                </th>
                                <th>OT</th>
                                <th>REQUISICION</th>

                                <th>TIPO</th>
                                <th>CANTIDAD</th>
                                <th>L</th>
                                <th>A</th>
                                <th>E/D</th>
                                <th>UM</th>
                                <th>CODIGO</th>
                                <th>DESCRIPCION</th>
                                <th>EMPRESA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materiales_revision as $material)
                            <tr>
                                @if($material->tipo === "TRATAMIENTO EXTERNO")
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tratamiento_salida" data-id="{{$material->id}}" data-ot="{{$material->ot}}" data-descripcion="{{$material->descripcion}}" data-cantidad="{{$material->cantidad_solicitada}}" data-oc="{{$material->oc}}" data-codigo="{{$material->codigo}}" data-proveedor="{{$material->proveedor }}">
                                        <i class="icon-check">Check</i>
                                    </button>
                                </td>
                                @else
                                <td style="width: 200px;">

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#material_compras" data-id="{{$material->id}}" data-ot="{{$material->ot}}" data-descripcion="{{$material->descripcion}}" data-cantidad="{{$material->cantidad_solicitada}}" data-oc="{{$material->oc}}" data-proveedor="{{$material->proveedor }}">
                                        <i class="icon-bell">Solicitar</i>
                                    </button>
                                </td>
                                @endif

                                <td>{{$material->ot}}</td>
                                <td>{{$material->tipo}}</td>

                                <td>{{$material->tipo_material}}</td>
                                <td>{{$material->cantidad_solicitada}}</td>
                                <td>{{$material->c1}}</td>
                                <td>{{$material->c2}}</td>
                                <td>{{$material->c3}}</td>
                                <td>{{$material->um}}</td>
                                <td>{{$material->codigo}}</td>
                                <td>{{$material->descripcion}}</td>
                                <td>{{$material->empresa}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                </th>
                                <th>OT</th>
                                <th>REQUISICION</th>
                                <th>TIPO</th>
                                <th>CANTIDAD</th>
                                <th>L</th>
                                <th>A</th>
                                <th>E/D</th>
                                <th>UM</th>
                                <th>CODIGO</th>
                                <th>DESCRIPCION</th>
                                <th>EMPRESA</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <br>
            <hr class="divider">
            <br>

            <div class="row">
                <div class="col-xl-12">

                    <section class="hk-sec-wrapper">
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table id="datable_2" class="table table-hover w-100 display pb-30">
                                        <thead class="thead-primary">
                                            <tr>
                                                <th>
                                                </th>
                                                <th>OT</th>
                                                <th>REQUISICION</th>

                                                <th>TIPO</th>
                                                <th>SOLICITUD</th>
                                                <th>CANTIDAD</th>
                                                <th>L</th>
                                                <th>A</th>
                                                <th>E/D</th>
                                                <th>UM</th>
                                                <th>CODIGO</th>
                                                <th>DESCRIPCION</th>
                                                <th>OC</th>
                                                <th>PROVEEDOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($materiales_recepcion as $material)
                                            <tr>
                                                @if($material->tipo === 'MATERIAL')
                                                <td style="width: 200px;">

                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#recepcion_material" data-id="{{$material->id}}" data-ot="{{$material->ot}}" data-descripcion="{{$material->descripcion}}" data-cantidad="{{$material->cantidad_solicitada}}" data-cantidad_recibida="{{$material->cantidad_recibida}}" data-oc="{{$material->oc}}" data-proveedor="{{$material->proveedor}}">
                                                        <i class="icon-check"> Entrada</i>
                                                    </button>
                                                </td>
                                                @else
                                                <td>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#regreso_tratamiento" data-id="{{$material->id}}" data-ot="{{$material->ot}}" data-descripcion="{{$material->descripcion}}" data-cantidad="{{$material->cantidad_solicitada}}" data-cantidad_recibida="{{$material->cantidad_recibida}}" data-oc="{{$material->oc}}" data-proveedor="{{$material->proveedor}}">
                                                        <i class="icon-check">Entrada</i>
                                                    </button>
                                                </td>
                                                @endif
                                                <td>{{$material->ot}}</td>
                                                <td>{{$material->tipo}}</td>
                                                <td>{{$material->tipo_material}}</td>
                                                <td>{{$material->solicitud}}</td>
                                                <td>{{$material->cantidad_solicitada}}</td>
                                                <td>{{$material->c1}}</td>
                                                <td>{{$material->c2}}</td>
                                                <td>{{$material->c3}}</td>
                                                <td>{{$material->um}}</td>
                                                <td>{{$material->codigo}}</td>
                                                <td>{{$material->descripcion}}</td>
                                                <td>{{$material->oc}}</td>
                                                <td>{{$material->proveedor}}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                </th>
                                                <th>OT</th>
                                                <th>REQUISICION</th>
                                                <th>TIPO</th>
                                                <th>SOLICITUD</th>
                                                <th>CANTIDAD</th>
                                                <th>L</th>
                                                <th>A</th>
                                                <th>E/D</th>
                                                <th>UM</th>
                                                <th>CODIGO</th>
                                                <th>DESCRIPCION</th>
                                                <th>OC</th>
                                                <th>PROVEEDOR</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>


                </div>


            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">EMGY</a> 2023</p>
            </div>
        </div>


        <!-- Inicio de Modales -->
        <div class="modal fade" id="tratamiento_salida" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tratamiento: Salida de almacen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('envio_tratamiento')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-0 form-group">
                                    <input class="form-control" id="id" name="id" placeholder="" value="" type="text" hidden>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="dibujo">OT</label>
                                    <input class="form-control" id="orden" name="orden" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input class="form-control" id="descripcion" name="descripcion" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input class="form-control" id="cantidad" name="cantidad" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="codigo">Codigo</label>
                                    <input class="form-control" id="codigo" name="codigo" placeholder="" value="" type="text" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="proveedor">Proveedor</label>
                                    <select name="proveedor" id="proveedor" class="form-control" required>
                                        <option selected disabled value="">Selecciona...</option>
                                        @foreach($proveedores as $proveedor)
                                        <option value="{{$proveedor->nombre}}" class="form-control" name="proveedor"> {{$proveedor->nombre}}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="fecha_retorno">Fecha de retorno</label>
                                    <input class="form-control" id="fecha_retorno" name="fecha_retorno" placeholder="" value="" type="date" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="chofer">Chofer</label>
                                    <input class="form-control" id="chofer" name="chofer" placeholder="" value="" type="text" required>
                                </div>

                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="regreso_tratamiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Recepcion de material</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('regreso_tratamiento_almacen')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-0 form-group">
                                    <input class="form-control" id="id" name="id" placeholder="" value="" type="text" hidden>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label for="dibujo">Descripcion</label>
                                    <input class="form-control" id="descripcion" name="descripcion" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">Cantidad</label>
                                    <input class="form-control" id="cantidad" name="cantidad" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">OT</label>
                                    <input class="form-control" id="ot" name="ot" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">OC</label>
                                    <input class="form-control" id="oc" name="oc" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">Proveedor</label>
                                    <input class="form-control" id="proveedor" name="proveedor" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="Factura">Factura</label>
                                    <input class="form-control" id="factura" name="factura" placeholder="" value="" type="text">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="aprobacion_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Material: En inventario.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('material_produccion')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-0 form-group">
                                    <input class="form-control" id="id" name="id" placeholder="" value="" type="text" hidden>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="dibujo">OT</label>
                                    <input class="form-control" id="ot" name="ot" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label for="dibujo">Descripcion</label>
                                    <input class="form-control" id="descripcion" name="descripcion" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="dibujo">Cantidad</label>
                                    <input class="form-control" id="cantidad" name="cantidad" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="cantidad_recibida">Cantidad almacen</label>
                                    <input class="form-control" id="cantidad_almacen" name="cantidad_almacen" placeholder="" value="" type="text" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Salida">Salida</label>
                                    <select name="tipo_entrega" id="tipo_entrega" class="form-control" required>
                                        <option selected disabled value="">Selecciona...</option>
                                        <option value="ALMACEN" class="form-control" name="almacen"> Almacen
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="material_compras" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Material: Solicitar a compras</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('envio_material')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-0 form-group">
                                    <input class="form-control" id="id" name="id" placeholder="" value="" type="text" hidden>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="dibujo">OT</label>
                                    <input class="form-control" id="ot" name="ot" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="dibujo">Cantidad</label>
                                    <input class="form-control" id="cantidad" name="cantidad" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="dibujo">Descripcion</label>
                                    <input class="form-control" id="descripcion" name="descripcion" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Factura">Cantidad</label>
                                    <input class="form-control" id="cantidad_almacen" name="cantidad_almacen" placeholder="" value="" type="text">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="Salida">solicitud</label>
                                    <select name="solicitud" id="solicitud" class="form-control">
                                        <option value="-" class="form-control" name="-"> Selecciona</option>
                                        <option value="abastecer" class="form-control" name="almacen"> Abastecer
                                        </option>
                                        <option value="resurtir" class="form-control" name="produccion">
                                            Resurtir </option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="recepcion_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Recepcion de material</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('recepcion_material')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-0 form-group">
                                    <input class="form-control" id="id" name="id" placeholder="" value="" type="text" hidden>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label for="dibujo">Descripcion</label>
                                    <input class="form-control" id="descripcion" name="descripcion" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">Cantidad</label>
                                    <input class="form-control" id="cantidad" name="cantidad" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">OT</label>
                                    <input class="form-control" id="ot" name="ot" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">OC</label>
                                    <input class="form-control" id="oc" name="oc" placeholder="" value="" type="text" readonly>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="dibujo">Proveedor</label>
                                    <input class="form-control" id="proveedor" name="proveedor" placeholder="" value="" type="text" readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="Factura">Factura</label>
                                    <input class="form-control" id="factura" name="factura" placeholder="" value="" type="text">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="cantidad_recibida">Cantidad recibida</label>
                                    <input class="form-control" id="cantidad_recibida" name="cantidad_recibida" placeholder="" type="text">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="tipo_recepcion">Recepcion</label>
                                    <select name="tipo_recepcion" id="tipo_recepcion" class="form-control">
                                        <option value="-" class="form-control" name="-"> Selecciona</option>
                                        <option value="PARCIAL" class="form-control" name="parcial"> Entrega
                                            parcial</option>
                                        <option value="FINAL" class="form-control" name="final"> Entrega final
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="Salida">Salida</label>
                                    <select name="tipo_entrega" id="tipo_entrega" class="form-control">
                                        <option value="-" class="form-control" name="-"> Selecciona</option>
                                        <option value="ALMACEN" class="form-control" name="almacen"> Almacen
                                        </option>
                                        <option value="PRODUCCION" class="form-control" name="produccion">
                                            Producccion </option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Final de modales -->

        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!-- inicio de scripts -->



        <script>
            $(document).ready(function() {
                $('#recepcion_material').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var ot = button.data('ot')
                    var id = button.data('id')
                    var descripcion = button.data('descripcion')
                    var cantidad = button.data('cantidad')
                    var cantidad_recibida = button.data('cantidad_recibida')

                    var oc = button.data('oc')
                    var proveedor = button.data('proveedor')


                    var modal = $(this)
                    modal.find('.modal-title').text('Recepcion de material')
                    modal.find('#ot').val(ot)
                    modal.find('#id').val(id)
                    modal.find('#descripcion').val(descripcion)
                    modal.find('#cantidad').val(cantidad)
                    modal.find('#cantidad_recibida').val(cantidad_recibida)
                    modal.find('#oc').val(oc)
                    modal.find('#proveedor').val(proveedor)


                })
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#aprobacion_material').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var ot = button.data('ot')
                    var id = button.data('id')
                    var descripcion = button.data('descripcion')
                    var cantidad = button.data('cantidad')


                    var modal = $(this)
                    modal.find('.modal-title').text('Recepcion: Hay material en almacen')
                    modal.find('#ot').val(ot)
                    modal.find('#id').val(id)
                    modal.find('#descripcion').val(descripcion)
                    modal.find('#cantidad').val(cantidad)


                })
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#tratamiento_salida ').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var ot = button.data('ot')
                    var id = button.data('id')
                    var descripcion = button.data('descripcion')
                    var cantidad = button.data('cantidad')
                    var codigo = button.data('codigo')


                    var modal = $(this)
                    modal.find('.modal-title').text('Tratamiento: Salida de almacen')
                    modal.find('#id').val(id)
                    modal.find('#orden').val(ot)
                    modal.find('#descripcion').val(descripcion)
                    modal.find('#cantidad').val(cantidad)
                    modal.find('#codigo').val(codigo)


                })
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#regreso_tratamiento ').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var ot = button.data('ot')
                    var id = button.data('id')
                    var oc = button.data('oc')
                    var descripcion = button.data('descripcion')
                    var cantidad = button.data('cantidad')
                    var proveedor = button.data('proveedor')


                    var modal = $(this)
                    modal.find('.modal-title').text('Tratamiento: Regreso a almacen')
                    modal.find('#ot').val(ot)
                    modal.find('#id').val(id)
                    modal.find('#oc').val(oc)
                    modal.find('#descripcion').val(descripcion)
                    modal.find('#cantidad').val(cantidad)
                    modal.find('#proveedor').val(proveedor)


                })
            });
        </script>



        <script>
            $(document).ready(function() {
                $('#material_compras ').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var ot = button.data('ot')
                    var id = button.data('id')
                    var descripcion = button.data('descripcion')
                    var cantidad = button.data('cantidad')
                    var oc = button.data('oc')
                    var proveedor = button.data('proveedor')


                    var modal = $(this)
                    modal.find('.modal-title').text('Compra de material')
                    modal.find('#ot').val(ot)
                    modal.find('#id').val(id)
                    modal.find('#descripcion').val(descripcion)
                    modal.find('#cantidad').val(cantidad)
                    modal.find('#oc').val(oc)
                    modal.find('#proveedor').val(proveedor)


                })
            });
        </script>


        <!-- Final de scripts -->


        <!-- Inicio de librerias -->



        <!-- Final de librerias -->


        <!-- Required vendors -->
        <script src="./template/vendor/global/global.min.js"></script>
        <script src="./template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="./template/js/custom.min.js"></script>
        <script src="./template/js/deznav-init.js"></script>

        <livewire:scripts />

</body>

</html>