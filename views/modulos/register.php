<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new UserController();
    $message = $user->ctrRegister($_POST);
}

include("views/partials/register.view.php");
?>