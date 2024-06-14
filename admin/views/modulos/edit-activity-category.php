<?php
$message = "";
$category_activity = new ActivityCategoryController();

if (isset($_GET["activity_category_id"]) && $_GET["activity_category_id"] > 0) {
    $_SESSION['activity_category_id'] = $_GET["activity_category_id"];
}

$data = $category_activity->ctrOneWhere("activities_categories", 'id', $_SESSION['activity_category_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $category_activity->ctrUpdateItem("activities_categories",$_POST);
}

include("views/partials/edit-activity-category.view.php");
?>