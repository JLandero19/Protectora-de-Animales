<?php

$value = "";
// var_dump($route);

$modulo = '404';
if (isset($_SESSION['user_id'])) {
    $user_adopted = new UserController();
    $user_adopted_animals = $user_adopted->ctrWhere("adopted", "user_id", $_SESSION['user_id']);
}

if (isset($_GET['route'])){
    
    if ($_GET['route'] == 'inicio' ||
        $_GET['route'] == 'adopted' ||
        $_GET['route'] == 'adopted-single' ||
        $_GET['route'] == 'blog' ||
        $_GET['route'] == 'publication-single' ||
        $_GET['route'] == 'about-us' ||
        $_GET['route'] == 'contact' ||
        $_GET['route'] == 'login' ||
        $_GET['route'] == 'register' ||
        $_GET['route'] == 'remember-me' ||
        $_GET['route'] == 'remember-me-response' ||
        $_GET['route'] == 'gallery' ||
        $_GET['route'] == 'donation' ||
        $_GET['route'] == 'accepted' ||
        $_GET['route'] == '404' ){
        
        if (!isset($_SESSION['email']) && (!isset($_GET['email']) && $_GET['route'] == 'remember-me-response')) {
            if ($_GET['route'] == 'remember-me-response' && $_SERVER['REQUEST_METHOD'] == 'POST') {
                $modulo = $_GET['route'];
            } else {
                $modulo = 404;
            }            
        } else {            
            $modulo = $_GET['route'];
        }

        if (isset($_SESSION['email']) && ($_GET['route'] == 'login' || $_GET['route'] == 'register')) {
            $modulo = 'inicio';
        }       	
    } else {

        if ($_GET['route'] == 'payment'){
            $modulo = $_GET['route'];
        }

        if (isset($_SESSION['email'])) {
            if ($_GET['route'] == 'logout' || 
                $_GET['route'] == 'my-account' ||
                $_GET['route'] == 'edit-publication' ||
                $_GET['route'] == 'edit-user' ||
                ($_GET['route'] == 'add-publication' && count($user_adopted_animals) >= 1)){
                $modulo = $_GET['route'];
            }
        }
    }         
} else {
	$modulo = 'inicio';
}

// HEADER
include("views/modulos/header.php");
// FIN HEADER

if (isset($_SESSION['order-id']) ||
    isset($_SESSION['name_donation']) ||
    isset($_SESSION['mail_donation']) ||
    isset($_SESSION['amount_donation']) ||
    isset($_SESSION['amount_donation']) ||
    isset($_SESSION['donation']) ||
    isset($_SESSION['filter_specie_adopted']) ||
    isset($_SESSION['filter_search_adopted']) ||
    isset($_SESSION['success']) ||
    isset($_SESSION['filter_specie_blog']) ||
    isset($_SESSION['filter_search_blog']) ||
    isset($_SESSION['filter_tag_blog']) ||
    isset($_SESSION['specie-id'])) {

    if ($_GET['route'] != 'gallery') {
        unset($_SESSION['specie-id']);
    }
    
    if ($_GET['route'] != 'donation' && $_GET['route'] != 'payment') {
        unset($_SESSION['order-id']);
        unset($_SESSION['name_donation']);
        unset($_SESSION['mail_donation']);
        unset($_SESSION['amount_donation']);
        unset($_SESSION['donation']);
    }

    if ($_GET['route'] != 'adopted' && $_GET['route'] != 'adopted-single' && $_GET['route'] != 'payment') {
        unset($_SESSION['filter_specie_adopted']);
        unset($_SESSION['filter_search_adopted']);
        unset($_SESSION['success']);
    }

    if ($_GET['route'] != 'blog' && $_GET['route'] != 'publication-single') {
        unset($_SESSION['filter_specie_blog']);
        unset($_SESSION['filter_search_blog']);
        unset($_SESSION['filter_tag_blog']);
    }
}


// CONTENIDO
include("views/modulos/".$modulo.".php");
// FIN CONTENIDO

// FOOTER
include("views/modulos/footer.php");
// FIN FOOTER

?>