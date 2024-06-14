<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Contacto <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Contacto</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters mb-2">
                        <div class="col-md-12">
                            <?= $message ?>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Contacta con nosotros</h3>
                                <form action="contact" method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name_to">Nombre Completo</label>
                                                <input type="text" class="form-control" name="name_to" id="name_to" placeholder="Nombre">
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="mail_to">Email</label>
                                                <input type="email" class="form-control" name="mail_to" id="mail_to" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Asunto</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Mensaje</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Mensaje"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Enviar" class="btn btn-success" />
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/img.jpg);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<div class="container-fluid map-responsive">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d203177.56849458555!2d-7.349627808788594!3d37.27973758995724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11cf609b3a9b2b%3A0xbc25eefe24e5cbe!2sCentro%20Municipal%20de%20Acogida%20de%20Animales%20Vagabundos!5e0!3m2!1ses!2ses!4v1696696855823!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- <div id="map" class="map"></div> -->