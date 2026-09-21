<?php
// Connexion PDO
include('../configuration.php');

$stmt = $pdo->query("SELECT id, date_debut, date_fin, statut FROM reservations WHERE caisse_id IS NULL");
$reservations = $stmt->fetchAll();

if(empty($reservations)) {
    echo "<p>Toutes les réservations ont un client associé.</p>";
} else {
    echo "<h3>Réservations sans client associé :</h3>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Date début</th><th>Date fin</th><th>Statut</th><th>Action</th></tr>";
    foreach($reservations as $res) {
        echo "<tr>";
        echo "<td>{$res['id']}</td>";
        echo "<td>{$res['date_debut']}</td>";
        echo "<td>{$res['date_fin']}</td>";
        echo "<td>{$res['statut']}</td>";
        // Lien pour associer un client (à créer dans un autre fichier)
        echo "<td><a href='associer_client.php?id_reservation={$res['id']}'>Associer un client</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
