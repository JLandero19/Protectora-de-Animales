<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class MailModel {

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
        }

        $sql = Connect::connected()->prepare($query);
        $sql->execute(array(':condition' => $value));
        $query = $sql->fetchAll();

        return $query;
    }

    public static function mdlOneWhere($table, $field, $value) {
        if ($field == null && $value == null) {
            return false;
        }
        
        $sql = Connect::connected()->prepare("SELECT * FROM $table WHERE $field LIKE :condition ");
        $sql->execute(array(':condition'=> $value));
        $query = $sql->fetch();

        return $query;
    }

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

    public static function sendMailResponse($mail_to, $name_to) {
        $mail = new PHPMailer(true);
        // Esto envia un mensaje al correo del administrador 
        // según lo que haya introducido el usuario en el formulario de contacto
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'javiersevillista3@gmail.com';
            $mail->Password = 'oslhvihtrlopimmb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('javiersevillista3@gmail.com', 'Love4Pets');
            $mail->addAddress($mail_to, $name_to);
            // $mail->addCC('concopia@gmail.com');

            // $mail->addAttachment('docs/dashboard.png', 'Dashboard.png');

            ob_start();
            $html = "phpmailer/template-email/email-contact-response.php";
            include $html;
            $html = ob_get_clean();

            $mail->isHTML(true);
            $mail->Subject = "No responda a este mensaje";
            $mail->Body = $html;
            if ($mail->send()) {
                return true;
            }   
            
            return false;
        } catch (Exception $e) {
            return false;
        }
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