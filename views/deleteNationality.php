<?php
require '../database/connection.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l'entrée
    $stmt = $connection->prepare("DELETE FROM nationalities WHERE nationality_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: nationality.php');
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


