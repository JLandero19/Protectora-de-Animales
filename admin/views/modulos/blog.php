<?php
$message = "";

$date_time = new FunctionsController();
$publication = new PublicationController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $message = $publication->ctrDeleteItem("publications", $_POST['delete']);
    }
}

$publications = $publication->ctrAll('publications_users');
// var_dump($animals);

include("views/partials/blog.view.php");
?>