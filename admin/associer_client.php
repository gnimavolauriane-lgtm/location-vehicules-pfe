<?php
include('../configuration.php');
$id_reservation = $_GET['id_reservation'] ?? null;
if (!$id_reservation) {
    die("ID réservation manquant.");
}

// Récupérer les clients
$clients = $pdo->query("SELECT id, nom FROM caisse")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'] ?? null;
    if ($client_id) {
        // Met à jour la réservation avec le client choisi
        $stmt = $pdo->prepare("UPDATE reservations SET caisse_id = ? WHERE id = ?");
        $stmt->execute([$client_id, $id_reservation]);
        echo "Client associé avec succès ! <a href='reservations_sans_client.php'>Retour</a>";
        exit;
    } else {
        echo "Veuillez choisir un client.";
    }
}
?>

<h3>Associer un client à la réservation #<?= htmlspecialchars($id_reservation) ?></h3>

<form method="POST">
    <label for="client_id">Choisir un client :</label>
    <select name="client_id" id="client_id" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach($clients as $client): ?>
            <option value="<?= $client['id'] ?>"><?= htmlspecialchars($client['nom']) ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Associer</button>
</form>