<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_activity = new ActivityCategoryController();

    $message = $category_activity->ctrInsertItem("activities_categories", $_POST);
}

include("views/partials/add-activity-category.view.php");
?>