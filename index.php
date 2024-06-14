<?php
session_start();

// Es la conexión a la base de datos
include_once("models/connect-model.php");

// Controlador de la Ruta
include_once("controllers/route-controller.php");

// Controlador con funciones que no pertenecen a ninguna clase en especifico
include_once("controllers/functions-controller.php");

// Controlador para la validación de formularios
include_once("controllers/validator-controller.php");

// Controlador que carga las funciones para cargar la plantilla
include_once("controllers/template-controller.php");

// Controlador y modelo de Paginación
include_once("models/pagination-model.php");
include_once("controllers/pagination-controller.php");

// Controlador y modelo de Usuario
include_once("models/user-model.php");
include_once("controllers/user-controller.php");

// Controlador y modelo de Animales
include_once("models/animal-model.php");
include_once("controllers/animal-controller.php");

// Controlador y modelo de Especies
include_once("models/specie-model.php");
include_once("controllers/specie-controller.php");

// Controlador y modelo de Publicaciones
include_once("models/publication-model.php");
include_once("controllers/publication-controller.php");

// Controlador y modelo de Comentarios
include_once("models/comment-model.php");
include_once("controllers/comment-controller.php");

// Controlador y modelo de Actividades
include_once("models/activity-model.php");
include_once("controllers/activity-controller.php");

// Controlador y modelo de Categoría Actividades
include_once("models/activity-category-model.php");
include_once("controllers/activity-category-controller.php");

// Controlador y modelo de Etiquetas
include_once("models/tag-model.php");
include_once("controllers/tag-controller.php");

// Controlador y modelo de Donaciones
include_once("models/donation-model.php");
include_once("controllers/donation-controller.php");

// Controlador y modelo de Emails
include_once("phpmailer/mail-model.php");
include_once("phpmailer/mail-controller.php");

TemplateController::ctrlTemplate();

?>
