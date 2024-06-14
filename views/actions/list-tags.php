<?php

header("Content-Type: application/json");

include("../../../models/connect-model.php");

include("../../../models/activity-model.php");
include("../../../controllers/activity-controller.php");

$tag = new TagController();

$tags = $tag->ctrAll("tags");
// var_dump($activities);
echo json_encode($tags);
?>