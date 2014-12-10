<?php
/*****************************/
/***DESARROLLO HIDROCALIDO****/
/*****************************/
require 'connector.php';
// TOMAMOS NUESTRO JSON RECIBIDO DESDE LA PETICION DE ANGULAR JS Y LO LEEMOS
$JSON       = file_get_contents("php://input");
$request    = json_decode($JSON);
$metodo     = $request->metodo; 
if( $metodo == 'obtenerCategorias' ){
  obtenerCategorias();
}else if ($metodo == 'obtenerPistos') {
  $idCategoria = $request->idCategoria;  
  obtenerPistos($idCategoria);
}

function obtenerPistos($idCategoria){
    $sql ="SELECT * FROM categorias AS CA INNER JOIN pistos AS PI ON CA.idCategoria = PI.idCategoria WHERE PI.idCategoria = '$idCategoria' "; 
    try {
        $db = getConnection();
        $stmt = $db->query($sql);  
        $detalle = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"pistos": ' . json_encode($detalle) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}

function obtenerCategorias(){
    $sql ="SELECT * FROM categorias"; 
    try {
        $db = getConnection();
        $stmt = $db->query($sql);  
        $detalle = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"categorias": ' . json_encode($detalle) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}

?>