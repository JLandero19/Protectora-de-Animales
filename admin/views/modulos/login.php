<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new UserController();
    $mensaje = $usuario->ctrlLoginUserWithEmail($_POST);
}

if (isset($_SESSION['profile']) && $_SESSION['profile'] == "admin") {
    echo "<script type='text/javascript'>window.location = 'inicio';</script>";
}

include("views/partials/login.view.php");
?>