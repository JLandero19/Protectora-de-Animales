<?php

class AnimalModel {

    public static function mdlAll($table) {
        $sql = Connect::connected()->prepare(" SELECT * FROM $table ORDER BY 1 DESC ");
        $sql->execute();
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlWhere($table, $field, $value) {
        $query = " SELECT * FROM $table ";

        if ($field != null && $value != null) {
            $query .= " WHERE $field LIKE :condition ";
        }
        $query .= " ORDER BY 1 DESC ";

        $sql = Connect::connected()->prepare($query);
        $sql->execute(array(':condition' => $value));
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlOneWhere($table, $field, $value) {
        if ($field == null && $value == null) {
            return false;
        }
        
        $sql = Connect::connected()->prepare("SELECT * FROM $table WHERE $field LIKE :condition ");
        $sql->execute(array(':condition'=> $value));
        $query = $sql->fetch();

        return $query;
    }

    public static function mdlWhereSponsored($table, $field, $value) {
        $query = " SELECT * FROM $table ";
        $query .= " WHERE status LIKE :condition ";

        if ($field != null && $value != null) {
            $query .= " AND $field LIKE :condition2 ";
        }

        $sql = Connect::connected()->prepare($query);
        $sql->execute(array(':condition' => 'Activo', ':condition2' => $value));
        $query = $sql->fetchAll();

        return $query;
    }
}

?>