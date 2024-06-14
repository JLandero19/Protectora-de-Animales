<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Recuperación de contraseña <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Recuperación de contraseña</h1>
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
                        <div class="col-md-6 offset-md-3">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Recuperación de contraseña</h3>
                                <form action="remember-me-response" method="post" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $message ?>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="password">Nueva contraseña</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Nueva contraseña" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="confirm_password">Verificar contraseña</label>
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Verificar contraseña" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex justify-content-center">
                                                <input type="submit" class="btn btn-primary text-center" value="Enviar" />
                                                <div class="submitting"></div>
                                            </div>
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