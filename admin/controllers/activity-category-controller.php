<?php

class ActivityCategoryController {

    public function ctrAll($table) {
        return ActivityCategoryModel::mdlAll($table);
    }

    public function ctrActivityCategorysJoinSpecies() {
        return ActivityCategoryModel::mdlActivityCategorysJoinSpecies();
    }


    public function ctrWhere($table, $field, $value) {
        return ActivityCategoryModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return ActivityCategoryModel::mdlOneWhere($table, $field,  $value);
    }

    // INSERT
    public function ctrInsertItem($table, $object) {
        $message = "";
        $imagen = null;

        $title = Validator::filterString($object['title']);
        $description = Validator::filterString($object['description']);
        $textColor = Validator::filterString($object['textColor']);
        $backgroundColor = Validator::filterString($object['backgroundColor']);

        if (!$title) {
            $message .= "<div class='alert alert-danger'>El nombre introducido no es válido.</div>";
        }

        if (!$description) {
            $message .= "<div class='alert alert-danger'>La descripción introducida no es válida.</div>";
        }

        if (!$textColor) {
            $message .= "<div class='alert alert-danger'>El color de texto introducido no es válido</div>";
        }

        if (!$backgroundColor) {
            $message .= "<div class='alert alert-danger'>El color de fondo introducido no es válido</div>";
        }

        if ($message == "") {
            
            $search = ActivityCategoryModel::mdlWhere($table, 'title', $title);
            
            if (!$search) {
                // Este Array lo pasamos al modelo para que ejecute la consulta
                $object = [
                    "title" => $title,
                    "description" => $description,
                    "textColor" => $textColor,
                    "backgroundColor" => $backgroundColor
                ];

                // Si todo es correcto la inserción se hará satifactoriamente
                $query = ActivityCategoryModel::mdlInsertItem($table, $object);

                if ($query == true) {
                    return "<script type='text/javascript'>alert('Se ha registrado la actividad " . $title . ".'); window.location = 'activity-category';</script>";
                }
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ya existe una actividad con ese titulo.</div>";
            }
        }
        return $message;
    }

    // UPDATE
    public function ctrUpdateItem($table, $object) {
        $message = "";

        $id = $object['activity_category_id'];
        $title = Validator::filterString($object['title']);
        $description = Validator::filterString($object['description']);
        $textColor = Validator::filterString($object['textColor']);
        $backgroundColor = Validator::filterString($object['backgroundColor']);

        if (!$title) {
            $message .= "<div class='alert alert-danger'>El nombre introducido no es válido.</div>";
        }

        if (!$description) {
            $message .= "<div class='alert alert-danger'>La descripción introducida no es válida.</div>";
        }

        if (!$textColor) {
            $message .= "<div class='alert alert-danger'>El color de texto introducido no es válido</div>";
        }

        if (!$backgroundColor) {
            $message .= "<div class='alert alert-danger'>El color de fondo introducido no es válido</div>";
        }

        if ($message == "") {
            $route = "";
            $search = ActivityCategoryModel::mdlWhere('activities_categories', 'title', $title);
            if (count($search) <= 1) {

                // Este Array lo pasamos al modelo para que ejecute la consulta
                $object = [
                    "title" => $title,
                    "description" => $description,
                    "textColor" => $textColor,
                    "backgroundColor" => $backgroundColor
                ];

                if ($message == "") {
                    // Si todo es correcto la inserción se hará satifactoriamente
                    $query = ActivityCategoryModel::mdlUpdateItem($table, $object, $id);

                    if ($query == true) {

                        return "<script type='text/javascript'>alert('Se ha actualizado la actividad $title.');window.location = 'activity-category';</script>";
                    }
                }
            } else {
                $message .= "<div class='alert alert-danger mt-2' role='alert'>Ya existe otra actividad con ese titulo.</div>";
            }
        }

        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        $message = "";
        $search = ActivityCategoryModel::mdlOneWhere($table, 'id', $id);

        $query = ActivityCategoryModel::mdlDeleteItem($table, $id);

        if ($query == true) {
            $message .= "<div class='card-header'><div class='alert alert-info mt-2' role='alert'>Se ha eliminado la actividad " . $search['title'] . ".</div></div>";
        } else {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error la actividad " . $search['name'] . ".</div></div>";
        }

        return $message;
    }
}
?>

