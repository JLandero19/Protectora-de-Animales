<?php

class PaginationModel {

    public static function mdlAll($table) {
        $sql = Connect::connected()->prepare("SELECT * FROM $table ");
        $sql->execute();
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlAllByPagination($startPage,$num,$table,$field,$value) {
        $sql = " SELECT * FROM $table ";

        if ($field != NULL && $value != NULL) {
            $sql .= " WHERE $field LIKE :condition ";
        }
        $sql .= " LIMIT $startPage,$num ";
        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $sql->execute(array(':condition' => $value));
        } else {
            $sql->execute();
        }

        $query = $sql->fetchAll();

        return $query;
    }

    // Funciones especificas para hacer la pagina de Adopción
    public static function mdlAdoptedPage($startPage, $num) {
        // SELECT * FROM animals 
        // WHERE id NOT IN (SELECT animal_id FROM adopted)
        // AND id NOT IN (SELECT animal_id FROM sponsored);
        
        $sql = " SELECT * FROM animals ";
        $sql .= " WHERE id NOT IN (SELECT animal_id FROM adopted) ";
        $sql .= " AND id NOT IN (SELECT animal_id FROM sponsored) ";
        $sql .= " LIMIT $startPage,$num ";
        
        $sql = Connect::connected()->prepare($sql);
        $sql->execute();

        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlNumPagesInAdopted($num) {
        // SELECT * FROM animals 
        // WHERE id NOT IN (SELECT animal_id FROM adopted)
        // AND id NOT IN (SELECT animal_id FROM sponsored);

        $sql = " SELECT * FROM animals ";
        $sql .= " WHERE id NOT IN (SELECT animal_id FROM adopted) ";
        $sql .= " AND id NOT IN (SELECT animal_id FROM sponsored) ";

        $sql = Connect::connected()->prepare($sql);
        $sql->execute();

        $count = $sql->rowCount();

        if ($count % $num != 0) {
            $total = intval($count / $num)+1;
        } else {
            $total = intval($count / $num);
        }

        return $total;
    }
    // FIN funciones especificas de la página Adopción

    public static function mdlNumPages($num, $table, $field, $value) {
        $sql = " SELECT * FROM $table ";

        if ($field != NULL && $value != NULL) {
            $sql .= " WHERE $field LIKE :condition ";
        }

        $sql = Connect::connected()->prepare($sql);

        if ($field != NULL && $value != NULL) {
            $sql->execute(array(':condition' => $value));
        } else {
            $sql->execute();
        }

        $count = $sql->rowCount();

        if ($count % $num != 0) {
            $total = intval($count / $num)+1;
        } else {
            $total = intval($count / $num);
        }

        return $total;
    }

    public static function mdlInitPage($page, $num) {
        if ($page == 1) {
            $start = 0;
            $page = 1;
        } else {
            $start = $page * $num - $num;
        }
        return $start;
    }

    public static function mdlBtnFirst($page) {
        if ($page == 1) {
            $btn = false;
        } else {
            $btn = 1;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=1'>Primero</a></li>";
        }

        return $btn;
    }

    public static function mdlBtnPrevious($page) {
        if ($page == 1) {
            $btn = false;
        } else {
            $page = $page - 1;
            $btn = $page;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=".$page."'><i class='fa fa-long-arrow-left'></i> Anterior</a></li>";
        }
    
        return $btn;
    }

    public static function mdlBtnNumbers($nPage) {
        $btns = array();
        // $btns = "";
        if ($nPage < 2) {
            return false;
        }
        for ($i=1; $i <= $nPage; $i++) {
            $btns[] = $i;
            // $btns .= "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=$i'>$i</a></li>";
        }

        return $btns;
    }

    public static function mdlBtnNext($page, $nPage) {
        if ($page == $nPage) {
            // $btn = "";
            $btn = false;
        } else {
            $page = $page + 1;
            $btn = $page;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=".$page."'>Siguiente <i class='fa fa-long-arrow-right'></i></a></li>";
        }
    
        return $btn;
    }

    public static function mdlBtnLast($page, $nPage) {
        if ($page == $nPage) {
            // $btn = "";
            $btn = false;
        } else {
            $page = $page + 1;
            $btn = $page;
            // $btn = "<li class='page-item'><a class='page-link' href='index.php?route=".$route."&page=".$nPage."'>Ultimo</a></li>";
        }
    
        return $btn;
    }
}