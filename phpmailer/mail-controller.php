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
            $str .= "<div class='alert alert-danger'>
                        El email introducido no es válido.
                    </div>";
        }
        if (!$name_to) {
            $str .= "<div class='alert alert-danger'>
                        El nombre introducido no es válido.
                    </div>";
        }
        if (!$subject) {
            $str .= "<div class='alert alert-danger'>
                        El asunto introducido no es válido.
                    </div>";
        }
        if (!$message) {
            $str .= "<div class='alert alert-danger'>
                        El mensaje introducido no es válido.
                    </div>";
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
                    return "<div class='alert alert-success'>
                                El mensaje ha sido enviado.
                            </div>";                   
                }
            }
            $str .= "<div class='alert alert-danger'>
                        Ha habido un error en el envío del mensaje, 
                        inténtelo de nuevo.
                    </div>";
        }

        return $str;
    }

    public function ctrSendMailRememberMe($object) {
        $str = "";
        $mail = false;
        $mail_to = Validator::filterEmail($object['email']);
        
        if (!$mail_to) {
            $str .= "<div class='alert alert-danger'>
                        El email introducido no es válido.
                    </div>";
        }
        if ($str == "") {
            $search = UserModel::mdlOneWhere("role_users", "email", $mail_to);
            
            if ($search) {
                $name_to = $search['name'] . " " . $search['lastname'];
                $mail = MailModel::mdlSendMailRememberMe($mail_to, $name_to);
                if ($mail) {
                    return "<div class='alert alert-success'>
                                Te hemos mandado un email con los pasos a seguir.
                            </div>";
                } else {
                    $str .= "<div class='alert alert-danger'>
                                No se ha podido enviar el correo.
                            </div>";
                }
            } else {
                $str .= "<div class='alert alert-danger'>
                            El email introducido no existe en nuestra base de datos.
                        </div>";
            }
        }
        return $str;
    }

    
}