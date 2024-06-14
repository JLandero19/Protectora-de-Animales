<?php
$animal = new AnimalController();
$date_time = new FunctionsController();
$animals = $animal->ctrWhere('species_animals_adopted', 'user_id', $_SESSION['user_id']);

// CREATE VIEW species_animals_adopted AS
// SELECT a.id "id", a.chip "chip", a.name "name", a.race "race", a.description "description", a.sex "sex", a.age "age", a.image "image", a.specie_id "specie_id", s.name "specie_name", u.id "user_id", u.dni "dni", u.name "user_name", u.lastname "user_lastname", u.tlf "tlf", u.image "image_user", u.role_id "role_id", ad.id "adopted_id", ad.start_date "start_date", ad.end_date "end_date"
// FROM animals a JOIN species s ON s.id = a.specie_id JOIN adopted ad ON ad.animal_id = a.id JOIN users u ON ad.user_id = u.id

?>

<div class="card-header">
    Animales Adoptados
</div>
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Chip</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Fecha de la adopción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($animals as $data) {
            ?>
                <tr>
                    <td class="align-middle"><?= $data['chip']; ?></td>
                    <td class="align-middle">
                        <?php
                        if ($data['image'] != null) {
                        ?>
                            <img src="views/images/animals/<?= $data['image']; ?>" alt="" width="75" />
                        <?php
                        } else {
                        ?>
                            <img src="views/images/animals/default/default-animal.png" alt="" width="75" />
                        <?php
                        }
                        ?>
                    </td>
                    <td class="align-middle"><?= $data['name']; ?></td>
                    <td class="align-middle"><?= $date_time->ctrFormatDate($data['start_date'], "Y-m-d") ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>