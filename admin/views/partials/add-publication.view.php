<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nueva Publicación</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="blog">Blog</a></li>
                        <li class="breadcrumb-item active">Nueva Publicación</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Nueva Publicación</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="add-publication" method="POST" enctype="multipart/form-data">
                        <!-- <input type="hidden" name="create" id="create" value="create" /> -->
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Titulo de la publicación" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" rows="10" name="description" id="description" placeholder="Descripcion del animal" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="specie_id">Especie</label>
                                <select class="form-control" name="specie_id" id="specie_id">
                                    <?php
                                    foreach ($species as $data_specie) {
                                    ?>
                                        <option value="<?= $data_specie['id'] ?>"><?= $data_specie['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Etiquetas</label>
                                <div class="select2-purple">
                                    <select class="form-control select2" data-dropdown-css-class="select2-purple" data-placeholder="Selecciona una etiqueta/s" name="tag_id[]" id="tag_id" multiple>
                                        <?php
                                        foreach ($tags as $data_tag) {
                                        ?>
                                            <option value="<?= $data_tag['id'] ?>"><?= $data_tag['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label">Crea tu etiqueta (Si ya existe no se creará)</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" name="name_tag" id="name_tag" placeholder="Nombre de la etiqueta" />
                                    <button type="button" id="btnAddTag" class="btn btn-success btn-sm mx-2">Crear</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="panel">Imagen</div>
                                <input type="file" class="nuevaFoto" name="image" id="image" />
                                <p class="help-block1">Peso máximo de la foto 2MB.</p>
                                <img src="../views/images/publications/default/default-publication.png" alt="imagen" class="thumbnail previsualizar" width="125px" />
                            </div>
                            
                            <?php echo $message; ?>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <a href="javascript:window.history.back();" class="btn btn-default pull-left">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar Publicación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>