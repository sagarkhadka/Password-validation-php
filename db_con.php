<?php

# Connecting to the localhost
# database server

$server = "localhost";
$user = "root";
$password = "";
$db = "myapp";

$con = mysqli_connect($server, $user, $password, $db);
/*
if($con) {
    echo 'connected';
}
*/
?>