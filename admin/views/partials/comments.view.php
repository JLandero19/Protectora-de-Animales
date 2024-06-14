<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comentarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="blog">Blog</a></li>
                        <li class="breadcrumb-item active">Comentarios</li>
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
                <?php
                if ($message != '') {
                ?>
                    <div class='card-header'>
                        <?= $message ?>
                    </div>
                <?php
                }
                ?>
                
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Comentario</th>
                                <th>Estado</th>
                                <th>Autor</th>
                                <th>ID de Publicación</th>                           
                                <th>Fecha de creación</th>
                                <th>Fecha de modificación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($comments as $data) {
                            ?>
                            <tr>
                                <td class="align-middle"><?= $data['id']; ?></td>
                                <td class="align-middle"><?= $data['comment']; ?></td>
                                <td class="align-middle text-center">
                                    <form action="comments" method="post">
                                        <input type="hidden" name="update" value="<?= $data['id']; ?>" />
                                        <input type="hidden" name="status" value="<?php echo $data['status'] == "Pendiente" ? "Valido" : "Pendiente" ; ?>" />
                                        <button type="submit" class="badge <?php echo $data['status'] == "Pendiente" ? "badge-danger" : "badge-success" ; ?>"><?= $data['status']; ?></button>
                                    </form>
                                </td>
                                <td class="align-middle"><?= $data['name']; ?> <?= $data['lastname']; ?></td>
                                <td class="align-middle"><?= $data['publication_id']; ?></td>
                                <td class="align-middle"><?= $date_time->ctrFormatDate($data['creation_date'], "d-m-Y h:i:s") ?></td>
                                <td class="align-middle"><?= $date_time->ctrFormatDate($data['modify_date'], "d-m-Y h:i:s") ?></td>
                                <td class="align-middle">
                                    <div class="btn-group d-flex justify-content-around">
                                        <?php
                                        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data['user_id']) {
                                        ?>
                                            <div>
                                                <a class="btn btn-warning btn-sm text-white btnEditarUsuario" href="index.php?route=edit-comment&comment_id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <form action="comments" method="post" onsubmit="return borrar()">
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