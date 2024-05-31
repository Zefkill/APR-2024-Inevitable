<?php
    $server = "localhost";
    $username = "root" ;
    $pasword = "";
    $db = "inevitable";
    try{
        $dbconn = new PDO("mysql:host=localhost; dbname=inevitable","root","");

        $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOExeption $e){
        echo "HET LOOPT FOUT" . $e->getMessage();}
    
?>