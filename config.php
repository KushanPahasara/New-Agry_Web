<?php
class Config
{
    public static function GetConnection()
    {
        try 
        {
            $dsn = "mysql:dbname=agryweb";
            $user = "root";
            $pw = "";
            $conn = new PDO($dsn,$user,$pw);
            return $conn;
            
           

        } 
        catch (PDOException $ex) {
            throw $ex;
        }
    }
}
?>