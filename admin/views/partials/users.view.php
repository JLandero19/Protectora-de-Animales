<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row d-flex justify-content-center">
                <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <a href="add-user" class="btn btn-success"><i class="nav-icon fas fa-plus"></i>&nbsp; Nuevo usuario</a>
                    <?= $message ?>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Imagen</th>
                                <th>Teléfono</th>
                                <th>Perfil</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $data) {
                            ?>
                                <tr>
                                    <td><?= $data['role_id']; ?></td>
                                    <td><?= $data['email']; ?></td>
                                    <td><?= $data['name']; ?> <?= $data['lastname']; ?></td>
                                    <td><?= $data['dni']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <?php
                                        if ($data['image'] != "") {
                                        ?>
                                            <img src="../views/images/users/<?= $data['image']; ?>" alt="usuario" class="img-thumbnail" width="35px" />
                                        <?php
                                        } else {
                                        ?>
                                            <img src="../views/images/users/default/default-user.png" alt="anonimo" class="img-thumbnail" width="35px" />
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= $data['tlf']; ?></td>
                                    <td><?= $data['profile']; ?></td>
                                    <td>
                                        <div class="btn-group d-flex justify-content-around">
                                            <div>
                                                <a class="btn btn-warning btn-sm text-white btnEditarUsuario" href="index.php?route=edit-user&user_id=<?= $data['user_id']; ?>"><i class="fas fa-edit"></i></a>
                                            </div>
                                            <?php
                                            if ($data['user_id'] != 1) {
                                            ?>
                                                <form action="users" method="post" onsubmit="return borrar()">
                                                    <input type="hidden" name="delete" id="role_id" value="delete" />
                                                    <input type="hidden" name="role_id" id="role_id" value="<?= $data['role_id']; ?>" />
                                                    <input type="hidden" name="user_id" id="user_id" value="<?= $data['user_id']; ?>" />
                                                    <input type="hidden" name="image" id="image" value="<?= $data['image']; ?>" />
                                                    <button type="submit" class="btn btn-danger btn-sm btnEliminarUsuario"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                            
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