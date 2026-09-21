<?php
// reservation_action.php
header('Content-Type: application/json');
include('../configuration.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$action = $_POST['action'] ?? '';
$id = intval($_POST['id'] ?? 0);

if (!$id || !in_array($action, ['valider', 'refuser'])) {
    echo json_encode(['success' => false, 'message' => 'Paramètres invalides']);
    exit;
}

// Vérifier que la réservation est en cours
$stmt = $pdo->prepare("SELECT statut FROM reservations WHERE id = :id");
$stmt->execute([':id' => $id]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$r) {
    echo json_encode(['success' => false, 'message' => 'Réservation non trouvée']);
    exit;
}
if ($r['statut'] !== 'en_cours') {
    echo json_encode(['success' => false, 'message' => 'Statut non modifiable']);
    exit;
}

$newStatut = $action === 'valider' ? 'valide' : 'refuse';

$update = $pdo->prepare("UPDATE reservations SET statut = :statut WHERE id = :id");
$success = $update->execute([':statut' => $newStatut, ':id' => $id]);

if ($success) {
    echo json_encode(['success' => true, 'message' => "Réservation $newStatut avec succès."]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour']);
}
