<?php
$message = "";

$email = new MailController();

$emails = $email->ctrAll('contact_emails');
// var_dump($animals);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $message = $email->ctrDeleteItem("contact_emails", $_POST['delete']);
    }
}

include("views/partials/emails.view.php");
?>