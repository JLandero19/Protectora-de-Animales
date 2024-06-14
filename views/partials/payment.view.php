<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <?php
                if (isset($_SESSION['donation'])) {
                ?>
                    <p class="breadcrumbs mb-2">
                        <span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Donar <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Donar</h1>
                <?php
                } else {
                ?>
                    <p class="breadcrumbs mb-2">
                        <span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> 
                        <span>Apadrinar <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                    <h1 class="mb-0 bread">Apadrinar</h1>
                <?php
                }
                ?>
                
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
                        <div class="col-md-6 offset-md-3">
                            <?= $message ?>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-6 offset-md-3">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <?php
                                if (isset($_SESSION['donation'])) {
                                ?>
                                    <h3 class="mb-4 text-center">Resumen de la Donación</h3>
                                    <p><b>NOMBRE:</b> <span id="name_donation"><?= $_SESSION['name_donation'] ?></span></p>
                                    <p><b>EMAIL:</b> <span id="mail_donation"><?= $_SESSION['mail_donation'] ?></span></p>
                                    <p><b>IMPORTE:</b> <span id="amount_donation"><?= $_SESSION['amount_donation'] ?></span> €</p>
                                <?php
                                } else {
                                ?>
                                    <h3 class="mb-4 text-center">Resumen del pago del apadrinamiento</h3>
                                    <p><b>NOMBRE:</b> <span id="name_donation"><?= $_SESSION['name'] ?> <?= $_SESSION['lastname'] ?></span></p>
                                    <p><b>EMAIL:</b> <span id="mail_donation"><?= $_SESSION['email'] ?></span></p>
                                    <p><b>IMPORTE:</b> <span id="amount_donation">100</span> €</p>
                                <?php
                                }
                                ?>

                                
                                <?php
                                if (!isset($_SESSION['order-id'])) {
                                ?>
                                    <div class="d-flex justify-content-center">
                                        <div id="paypal-button-container"></div>
                                    </div> 
                                <?php
                                } else {
                                ?>
                                    <a href="inicio" class="btn btn-secondary btn-lg btn-block">Volver a inicio</a>
                                <?php                                    
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>