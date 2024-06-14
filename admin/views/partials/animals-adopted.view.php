<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Animales Adoptados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="animals">Animales</a></li>
                        <li class="breadcrumb-item active">Animales Adoptados</li>
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
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Adopción</th>
                                <th>Chip</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Raza</th>
                                <th>DNI del dueño</th>
                                <th>Nombre del dueño</th>
                                <th>Fecha de la adopción</th>
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
                                <td class="align-middle"><?= $data['dni']; ?></td>
                                <td class="align-middle"><?= $data['user_name']; ?> <?= $data['user_lastname']; ?></td>
                                <td class="align-middle"><?= $date_time->ctrFormatDate($data['start_date'], "Y-m-d") ?></td>
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