<?php
$message = "";

$specie = new SpecieController();
$species = $specie->ctrAll("species");

$tag = new TagController();
$tags = $tag->ctrAll("tags");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $publication = new PublicationController();
    // var_dump($_POST['tag_id']);
    $message = $publication->ctrInsertItem("publications", $_POST);
}

unset($_SESSION['route']);
unset($_SESSION['animal_id']);
unset($_SESSION['publication_id']);

include("views/partials/add-publication.view.php");
?>