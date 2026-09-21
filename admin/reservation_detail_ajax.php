<?php
// reservation_detail_ajax.php

include('../configuration.php');

$id = intval($_GET['id'] ?? 0);
if (!$id) {
    echo "<p>ID invalide</p>";
    exit;
}

$sql = "SELECT r.* FROM reservations r WHERE r.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$r) {
    echo "<p>Réservation non trouvée</p>";
    exit;
}

$statuts = ['en_cours' => 'En cours', 'valide' => 'Validée', 'refuse' => 'Refusée', 'annule' => 'Annulée'];
?>

<div id="reservation-detail" data-id="<?= $r['id'] ?>">

    <p><strong>ID :</strong> <?= $r['id'] ?></p>
    <p><strong>Client :</strong> <?= htmlspecialchars($r['nom'] . ' ' . $r['prenom']) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($r['email']) ?></p>
    <p><strong>Véhicule :</strong> <?= htmlspecialchars($r['vehicule_nom'] ?? 'N/A') ?></p>
    <p><strong>Date début :</strong> <?= $r['date_debut'] ?> <?= $r['heure_debut'] ?></p>
    <p><strong>Date fin :</strong> <?= $r['date_fin'] ?> <?= $r['heure_fin'] ?></p>
    <p><strong>Statut :</strong> <?= $statuts[$r['statut']] ?? $r['statut'] ?></p>
    <p><strong>Remarques :</strong><br><?= nl2br(htmlspecialchars($r['remarques'])) ?></p>
</div>

<?php if($r['statut'] === 'en_cours'): ?>
    <button id="btn-valider">Valider</button>
    <button id="btn-refuser">Refuser</button>
<?php else: ?>
    <p>Aucune action possible</p>
<?php endif; ?>


