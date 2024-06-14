<?php
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donation = new DonationController();
    $message = $donation->ctrSaveData("donations", $_POST);
    if ($message === "OKEY") {
        $_SESSION['donation'] = "donation";
        echo "<script type='text/javascript'>window.location = 'payment';</script>";
    }
    // var_dump($_SESSION['name_donation']);
    // var_dump($_SESSION['mail_donation']);
    // var_dump($_SESSION['amount_donation']);
}

include("views/partials/donation.view.php");
?>