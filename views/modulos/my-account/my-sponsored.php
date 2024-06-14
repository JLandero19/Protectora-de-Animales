<?php
$message2 = "";
$animal = new AnimalController();
$date_time = new FunctionsController();
$user = new UserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_sponsored'])) {
        $message2 = $user->ctrCancelSponsor("sponsored", $_POST['delete_sponsored']);
    }
}

$animals = $animal->ctrWhereSponsored('species_animals_sponsored', 'user_id', $_SESSION['user_id']);

// CREATE VIEW species_animals_sponsored AS
// SELECT a.id "id", a.chip "chip", a.name "name", a.race "race", a.description "description", a.sex "sex", a.age "age", a.image "image", a.specie_id "specie_id", s.name "specie_name", u.id "user_id", u.dni "dni", u.name "user_name", u.lastname "user_lastname", u.tlf "tlf", u.image "image_user", u.role_id "role_id", sp.id "sponsored_id", sp.status "status", sp.start_date "start_date", sp.end_date "end_date"
// FROM animals a JOIN species s ON s.id = a.specie_id JOIN sponsored sp ON sp.animal_id = a.id JOIN users u ON sp.user_id = u.id
?>

<div class="card-header">
    Animales Apadrinados
</div>
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <?= $message2 ?>
        </div>
        <div class="col-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Chip</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
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
                            <td class="align-middle">
                                <div class="btn-group d-flex justify-content-around">
                                    <form action="index.php?route=my-account&account=my-sponsored" method="post" onsubmit="return borrar()">
                                        <input type="hidden" name="delete_sponsored" id="delete_sponsored" value="<?= $data['sponsored_id']; ?>" />
                                        <button type="submit" class="btn btn-danger btn-sm mx-1">Cancelar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>