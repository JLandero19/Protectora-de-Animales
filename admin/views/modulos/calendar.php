<?php

$activity_category = new ActivityCategoryController();
$activities_categories = $activity_category->ctrAll("activities_categories");

include("views/partials/calendar.view.php");
?>