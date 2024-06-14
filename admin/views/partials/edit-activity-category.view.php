<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Actividad</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="activity-category">Actividades</a></li>
                        <li class="breadcrumb-item active">Editar Actividad</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title text-white">Editar Actividad</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="edit-activity-category">
                        <input type="hidden" name="activity_category_id" value="<?= $data['id'] ?>" />
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Título de la actividad" value="<?= $data['title'] ?>" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" rows="10" name="description" id="description" placeholder="Descripcion de la actividad" required><?= $data['description'] ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="textColor">Color Texto</label>
                                <input type="color" class="form-control" name="textColor" id="textColor" value="<?= $data['textColor'] ?>" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="backgroundColor">Color Fondo</label>
                                <input type="color" class="form-control" name="backgroundColor" id="backgroundColor" value="<?= $data['backgroundColor'] ?>" required />
                            </div>
                            
                            <?php echo $message; ?>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <a href="javascript:window.history.back();" class="btn btn-default pull-left">Cancelar</a>
                            <button type="submit" class="btn btn-warning text-white">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>