<?php
include('../configuration.php');

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $stmt = $pdo->prepare("
        SELECT r.*, c.montant
        FROM reservations r
        LEFT JOIN caisse c ON r.caisse_id = c.id
        WHERE r.email = ?
        ORDER BY r.date_reservation DESC
    ");
    $stmt->execute([$email]);
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($reservations) > 0) {
        echo "<ul style='list-style:none; padding:0;'>";

       foreach ($reservations as $r) {
    echo "<li style='margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom:10px;'>
        <strong>Véhicule :</strong> {$r['vehicule_nom']}<br>
        <strong>Du :</strong> {$r['date_debut']} {$r['heure_debut']} <strong>au</strong> {$r['date_fin']} {$r['heure_fin']}<br>
        <strong>Prix :</strong> " . 
        (!empty($r['montant']) ? number_format($r['montant'], 2, ',', ' ') . ' MAD' : 'Prix non renseigné') . "<br>
        <strong>Frais de retard :</strong> " . number_format($r['frais_retard'], 2, ',', ' ') . " MAD
    </li>";
}


        echo "</ul>";
    } else {
        echo "<p>Aucune réservation trouvée pour ce client.</p>";
    }
}
?>
