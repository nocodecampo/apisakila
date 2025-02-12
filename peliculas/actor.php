<?php
include '../dbconnect.php';
$sql = "SELECT actor.actor_id, actor.first_name, actor.last_name, film.title
FROM actor
INNER JOIN film_actor ON actor.actor_id = film_actor.actor_id
INNER JOIN film ON film_actor.film_id = film.film_id
WHERE actor.actor_id = :actor_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":actor_id", $_GET['id']);
$stmt->execute();
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($datos);
// Establece la cabecera para indicar que la respuesta es json
header('Content-Type: application/json');

echo $json;
