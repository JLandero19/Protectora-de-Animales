<?php

class CommentController {

    public function ctrAll($table) {
        return CommentModel::mdlAll($table);
    }

    public function ctrAnimalsJoinComments() {
        return CommentModel::mdlAnimalsJoinComments();
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
                return "<script type='text/javascript'>alert('Tu comentario está pendiente a validar.'); window.history.back();</script>";
            }
        }
        return $message;
    }

    // EDIT
    public function ctrUpdateItem($table, $object) {
        $message = "";

        $comment = Validator::filterString($object['comment']);
        $comment_id = $object['comment_id'];
        

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
            $query = CommentModel::mdlUpdateItem($table, $object, $comment_id);

            if ($query == true) {
                return "<script type='text/javascript'>alert('Tu comentario está pendiente a validar.'); window.history.back();</script>";
            }
        }
        return $message;
    }

    public function ctrUpdateStatus($table, $object) {
        $message = "";

        $status = $object['status'];
        $id = $object['update'];

        if ($message == "") {
            // Este Array lo pasamos al modelo para que ejecute la consulta
            $object = [
                "status" => $object['status']
            ];

            // Si todo es correcto la inserción se hará satifactoriamente
            $query = CommentModel::mdlUpdateItem($table, $object, $id);

            if ($query == true) {
                return "<script type='text/javascript'>window.history.back();</script>";
            }
        }
        return $message;
    }

    // DELETE
    public function ctrDeleteItem($table, $id) {
        $message = "";
        $query = CommentModel::mdlDeleteItem($table, $id);

        if ($query == true) {
            $message .= "<div class='alert alert-info mt-2' role='alert'>El comentario ha sido eliminado.</div>";
        } else {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al eliminar el comentario.</div>";
        }

        return $message;
    }
}
?>