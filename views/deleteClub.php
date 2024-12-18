<?php
require '../database/connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); 
    $stmt = $connection->prepare("DELETE FROM clubs WHERE club_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: club.php');
        exit();
    } else {
        echo 'Erreur de suppression : ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'ID non valide.';
}
$connection->close();
?>
