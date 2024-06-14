<?php
$message = "";

if (isset($_GET['animal_id']) && $_GET['animal_id'] > 0) {
    $_SESSION['animal_id'] = $_GET['animal_id'];
}

$specie = new SpecieController();
$select_specie = $specie->ctrAll('species');

$animal = new AnimalController();
$data = $animal->ctrOneWhere('animals', "id", $_SESSION['animal_id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $message = $animal->ctrUpdateItem("animals", $_POST);
    // var_dump($_FILES);

}

include("views/partials/edit-animal.view.php");
?>