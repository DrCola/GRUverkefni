<?php
//Create connection credentials
$db_host = "tsuts.tskoli.is";
$db_name = "1208982809_gru_verkefni";
$db_user = "1208982809";
$db_pass = "evelina";

try {
    $connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?> 
