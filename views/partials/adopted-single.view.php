<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="adopted">Adopción <i class="ion-ios-arrow-forward"></i></a></span> <span><?= $data['name'] ?> <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread"><?= $data['name'] ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p>
                    <img src="<?= RouteController::ctrlRoute() ?>views/images/animals/<?= $data['image'] ?>" alt="" class="img-fluid" />
                </p>
                <h2 class="mb-3">
                    <?= $data['name'] ?> 
                    es <?php echo $data['sex'] == "Macho" ? "un" : "una" ; ?>
                    <?= $data['race'] ?> y tiene <?= $data['age'] ?> años</h2>
                <p><?= $data['description'] ?></p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet enim lacus. 
                    Nullam tortor odio, congue sit amet vehicula quis, aliquam at libero. 
                    Integer rutrum in purus vitae faucibus. Etiam tincidunt fringilla lorem non sodales. 
                    Ut tempus, elit ut consectetur maximus, quam nulla porttitor nisl, id sodales mi nulla ac est. 
                    Integer dignissim, elit eget iaculis rhoncus, libero odio rutrum neque, maximus sagittis erat arcu condimentum nisl. 
                    Etiam et risus sed metus posuere finibus id ut purus.
                </p>
                <p class="text-right">

                    <?php
                    if (!$adopted && !$sponsored) {                    
                        if (!isset($_SESSION['email'])) {
                    ?>
                            <span class="text-danger">Necesitas iniciar sesión para poder adoptar o apadrinar</span>
                            <a href="" class="btn btn-primary mx-2 disabled">Adoptar</a>
                            <a href="" class="btn btn-info mx-2 disabled">Apadrinar</a>
                            
                    <?php
                        } else {
                    ?>
                            <div class="d-flex justify-content-end">
                                <form action="index.php?route=adopted-single&animal_id=<?= $data['id'] ?>" method="post">
                                    <input type="hidden" name="animal_id" value="<?= $data['id'] ?>" />
                                    <input type="hidden" name="name_animal" value="<?= $data['name'] ?>" />
                                    <button type="submit" class="btn btn-primary mx-2">Adoptar</button>
                                </form>
                                <a href="index.php?route=payment&animal_id=<?= $data['id'] ?>" disabled class="btn btn-info mx-2">Apadrinar</a>
                            </div>
                            <!-- <a href="#" class="btn btn-primary mx-2">Adoptar</a> -->
                            <!-- <a href="#" class="btn btn-info mx-2">Apadrinar</a> -->
                    <?php
                        }
                    } else {
                    ?>
                        <?php
                        if (isset($_SESSION['success'])) {
                        ?>
                            <div class='alert alert-success mt-2' role='alert'>
                                Acabas de adoptar/apadrinar a <?= $data['name'] ?>, gracias por ayudar a este pequeñ@ amig@.
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class='alert alert-success mt-2' role='alert'>
                                Este amiguito ya ha sido adoptado o apadrinado.
                            </div>
                        <?php
                        }
                        ?>
                        
                    <?php
                    }
                    ?>
                </p>

            </div> <!-- .col-md-8 -->
            <?php include("views/modulos/sidebar.php"); ?>

        </div>
    </div>
</section> <!-- .section -->