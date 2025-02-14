<?php
require_once '../validar_acceso.php';
if (isset($_POST["name"]) && ($_POST["lastname"])) {

    include '../dbconnect.php';
    $sql = "INSERT INTO actor (first_name, last_name)
    VALUES (:first_name, :last_name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":first_name", $_POST['name']);
    $stmt->bindParam(":last_name", $_POST['lastname']);
    $stmt->execute();
    $actor_id = $conn->lastInsertId();
    $datos = [
        'actor_id'=>$actor_id,
        'first_name'=>$_POST['name'],
        'last_name'=>$_POST['lastname']
    ];
    $json = json_encode($datos);
   
}else{
    $response = [
        'status'=>'200',
        'message'=> 'No se han recibido los datos necesarios'
    ];
    $json = json_encode($response);
}
include '../auth.php';
?>
