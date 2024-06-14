<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span>
                    <span class="mr-2"><a href="my-account">Mi cuenta <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Editar Publicación <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-0 bread">Editar Publicación</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Crea tu publicación</h3>
                                <form method="POST" action="edit-publication" id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data">
                                    <input type="hidden" name="edit" value="<?= $data['id'] ?>" />
                                    <input type="hidden" name="image_original" value="<?= $data['image'] ?>" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="title">Título</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Título" value="<?= $data['title'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="specie_id">Especie</label>
                                                <select class="form-control" name="specie_id" id="specie_id">
                                                    <option value="">Seleccione especie</option>
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Etiquetas</label>
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <form action="" method="post">
                                                    <label class="label">Crea tu etiqueta (Si ya existe no se creará)</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" name="name_tag" id="name_tag" />
                                                        <button type="button" id="btnAddTag" class="btn btn-success btn-sm mx-2">Crear</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Descripción</label>
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Descripción..."><?= $data['description'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="title">Imagen (Peso máximo de la foto 2MB)</label>
                                                <input type="file" class="form-control" name="image" id="file" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php echo $message; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Guardar Cambios" class="btn btn-warning text-white" />
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <?php
                            if ($data['image'] != null) {
                            ?>
                                <div class="info-wrap w-100 p-5 img" id="preview" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/publications/<?= $data['image'] ?>);"></div>
                            <?php
                            } else {
                            ?>
                                <div class="info-wrap w-100 p-5 img" id="preview" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/publications/default/default-publication.png);"></div>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>