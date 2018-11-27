<?php
include('config_db.php');

header('Content-Type: text/html; charset=utf-8');
$conn = new mysqli($host,$user, $password, $db);
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');


?>