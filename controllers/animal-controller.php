<?php

class AnimalController {

    public function ctrAll($table) {
        return AnimalModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return AnimalModel::mdlWhere($table, $field,  $value);
    }   

    public function ctrOneWhere($table, $field, $value) {
        return AnimalModel::mdlOneWhere($table, $field,  $value);
    }

    public function ctrWhereSponsored($table, $field, $value) {
        return AnimalModel::mdlWhereSponsored($table, $field,  $value);
    }
}
?>