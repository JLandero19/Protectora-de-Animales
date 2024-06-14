<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Subir Publicación <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Subir Publicación</h1>
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
                                <form method="POST" action="add-publication" id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="title">Título</label>
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Título">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="specie_id">Especie</label>
                                                <select class="form-control" name="specie_id" id="specie_id">
                                                    <option value="">Seleccione especie</option>
                                                    <?php
                                                    foreach ($species as $data) {
                                                    ?>
                                                        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label">Etiquetas</label>
                                                <select class="form-control select2" data-placeholder="Selecciona una etiqueta/s" name="tag_id[]" id="tag_id" multiple>
                                                    <?php
                                                    foreach ($tags as $data) {
                                                    ?>
                                                        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <form action="" method="post">
                                                    <label class="label">Crea tu etiqueta (Si ya existe no se creará)</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control" name="name_tag" id="name_tag" placeholder="Nombre de la etiqueta" />
                                                        <button type="button" id="btnAddTag" class="btn btn-success btn-sm mx-2">Crear</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Descripción</label>
                                                <textarea name="description" class="form-control" id="description" cols="30" rows="4" placeholder="Descripción..."></textarea>
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
                                                <input type="submit" value="Subir Publicación" class="btn btn-primary" />
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" id="preview" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/publications/default/default-publication.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <div id="map" class="map"></div> -->