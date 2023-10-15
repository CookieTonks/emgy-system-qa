<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Jets I Dashboard</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <script type="text/javascript" src="jquery-1.3.2.min.js"></script>

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!-- Recursos -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Plantillas -->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- select2 CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Data Table CSS -->
    <link href="../plantilla/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="../plantilla/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="../plantilla/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="../plantilla/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../plantilla/dist/css/style.css" rel="stylesheet" type="text/css">
    <link href="../plantilla/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <livewire:styles />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href="{{route ('dashboard')}}">
                <img class="brand-img d-inline-block align-top" style="width: 100px;" src="images\logo.png" alt="JETS" />
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <div class="navbar-collapse collapse show" id="navbarCollapseAlt">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ordenes de trabajo
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_ordenes')}}">Módulo OT</a>
                                <a class="dropdown-item" href="{{route ('buscador_ordenes')}}">Buscador OT</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ingenieria
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_ingenieria')}}">Módulo Ingenieria</a>
                                <a class="dropdown-item" href="{{route ('buscador_ingenieria')}}">Buscador Ingenieria</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Almacen
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_almacen')}}">Módulo Almacen</a>
                                <a class="dropdown-item" href="{{route ('buscador_almacen')}}">Buscador Almacen</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Compras
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_compras')}}">Módulo Compras</a>
                                <a class="dropdown-item" href="{{route ('buscador_compras')}}">Buscador Compras</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Producción
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_produccion')}}">Módulo Producción</a>
                                <a class="dropdown-item" href="{{route ('dashboard_programador')}}">Módulo Técnico</a>
                            </div>
                        </li>


                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Calidad
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_calidad')}}">Módulo Calidad</a>
                                <a class="dropdown-item" href="{{route ('buscador_calidad')}}">Buscador Calidad</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Embarques
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_embarques')}}">Módulo Embarques</a>
                                <a class="dropdown-item" href="{{route ('buscador_embarques')}}">Buscador Embarques</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Facturación
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_facturacion')}}">Módulo Facturación</a>
                                <a class="dropdown-item" href="{{route ('buscador_facturacion')}}">Buscador Facturación</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown show-on-hover">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrador
                            </a>
                            <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <a class="dropdown-item" href="{{route ('dashboard_administrador')}}">Módulo Administrador</a>
                            </div>
                        </li>



                    </ul>

                </div>
                <form class="navbar-search-alt">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="feather-icon"><i data-feather="search"></i></span></span>
                        </div>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="settings"></i></span></a>
                </li>
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge-wrap"><span class="badge badge-success badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">Ver todas</a></h6>
                        <div class="notifications-nicescroll-bar">
                            @foreach($notificaciones as $notificacion)
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src="../images/iconos/urgencia.avif" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">OT: {{$notificacion->ot}} <br> Cliente: {{$notificacion->cliente}}</span> fue registrada como urgencia.</div>
                                            <div class="notifications-time">{{$notificacion->created_at}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            @endforeach

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="../images/empleados/{{ Auth::user()->id }}.jpg" alt="" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="{{route ('logout')}}"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /Top Navbar -->


        <!-- Main Content -->
        <div class="hk-pg-wrapper">

            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
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

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"></span></span>Ordenes de trabajo </h4>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"> </h1>
                    <a href="{{route('exportar_ordenes')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Generar reporte</a>
                </div>
                <!-- /Title -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead class="thead-primary">
                                                <tr>
                                                    <th>
                                                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalForms">
                                                            <i class="icon-plus"></i>
                                                        </button>
                                                    </th>
                                                    <th>OT</th>
                                                    <th>Cliente</th>
                                                    <th>Usuario</th>
                                                    <th>Descripcion</th>
                                                    <th>Cantidad</th>
                                                    <th>Vendedor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td style="width: 200px;">
                                                        <a href="{{route('order_pdf', $order->id)}}" class="btn btn-primary btn-sm"><i class="icon-eye"></i></a>
                                                        <a href="{{route('edition_order', $order->id)}}" class="btn btn-primary btn-sm"><i class="icon-pencil"></i></a>
                                                        <a href="{{route('material_order', $order->id)}}" class="btn btn-primary btn-sm"><i class="icon-list"></i></a>
                                                        <a href="{{route('ruta_ot', $order->id)}}" class="btn btn-primary btn-sm"><i class="icon-graph"></i></a>
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="public/storage/dibujos/{{$order->id}}/{{$order->id}}.pdf">{{$order->id}}</a>
                                                    </td>
                                                    <td>{{$order->cliente}}</td>
                                                    <td>{{$order->usuario}}</td>
                                                    <td>{{$order->descripcion}}</td>
                                                    <td>{{$order->cantidad}}</td>
                                                    <td>{{$order->vendedor}}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>+</th>
                                                    <th>OT</th>
                                                    <th>Cliente</th>
                                                    <th>Usuario</th>
                                                    <th>Descripcion</th>
                                                    <th>Cantidad</th>
                                                    <th>Vendedor</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Modal forms-->


                    </div>
                </div>
                <div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Nueva: Orden de trabajo.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('dashboard_ordenes_register')}}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <livewire:country-dropdown>


                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="oc">OC</label>
                                                <input name="oc" class="form-control" id="oc" placeholder="" value="" type="text" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="partida">Partida</label>
                                                <input name="partida" class="form-control" id="partida" placeholder="" value="" type="number" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="cantidad">Cantidad</label>
                                                <input name="cantidad" class="form-control" id="cantidad" placeholder="" value="" required type="number">
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <label for="descripcion">Descripcion</label>
                                                <input name="descripcion" class="form-control" id="descripcion" placeholder="" required value="" type="text">
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="container">
                                            <div class="row" id="proceso_dinamico">
                                                <div class="form-group form-horizontal">
                                                    <label class="control-label">Tiempo por pieza</label>
                                                    <div class="form-inline">
                                                        <select style="width:210px;" class="input-small form-control" id="proceso-selector" name="Proceso[]">
                                                            <option value="TORNEADO">TORNEADO</option>
                                                            <option value="FRESADO">FRESADO</option>
                                                            <option value="RECTIFICADO">RECTIFICADO</option>
                                                            <option value="CNC">CNC</option>
                                                            <option value="TORNO CNC">TORNO CNC</option>
                                                            <option value="CEPILLADO">CEPILLADO</option>
                                                            <option value="SOLDADURA">SOLDADURA</option>
                                                            <option value="PINTURA">PINTURA</option>
                                                            <option value="ENSAMBLE">ENSAMBLE</option>
                                                        </select>
                                                        <input style="width:95px; margin-left:5px;" type="number" class="input-small form-control" id="hora" name="hora[]" step="any" placeholder="(H)" required>
                                                        <input style="width:95px; margin-left:5px;" type="number" class="input-small form-control" id="minutos" name="minutos[]" placeholder="(M)" required>
                                                        <button style="margin-left:5px" type="button" class="btn btn-success btn-add" id="proceso_add">
                                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="tratamiento">Tratamiento</label>
                                                <input class="form-control" id="tratamiento" name="tratamiento" placeholder="" value="" type="text required">
                                            </div>
                                        </div>

                                        <hr />
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="Monto">P/U</label>
                                                <input class="form-control" id="monto" name="monto" placeholder="" value="" type="number" required>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="Moneda">Moneda</label>
                                                <select name="moneda" class="form-control custom-select d-block w-100" id="moneda">
                                                    <option value="">Selecciona una opcion...</option>
                                                    <option>USD</option>
                                                    <option>MXN</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="Vendedor">Vendedor</label>
                                                <select name="vendedor" class="form-control custom-select d-block w-100" id="vendedor">
                                                    <option value="">Selecciona una opcion...</option>
                                                    @foreach ($vendedores as $vendedor)
                                                    <option value="{{$vendedor->name}}"> {{$vendedor->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="tipo_dibujo">Tipo dibujo</label>
                                                <select class="form-control custom-select d-block w-100" name="tipo_dibujo" id="tipo_dibujo">
                                                    <option value="">Selecciona una opcion...</option>
                                                    <option>Cliente</option>
                                                    <option>Ingenieria</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label for="Comentarios">Comentarios</label>
                                                <input class="form-control" id="comentarios_diseno" name="comentarios_diseno" placeholder="" value="" type="text" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label for="Dibujo">Dibujo</label>
                                                <input type="file" placeholder="Solo archivos en PDF" class="form-control" name="dibujo" accept="application/pdf" id="dibujo">

                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="Salidad de produccion">Salida de produccion</label>
                                                <input class="form-control" id="salida_produccion" name="salida_produccion" placeholder="" value="" type="date" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="Salida de cliente">Salida de cliente</label>
                                                <input class="form-control" id="salida_cliente" name="salida_cliente" placeholder="" value="" type="date" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="prioridad">Prioridad</label>
                                                <select class="form-control custom-select d-block w-100" name="prioridad" id="prioridad">
                                                    <option value="">Selecciona una opcion...</option>
                                                    <option>Normal</option>
                                                    <option>Urgente</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="tipo_material">Material</label>
                                                <select class="form-control custom-select d-block w-100" name="tipo_material" id="tipo_material">
                                                    <option value="">Selecciona una opcion...</option>
                                                    <option>Jets</option>
                                                    <option>Cliente</option>
                                                </select>
                                            </div>
                                        </div>


                                        <br>
                                        <button type="submit" class="btn btn-block btn-primary">Registrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <!-- /Container -->

            <!-- Footer -->
            <div class="hk-footer-wrap container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Siguenos</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>

    <!-- /HK Wrapper -->
    <script>
        function getHTMLString() {
            var complex_html = [
                '<br>',
                '<div class="form-inline">',
                '<select style="width:160px;" class="input-small form-control" name="Proceso[]">',
                ' <option value="TORNEADO">TORNEADO</option>',
                ' <option value="FRESADO">FRESADO</option>',
                ' <option value="RECTIFICADO">RECTIFICADO</option>',
                '<option value="CNC">CNC</option>',
                '<option value="TORNO CNC">TORNO CNC</option>',
                '<option value="CEPILLADO">CEPILLADO</option>',
                ' <option value="SOLDADURA">SOLDADURA</option>',
                '<option value="PINTURA">PINTURA</option>',
                '<option value="ENSAMBLE">ENSAMBLE</option>',
                '</select> ',
                '<input style="width:120px; margin-left:5px;" type="number" class="input-small form-control" name="hora[]" step="any" placeholder="(H)"> ',
                '<input style="width:120px; margin-left:5px;" type="text" class="input-small form-control" name="minutos[]" placeholder="(M)"> ',
                '<button style="margin-left:5px" type="button" class="btn btn-danger btn-remove">',
                '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>',
                '</button>',
                '</div>',
            ].join('');
            return complex_html;
        }

        $(document).ready(function() {
            var formCount = 0;

            function removeForm() {
                $(this).parent().remove();
                formCount--;
            }

            $("#proceso_add").on('click', function() {
                if (formCount < 10) {
                    var html = getHTMLString();
                    var element = $(html);

                    element.find('.btn-remove').click(removeForm);

                    $('#proceso_dinamico').append(element);
                    formCount++;
                }
            });
        });
    </script>




    <script>
        $(function() {
            $("#tipo_dibujo").change(function() {
                if ($(this).val() == "Cliente") {
                    $("#dibujo").prop("disabled", false);
                    $("#comentarios_diseño").prop("disabled", true);

                } else {
                    $("#dibujo").prop("disabled", true);
                    $("#comentarios_diseno").prop("disabled", false);
                }
            });
        });
    </script>



    <!-- Select2 JavaScript -->
    <script src="../plantilla/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="../plantilla/dist/js/select2-data.js"></script>

    <!-- jQuery -->
    <script src="../plantilla/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../plantilla/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../plantilla/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../plantilla/dist/js/jquery.slimscroll.js"></script>

    <!-- Data Table JavaScript -->
    <script src="../plantilla/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../plantilla/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../plantilla/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../plantilla/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../plantilla/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plantilla/dist/js/dataTables-data.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="../plantilla/dist/js/feather.min.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="../plantilla/dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="../plantilla/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="../plantilla/dist/js/select2-data.js"></script>
    <!-- Toggles JavaScript -->
    <script src="../plantilla/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="../plantilla/dist/js/toggle-data.js"></script>

    <!-- Init JavaScript -->
    <script src="../plantilla/dist/js/init.js"></script>
    <livewire:scripts />
</body>

</html>