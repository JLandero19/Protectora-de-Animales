<?php

class DonationController {

    public function ctrAll($table) {
        return DonationModel::mdlAll($table);
    }

    public function ctrWhere($table, $field, $value) {
        return DonationModel::mdlWhere($table, $field,  $value);
    }

    public function ctrOneWhere($table, $field, $value) {
        return DonationModel::mdlOneWhere($table, $field,  $value);
    }

    // INSERT
    public function ctrSaveData($table,$object) {
        $message = "";

        $name_donation = Validator::filterString($object['name_donation']);
        $mail_donation = Validator::filterEmail($object['mail_donation']);
        $amount_donation = Validator::filterNumberFloat($object['amount_donation']);
        
        if (!$name_donation) {
            $message .= "<div class='alert alert-danger'>
                            El nombre introducido no es válido.
                        </div>";
        }

        if (!$mail_donation) {
            $message .= "<div class='alert alert-danger'>
                            El email introducido no es válido.
                        </div>";
        }

        if (!$amount_donation) {
            $message .= "<div class='alert alert-danger'>
                            El importe introducido no es válido.
                        </div>";
        }

        if ($message == "") {
            $_SESSION["name_donation"] = $name_donation;
            $_SESSION["mail_donation"] = $mail_donation;
            $_SESSION["amount_donation"] = $amount_donation;

            return "OKEY";
        }
        return $message;
    }

    // EDIT
    public function ctrEndDonation($table, $object) {
        // Este Array lo pasamos al modelo para que ejecute la consulta
        $object2 = [
            "name" => $object["name_donation"],
            "email" => $object["mail_donation"],
            "amount" => $object["amount_donation"],
            "status" => "Aceptado",
            "order_id" => $object['order-id']
        ];

        $query = DonationModel::mdlInsertItem("donations", $object2);

        if ($query == true) {
            MailModel::sendMailDonation($object2['email'], 
                                        $object2['name'], 
                                        $object2['amount'], 
                                        $object2['order_id']);
            return "<div class='alert alert-success'>
                        Gracias por la donación.
                    </div>";
        }
        
        return "<script type='text/javascript'>
                    window.location = '404';
                </script>";
    }
}
?>