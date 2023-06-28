<?php

class conectar{

    public static function Conexion(){
        $user="root";
        $pass="nicolas";
        $server="localhost";
        $db="ing";
        try{
            $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
        } catch (PDOException $exp){
            var_dump($exp->getMessage());
        }
        
        return $conn;

    }
}

?>
