<?php
$message = "";

$date_time = new FunctionsController();
$donation = new DonationController();

$donations = $donation->ctrAll('donations');

include("views/partials/donations.view.php");
?>