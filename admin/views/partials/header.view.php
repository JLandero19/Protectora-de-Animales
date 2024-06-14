<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Love4Pets</title>

    <link rel="icon" type="image/x-icon" href="../views/images/favicon.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/fontawesome-free/css/all.min.css" />
    
    <!-- Theme style -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/ionicons.min.css" />
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- <link rel="stylesheet" href="views/css/select2.min.css" /> -->
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />

    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/bootstrap-clockpicker.css" />

    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/custom.css" />

    <script type="text/javascript">
        function borrar() {
            return window.confirm( '¿Seguro que desea eliminarlo?' );
        }
    </script>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="inicio" class="nav-link">Inicio</a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="contacto" class="nav-link">Contacto</a>
                </li> -->
            </ul>
            <!-- Navbar Search -->
            <!-- <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../">Mi sitio Web</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->