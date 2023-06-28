<?php

class conectar{

    public static function Conexion(){
        $user="root";
        $pass="espe";
        $server="localhost";
        $db="WeConnect";
        try{
            $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
        } catch (PDOException $exp){
            var_dump($exp->getMessage());
        }
        
        return $conn;

    }
}

?>
