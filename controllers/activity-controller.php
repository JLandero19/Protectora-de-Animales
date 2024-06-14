<?php

class ActivityController {

    public function ctrAll($table) {
        return ActivityModel::mdlAll($table);
    }

    public function ctrActivitysJoinSpecies() {
        return ActivityModel::mdlActivitysJoinSpecies();
    }


    public function ctrWhere($table, $field, $value) {
        return ActivityModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return ActivityModel::mdlOneWhere($table, $field,  $value);
    }
}
?>

