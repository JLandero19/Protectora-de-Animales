<?php
$message = "";

if (isset($_GET['animal_id'])) {
    $_SESSION['animal_id'] = $_GET['animal_id'];
}
// var_dump($_SESSION);
if (isset($_GET['order-id'])) {
    $_SESSION['order-id'] = $_GET['order-id'];
    if (isset($_SESSION['donation'])) {
        if (isset($_SESSION['amount_donation']) && isset($_SESSION['mail_donation']) && isset($_SESSION['amount_donation'])) {
            $donation = new DonationController();
            $message = $donation->ctrEndDonation("donations", $_SESSION);
        } else {
            echo "<script type='text/javascript'>window.location = '404';</script>";
        }

        
    } else {
        $user = new UserController();
        $message = $user->ctrSponsored("sponsored", $_SESSION);
    }
} else {
    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>window.location = '404';</script>";
    }
}



include("views/partials/payment.view.php");
?>