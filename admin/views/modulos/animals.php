<?php
$message = "";

$animal = new AnimalController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $message = $animal->ctrDeleteItem("animals", $_POST['delete']);
    }
}

$animals = $animal->ctrAll('animals_species');
// var_dump($animals);

include("views/partials/animals.view.php");
?>