<div class="hero-wrap js-fullheight" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-11 ftco-animate text-center">
                <h1 class="mb-4">Ayudamos a los animales para que encuentren un hogar</h1>
                <p>
                    <a href="about-us" class="btn btn-success mr-md-4 py-3 px-4">Sobre Nosotros <span class="ion-ios-arrow-forward"></span></a>
                    <a href="donation" class="btn btn-info mr-md-4 py-3 px-4"><span class="fa fa-paypal mr-1"></span> Donar <span></span></a>
                </p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-5 d-flex">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(<?= RouteController::ctrlRoute() ?>views/images/image-template/about-1.jpg);"></div>
            </div>
            <div class="col-md-7 pl-md-5 py-md-5">
                <div class="heading-section pt-md-5">
                    <h2 class="mb-4">¿Porque deberías venir visitarnos?</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
                        <div class="text pl-3">
                            <h4>Ayudamos a los animales</h4>
                            <p>Una de nuestras principales tareas es ayudar a animales abandonados.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
                        <div class="text pl-3">
                            <h4>Servicio personalizado</h4>
                            <p>Podemos ayudarte a encontrar a un amigo fiel y a interactuar con los animales.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pawprint"></span></div>
                        <div class="text pl-3">
                            <h4>Tenemos actividades</h4>
                            <p>Organizamos actividades con animales para que los conozcas.</p>
                        </div>
                    </div>
                    <div class="col-md-6 services-2 w-100 d-flex">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
                        <div class="text pl-3">
                            <h4>Ayudas a hacer felices a nuestros animales</h4>
                            <p>Nuestros animales buscan un hogar en el que ser felices.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-counter" id="section-counter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="<?= $count_no_adopted ?>">0</strong>
                    </div>
                    <div class="text">
                        <span>Animales en adopción</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="<?= $count_adopted ?>">0</strong>
                    </div>
                    <div class="text">
                        <span>Animales adoptados</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="<?= $count_total_animals ?>">0</strong>
                    </div>
                    <div class="text">
                        <span>Total animales acogidos</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                    <div class="text">
                        <strong class="number" data-number="<?= $count_total_donations ?>">0</strong>
                    </div>
                    <div class="text">
                        <span>Numero de donaciones</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
		
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Galería</h2>
            </div>
        </div>
		<div class="row">
            <?php
            foreach ($gallery as $data_gallery) {
            ?>
                <div class="col-md-4 ftco-animate">
                    <div class="work mb-4 img d-flex align-items-end" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/<?= $data_gallery['category'] ?>/<?= $data_gallery['image'] ?>);">
                        <a href="<?= RouteController::ctrlRoute() ?>views/images/<?= $data_gallery['category'] ?>/<?= $data_gallery['image'] ?>" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>            
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-4">
                <div>
                    <a href="gallery" class="btn btn-success">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Las últimas noticias del blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            <?php
            foreach ($recent_blog2 as $data) {
            ?>

                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>" class="block-20 rounded" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/publications/<?= $data['image'] ?>');"></a>
                        <div class="text p-4">
                            <div class="meta mb-2">
                                <div><a class="text-dark" href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>"><?= $date_time->ctrGetMonth($data['creation_date']) ?> <?= $date_time->ctrFormatDate($data['creation_date'], "d, Y") ?></div>
                                <div><a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>"><?= $data['name'] ?> <?= $data['lastname'] ?></a></div>
                                <div><a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>" class="meta-chat"><span class="fa fa-comment"></span> <?= count($comment->ctrWhere("comments", "publication_id", $data['id'])) ?></a></div>
                            </div>
                            <h3 class="heading"><a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>"><?= $data['title'] ?></a></h3>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center mt-4">
                <div>
                    <a href="blog" class="btn btn-success">Ver todas las noticias</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/bg_3.jpg);">
    <div class="overlay"></div>
</section>
