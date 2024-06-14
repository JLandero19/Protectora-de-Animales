<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Emails</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Emails</li>
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
                    <div class="mb-2">
                        <?= $message ?>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Asunto</th>
                                <th>Mensaje</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($emails as $data) {
                            ?>
                            <tr>
                                <td class="align-middle"><?= $data['id']; ?></td>
                                <td class="align-middle"><?= $data['name_to']; ?></td>
                                <td class="align-middle"><?= $data['mail_to']; ?></td>
                                <td class="align-middle"><?= $data['subject']; ?></td>
                                <td class="align-middle"><?= $data['message']; ?></td>
                                <td class="align-middle">
                                    <div class="btn-group d-flex justify-content-around">
                                        <form action="emails" method="post" onsubmit="return borrar()">
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