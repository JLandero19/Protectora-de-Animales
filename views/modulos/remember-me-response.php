<?php
$message = "";

if (isset($_GET['email'])) {
    $_SESSION['email_remember'] = $_GET['email'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new UserController();
    $message = $user->ctrRememberMeResponse($_POST, $_SESSION['email_remember']);
    unset($_SESSION['email_remember']);
}

include("views/partials/remember-me-response.view.php");
?>