<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new UserController();
    $message = $user->ctrInsertItem($_POST);
}

include("views/partials/add-user.view.php");
?>