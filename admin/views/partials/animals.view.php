<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Animales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Animales</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row d-flex justify-content-center m-2">
                <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <a href="add-animal" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp; Nuevo animal</a>
                    <?= $message ?>
                </div>
                <div class="card-body">
                    
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Chip</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Raza</th>
                                <th>Descripción</th>
                                <th>Sexo</th>
                                <th>Edad</th>
                                <th>Especie</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($animals as $data) {
                            ?>
                            <tr>
                                <td class="align-middle"><?= $data['id']; ?></td>
                                <td class="align-middle"><?= $data['chip']; ?></td>
                                <td class="align-middle">
                                    <?php
                                    if ($data['image'] != null) {
                                    ?>
                                        <img src="../views/images/animals/<?= $data['image']; ?>" alt="" width="75" />
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../views/images/animals/default/default-animal.png" alt="" width="75" />
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="align-middle"><?= $data['name']; ?></td>
                                <td class="align-middle"><?= $data['race']; ?></td>
                                <td class="align-middle"><?= FunctionsController::ctrShortText($data['description'],50) ?></td>
                                <td class="align-middle"><?= $data['sex']; ?></td>
                                <td class="align-middle"><?= $data['age']; ?></td>
                                <td class="align-middle"><?= $data['specie_name']; ?></td>
                                <td class="align-middle">
                                    <div class="btn-group d-flex justify-content-around">
                                        <div>
                                            <a class="btn btn-warning btn-sm text-white btnEditarUsuario" href="index.php?route=edit-animal&animal_id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <form action="animals" method="post" onsubmit="return borrar()">
                                            <input type="hidden" name="delete" id="delete" value="<?= $data['id']; ?>" />
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
        <!-- /.card-body -->
    </section>
</div>