<?php
$message = "";
$user = new UserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $user->ctrUpdateItem("role_users", $_POST, $_SESSION['role_id'], $_SESSION['user_id']);
}

include("views/partials/edit-user.view.php");
?>