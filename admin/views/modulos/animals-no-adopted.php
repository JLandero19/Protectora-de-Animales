<?php
$message = "";

$animal = new AnimalController();

$animals = $animal->ctrAll('no_adopted_animals');
// var_dump($animals);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $message = $animal->ctrDeleteItem("animals", $_POST['delete']);
    }
}

include("views/partials/animals-no-adopted.view.php");
?>