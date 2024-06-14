<?php

$date_time = new FunctionsController();
$blog = new PublicationController();
$comment = new CommentController();

// $publications = $publication->ctrAll("publications");

// Versión con paginación
$numElements = 8;
$route = "blog";

if (isset($_GET["filter_out"])) {
    unset($_SESSION['filter_specie_blog']);
    unset($_SESSION['filter_search_blog']);
    unset($_SESSION['filter_tag_blog']);
}

if (isset($_GET["filter_specie_blog"]) && $_GET["filter_specie_blog"] >= 1) {
    $_SESSION['filter_specie_blog'] = $_GET["filter_specie_blog"];
}

if (isset($_GET["filter_search_blog"]) && $_GET["filter_search_blog"] >= 1) {
    $_SESSION['filter_search_blog'] = $_GET["filter_search_blog"];
}

if (isset($_GET["filter_tag_blog"]) && $_GET["filter_tag_blog"] >= 1) {
    $_SESSION['filter_tag_blog'] = $_GET["filter_tag_blog"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        if (isset($_POST["filter_specie_blog"]) && $_POST["filter_specie_blog"] == true) {
            $_SESSION['filter_specie_blog'] = $_POST["filter_specie_blog"];
        }
        if (isset($_POST["filter_search_blog"]) && $_POST["filter_search_blog"] == true) {
            $_SESSION['filter_search_blog'] = $_POST["filter_search_blog"];
        }
    }
}

$publication = new PaginationController();

if (isset($_SESSION['filter_specie_blog'])) {
    if (isset($_SESSION["filter_search_blog"])) {
        if (isset($_SESSION["filter_tag_blog"])) {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], $_SESSION["filter_search_blog"], $_SESSION["filter_tag_blog"]);
        } else {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], $_SESSION["filter_search_blog"], NULL);
        }
    } else {
        if (isset($_SESSION["filter_tag_blog"])) {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], NULL, $_SESSION["filter_tag_blog"]);
        } else {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], NULL, NULL);
        }
    }
} else {
    if (isset($_SESSION["filter_search_blog"])) {
        if (isset($_SESSION["filter_tag_blog"])) {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", NULL, NULL, $_SESSION["filter_search_blog"], $_SESSION["filter_tag_blog"]);
        } else {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", NULL, NULL, $_SESSION["filter_search_blog"], NULL);
        }
    } else {
        if (isset($_SESSION["filter_tag_blog"])) {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", "specie_id", NULL, NULL, $_SESSION["filter_tag_blog"]);
        } else {
            $numPage =  $publication->ctrNumPagesPublication($numElements, "publications_users", NULL, NULL, NULL, NULL);
        }
    }
}

//Si existe $_GET['page'] meto si contenido en la variable $page
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start = $publication->ctrInitPage($page, $numElements);

// Boton del primera pagina
$btn_first = $publication->ctrBtnFirst($page);
// var_dump($btn_first);

// Boton de la anterior pagina
$btn_previous = $publication->ctrBtnPrevious($page);
// var_dump($btn_previous);

// Botones de los numeros de las paginas
$btn_numbers = $publication->ctrBtnNumbers($numPage,$page);
// var_dump($btn_numbers);

// Boton de la siguiente pagina
$btn_next = $publication->ctrBtnNext($page, $numPage);
// var_dump($btn_next);

// Boton del ultima pagina
$btn_last = $publication->ctrBtnLast($page, $numPage);
// var_dump($btn_last);

if (isset($_SESSION['filter_specie_blog'])) {
    if (isset($_SESSION["filter_search_blog"])) {
        if (isset($_SESSION["filter_tag_blog"])) {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], $_SESSION["filter_search_blog"], $_SESSION['filter_tag_blog']);
        } else {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], $_SESSION["filter_search_blog"], NULL);
        }       
    } else {
        if (isset($_SESSION["filter_tag_blog"])) {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], NULL, $_SESSION['filter_tag_blog']);
        } else {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", "specie_id", $_SESSION['filter_specie_blog'], NULL, NULL);
        }
    }
} else {
    if (isset($_SESSION["filter_search_blog"])) {
        if (isset($_SESSION["filter_tag_blog"])) {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", NULL, NULL, $_SESSION["filter_search_blog"], $_SESSION['filter_tag_blog']);
        } else {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", NULL, NULL, $_SESSION["filter_search_blog"], NULL);
        }
    } else {
        if (isset($_SESSION["filter_tag_blog"])) {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", NULL, NULL, NULL, $_SESSION['filter_tag_blog']);
        } else {
            $publications = $publication->ctrAllByPaginationPublication($start, $numElements, "publications_users", NULL, NULL, NULL, NULL);
        }        
    }
}

include("views/partials/blog.view.php");
?>