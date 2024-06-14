<?php

class PaginationController {

    // Saca todos los registros de una tabla
    public static function ctrAll($table) {
        return PaginationModel::mdlAll($table);
    }

    // Saca los registros de una tabla con un limit para la paginación
    public static function ctrAllByPagination($startPage,$num,
                                              $table,$order,$field,$value) {
        return PaginationModel::mdlAllByPagination($startPage,$num,
                                                   $table,$order,$field,$value);
    }

    // Numero de paginas que queremos
    public static function ctrNumPages($num,$table,
                                       $field,$value) {
        return PaginationModel::mdlNumPages($num,$table,
                                            $field,$value);
    }

    // Pagina de Adopción
    public static function ctrAdoptedPage($startPage,$num,$field,$value,$field2,$value2) {
        return PaginationModel::mdlAdoptedPage($startPage,$num,$field,$value,$field2,$value2);
    }

    // Número de páginas de Adopción
    public static function ctrNumPagesInAdopted($num,$field,$value,$field2,$value2) {
        return PaginationModel::mdlNumPagesInAdopted($num,$field,$value,$field2,$value2);
    }

    // Pagina de Publicación
    public static function ctrAllByPaginationPublication($startPage,$num,$table,$field,$value,$value2,$value3) {
        return PaginationModel::mdlAllByPaginationPublication($startPage,$num,$table,$field,$value,$value2,$value3);
    }

    // Número de páginas de Publicación
    public static function ctrNumPagesPublication($num,$table,$field,$value,$value2,$value3) {
        return PaginationModel::mdlNumPagesPublication($num,$table,$field,$value,$value2,$value3);
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