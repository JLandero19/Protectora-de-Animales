<?php

header("Content-Type: application/json");

include("../../../models/connect-model.php");

include("../../../models/activity-model.php");
include("../../../controllers/activity-controller.php");

$activity = new ActivityController();

$activities = $activity->ctrAll("calendar_activities");

// CREATE VIEW calendar_activities AS
// SELECT a.id "id", CONCAT(a.who_request, " (", ac.title, ")") "title", a.who_request "who_request", ac.textColor "textColor", ac.backgroundColor "backgroundColor", ac.id "activity_category_id", ac.title "category_title", ac.description "category_description", a.start "start", a.end "end"
// FROM activities_categories ac JOIN activities a ON ac.id = a.activity_category_id

// var_dump($activities);
echo json_encode($activities);
?>