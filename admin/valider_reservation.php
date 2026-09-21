<?php
include('../configuration.php');

header('Content-Type: application/json');

$id = intval($_POST['id'] ?? 0);
$action = $_POST['action'] ?? '';

if (!$id || !in_array($action, ['valider', 'refuser'])) {
    echo json_encode(['success' => false, 'message' => 'ID ou action invalide (id=' . $id . ', action=' . $action . ')']);
    exit;
}

$newStatus = ($action === 'valider') ? 'valide' : 'refuse';

try {
    $stmt = $pdo->prepare("UPDATE reservations SET statut = :statut WHERE id = :id");
    $stmt->execute([':statut' => $newStatus, ':id' => $id]);
    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Réservation introuvable ou statut inchangé.']);
    } else {
        echo json_encode(['success' => true, 'message' => 'Réservation ' . $action . ' avec succès.']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur SQL : ' . $e->getMessage()]);
}
