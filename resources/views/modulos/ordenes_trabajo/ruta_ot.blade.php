<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> EMGY - SISTEMA INTERNO</title>
    <!-- Favicon icon -->
    <link rel="icon" type="../template/image/png" sizes="16x16" href="images/iconos/logo-compact.png">
    <link href="../../template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../../template/css/style.css" rel="stylesheet">


    <!-- Inicio de recursos -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <livewire:styles />


    <!-- Fin de recursos -->

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <!-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> -->
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
                <img class="logo-abbr" src="../images/iconos/logo-compact.png" alt="">
                <img class="logo-compact" src="../images/iconos/logo-compact.png" alt="">
                <img class="brand-title" src="../images/iconos/logo-text.png" alt="">
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
                                    @if($notifications->count() > 0)
                                    <span class="badge light text-white bg-primary">{{ $notifications->count() }}</span>
                                    @endif </a>
                                <div class="dropdown-menu dropdown-menu-right">

                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
                                        <ul class="timeline">
                                            @foreach($notifications as $notification)

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
        <div class="content-body" style="min-height: 876px;">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Ruta</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Orden de trabajo</a></li>
                    </ol>
                </div>


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


                <!-- row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orden de Trabajo: {{$ot}} </h4>
                            </div>
                            <div class="card-body">
                                <section class="hk-sec-wrapper">
                                    <div class="row stats-row">
                                        <div class="col-sm">
                                            <div style="display:none;">
                                                <textarea id="code" style="width: 100%;" rows="20">
                        @foreach($ordenes as $orden)
                          st=>start: <?php if ($orden->sistema_ot == '-') {
                                            echo "OT:{$orden->ot}\n";
                                        } else {
                                            echo "OT: {$orden->ot}|invalid\n";
                                        } ?>
                          e=>end: <?php if ($orden->sistema_facturacion == '-') {
                                        echo "FACTURACION\n";
                                    } else {
                                        echo "FACTURACION|invalid\n";
                                    } ?>
                        op1=>operation: <?php if ($orden->sistema_ingenieria == '-') {
                                            echo "INGENIERIA\n";
                                        } else {
                                            echo "INGENIERIA|invalid\n";
                                        } ?>
                        op2=>operation: <?php if ($orden->sistema_almacen == '-') {
                                            echo "ALMACEN\n";
                                        } else {
                                            echo "ALMACEN|invalid\n";
                                        } ?>
                        op3=>operation: <?php if ($orden->sistema_compras == '-') {
                                            echo "COMPRAS\n";
                                        } else {
                                            echo "COMPRAS|invalid\n";
                                        } ?>
                        op4=>operation: <?php if ($orden->sistema_almacenr == '-') {
                                            echo "ALMACEN\n";
                                        } else {
                                            echo "ALMACEN|invalid\n";
                                        } ?>
                        op5=>operation: <?php if ($produccion->estatus == 'E.CALIDAD') {
                                            echo "PRODUCCION|finalizada\n";
                                        } elseif ($orden->sistema_produccion == 'DONE') {
                                            echo "PRODUCCION|finalizada\n";
                                        } elseif ($produccion->estatus == 'FINALIZADA') {
                                            echo "PRODUCCION|maquina\n";
                                        } elseif ($produccion->estatus == 'REGISTRADA') {
                                            echo "PRODUCCION|registrada\n";
                                        } elseif ($produccion->estatus == 'EN MAQUINA') {
                                            echo "PRODUCCION|maquina\n";
                                        } elseif ($produccion->estatus == 'ASIGNADA') {
                                            echo "PRODUCCION|maquina\n";
                                        } elseif ($produccion->estatus == 'PAUSADA') {
                                            echo "PRODUCCION|maquina\n";
                                        } else {
                                            echo "PRODUCCION\n";
                                        } ?>
                          op6=>operation: <?php if ($orden->sistema_calidad == '-') {
                                                echo "CALIDAD\n";
                                            } else {
                                                echo "CALIDAD|invalid\n";
                                            } ?>
                          op7=>operation: <?php if ($orden->sistema_embarques == '-') {
                                                echo "EMBARQUES\n";
                                            } else {
                                                echo "EMBARQUES|invalid\n";
                                            } ?>
                        @endforeach
                        st(right)->op1->op2(right)->op3(right)->op4(right)->op5(right)->op6(right)->op7(right)->e
                      </textarea>
                                            </div>
                                            <div style="display:none;"><button id="run" type="button">Run</button></div>
                                            <div id="canvas" style="text-align: center; width:100; height:100"></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">OT</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Maquina</th>
                                <th scope="col">Técnico</th>
                                <th scope="col">Estatus</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <th>{{$produccion->ot}}</th>
                                <th>{{$produccion->cliente}}</th>
                                <th>{{$produccion->maquina_asignada}}</th>
                                <th>{{$produccion->persona_asignada}}</th>
                                <th>{{$produccion->estatus}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">

                </div>
                <table id="datable_1" class="table table-hover w-100 display pb-30">
                    <thead class="thead-primary">
                        <tr>
                            <th>OT</th>
                            <th>Movimiento</th>
                            <th>Responsable</th>
                            <th>Hora</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registros as $registro)
                        <tr>

                            <td>{{$registro->ot}}</td>
                            <td>{{$registro->movimiento}}</td>
                            <td>{{$registro->responsable}}</td>
                            <td>{{$registro->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>OT</th>
                            <th>Movimiento</th>
                            <th>Responsable</th>
                            <th>Hora</th>

                        </tr>
                    </tfoot>
                </table>
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


        <!-- Final de modales -->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!-- inicio de scripts -->

    <script>
        window.onload = function() {
            var btn = document.getElementById("run"),
                cd = document.getElementById("code"),
                chart;

            (btn.onclick = function() {
                var code = cd.value;

                if (chart) {
                    chart.clean();
                }

                chart = flowchart.parse(code);
                chart.drawSVG('canvas', {
                    // 'x': 30,
                    // 'y': 50,
                    'line-width': 3,
                    'maxWidth': 30, //ensures the flowcharts fits within a certian width
                    'line-length': 10,
                    'text-margin': 10,
                    'font-size': 30,
                    'font': 'normal',
                    'font-family': 'Helvetica',
                    'font-weight': 'normal',
                    'font-color': 'black',
                    'line-color': 'black',
                    'element-color': 'black',
                    'fill': 'white',
                    'yes-text': 'yes',
                    'no-text': 'no',
                    'arrow-end': 'block',
                    'scale': 1,
                    'symbols': {
                        'start': {
                            'font-color': 'black',
                            'element-color': 'black',
                            'fill': 'yellow'
                        },
                        'end': {
                            'class': 'end-element'
                        }
                    },
                    'flowstate': {
                        'past': {
                            'fill': '#FFFFFF',
                            'font-size': 12
                        },
                        'current': {
                            'fill': 'yellow',
                            'font-color': 'red',
                            'font-weight': 'bold'
                        },
                        'future': {
                            'fill': '#FFFFFF'
                        },
                        'request': {
                            'fill': 'blue'
                        },
                        'invalid': {
                            'fill': '#2eb870'
                        },
                        'finalizada': {
                            'fill': '#2eb870'
                        },
                        'registrada': {
                            'fill': '#FFFF00'
                        },
                        'maquina': {
                            'fill': '#FFA500'
                        },
                        'approved': {
                            'fill': '#D3D3D3',
                            'font-size': 12,
                            'yes-text': 'APPROVED',
                            'no-text': 'n/a'
                        },
                        'rejected': {
                            'fill': '#C45879',
                            'font-size': 12,
                            'yes-text': 'n/a',
                            'no-text': 'REJECTED'
                        }
                    }
                });

                $('[id^=sub1]').click(function() {
                    alert('info here');
                });
            })();

        };

        function myFunction(event, node) {
            console.log("You just clicked this node:", node);
        }
    </script>




    <!-- Final de scripts -->


    <!-- Inicio de librerias -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js" integrity="sha512-tBzZQxySO5q5lqwLWfu8Q+o4VkTcRGOeQGVQ0ueJga4A1RKuzmAu5HXDOXLEjpbKyV7ow9ympVoa6wZLEzRzDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../../Plantilla/flowchart/release/flowchart.js"></script>
    <script src="http://flowchart.js.org/flowchart-latest.js"></script>


    <!-- Final de librerias -->


    <!-- Required vendors -->
    <script src="../template/vendor/global/global.min.js"></script>
    <script src="../template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../template/js/custom.min.js"></script>
    <script src="../template/js/deznav-init.js"></script>

    <livewire:scripts />

</body>

</html>