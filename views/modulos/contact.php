<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = new MailController();
    $message = $mail->sendMailContact($_POST);
}

include("views/partials/contact.view.php");
?>