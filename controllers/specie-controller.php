<?php

class SpecieController {

    public function ctrAll($table) {
        return SpecieModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return SpecieModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return SpecieModel::mdlOneWhere($table, $field,  $value);
    }
}
?>