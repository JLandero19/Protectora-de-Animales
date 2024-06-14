<?php

$specie = new SpecieController();
$species = $specie->ctrAll("species");

// Versión con paginación
$numElements = 6;
$route = "adopted";

unset($_SESSION['filter_specie_blog']);

if (isset($_GET["filter_out"])) {
    unset($_SESSION['filter_specie_adopted']);
    unset($_SESSION['filter_search_adopted']);
}

if (isset($_GET["filter_specie_adopted"]) && $_GET["filter_specie_adopted"] >= 1) {
    $_SESSION['filter_specie_adopted'] = $_GET["filter_specie_adopted"];
}

if (isset($_GET["filter_search_adopted"]) && ($_GET["filter_search_adopted"] != "" || $_GET["filter_search_adopted"] != null)) {
    $_SESSION['filter_search_adopted'] = $_GET["filter_search_adopted"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        if (isset($_POST["filter_specie_adopted"]) && $_POST["filter_specie_adopted"] == true) {
            $_SESSION['filter_specie_adopted'] = $_POST["filter_specie_adopted"];
        }
        if (isset($_POST["filter_search_adopted"]) && $_POST["filter_search_adopted"] == true) {
            $_SESSION['filter_search_adopted'] = $_POST["filter_search_adopted"];
        }
    }
}

$animal = new PaginationController();

if (isset($_SESSION['filter_specie_adopted'])) {
    if (isset($_SESSION["filter_search_adopted"])) {
        $numPage =  $animal->ctrNumPagesInAdopted($numElements, "specie_id", $_SESSION['filter_specie_adopted'], "name", $_SESSION["filter_search_adopted"]);
    } else {
        $numPage =  $animal->ctrNumPagesInAdopted($numElements, "specie_id", $_SESSION['filter_specie_adopted'], NULL, NULL);
    }
} else {
    if (isset($_SESSION["filter_search_adopted"])) {
        $numPage =  $animal->ctrNumPagesInAdopted($numElements, NULL, NULL, "name", $_SESSION["filter_search_adopted"]);
    } else {
        $numPage =  $animal->ctrNumPagesInAdopted($numElements, NULL, NULL, NULL, NULL);
    }
}

//Si existe $_GET['page'] meto si contenido en la variable $page
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start = $animal->ctrInitPage($page, $numElements);

// Boton del primera pagina
$btn_first = $animal->ctrBtnFirst($page);
// var_dump($btn_first);

// Boton de la anterior pagina
$btn_previous = $animal->ctrBtnPrevious($page);
// var_dump($btn_previous);

// Botones de los numeros de las paginas
$btn_numbers = $animal->ctrBtnNumbers($numPage,$page);
// var_dump($btn_numbers);

// Boton de la siguiente pagina
$btn_next = $animal->ctrBtnNext($page, $numPage);
// var_dump($btn_next);

// Boton del ultima pagina
$btn_last = $animal->ctrBtnLast($page, $numPage);
// var_dump($btn_last);

if (isset($_SESSION['filter_specie_adopted'])) {
    if (isset($_SESSION["filter_search_adopted"])) {
        $animals = $animal->ctrAdoptedPage($start, $numElements, "specie_id", $_SESSION['filter_specie_adopted'], "name", $_SESSION["filter_search_adopted"]);
    } else {
        $animals = $animal->ctrAdoptedPage($start, $numElements, "specie_id", $_SESSION['filter_specie_adopted'], NULL, NULL);
    }
} else {
    if (isset($_SESSION["filter_search_adopted"])) {
        $animals = $animal->ctrAdoptedPage($start, $numElements, NULL, NULL, "name", $_SESSION["filter_search_adopted"]);
    } else {
        $animals = $animal->ctrAdoptedPage($start, $numElements, NULL, NULL, NULL, NULL);
    }
}
// $animals = $animal->ctrAdoptedPage($start,$numElements, NULL, NULL, NULL, NULL);

include("views/partials/adopted.view.php");
?>