<?php

$date_time = new FunctionsController();
$blog = new PublicationController();
$specie = new SpecieController();
$tag = new TagController();
$comment = new CommentController();

// Las especies haran de categorias
$species = $specie->ctrAll("species");

$recent_blog = $blog->ctrRecentBlog("publications_users", 3);

$tags = $tag->ctrAll2("tags");

$action_form = "";
switch ($_GET['route']) {
    case 'adopted':
        $action_form = "adopted";
        break;
    case 'adopted-single':
        $action_form = "adopted";
        break;
    case 'blog':
        $action_form = "blog";
        break;
    case 'publication-single':
        $action_form = "blog";
        break;
}

include("views/partials/sidebar.view.php");
?>