<?php 
require_once '../validar_acceso.php';
include 'dbconnect.php';
$sql ="SELECT actor_id, first_name, last_name FROM actor";
$result = $conn->query($sql);
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($datos);

include 'auth.php';


?>