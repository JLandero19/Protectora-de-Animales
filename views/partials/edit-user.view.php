<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="my-account">Mi Cuenta <i class="ion-ios-arrow-forward"></i></a></span> <span>Editar Usuario <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Editar Usuario</h1>
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
                        <div class="col-md-12">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Editar Usuario</h3>
                                <form action="edit-user" method="post" id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Nombre</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?= $_SESSION['name'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="lastname">Apellidos</label>
                                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos" value="<?= $_SESSION['lastname'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= $_SESSION['email'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-3"> 
                                            <div class="form-group">
                                                <label class="label" for="dni">DNI</label>
                                                <input type="text" class="form-control" name="dni" id="dni" placeholder="12345678A" maxlength="9" value="<?= $_SESSION['dni'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-3"> 
                                            <div class="form-group">
                                                <label class="label" for="tlf">Teléfono</label>
                                                <input type="text" class="form-control" name="tlf" id="tlf" placeholder="123456789" value="<?= $_SESSION['tlf'] ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="password">Contraseña (Si no se rellena se queda la contraseña actual)</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" />
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="confirm_password">Verificar Contraseña</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Verificar Contraseña" />
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="label" for="image">Imagen (Peso máximo de la foto 2MB)</label>
                                            <input type="file" class="form-control nuevaFoto" name="image" id="image" />
                                            <img src="<?= RouteController::ctrlRoute() ?>views/images/users/<?php echo $_SESSION['image'] == null ? "default/default-user.png" : $_SESSION['image'] ; ?>" alt="imagen" class="thumbnail previsualizar" width="125px" />
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex justify-content-center">
                                                <a href="my-account" class="btn btn-secondary mx-2">Volver</a>
                                                <input type="submit" value="Guardar Cambios" class="btn btn-success mx-2">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?= $message ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>