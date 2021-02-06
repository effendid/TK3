<?php

$db_host = "193.168.195.32";
$db_user = "DDBA";
$db_pass = "Letmein!2021";
$db_name = "TK3";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("Terjadi masalah: " . $e->getMessage());
}