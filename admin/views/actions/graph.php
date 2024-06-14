<?php

header("Content-Type: application/json");

include("../../../models/connect-model.php");

include("../../models/donation-model.php");
include("../../controllers/donation-controller.php");

$donation = new DonationController();

$donations = $donation->ctrGraph("donations");

$labels = [];
$amount = [];

foreach ($donations as $data) {
    $labels[] = ucfirst($data['month_name']);
    $amount[] = $data['total'];
}

// var_dump($labels);
// var_dump($amount);

$object = [
    "month" => $labels,
    "amount" => $amount,
];


echo json_encode($object);
?>