<?php
$message = "";

$date_time = new FunctionsController();
$comment = new CommentController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $message = $comment->ctrUpdateStatus("comments", $_POST);
    }
    if (isset($_POST['delete'])) {
        $message = $comment->ctrDeleteItem("comments", $_POST['delete']);
    }
}

$comments = $comment->ctrAll('comment_user');
// var_dump($animals);

include("views/partials/comments.view.php");
?>