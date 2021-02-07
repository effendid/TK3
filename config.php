<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "G0dKn0ws!";
$db_name = "TK3";

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>