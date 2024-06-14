<?php
$message = "";
$specie = new SpecieController();
$species = $specie->ctrAll("species");

$tag = new TagController();
$tags = $tag->ctrAll("tags");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $publication = new PublicationController();
    $message = $publication->ctrInsertItem("publications", $_POST);
}

include("views/partials/add-publication.view.php");
?>