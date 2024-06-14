<?php

class CommentController {

    public function ctrAll($table) {
        return CommentModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return CommentModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return CommentModel::mdlOneWhere($table, $field,  $value);
    }

    // INSERT
    public function ctrInsertItem($table, $object) {
        $message = "";

        $comment = Validator::filterString($object['comment']);
        $publication_id = $object['publication_id'];
        $user_id = $_SESSION['user_id'];
        

        if (!$comment) {
            $message .= "<div class='alert alert-danger'>El comentario introducido no es válido.</div>";
        }

        if ($message == "") {
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "comment" => $comment,
                "publication_id" => $publication_id,
                "status" => "Pendiente",
                "user_id" => $user_id
            ];

            // Si todo es correcto la inserción se hará satifactoriamente
            $query = CommentModel::mdlInsertItem($table, $object);

            if ($query == true) {
                return "<script type='text/javascript'>alert('Tu comentario está pendiente a validar.'); window.location = 'index.php?route=publication-single&publication_id=".$publication_id."#comment';</script>";
            }
        }
        return $message;
    }

    // EDIT
    public function ctrUpdateItem($table, $object) {
        $message = "";

        $comment = Validator::filterString($object['comment']);
        $id = $object['update_comment'];
        $publication_id = $object['pub_id'];
        

        if (!$comment) {
            $message .= "<div class='alert alert-danger'>El comentario introducido no es válido.</div>";
        }

        if ($message == "") {
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "comment" => $comment,
                "status" => "Pendiente"
            ];

            // Si todo es correcto la inserción se hará satifactoriamente
            $query = CommentModel::mdlUpdateItem($table, $object, $id);

            if ($query == true) {
                return "<script type='text/javascript'>window.location = 'index.php?route=publication-single&publication_id=".$publication_id."#comment';</script>";
            }
        }
        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        return CommentModel::mdlDeleteItem($table, $id);
    }
}
?>