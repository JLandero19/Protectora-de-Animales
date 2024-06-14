<?php
$message = "";
$publication = new PublicationController();

if (isset($_GET['publication_id']) && $_GET['publication_id'] > 0) {
    $_SESSION['publication_id'] = $_GET['publication_id'];
}

$data = $publication->ctrOneWhere('publications', "id", $_SESSION['publication_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST['tag_id']);
    if (isset($_POST['edit'])) {
        $message = $publication->ctrUpdateItem("publications", $_POST, $_POST['edit']);
        unset($_SESSION['publication_id']);
    }
    
}

$specie = new SpecieController();
$species = $specie->ctrAll("species");

$tag = new TagController();
$tags = $tag->ctrAll("tags");
$tags_publication = $tag->ctrWhere("tags_publications", "publication_id", $data['id']);

include("views/partials/edit-publication.view.php");
?>