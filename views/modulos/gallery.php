<?php

$specie = new SpecieController();
$species = $specie->ctrAll("species");

if (isset($_GET['specie-id'])) {
    $_SESSION['specie-id'] = $_GET['specie-id'];
}

if (isset($_GET['filter-out'])) {
    unset($_SESSION['specie-id']);
}

$blog = new PaginationController();

$numElements = 9;
$route = "gallery";

if (isset($_SESSION['specie-id'])) {
    $numPage = $blog->ctrNumPages($numElements, "gallery", "specie_id", $_SESSION['specie-id']);
} else {
    $numPage = $blog->ctrNumPages($numElements, "gallery", NULL, NULL);
}

//Si existe $_GET['page'] meto si contenido en la variable $page
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$start = $blog->ctrInitPage($page, $numElements);

// Boton del primera pagina
$btn_first = $blog->ctrBtnFirst($page);
// var_dump($btn_first);

// Boton de la anterior pagina
$btn_previous = $blog->ctrBtnPrevious($page);
// var_dump($btn_previous);

// Botones de los numeros de las paginas
$btn_numbers = $blog->ctrBtnNumbers($numPage,$page);
// var_dump($btn_numbers);

// Boton de la siguiente pagina
$btn_next = $blog->ctrBtnNext($page, $numPage);
// var_dump($btn_next);

// Boton del ultima pagina
$btn_last = $blog->ctrBtnLast($page, $numPage);

if (isset($_SESSION['specie-id'])) {
    $gallery = $blog->ctrAllByPagination($start, $numElements, "gallery", TRUE, "specie_id", $_SESSION['specie-id']);
} else {
    $gallery = $blog->ctrAllByPagination($start, $numElements, "gallery", TRUE, NULL, NULL);
}


include("views/partials/gallery.view.php");
?>