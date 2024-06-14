<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="row" data-masonry='{"percentPosition": true }'>
                    <!-- Blog -->
                    <?php
                    if ($publications) {
                        $type_post = 1;
                        foreach ($publications as $data) {
                            $comments = $comment->ctrWhere("comments", "publication_id", $data['id']);
                            if ($type_post == 5) {
                                $type_post = 1;
                            }
                            
                            switch ($type_post) {
                                case 1:
                    ?>
                                    <div class="col-sm-6 col-lg-6 mb-4">
                                        <div class="card cards <?= FunctionsController::ctrBorder($data['specie_id']) ?>">
                                            <a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>">
                                                <img class="bd-placeholder-img card-img-top" width="100%" height="250" src="<?= RouteController::ctrlRoute() ?>views/images/publications/<?= $data['image'] ?>" alt="Image Publication" />
                                                <div class="card-body">
                                                    <h5 class="card-title text-green"><?= $data['title'] ?></h5>
                                                    <p class="card-text text-dark"><?= $data['description'] ?></p>
                                                    <p class="card-text"><small class="text-muted"><?= $date_time->ctrGetMonth($data['creation_date']) ?> <?= $date_time->ctrFormatDate($data['creation_date'], "d, Y") ?></small> &nbsp; <span class="fa fa-comment"></span> <?= count($comments) ?></p>
                                                </div>
                                            </a>
                                            
                                            
                                        </div>
                                    </div>
                    <?php
                                    break;
                                case 2:
                    ?>
                                    <div class="col-sm-6 col-lg-6 mb-4">
                                        <div class="card cards <?php echo FunctionsController::ctrBorder($data['specie_id']); ?> text-center">
                                            <a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title text-green"><?= $data['title'] ?></h5>
                                                    <p class="card-text text-dark"><?= $data['description'] ?></p>
                                                    <p class="card-text"><small class="text-muted"><?= $date_time->ctrGetMonth($data['creation_date']) ?> <?= $date_time->ctrFormatDate($data['creation_date'], "d, Y") ?></small> &nbsp; <span class="fa fa-comment"></span> <?= count($comments) ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                case 3:
                    ?>
                                    <div class="col-sm-6 col-lg-6 mb-4">
                                        <div class="card cards <?php echo FunctionsController::ctrBorder($data['specie_id']); ?>">
                                            <a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>">
                                                <img class="bd-placeholder-img card-img" width="100%" height="260" src="<?= RouteController::ctrlRoute() ?>views/images/publications/<?= $data['image'] ?>" alt="Image Publication" />
                                                <div class="overlay"><?= $data['title'] ?> &nbsp; <span class="fa fa-comment"></span> <?= count($comments) ?></div>
                                            </a>
                                        </div>
                                    </div>
                                    
                    <?php
                                    break;
                                case 4:
                    ?>
                                    <div class="col-sm-6 col-lg-6 mb-4">
                                        <div class="card cards <?php echo FunctionsController::ctrBorder($data['specie_id']); ?> bg-primary text-white text-center">
                                            <a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title text-white"><?= $data['title'] ?></h5>
                                                    <p class="card-text text-white"><?= $data['description'] ?></p>
                                                    <p class="card-text text-white"><small><?= $date_time->ctrGetMonth($data['creation_date']) ?> <?= $date_time->ctrFormatDate($data['creation_date'], "d, Y") ?></small> &nbsp; <span class="fa fa-comment"></span> <?= count($comments) ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                    <?php
                                    break;
                            }
                            $type_post++;
                        }
                    } else {
                    ?>
                        <div class="col-sm-12 col-lg-12 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <p class="card-title">No hay publicaciones en este momento.</p>
                                </div>
                            </div>
                        </div>
                    <?php                
                    }
                    ?>

                </div>
                <?php
                if ($publications) {
                    include("views/partials/pagination-template.view.php");
                }
                ?>
            </div>

            <?php include("views/modulos/sidebar.php"); ?>
        </div>
    </div>
</section>
