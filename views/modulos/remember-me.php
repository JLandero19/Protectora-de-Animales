<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = new MailController();
    $message = $mail->ctrSendMailRememberMe($_POST);
}

include("views/partials/remember-me.view.php");
?>