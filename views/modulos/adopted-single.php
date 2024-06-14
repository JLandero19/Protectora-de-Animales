<?php
$message = "";
$route = "adopted-single";

if (!isset($_GET['animal_id'])) {
    echo "<script type='text/javascript'>window.location = '404';</script>";
}

$animal = new AnimalController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new UserController();
    $message = $user->ctrAdopted("adopted", $_POST);
}

$data = $animal->ctrOneWhere('animals', 'id', $_GET['animal_id']);
$adopted = $animal->ctrOneWhere('adopted', 'animal_id', $_GET['animal_id']);
$sponsored = $animal->ctrWhereSponsored('sponsored', 'animal_id', $_GET['animal_id']);
// var_dump($data);

include("views/partials/adopted-single.view.php");

// unset($_SESSION['route']);
// unset($_SESSION['animal_id']);
// unset($_SESSION['publication_id']);
// unset($_SESSION['success']);
?>