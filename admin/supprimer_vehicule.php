<?php
session_start();
include('../configuration.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Récupérer l'image pour suppression
    $stmt = $pdo->prepare("SELECT image_url FROM vehicules WHERE id = ?");
    $stmt->execute([$id]);
    $vehicule = $stmt->fetch();

    // Supprimer l’image du serveur
    if ($vehicule && !empty($vehicule['image_url'])) {
        $imagePath = '../' . $vehicule['image_url'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Supprimer le véhicule
    $deleteStmt = $pdo->prepare("DELETE FROM vehicules WHERE id = ?");
    $deleteStmt->execute([$id]);

    header('Location: voiture.php?deleted=1');
    exit();
} else {
    header('Location: voiture.php?error=suppression');
    exit();
}
?>
