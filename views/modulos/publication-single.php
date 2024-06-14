<?php
$route = "publication-single";
if (!isset($_GET['publication_id'])) {
    echo "<script type='text/javascript'>window.location = '404';</script>";
}

$message = "";
$message2 = "";

$publication = new PublicationController();
$comment = new CommentController();
$date_time = new FunctionsController();
$tag = new TagController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['delete'])) {
        $comment->ctrDeleteItem("comments", $_POST['delete']);
    }

    if (isset($_POST['publication_id'])) {
        $message = $comment->ctrInsertItem("comments", $_POST);
    }

    if (isset($_POST['update_comment'])) {
        $message2 = $comment->ctrUpdateItem("comments", $_POST);
    }
}

$data = $publication->ctrOneWhere('publications_users', 'id', $_GET['publication_id']);
$tags = $tag->ctrWhere('tags_for_publicacion', 'publication_id', $_GET['publication_id']);
$comments = $comment->ctrWhere('comment_user', 'publication_id', $_GET['publication_id']);
// var_dump($data);

include("views/partials/publication-single.view.php");

unset($_SESSION['route']);
unset($_SESSION['animal_id']);
unset($_SESSION['publication_id']);
?>