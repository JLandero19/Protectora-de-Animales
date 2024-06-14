<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require '../vendor/autoload.php';

class MailController {

    public function ctrAll($table) {
        return MailModel::mdlAll($table);
    }

    public function ctrActivitysJoinSpecies() {
        return MailModel::mdlActivitysJoinSpecies();
    }


    public function ctrWhere($table, $field, $value) {
        return MailModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return MailModel::mdlOneWhere($table, $field,  $value);
    }

    public function sendMailContact($object) {
        $str = "";
        $mail_to = Validator::filterEmail($object['mail_to']);
        $name_to = Validator::filterString($object['name_to']);
        $subject = Validator::filterString($object['subject']);
        $message = Validator::filterString($object['message']);
        
        if (!$mail_to) {
            $str .= "<div class='alert alert-danger'>El email introducido no es válido.</div>";
        }

        if (!$name_to) {
            $str .= "<div class='alert alert-danger'>El nombre introducido no es válido.</div>";
        }

        if (!$subject) {
            $str .= "<div class='alert alert-danger'>El asunto introducido no es válido.</div>";
        }

        if (!$message) {
            $str .= "<div class='alert alert-danger'>El mensaje introducido no es válido.</div>";
        }

        if ($str == "") {

            $object = [
                "name_to" => $name_to,
                "mail_to" => $mail_to,
                "subject" => $subject,
                "message" => $message
            ];

            $query = MailModel::mdlInsertItem("contact_emails", $object);
            if ($query == true) {
                $response = MailModel::sendMailResponse($mail_to, $name_to);

                if ($response == true) {
                    return "<div class='alert alert-success'>El mensaje ha sido enviado.</div>";                   
                }
            }

            $str .= "<div class='alert alert-danger'>Ha habido un error en el envío del mensaje, inténtelo de nuevo.</div>";
        }

        return $str;
    }

    public static function sendMailAdopted($mail_to, $name_to) {
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
            $html = "phpmailer/template-email/email-adopted.php";
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
    public function ctrDeleteItem($table, $id) {
        $message = "";
        $query = MailModel::mdlDeleteItem($table, $id);

        if ($query == true) {
            $message .= "<div class='alert alert-info mt-2' role='alert'>El email ha sido eliminado.</div>";
        } else {
            $message .= "<div class='alert alert-danger mt-2' role='alert'>Ha habido un error al eliminar el email.</div>";
        }

        return $message;
    }
}