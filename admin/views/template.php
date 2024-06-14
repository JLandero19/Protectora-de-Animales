<?php
session_start();

// Es la ruta por defecto del proyecto
$route = RouteController::ctrlRoute();

$value = "";
// var_dump($route);

if (isset($_SESSION['profile']) && $_SESSION['profile'] == "admin") {
    // HEADER
    include("views/modulos/header.php");
    // FIN HEADER

    // CONTENIDO
    $modulo = "";
    
    if (isset($_GET['route'])){
        if ($_GET['route'] == 'inicio' ||
            $_GET['route'] == 'users' ||
            $_GET['route'] == 'add-user' ||
            $_GET['route'] == 'edit-user' ||
            $_GET['route'] == 'animals' ||
            $_GET['route'] == 'animals-no-adopted' ||
            $_GET['route'] == 'animals-adopted' ||
            $_GET['route'] == 'animals-sponsored' ||
            $_GET['route'] == 'add-animal' ||
            $_GET['route'] == 'edit-animal' ||
            $_GET['route'] == 'activity-category' ||
            $_GET['route'] == 'add-activity-category' ||
            $_GET['route'] == 'edit-activity-category' ||
            $_GET['route'] == 'blog' ||
            $_GET['route'] == 'add-publication' ||
            $_GET['route'] == 'edit-publication' ||
            $_GET['route'] == 'comments' ||
            $_GET['route'] == 'edit-comment' ||
            $_GET['route'] == 'emails' ||
            $_GET['route'] == 'donations' ||
            $_GET['route'] == 'calendar' ||
            $_GET['route'] == 'logout' ||
            $_GET['route'] == '404' ){

            $modulo = $_GET['route'];
        } else {
            $modulo = '404';
        }         
    } else {
        $modulo = 'inicio';
    }

    include("views/modulos/".$modulo.".php");
    // FIN CONTENIDO

    // FOOTER
    include("views/modulos/footer.php");
} else {
    include("views/modulos/login.php");
}
// FIN FOOTER

?>