<?php
$db_server="localhost";
$db_username="Alex";
$db_password="";
$database="Canteen_Test";
$db = new mysqli($db_server,$db_username,$db_password,$database);
if($db->connect_error)
    die("Error connecting to Database : " . $db->connect_error);
?>