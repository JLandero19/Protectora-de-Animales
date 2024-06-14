<?php
$message = "";

$category_activity = new ActivityCategoryController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $message = $category_activity->ctrDeleteItem("activities_categories", $_POST['delete']);
    }
}

$categories_activities = $category_activity->ctrAll('activities_categories');

include("views/partials/activity-category.view.php");
?>