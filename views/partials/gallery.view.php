<section class="hero-wrap hero-wrap-2" style="background-image: url('views/images/bg_4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Galería <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Galería</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <?php
            foreach ($species as $data_specie) {
            ?>
                <div class="col-md-3 col-sm-4 col-4 m-1 d-flex justify-content-center">
                    <a class="text-center pt-3 pr-3 pl-3 specie-link" href="index.php?route=gallery&specie-id=<?= $data_specie['id'] ?>"><img src="views/images/icons-animals/<?= $data_specie['image'] ?>" alt="" style="width: 75px;" /> <h5 class="text-center mt-1"><?= $data_specie['name'] ?></h5></a>
                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION['specie-id'])) {
            ?>
                <div class="col-md-3 col-sm-4 col-4 m-1 d-flex justify-content-center">
                    <a class="text-center pt-3 pr-3 pl-3 specie-link" href="index.php?route=gallery&filter-out"><img src="views/images/icon-filter-out.png" alt="" style="width: 75px;" /> <h5 class="text-center mt-1">Quitar filtro</h5></a>
                </div>
            <?php
            }
            ?>
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
        <?php include("views/partials/pagination-template.view.php"); ?>
    </div>
</section>