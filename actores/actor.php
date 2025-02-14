<?php 
require_once '../validar_acceso.php';
include '../dbconnect.php';
$sql ="SELECT actor_id, first_name, last_name FROM actor WHERE actor_id = :actor_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":actor_id", $_GET['actor_id']);
$stmt->execute();
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($datos);

include '../auth.php';


?>