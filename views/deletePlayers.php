<?php
require '../database/connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = intval($_GET['id']);
    $stmt = $connection->prepare("delete from players where player_id = ?");
    $stmt -> bind_param("i" , $id);
    if($stmt -> execute()){
        header('location: players.php');
        exit();
    }else{
        echo 'Error: '.$stmt->error;
    }
    $stmt -> close();
}else{
    echo 'ID non valide.'; 
}
$connection -> close();
?>