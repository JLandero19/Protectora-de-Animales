<?php
$message = "";

$animal = new AnimalController();
$date_time = new FunctionsController();
$animals = $animal->ctrAll('species_animals_sponsored');

include("views/partials/animals-sponsored.view.php");
?>