<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Iniciar sesión <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Iniciar Sesión</h1>
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
                                <h3 class="mb-4">Iniciar Sesión</h3>
                                <form action="login" method="post" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $message ?>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="password">Contraseña</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex justify-content-center">
                                                <input type="submit" class="btn btn-primary text-center" value="Iniciar Sesión" />
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group d-flex justify-content-center">
                                                <div>
                                                    <p class="text-center">
                                                        <a href="register">¿No tienes cuenta? Registrate</a>
                                                        <br />
                                                        <a href="remember-me">¿Has olvidado la contraseña?</a>
                                                    </p>
                                                </div>
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