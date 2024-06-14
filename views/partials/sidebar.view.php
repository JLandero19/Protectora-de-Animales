<!-- Sidebar -->
<div class="col-lg-4 sidebar pl-lg-5 ftco-animate d-lg-block d-sm-none">
    
    <div class="sidebar-box">
        
        <form class="search-form" id="formSearchSideBar" action="<?php echo $action_form; ?>" method="POST">
            <div class="form-group">
                <input type="hidden" name="search" />
                <input type="text" class="form-control" name="filter_search_<?php echo $action_form; ?>" placeholder="Buscar" />
                <a href="javascript:void(0);" onclick="document.getElementById('formSearchSideBar').submit()"><span class="fa fa-search"></span></a>
            </div>
            <?php
            if ($route == "blog") {
                if (isset($_SESSION['filter_specie_blog']) || isset($_SESSION['filter_search_blog'])) {
                ?>
                    <div class="form-group">
                        <a href="index.php?route=<?php echo $action_form; ?>&filter_out" style="font-size: 16px;">Quitar filtros</a>
                    </div>
                <?php
                }
            } else {
                if (isset($_SESSION['filter_specie_adopted']) || isset($_SESSION['filter_search_adopted'])) {
                ?>
                    <div class="form-group">
                        <a href="index.php?route=<?php echo $action_form; ?>&filter_out" style="font-size: 16px;">Quitar filtros</a>
                    </div>
                <?php
                }
            }
            ?>
            
        </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <div class="categories">
            <h3>Especies</h3>
            <?php
            if ($route == "blog" || $route == "publication-single") {
                foreach ($species as $data) {
                    $species = $blog->ctrWhere("publications_users", "specie_id", $data['id']);
                ?>
                    <li><a href="index.php?route=blog&filter_specie_blog=<?= $data['id'] ?>"><?= $data['name'] ?> &nbsp; <b class="badge badge-pill badge-info"><?= count($species) ?></b> <span class="fa fa-chevron-right"></span></a></li>
                <?php
                }
            } else {
                foreach ($species as $data) {
                    $species = $blog->ctrWhere("no_adopted_animals", "specie_id", $data['id']);
                ?>
                    <li><a href="index.php?route=adopted&filter_specie_adopted=<?= $data['id'] ?>"><?= $data['name'] ?> &nbsp; <b class="badge badge-pill badge-info"><?= count($species) ?></b> <span class="fa fa-chevron-right"></span></a></li>
                <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="sidebar-box ftco-animate">
        <h3>Últimas Publicaciones</h3>
        <?php
        foreach ($recent_blog as $data) {
            $comments = $comment->ctrWhere("comments", "publication_id", $data['id']);
        ?>
            <div class="block-21 mb-4 d-flex">
                <a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>" class="blog-img mr-4 rounded" style="background-image: url(<?= RouteController::ctrlRoute() ?>views/images/publications/<?= $data['image'] ?>);"></a>
                <div class="text">
                    <h3 class="heading"><a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>"><?= $data['title'] ?></a></h3>
                    <div class="meta">
                        <div><a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>"><span class="icon-calendar"></span> <?= $date_time->ctrGetMonth($data['creation_date']) ?> <?= $date_time->ctrFormatDate($data['creation_date'], "d, Y") ?></a></div>
                        <div><a href="index.php?route=publication-single&publication_id=<?= $data['id'] ?>"><span class="icon-person"></span> <?= $data['name'] ?> <?= $data['lastname'] ?> <span class="icon-chat"></span> &nbsp; <span class="fa fa-comment"></span> <?= count($comments) ?></a></div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
    if ($route == 'blog' || $route == 'publication-single') {
    ?>
       <div class="sidebar-box ftco-animate">
            <h3>Etiquetas</h3>
            <div class="tagcloud">
                <!-- 
                    Estas será mis categorias o etiquetas (se usó en la busqueda de animales en adopción)
                    (Recordar poner señalas las busquedas)
                    Esto lo voy a usar para filtrar por publicación y adopción
                    Si route = adopted filtrará los animales en adopción
                    Si route = blog filtrará las publicación 
                -->
                <?php
                if (isset($_SESSION['filter_tag_blog'])) {
                ?>
                    <a href="index.php?route=<?= $route ?>&filter_out" class="tag-cloud-link">Todos</a>
                <?php
                }
                foreach ($tags as $data) {
                    $tags2 = $tag->ctrWhere("tags_publications", "tag_id", $data['id']);
                ?>
                    <a href="index.php?route=blog&filter_tag_blog=<?= $data['id'] ?>" class="tag-cloud-link <?php echo isset($_SESSION['filter_tag_blog']) && $_SESSION['filter_tag_blog'] == $data['id'] ? "tag-cloud-link-active" : ""; ?>"><?= $data['name'] ?> &nbsp; <span class="badge badge-pill badge-info" style="font-size: 10px;"><?= count($tags2) ?></span></a>
                <?php
                }
                ?>
            </div>
        </div> 
    <?php
    }
    ?>
    
</div>