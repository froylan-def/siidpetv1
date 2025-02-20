<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="/">

    <title> Sistema Integral del Instituto de Defensoría Publica del Estado de Tamaulipas </title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Favico -->

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logos/logo_2.png') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href=' http://fonts.googleapis.com/css?family=Encode+Sans' rel='stylesheet' type='text/css'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #AB0033;
            /* Azul */
            --secondary-color: #54565A;
            /* Gris oscuro */
            --success-color: #BC955C;
            /* Verde */
            --info-color: #DDC9A3;
            /* Azul claro */
            --warning-color: #8C6E46;
            /* Amarillo */
            --danger-color: #820027;
            /* Rojo */
            --light-color: #EAD7B6;
            /* Gris claro */
            --dark-color: #2F3133;
            /* Gris más oscuro */
            --table-header: #E5E7EB;

            --text-color: #374151;
        }

        /* Estilos de fondo */
        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .bg-secondary {
            background-color: var(--secondary-color) !important;
        }

        .bg-success {
            background-color: var(--success-color) !important;
        }

        .bg-info {
            background-color: var(--info-color) !important;
        }

        .bg-warning {
            background-color: var(--warning-color) !important;
        }

        .bg-danger {
            background-color: var(--danger-color) !important;
        }

        .bg-light {
            background-color: var(--light-color) !important;
        }

        .bg-dark {
            background-color: var(--dark-color) !important;
        }

        /* Estilos de texto */
        .text-primary {
            color: var(--primary-color) !important;
        }

        .text-secondary {
            color: var(--secondary-color) !important;
        }

        .text-success {
            color: var(--success-color) !important;
        }

        .text-info {
            color: var(--info-color) !important;
        }

        .text-warning {
            color: var(--warning-color) !important;
        }

        .text-danger {
            color: var(--danger-color) !important;
        }

        .text-light {
            color: var(--light-color) !important;
        }

        .text-dark {
            color: var(--dark-color) !important;
        }

        /* Estilos de boton */
        .btn-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        .btn-secondary {
            background-color: var(--secondary-color) !important;
            border-color: var(--secondary-color) !important;
        }

        .btn-success {
            background-color: var(--success-color) !important;
            border-color: var(--success-color) !important;
        }

        .btn-info {
            background-color: var(--info-color) !important;
            border-color: var(--info-color) !important;
        }

        .btn-warning {
            background-color: var(--warning-color) !important;
            border-color: var(--warning-color) !important;
        }

        .btn-danger {
            background-color: var(--danger-color) !important;
            border-color: var(--danger-color) !important;
        }

        .btn-light {
            background-color: var(--light-color) !important;
            border-color: var(--light-color) !important;
        }

        .btn-dark {
            background-color: var(--dark-color) !important;
            border-color: var(--dark-color) !important;
        }

        .btn-link {
            color: var(--primary-color) !important;
        }

        /* Badges personalizados */
        .badge-primary {
            background-color: #AB0033 !important;
            /* Azul */
            color: white !important;
        }

        .badge-secondary {
            background-color: #F3F4F6 !important;
            /* Gris oscuro */
            color: white !important;
        }

        .badge-success {
            background-color: #BC955C !important;
            /* Verde */
            color: white !important;
        }

        .badge-info {
            background-color: #DDC9A3 !important;
            /* Azul claro */
            color: white !important;
        }

        .badge-warning {
            background-color: #8C6E46 !important;
            /* Amarillo */
            color: white !important;
        }

        .badge-danger {
            background-color: #820027 !important;
            /* Rojo */
            color: white !important;
        }

        .badge-light {
            background-color: #EAD7B6 !important;
            /* Gris claro */
            color: #1F2937 !important;
            /* Texto oscuro para contraste */
        }

        .badge-dark {
            background-color: #2F3133 !important;
            /* Gris oscuro */
            color: white !important;
        }



        .nav-pills .nav-link.active,
        .nav-tabs .nav-link.active {
            background-color: var(--primary-color) !important;
            /* Verde */
            color: white !important;
        }



        /* Personalizar el fondo del modal */
        .swal2-popup {
            background-color: #f4f6f9 !important;
            /* Gris claro de Bootstrap */
            color: #333 !important;
            /* Texto oscuro */
            border-radius: 0.7rem !important;
            /* Bordes redondeados */
        }

        /* Personalizar el color del título */
        .swal2-title {
            color: var(--text-color) !important;
            font-size: 1.5rem;
            /* Azul oscuro de Bootstrap */
        }

        /* Personalizar el color del texto */
        .swal2-html-container {
            color: var(--text-color) !important;
        }

        /* Personalizar el color del botón de confirmación */
        .swal2-confirm {
            background-color: var(--success-color) !important;
            /* Azul Bootstrap */
            border-color: var(--success-color) !important;
            color: white !important;
        }

        /* Personalizar el color del botón de cancelar */
        .swal2-cancel {
            background-color: var(--secondary-color) !important;
            /* Rojo Bootstrap */
            border-color: var(--secondary-color) !important;
            color: white !important;
        }

        .swal2-deny {
            background-color: var(--secondary-color) !important;
            /* Rojo Bootstrap */
            border-color: var(--secondary-color) !important;
            color: white !important;
        }

        /* Personalizar el botón de cerrar (X) */
        .swal2-close {
            color: #333 !important;
        }

        .redondo {
            border-radius: 0.7rem;
        }

        body {
            font-family: 'Encode Sans', serif;
            /* font-family: 'Roboto', serif; */
        }
    </style>

    <script>
        window.rol = "{{ session::get('rol') }}"
        window.usuario = "{{ session::get('user') }}"
        window.id_usuario = "{{ session::get('id_user') }}"
        window.defensor = "{{ session::get('defensor') }}";
        window.coordinacion = "{{ session::get('coordinacion') }}";
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">
        <!-- Barra de Navegación -->
        <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: var(--dark-color)">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #54565a"> -->
        <aside class="main-sidebar sidebar-dark-primary " style="background-color: var(--dark-color)">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('img/logos/logo_2.png') }}" alt="Logo TAM" class="brand-image ">
                <span class="brand-text font-weight-light"> SIIDPET </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel pt-3 pb-3 d-flex">
                    <div class="image mt-2">
                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info ">
                        <a class="text-wrap" style="font-size: smaller;"> {{ Auth::user()->name }}
                            {{ Auth::user()->fathername }} {{ Auth::user()->mothername }} </a>

                        @switch(Auth::user()->IDRol)
                            @case(1)
                                <a style="font-size: smaller;" class="d-block text-white"> Administrador </a>
                            @break

                            @case(2)
                                <a style="font-size: smaller;" class="d-block text-white"> Director General </a>
                            @break

                            @case(3)
                                <a style="font-size: smaller;" class="d-block text-white"> Director Defensorías </a>
                            @break

                            @case(4)
                                <a style="font-size: smaller;" class="d-block text-white"> Director Asesorías </a>
                            @break

                            @case(5)
                                <a style="font-size: smaller;" class="d-block text-white"> Coordinador </a>
                            @break

                            @case(6)
                                <a style="font-size: smaller;" class="d-block text-white"> Defensor </a>
                            @break

                            @case(7)
                                <a style="font-size: smaller;" class="d-block text-white"> Asesor </a>
                            @break

                            @default
                                <a style="font-size: smaller;" class="d-block text-white"> Rol no identificado </a>
                        @endswitch
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link" active-class="active">
                                <i class="nav-icon fas fa-solid fa-chart-line"></i>
                                <p>
                                    Estadisticas
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/expedientes" class="nav-link" active-class="active">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Expedientes
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/calendario" class="nav-link" active-class="active">
                                <i class="nav-icon fas fa-calendar-days"></i>
                                <p>
                                    Calendario
                                </p>
                            </router-link>
                        </li>
                        <!-- Catalogo -->
                        @if (session('rol') === '1' || session('rol') === 'administrador')
                            <li class="nav-item ">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        Sistema Acusatorio
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- Catalogo 1 -->
                                    <li class="nav-item">
                                        <router-link to="/Defensores" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-users fa-solid"></i>
                                            <p>
                                                Usuarios
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 2 -->
                                    <li class="nav-item">
                                        <router-link to="/Delito" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-handcuffs fa-solid "></i>
                                            <p>
                                                Delito
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 3 -->
                                    <li class="nav-item">
                                        <router-link to="/Ugi" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-table fa-solid"></i>
                                            <p>
                                                UGI
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 4 -->
                                    <li class="nav-item">
                                        <router-link to="/MedidasProteccion" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-table fa-solid"></i>

                                            <p>
                                                Medidas de Protección
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 5 -->
                                    <li class="nav-item">
                                        <router-link to="/Juez" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-gavel fa-solid"></i>
                                            <p>
                                                Juez de Control
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 6 -->
                                    <li class="nav-item">
                                        <router-link to="/Medidas" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-table fa-solid"></i>
                                            <p>
                                                Medida Cautelar
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 7 -->
                                    <li class="nav-item">
                                        <router-link to="/Tribunal" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-table fa-solid"></i>
                                            <p>
                                                T. de Enjuiciamiento
                                            </p>
                                        </router-link>
                                    </li>
                                    <!-- Catalogo 8 -->
                                    <li class="nav-item">
                                        <router-link to="/coordinaciones" class="nav-link" active-class="active">

                                            <i class="nav-icon fas fa-table fa-solid"></i>
                                            <p>
                                                Coordinaciones
                                            </p>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <!-- Cerrar Sesión -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
                                <p>Cerrar sesión</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pb-3">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main row -->
                    <div class="row">
                        <div class="container">
                            <div class="row justify-content-center">
                                <app-component> </app-component>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer ">
            <div class="float-right d-none d-sm-inline-block mb-2 mr-3">
                Version 1.0.0
            </div>
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }} "></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script>

    <script src="{{ asset('js/pages/dashboard.js') }}"></script>


</body>

</html>
