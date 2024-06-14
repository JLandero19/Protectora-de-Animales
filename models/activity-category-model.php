<?php

class ActivityCategoryModel {

    public static function mdlAll($table) {
        $sql = Connect::connected()->prepare("SELECT * FROM $table ");
        $sql->execute();
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlWhere($table, $field, $value) {
        $query = " SELECT * FROM $table ";

        if ($field != null && $value != null) {
            $query .= " WHERE $field LIKE :condition ";
        }

        $sql = Connect::connected()->prepare($query);
        $sql->execute(array(':condition' => $value));
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlOneWhere($table, $field, $value) {
        if ($field == null && $value == null) {
            return false;
        }
        $str = " SELECT * FROM $table WHERE $field LIKE :condition ";
        $sql = Connect::connected()->prepare($str);
        $sql->execute(array(':condition'=> $value));
        $query = $sql->fetch();

        return $query;
    }
}

?>