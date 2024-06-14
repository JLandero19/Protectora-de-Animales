<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Mi cuenta <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-0 bread">Mi cuenta</h1>
            </div>
        </div>
    </div>
</section>

<!-- .section -->

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <?= $sponsor ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="<?= RouteController::ctrlRoute() ?>views/images/users/<?php echo $_SESSION['image'] == null ? "default/default-user.png" : $_SESSION['image']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $_SESSION['name'] ?> <?= $_SESSION['lastname'] ?></h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="edit-user" class="btn btn-primary">Editar Perfil</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="text-success fa-solid fa-paw"></i>
                                <p class="mb-0"><a href="my-account">Animales Adoptados</a></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="text-success fa-solid fa-paw"></i>
                                <p class="mb-0"><a href="index.php?route=my-account&account=my-sponsored">Animales Apadrinados</a></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="text-success fa-solid fa-blog"></i>
                                <p class="mb-0"><a href="index.php?route=my-account&account=my-publications">Publicaciones</a></p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="text-success fa-solid fa-arrow-right-from-bracket"></i>
                                <p class="mb-0"><a href="logout">Cerrar Sesión</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombre Completo</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['name'] ?> <?= $_SESSION['lastname'] ?></p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['email'] ?></p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">DNI</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['dni'] ?></p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Teléfono</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['tlf'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <?php
                            if (isset($_GET['account']) &&
                                ($_GET['account'] == 'my-adopted' || 
                                 $_GET['account'] == 'my-sponsored' ||    
                                 $_GET['account'] == 'my-publications')
                                ) {
                                include("views/modulos/my-account/".$_GET['account'].".php");
                            } else {
                                include("views/modulos/my-account/my-adopted.php");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>