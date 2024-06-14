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
            $sql = Connect::connected()->prepare($query);
            $sql->execute(array(':condition' => $value));
        } else {
            $sql = Connect::connected()->prepare($query);
            $sql->execute();
        }
        
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlOneWhere($table, $field, $value) {
        if ($field == null && $value == null) {
            return false;
        }
        
        $sql = Connect::connected()->prepare(" SELECT * FROM $table WHERE $field LIKE :condition ");
        $sql->execute(array(':condition'=> $value));
        $query = $sql->fetch();

        return $query;
    }

    // INSERT
    public static function mdlInsertItem($table, $object) {
        // Aqui creamos la cadena con la consulta de INSERT
        $sql = " INSERT INTO $table ";

        $fields = '('.implode(', ', array_keys($object)).')';
        $values = '(:'.implode(', :', array_keys($object)).')';

        //  Terminamoos de crear la consulta de INSERT
        $sql .= $fields." VALUES ".$values.";";

        // Aqui creamos el array para preparar la consulta de INSERT
        $arr = array();

        // Creamos 2 array una para los 'VALUES' y otra para las 'KEYS'
        // KEYS
        $keys = implode('|', array_keys($object));
        $keys = explode('|', $keys);

        // VALUES
        $values = implode('|', array_values($object));
        $values = explode('|', $values);

        // Creamos el array que necesitamos para crear ejecutar la consulta de INSERT
        for ($i=0; $i < count($keys); $i++) { 
            // Ejemplo -> $arr[':key'] = 'value';
            $arr[':'.$keys[$i]] = $values[$i];
        }
        
        // Aqui se prepara y ejecuta la consulta de INSERT
        $query = Connect::connected()->prepare($sql);
        // $query->execute($arr);
        
        if ($query->execute($arr)) {
            return true;
        }

        return false;
    }

    // UPDATE
    public static function mdlUpdateItem($table, $object, $id) {
        // Aqui creamos la cadena con la consulta de UPDATE
        $sql = " UPDATE $table SET ";

        // Aqui creamos el array para preparar la consulta de UPDATE
        $arr = array();

        $keys = implode('|', array_keys($object));
        $keys = explode('|', $keys);

        $values = implode('|', array_values($object));
        $values = explode('|', $values);

        for ($i=0; $i < count($keys); $i++) {
            // Creamos el array para el $query->execute($arr)
            $arr[':'.$keys[$i]] = $values[$i];

            // Seria la continuación de la consulta campo = :valor, etc.
            $sql .= " ".$keys[$i]." = :".$keys[$i].", ";
        }

        // Agrega la condición al array para que se pueda ejecutar
        $arr[':condition'] = $id;
        
        // Terminamos de formar la consulta de UPDATE y agregamos al final la condición
        $sql = substr(trim($sql), 0, -1). " WHERE id = :condition;";
        
        // Vemos si hemos formado bien la consulta
        // var_dump($sql);

        // Aqui se prepara y ejecuta la consulta de UPDATE
        $query = Connect::connected()->prepare($sql);
        // $query->execute($arr);

        if ($query->execute($arr)) {
            return true;
        }

        return false;
    }

    // DELETE
    public static function mdlDeleteItem($table, $id) {
        $arr = [":condition" => $id];
        $sql = " DELETE FROM $table WHERE id = :condition ";
        $query = Connect::connected()->prepare($sql);
        if ($query->execute($arr)) {
            return true;
        }
    }
}

?>