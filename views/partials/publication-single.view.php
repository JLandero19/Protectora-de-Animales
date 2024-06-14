<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= RouteController::ctrlRoute() ?>views/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2">
                    <span class="mr-2"><a href="inicio">Inicio <i class="ion-ios-arrow-forward"></i></a></span> 
                    <span class="mr-2"><a href="blog">Blog <i class="ion-ios-arrow-forward"></i></a></span> 
                    <span><?= $data['title'] ?> <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-0 bread"><?= $data['title'] ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p>
                    <img src="<?= RouteController::ctrlRoute() ?>views/images/publications/<?= $data['image'] ?>" alt="" class="img-fluid" />
                </p>
                <h2 class="mb-3"><?= $data['title'] ?></h2>
                <p>
                    <?php
                    foreach ($tags as $data_tag) {
                    ?>
                        <span class="badge badge-pill badge-info"><?= $data_tag['name'] ?></span>&nbsp;
                    <?php
                    }
                    ?>
                </p>
                <p><?= $data['description'] ?></p>
                
                <div class="pt-5 mt-2">
                    <div class="comment-form-wrap pb-5">
                        <form action="index.php?route=publication-single&publication_id=<?= $data['id'] ?>" method="POST" class="p-4 bg-light">
                            <h4 class="mb-2">Haz tu comentario</h4>
                            <div class="form-group">
                                <!-- <label for="coment">Comentario</label> -->
                                <p></p>
                                <p>
                                    Para realizar un comentario necesitas estar registrado. <br />
                                    El comentario no se mostrará directamente, lo tendrán que validar.
                                </p>
                                <input type="hidden" name="publication_id" value="<?= $data['id'] ?>" />
                                <textarea name="comment" id="comment" cols="30" rows="3" class="form-control" <?php echo isset($_SESSION['email']) ? "" : "disabled" ; ?> placeholder="Escribe tu comentario ..."></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Comentar" class="btn btn-success btn-sm" <?php echo isset($_SESSION['email']) ? "" : "disabled" ; ?> />
                            </div>
                        </form>
                    </div>

                    <h3 class="mb-5"><?= count($comments) ?> Comentarios</h3>

                    <ul class="comment-list">
                        <?php
                        foreach ($comments as $data_comment) {
                        ?>
                            <?php
                            if (isset($_GET['edit_comment']) && $_GET['edit_comment'] == $data_comment['id']) {
                            ?>
                                <li class="comment" id="comment<?= $data_comment['id'] ?>">
                                    <form action="index.php?route=publication-single&publication_id=<?= $data['id'] ?>" method="POST" class="p-4 bg-light">
                                        <div class="form-group">
                                            <input type="hidden" name="update_comment" value="<?= $data_comment['id'] ?>" />
                                            <input type="hidden" name="pub_id" value="<?= $data['id'] ?>" />
                                            <p>Si editas el comentario, tendrás que esperar a la validación.</p>
                                            <textarea name="comment" id="comment" cols="30" rows="3" class="form-control"><?= $data_comment['comment'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Guardar cambios" class="btn btn-success btn-sm" />
                                            <a class="btn btn-secondary btn-sm" href="javascript:window.history.back()">Cancelar</a>
                                        </div>
                                        <?= $message2 ?>
                                    </form>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="comment" id="comment<?= $data_comment['id'] ?>">
                                    <div class="vcard bio">
                                        <img src="<?php echo $data_comment['user_image'] != null ? RouteController::ctrlRoute()."views/images/users/" . $data_comment['user_image'] : RouteController::ctrlRoute()."views/images/users/default/default-user.png" ; ?>" alt="Image User">
                                    </div>
                                    <div class="comment-body">
                                        <h3><?= $data_comment['name'] ?> <?= $data_comment['lastname'] ?></h3>
                                        <div class="meta"><?= $date_time->ctrGetMonth($data_comment['creation_date']) ?> <?= $date_time->ctrFormatDate($data_comment['creation_date'], "d, Y") ?> <?= $date_time->ctrFormatDate($data_comment['creation_date'], "h:i A") ?></div>
                                        <!-- April 7, 2020 at 10:05pm -->
                                        <p><?= $data_comment['comment'] ?></p>
                                        <!-- Button trigger modal -->
                                            <div class="d-flex">
                                                <?php
                                                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data_comment['user_id']) {
                                                ?>
                                                    <div class="mx-2">
                                                        <a class="btn btn-warning btn-sm text-white" href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>&edit_comment=<?= $data_comment['id'] ?>#comment<?= $data_comment['id'] ?>">Editar</a>
                                                    </div>
                                                    
                                                <?php
                                                }
                                                if ((isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data_comment['user_id']) || (isset($_SESSION['profile']) && $_SESSION['profile'] == "admin")) {
                                                ?>
                                                <form class="mx-2" action="index.php?route=publication-single&publication_id=<?= $data['id'] ?>" method="post" onsubmit="return borrar()">
                                                    <input type="hidden" name="delete" id="delete" value="<?= $data_comment['id']; ?>" />
                                                    <button type="submit" class="btn btn-danger btn-sm text-white">Eliminar</button>
                                                </form>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        
                                                                            
                                        <!-- <p><a href="#" class="reply">Reply</a></p> -->
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                            
                        <?php
                        }
                        ?>
                    </ul>
                    <!-- END comment-list -->
                </div>

            </div> <!-- .col-md-8 -->
            <?php include("views/modulos/sidebar.php"); ?>

        </div>
    </div>
</section> <!-- .section -->