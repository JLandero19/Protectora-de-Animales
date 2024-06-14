<?php

header("Content-Type: application/json");

include("../../../models/connect-model.php");

include("../../../controllers/validator-controller.php");

include("../../../models/activity-model.php");
include("../../../controllers/activity-controller.php");

$activity = new ActivityController();

$activities = $activity->ctrDeleteItem("activities", $_POST['id']);

$object = [
    "message" => $activities
];

// var_dump($activities);
echo json_encode($object);
?>