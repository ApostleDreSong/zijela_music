<?php

$host = "localhost";
$user = "codeafri_dresongs";
$pass = "people@8624";
$db_name = "codeafri_mygospel";
$dbc = mysqli_connect($host,$user,$pass,$db_name)
    or die("Error in connection: " .mysqli_connect_error());
?>