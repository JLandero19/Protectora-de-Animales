<?php

class PaginationController {

    // Saca todos los registros de una tabla
    public static function ctrAll($table) {
        return PaginationModel::mdlAll($table);
    }

    // Saca los registros de una tabla con un limit para la paginación
    public static function ctrAllByPagination($startPage,$num,$table,$field,$value) {
        return PaginationModel::mdlAllByPagination($startPage,$num,$table,$field,$value);
    }

    public static function ctrAdoptedPage($startPage,$num) {
        return PaginationModel::mdlAdoptedPage($startPage,$num);
    }

    // Numero de paginas que queremos
    public static function ctrNumPagesInAdopted($num) {
        return PaginationModel::mdlNumPagesInAdopted($num);
    }

    // Numero de paginas que queremos
    public static function ctrNumPages($num,$table,$field,$value) {
        return PaginationModel::mdlNumPages($num,$table,$field,$value);
    }

    // El numero de página por el que empieza el limit
    public static function ctrInitPage($page, $num) {
        return PaginationModel::mdlInitPage($page, $num);
    }

    // Boton de la primera página
    public static function ctrBtnFirst($page) {
        return PaginationModel::mdlBtnFirst($page);
    }

    // Boton de anterior
    public static function ctrBtnPrevious($page) {
        return PaginationModel::mdlBtnPrevious($page);
    }

    // Botones de los numeros de paginación
    public static function ctrBtnNumbers($nPage) {
        return PaginationModel::mdlBtnNumbers($nPage);
    } 

    // Boton de siguiente
    public static function ctrBtnNext($page, $nPage) {
        return PaginationModel::mdlBtnNext($page, $nPage);
    }

    // Boton de la ultima página
    public static function ctrBtnLast($page, $nPage) {
        return PaginationModel::mdlBtnLast($page, $nPage);
    }    
}

?>