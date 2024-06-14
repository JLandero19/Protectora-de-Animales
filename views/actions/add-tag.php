<?php

header('Content-type: application/json; charset=utf-8');

include("../../models/connect-model.php");

include("../../controllers/validator-controller.php");

include("../../models/tag-model.php");
include("../../controllers/tag-controller.php");

$tag = new TagController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $tag->ctrInsertItem("tags", $_POST);
}

$tags = $tag->ctrAll("tags");

$object = [
    "tags" => $tags,
    "message" => $message
];

echo json_encode($object);
?>