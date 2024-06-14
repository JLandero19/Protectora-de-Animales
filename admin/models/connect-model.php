<?php

class Connect {

    public static function connected() {
        $server = "localhost";
        $bd = "bd_protectora_animales";
        $user = "root";
        $password = "";

        try{
            $connect = new PDO('mysql:host='.$server.';dbname='.$bd.';charset=utf8', $user, $password);
            //var_dump($connect);
            return $connect;
        } catch (PDOException $e) {
            $e -> getMessage();
        }

    }
}

?>