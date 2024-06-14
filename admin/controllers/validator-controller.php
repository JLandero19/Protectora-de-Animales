<?php

class Validator {

    //Filtrado utilizando filter_var()
    public static function filterString($str) {
        if (!is_numeric($str)) {
            if ($str != "") {
                $str = htmlspecialchars($str);
                $str = trim($str);
                $str = filter_var($str, FILTER_SANITIZE_STRING);
            } else {
                return false;
            }
        } else {
            return false;
        }

        return $str;
    }

    public static function filterUsername($str) {
        if (!is_numeric($str)) {
            if ($str != "") {
                $str = htmlspecialchars($str);
                $str = trim($str);

                $str = explode(" ", $str);
                if (count($str) >= 2) {
                    return false;
                }
                $str = implode("", $str);

                $str = filter_var($str, FILTER_SANITIZE_STRING);
            } else {
                return false;
            }
        } else {
            return false;
        }

        return $str;
    }

    public static function filterPassword($str) {
        if ($str == "" || $str == null) {
            return false;
        }
        $str = Validator::filterString($str);
        return hash('sha512', $str);
    }

    public static function filterNumberInteger($num) {
        if (is_numeric($num)) {
            return intval($num);
        } else {
            return false;
        }
    }

    public static function filterChipAnimal($num) {
        if (is_numeric($num)) {
            $num = intval($num);
            return strval($num);
        } else {
            return false;
        }
    }

    public static function filterNumberFloat($num) {
        if (is_numeric($num)) {
            return floatval($num);
        } else {
            return false;
        }
    }

    public static function filterEmail($str) {
        $str = trim($str);

        if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
            $str = filter_var($str, FILTER_SANITIZE_EMAIL);
            return $str;
        } else {
            return false;
        }
    }

    public static function filterTlf($tlf) {
        $tlf = trim($tlf);

        $filter = "/^\d{9}$/";

        if (preg_match($filter, $tlf)) {
            return $tlf;
        } else {
            return false;
        }
    }

    public static function filterURL($str) {
        $str = trim($str);

        if (filter_var($str, FILTER_VALIDATE_URL)) {
            $str = filter_var($str, FILTER_SANITIZE_URL);
            return $str;
        } else {
            return false;
        }
    }

    public static function filterDNI($str) {

        $letter = substr($str, -1);
        $numbers = substr($str, 0, -1);

        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
            return strtoupper($str);
        }
        return false;    
    }

    /* ---------------------------------------------------------------- */
    //Filtrado utilizando preg_match()
    public static function filter_string($str) {

        $compare = "/^[a-zA-Z0-9]+$/";

        if (preg_match($compare, $str)) {
            return $str;
        } else {
            return false;
        }        
    }
    
    public static function filter_number($str) {

        $compare = "/^([0-9]+|[0-9]+[.][0.9]+)$/";

        if (preg_match($compare, $str)) {
            return $str;
        } else {
            return false;
        }        
    }

    public static function filter_Email($str) {
        $compare = "/^([a-zA-Z]+[_.-]*[a-zA-Z0-9]+)@([a-zA-Z]+)([a-zA-Z0-9]+)[.]([a-z]{3,})$/";

        if (preg_match($compare, $str)) {
            return $str;
        } else {
            return false;
        }   
    }
    
}

?>