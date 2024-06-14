<?php

$animal = new AnimalController();
$user = new UserController();
$donation = new DonationController();

$date_time = new FunctionsController();
$blog = new PublicationController();
$comment = new CommentController();

$recent_blog2 = $blog->ctrRecentBlog("publications_users", 3);

$gallery = $blog->ctrGalleryPreview("gallery", 6);

$count_no_adopted = count($animal->ctrAll("no_adopted_animals"));
$count_adopted = count($animal->ctrAll("adopted"));
$count_total_animals = count($animal->ctrAll("animals"));
$count_total_donations = count($donation->ctrWhere("donations", "status", "Aceptado"));
// var_dump($count_adopted);

include("views/partials/inicio.view.php");
?>