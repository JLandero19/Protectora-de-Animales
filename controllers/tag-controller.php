<?php

class TagController {

    public function ctrAll($table) {
        return TagModel::mdlAll($table);
    }

    public function ctrAll2($table) {
        return TagModel::mdlAll2($table);
    }

    public function ctrWhere($table, $field, $value) {
        return TagModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return TagModel::mdlOneWhere($table, $field,  $value);
    }

    // INSERT
    public function ctrInsertItem($table, $object) {
        $message = "";

        $name = Validator::filterString($object['name']);

        if (!$name) {
            $message .= "La etiqueta introducida no es válida.\n";
        }    

        if ($message == "") {

            if ($message == "") {

                $search = TagModel::mdlWhere($table, "name", $name);
                if (count($search) <= 0) {
                    $object2 = [
                        "name" => $name
                    ];
                    // var_dump($object);
                    // Si todo es correcto la inserción se hará satifactoriamente
                    $query = TagModel::mdlInsertItem($table, $object2);

                    if ($query == true) {
                        return "Se ha insertado una etiqueta con exito.\n";
                    }
                } else {
                    $message .= "Ya existe esa etiqueta.\n";
                }                
            }
        }

        return $message;
    }
}
?>