<?php

class FunctionsController {

    // Formatea la fecha para la base de datos
    public static function ctrFormatDate($date, $format) {
        $formatDate = new DateTime($date);
        // $format = 'Y-m-d';
        // $format = 'd-m-Y';

        $result = date_format($formatDate, $format);
        return $result;
    }

    public static function ctrGetMonth($date) {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $formatDate = new DateTime($date);
        $format = 'n';
        // $format = 'Y-m-d';
        // $format = 'd-m-Y';

        $result = date_format($formatDate, $format);
        return $meses[$result-1];
    }

    // Genera un token aleatorio según su longitud y si tiene caracteres especiales
    public static function ctrToken($long,$esp) {
        $seed = array();
        $seed[] = array('a','e','i','o','u');
        $seed[] = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');
        $seed[] = array('0','1','2','3','4','5','6','7','8','9');
        $seed[] = array('A','E','I','O','U');
        $seed[] = array('B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
        $seed[] = array('0','1','2','3','4','5','6','7','8','9');
        //Si puede contener carateres especiales
        if ($esp) {
            $seed[] = array('$','#','%','&','@','-','?','¿','¡','!','+','-','*');
        }
        $key = "";
        //Creamos el la clave con la longitud que le pasamos por parametro
        for ($i=0 ; $i < $long ; $i++) {
            //Selecciona un subarray al azar
            $x = mt_rand(0, count($seed)-1);
            //Selecciona una posicion al azar del subarray seleccionado antes
            $pos = mt_rand(0,count($seed[$x])-1);
            //Añade el caracter al clave
            $key .= $seed[$x][$pos];
        }
        return $key;
    }

    public static function ctrTokenUnique($table,$field,$long,$esp) {
        $key = "";
        do {

            $key = FunctionsController::ctrToken($long,$esp);
            $query = FunctionsController::ctrWhere($table, $field, $key);

        } while (count($query) > 0);

        return $key;
    }

    public static function ctrBorder($value) {
        switch ($value) {
            case 1:
                return "border-blue";
                break;
            
            case 2:
                return "border-green";
                break;

            case 3:
                return "border-green-blue";
                break;

            case 4:
                return "border-blue-green";
                break;
        }
    }

    public static function ctrShortText($str,$long) {
        $str_short = substr($str, 0, $long) . "...";
    
        return $str_short;
    }

    public static function ctrWhere($table, $field, $value) {
        $query = " SELECT * FROM $table ";

        if ($field != null && $value != null) {
            $query .= " WHERE $field LIKE :condition ";
        }

        $sql = Connect::connected()->prepare($query);
        $sql->execute(array(':condition' => $value));
        $query = $sql->fetchAll();

        return $query;
    }
}

?>