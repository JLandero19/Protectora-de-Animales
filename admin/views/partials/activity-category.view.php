<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categoría Actividades</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Categoría Actividades</li>
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
                    <a href="add-activity-category" class="btn btn-success"><i class="fas fa-plus"></i>&nbsp; Nueva Actividad</a>
                    <?= $message ?>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Color Texto</th>
                                <th>Color Fondo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categories_activities as $data) {
                            ?>
                            <tr>
                                <td class="align-middle"><?= $data['id']; ?></td>
                                <td class="align-middle"><?= $data['title']; ?></td>
                                <td class="align-middle"><?= FunctionsController::ctrShortText($data['description'],50) ?></td>
                                <td class="align-middle">
                                    <input type="color" class="form-control" value="<?= $data['textColor']; ?>" disabled />
                                </td>
                                <td class="align-middle">
                                    <input type="color" class="form-control" value="<?= $data['backgroundColor']; ?>" disabled />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group d-flex justify-content-around">
                                        <div>
                                            <a class="btn btn-warning btn-sm text-white btnEditarUsuario" href="index.php?route=edit-activity-category&activity_category_id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <form action="activity-category" method="post" onsubmit="return borrar()">
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
        
        <!-- <div class="d-flex justify-content-center">
            
        </div> -->
        <!-- /.card-body -->
    </section>
</div>