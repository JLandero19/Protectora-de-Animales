<?php

$message = "";

$user = new UserController();

if (!isset($_SESSION['route']) && isset($_GET['last_route'])) {
    $_SESSION['route'] = $_GET['last_route'];
}

if (!isset($_SESSION['animal_id']) && isset($_GET['animal_id'])) {
    $_SESSION['animal_id'] = $_GET['animal_id'];
}

if (!isset($_SESSION['publication_id']) && isset($_GET['publication_id'])) {
    $_SESSION['publication_id'] = $_GET['publication_id'];
}

if (isset($_GET['code'])) {
    if (isset($_GET['verificated'])) {
        $message = $user->ctrConfirmation($_GET);
    } else {
        $message = "<div class='alert alert-info mt-2' role='alert'>Se ha enviado un correo de verificación.</div>";
    }
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $user->ctrlLoginUserWithEmail($_POST);
}

include("views/partials/login.view.php");
unset($_SESSION['message']);
?>