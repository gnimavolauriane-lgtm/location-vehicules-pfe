<?php
include('../configuration.php'); // connexion PDO

// Récupérer l'id envoyé en POST
$idPaiement = $_POST['id'] ?? null;

if ($idPaiement) {
    $stmt = $pdo->prepare("SELECT type, montant FROM caisse WHERE id = :id AND statut = 'actif'");
    $stmt->execute([':id' => $idPaiement]);
    $paiement = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($paiement) {
        $update = $pdo->prepare("UPDATE caisse SET statut = 'annulé' WHERE id = :id");
        $update->execute([':id' => $idPaiement]);

        echo json_encode([
            'success' => true,
            'message' => ($paiement['type'] === 'ajout')
                ? "Paiement ajouté annulé, solde diminué de {$paiement['montant']}."
                : "Paiement retrait annulé, solde augmenté de {$paiement['montant']}."
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => "Paiement introuvable ou déjà annulé."]);
    }
} else {
    echo json_encode(['success' => false, 'message' => "ID paiement manquant."]);
}
