<?php
$message = "";
$sponsor = "";
$user = new UserController();

$sponsor = $user->ctrDatePaymentSponsor();
// var_dump($sponsor);
// var_dump($_SESSION);

include("views/partials/my-account.view.php");
?>