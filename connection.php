<?php
$SERVER = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DATABASE = "database";

$conn = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE);
if($conn->connect_error){
    die("connection failed");
}
?>