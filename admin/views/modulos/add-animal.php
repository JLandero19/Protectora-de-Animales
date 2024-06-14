<?php
$message = "";

$specie = new SpecieController();
$select_specie = $specie->ctrAll('species');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $animal = new AnimalController();
    $message = $animal->ctrInsertItem("animals", $_POST);
    // var_dump($_FILES);

}

include("views/partials/add-animal.view.php");
?>