<?php 
include '../dbconnect.php';
$sql ="SELECT 
film.title, 
film.description, 
film.release_year, 
film.rental_rate, 
film.length, 
film.replacement_cost, 
film.rating,
language.name 
FROM film
INNER JOIN language ON film.language_id = language.language_id";
$result = $conn->query($sql);
$datos = $result->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($datos);
// Establece la cabecera para indicar que la respuesta es json
include '../auth.php';


?>