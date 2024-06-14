<?php
$message = "";

$animal = new AnimalController();
$date_time = new FunctionsController();
$animals = $animal->ctrAll('species_animals_adopted');

// CREATE VIEW species_animals_adopted AS
// SELECT a.id "id", a.chip "chip", a.name "name", a.race "race", a.description "description", a.sex "sex", a.age "age", a.image "image", a.specie_id "specie_id", s.name "specie_name", u.id "user_id", u.dni "dni", u.name "user_name", u.lastname "user_lastname", u.tlf "tlf", u.image "image_user", u.role_id "role_id", ad.id "adopted_id", ad.start_date "start_date", ad.end_date "end_date"
// FROM animals a JOIN species s ON s.id = a.specie_id JOIN adopted ad ON ad.animal_id = a.id JOIN users u ON ad.user_id = u.id


include("views/partials/animals-adopted.view.php");
?>