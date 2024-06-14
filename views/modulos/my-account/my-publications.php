<?php
$date_time = new FunctionsController();
$publication = new PublicationController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_publication'])) {
        $message = $publication->ctrDeleteItem("publications", $_POST['delete_publication']);
    }
}

$publications = $publication->ctrWhere('publications_users', 'user_id', $_SESSION['user_id']);
?>

<div class="card-header">
    Publicaciones
</div>
<div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($publications as $data) {
            ?>
                <tr>
                    <td class="align-middle"><?= $data['title']; ?></td>
                    <td class="align-middle"><?= FunctionsController::ctrShortText($data['description'],50) ?></td>
                    <td class="align-middle">
                        <?php
                        if ($data['image'] != null) {
                        ?>
                            <img src="views/images/publications/<?= $data['image']; ?>" alt="" width="75" />
                        <?php
                        } else {
                        ?>
                            <img src="views/images/publications/default/default-animal.png" alt="" width="75" />
                        <?php
                        }
                        ?>
                    </td>
                    <td class="align-middle"><?= $date_time->ctrFormatDate($data['creation_date'], "Y-m-d") ?></td>
                    <td class="align-middle">
                        <div class="btn-group d-flex justify-content-around">
                            <?php
                            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['user_id']) {
                            ?>
                                <div>
                                    <a class="btn btn-warning btn-sm btnEditarUsuario mx-1" href="index.php?route=edit-publication&publication_id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
                                </div>
                            <?php
                            }
                            ?>
                            <form action="index.php?route=my-account&account=my-publications" method="post" onsubmit="return borrar()">
                                <input type="hidden" name="delete_publication" id="delete_publication" value="<?= $data['id']; ?>" />
                                <button type="submit" class="btn btn-danger btn-sm mx-1"><i class="fas fa-trash-alt"></i></button>
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