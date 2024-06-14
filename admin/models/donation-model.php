<?php

class DonationModel {

    public static function mdlAll($table) {
        $sql = Connect::connected()->prepare(" SELECT * FROM $table ");
        $sql->execute();
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlGraph($table) {
        $pdo = Connect::connected();
        $pdo->exec("SET lc_time_names = 'es_ES'");

        $str = " SELECT MONTHNAME(creation_date) month_name, SUM(amount) total FROM $table ";
        $str .= " GROUP BY 1 ";
        $str .= " ORDER BY creation_date ASC ";

        $sql = $pdo->prepare($str);
        $sql->execute();
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlLastID($table) {        
        $sql = Connect::connected()->prepare("SELECT * FROM $table ORDER BY id DESC LIMIT 1");
        $sql->execute();
        $query = $sql->fetch();

        return $query;
    }
}

?>