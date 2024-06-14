<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Publicación</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="blog">Blog</a></li>
                        <li class="breadcrumb-item active">Editar Publicación</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title text-white">Editar Publicación</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="edit-publication" enctype="multipart/form-data">
                        <input type="hidden" name="edit" value="<?= $data['id'] ?>" />
                        <input type="hidden" name="image_original" value="<?= $data['image'] ?>" />
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Titulo de la publicación" value="<?= $data['title'] ?>" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" rows="10" name="description" id="description" placeholder="Descripcion del animal" required><?= $data['description'] ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="specie_id">Especie</label>
                                <select class="form-control" name="specie_id" id="specie_id">
                                    <?php
                                    foreach ($species as $data_specie) {
                                        if ($data_specie['id'] == $data['specie_id']) {
                                        ?>
                                            <option value="<?= $data_specie['id'] ?>" selected><?= $data_specie['name'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $data_specie['id'] ?>"><?= $data_specie['name'] ?></option>
                                        <?php
                                        }
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
                                            $selected = "";
                                            foreach ($tags_publication as $value) {
                                                if ($data_tag['id'] == $value['tag_id']) {
                                                    $selected = "selected";
                                                }
                                            }
                                        ?>
                                            <option value="<?= $data_tag['id'] ?>" <?php echo $selected; ?>><?= $data_tag['name'] ?></option>
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
                                <?php
                                if ($data['image'] != null) {
                                ?>
                                    <img src="../views/images/publications/<?= $data['image'] ?>" alt="imagen" class="thumbnail previsualizar" width="125px" />
                                <?php
                                } else {
                                ?>
                                    <img src="../views/images/publications/default/default-publication.png" alt="imagen" class="thumbnail previsualizar" width="125px" />
                                <?php
                                }
                                ?>
                                
                                
                            </div>
                            
                            <?php echo $message; ?>
                        </div>
                        <!-- /.card-body -->
                        
                        <div class="card-footer">
                            <a href="javascript:window.history.back();" class="btn btn-default pull-left">Cancelar</a>
                            <button type="submit" class="btn btn-warning text-white">Guardar Publicación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>