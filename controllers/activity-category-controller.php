<?php

class ActivityCategoryController {

    public function ctrAll($table) {
        return ActivityCategoryModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return ActivityCategoryModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return ActivityCategoryModel::mdlOneWhere($table, $field,  $value);
    }
}
?>

