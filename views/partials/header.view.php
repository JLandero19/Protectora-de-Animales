<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Love4Pets</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="icon" type="image/x-icon" href="<?= RouteController::ctrlRoute() ?>views/images/favicon.ico" />
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
    
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/animate.css">
    
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/magnific-popup.css">


        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/bootstrap-clockpicker.css" />
        
        <!-- <link rel="stylesheet" href="views/css/select2.min.css" /> -->
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- <link rel="stylesheet" href="views/css/jquery.timepicker.css"> -->

        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/flaticon.css">
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/style.css">
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/css/custom.css" />

        
        
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="<?= RouteController::ctrlRoute() ?>views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />

        <script src="https://kit.fontawesome.com/c1e0b13054.js" crossorigin="anonymous"></script>

        <!-- Replace the "test" client-id value with your client-id -->
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script src="<?= RouteController::ctrlRoute() ?>views/js/paypal.js"></script>

        <script type="text/javascript">
            function borrar() {
                return window.confirm( '¿Seguro que desea eliminarlo?' );
            }
        </script>
    </head>
<body>
    <div class="wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 d-flex align-items-center">
                    <p class="mb-0 phone pl-md-2">
                        <!-- <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a>  -->
                        <?php
                        if (!isset($_SESSION['email'])) {
                        ?>
                            <a href="register" class="mr-2"><span class="fa fa-user mr-1"></span> <span>¿No tienes cuenta? Registrate</span></a>
                            
                        <?php
                        } else {
                        ?>
                            <a href="my-account">
                                <span class="fa fa-user mr-1"></span>
                                <?php echo "Bienvenid@, " . $_SESSION['name'] . " " . $_SESSION['lastname']; ?>
                            </a>
                            <?php
                            if (isset($_SESSION['profile']) && $_SESSION['profile'] == "admin") {
                            ?>
                                <a href="admin/inicio" class="ml-4">
                                    <i class="fa-solid fa-screwdriver-wrench"></i>
                                    Administración
                                </a>
                            <?php
                            }
                            ?>
                            
                        <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="col-6 d-sm-flex justify-content-end d-none">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio"><img src="<?= RouteController::ctrlRoute() ?>views/images/logo.png" alt="Logotipo" width="45" /> Love4Pets</a>
            <!-- <a class="navbar-brand" href="inicio"><span class="flaticon-pawprint-1 mr-2"></span>Love4Pets</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_GET['route'])) {
                    ?>
                        <li class="nav-item <?php echo $_GET['route'] == 'inicio' ? 'active' : ''; ?>"><a href="inicio" class="nav-link">Inicio</a></li>
                        <li class="nav-item <?php echo $_GET['route'] == 'about-us' ? 'active' : ''; ?>"><a href="about-us" class="nav-link">Sobre Nosotros</a></li>
                        <li class="nav-item <?php echo $_GET['route'] == 'adopted' ? 'active' : ''; ?>"><a href="adopted" class="nav-link">Adopción</a></li>
                        <li class="nav-item <?php echo $_GET['route'] == 'blog' ? 'active' : ''; ?>"><a href="blog" class="nav-link">Blog</a></li>
                        <li class="nav-item <?php echo $_GET['route'] == 'contact' ? 'active' : ''; ?>"><a href="contact" class="nav-link">Contacto</a></li>
                        <?php
                        if (isset($_SESSION['email'])) {
                            if ($_SESSION['profile'] == NULL) {
                                if (count($user_adopted_animals) >= 1) {
                        ?>
                                    <!-- <li class="nav-item"><a href="my-account" class="nav-link">Mi cuenta</a></li> -->
                                    <li class="nav-item"><a href="add-publication" class="nav-link">Subir Publicación</a></li>
                        <?php
                                }
                        ?>
                                <li class="nav-item <?php echo $_GET['route'] == 'my-account' ? 'active' : ''; ?>"><a href="my-account" class="nav-link">Mi Cuenta</a></li>
                        <?php
                            }
                        ?>
                            <li class="nav-item"><a href="logout" class="nav-link">Cerrar Sesión</a></li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item <?php echo $_GET['route'] == 'login' ? 'active' : ''; ?>"><a href="login" class="nav-link">Iniciar Sesión</a></li>
                        <?php
                        }
                        ?>  
                    <?php
                    } else {
                    ?>
                        <li class="nav-item active"><a href="inicio" class="nav-link">Inicio</a></li>
                        <li class="nav-item"><a href="about-us" class="nav-link">Sobre Nosotros</a></li>
                        <li class="nav-item"><a href="adopted" class="nav-link">Adopción</a></li>
                        <li class="nav-item"><a href="blog" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="contact" class="nav-link">Contacto</a></li>
                        <?php
                        if (isset($_SESSION['email'])) {
                            if ($_SESSION['profile'] == NULL) {
                                if (count($user_adopted_animals) >= 1) {
                        ?>
                                    <li class="nav-item"><a href="add-publication" class="nav-link">Subir Publicación</a></li>
                        <?php
                                }
                        ?>
                                <li class="nav-item"><a href="my-account" class="nav-link">Mi Cuenta</a></li>
                        <?php
                            }
                        ?>
                            <li class="nav-item"><a href="logout" class="nav-link">Cerrar Sesión</a></li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item"><a href="login" class="nav-link">Iniciar Sesión</a></li>
                        <?php
                        }
                        ?> 
                    <?php
                    }
                    ?>               
                </ul>                
            </div>
        </div>
    </nav>
    <!-- END nav -->