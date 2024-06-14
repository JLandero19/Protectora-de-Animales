<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Donar <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Donar</h1>
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
                                <h3 class="mb-4">Dona por una buena causa</h3>
                                <form action="donation" method="POST" id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name_donation">Nombre Completo</label>
                                                <input type="text" class="form-control" name="name_donation" id="name_donation" placeholder="Nombre" />
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="mail_donation">Email</label>
                                                <input type="email" class="form-control" name="mail_donation" id="mail_donation" placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="amount_donation">Importe</label>
                                                <input type="number" class="form-control" name="amount_donation" id="amount_donation" step="any" placeholder="10.00" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Realizar Donación" class="btn btn-success" />
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5 img" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/animal-donation.jpeg);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>