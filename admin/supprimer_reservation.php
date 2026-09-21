<?php
// reservation_supprimer.php
header('Content-Type: application/json');
include('../configuration.php');

$id = intval($_POST['id'] ?? 0);
if (!$id) {
    echo json_encode(['success' => false, 'message' => 'ID invalide']);
    exit;
}

// Vérifie si la réservation existe
$stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = :id");
$stmt->execute([':id' => $id]);
$res = $stmt->fetch();

if (!$res) {
    echo json_encode(['success' => false, 'message' => 'Réservation non trouvée']);
    exit;
}

// Supprimer la réservation
$del = $pdo->prepare("DELETE FROM reservations WHERE id = :id");
$success = $del->execute([':id' => $id]);

echo json_encode([
    'success' => $success,
    'message' => $success ? 'Réservation supprimée avec succès.' : 'Échec de la suppression.'
]);
