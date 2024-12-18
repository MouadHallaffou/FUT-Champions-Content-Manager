<?php
    require '../database/connection.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM nationalities WHERE nationality_id = '$id'";
    $query = mysqli_query($connection, $sql);
    if(isset($query)){
        header('location : nationality.php');
    }else{
        echo 'erreur de suppression';
    }

?>

