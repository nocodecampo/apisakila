<?php 
include 'dbconnect.php';
$sql ="SELECT actor_id, first_name, last_name FROM actor";
$result = $conn->query($sql);
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($datos);
// Establece la cabecera para indicar que la respuesta es json
header('Content-Type: application/json');

echo $json;


?>