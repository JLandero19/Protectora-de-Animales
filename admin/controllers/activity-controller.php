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

    // INSERT
    public function ctrInsertItem($table, $object) {
        $message = "";

        $title = Validator::filterString($object['title']);
        $activity_category_id = Validator::filterNumberInteger($object['activityCategory']);
        $start = Validator::filterString($object['start']);
        $end = Validator::filterString($object['end']);
        
        if (!$activity_category_id || !$title || !$start || !$end) {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>No se ha podido agregar la actividad.</div>";
        }

        if ($message == "") {
            
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "who_request" => $title,
                "activity_category_id" => $activity_category_id,
                "start" => $start,
                "end" => $end
            ];

            // Si todo es correcto la inserción se hará satifactoriamente
            $query = ActivityModel::mdlInsertItem($table, $object);

            if ($query == true) {
                $message .= "<div class='alert alert-info mt-2' role='alert'>Se ha agregado la actividad " . $title . ".</div>";
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al agregar la actividad " . $title . ".</div></div>";
            }
        }
        return $message;
    }

    // UPDATE
    public function ctrUpdateItem($table, $object) {
        $message = "";

        $id = $object['id'];
        $title = Validator::filterString($object['title']);
        $activity_category_id = Validator::filterNumberInteger($object['activityCategory']);
        $start = Validator::filterString($object['start']);
        $end = Validator::filterString($object['end']);
        
        if (!$activity_category_id || !$title || !$start || !$end) {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>No se ha podido agregar la actividad.</div>";
        }

        if ($message == "") {
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "who_request" => $title,
                "activity_category_id" => $activity_category_id,
                "start" => $start,
                "end" => $end
            ];

            // Si todo es correcto la edita se hará satifactoriamente
            $query = ActivityModel::mdlUpdateItem($table, $object, $id);

            if ($query == true) {
                $message .= "<div class='alert alert-info mt-2' role='alert'>Se ha actualizado la actividad de " . $title . ".</div>";
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al actualizar la actividad de " . $title . ".</div></div>";
            }
        }

        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        $message = "";
        $search = ActivityModel::mdlOneWhere($table, 'id', $id);

        $query = ActivityModel::mdlDeleteItem($table, $id);

        if ($query == true) {
            $message .= "<div class='alert alert-info mt-2' role='alert'>Se ha eliminado la actividad de " . $search['who_request'] . ".</div>";
        } else {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al eliminar la actividad de " . $search['who_request'] . ".</div></div>";
        }

        return $message;
    }
}
?>

