<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Adopción <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Adopción</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 ftco-animate">
                <div class="block-7">
                    <form class="row p-4" action="adopted" method="POST">
                        <input type="hidden" name="search" id="search" value="" />
                        <div class="col-12 d-flex align-items-center">
                            <select name="filter_specie_adopted" id="filter_specie_adopted" class="form-control mx-2" style="font-size: 16px;">
                                <option value="">Seleccione especie</option>
                                <?php
                                foreach ($species as $data) {
                                ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <input type="text" class="form-control align-middle mx-2" style="font-size: 16px;" name="filter_search_adopted" id="filter_search_adopted" placeholder="Buscar..." />
                            <input type="submit" class="btn btn-success mx-2" style="font-size: 16px;" value="Buscar" />
                            <?php
                            if (isset($_SESSION['filter_specie_adopted']) || isset($_SESSION['filter_search_adopted'])) {
                            ?>
                                <a class="mx-2" href="index.php?route=adopted&filter_out" style="font-size: 16px;">Quitar filtros</a>
                            <?php
                            }
                            ?>
                            
                        </div>
                    </form>
                </div>
            </div>
            <?php
            foreach ($animals as $data) {
            ?>
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/animals/<?= $data['image'] ?>);"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block mb-3" style="font-size: 20px;"><?= $data['name'] ?></span>

                            <ul class="pricing-text mb-4">
                                <li style="font-size: 16px;"><b>Edad <?= $data['age'] ?> años</b></li>
                                <li style="font-size: 16px;"><b>Sexo <?= $data['sex'] ?></b></li>
                                <li style="font-size: 16px;"><b>Raza <?= $data['race'] ?></b></li>
                            </ul>

                            <a href="index.php?route=adopted-single&animal_id=<?= $data['id'] ?>" style="font-size: 14px;" class="btn btn-success d-block px-2 py-3">Más información</a>
                        </div>
                    </div>
                </div> 
            <?php
            }
            ?>
        </div>
        <?php include("views/partials/pagination-template.view.php"); ?>
    </div>
</section>