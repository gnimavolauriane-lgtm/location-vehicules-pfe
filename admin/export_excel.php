<?php
include('../configuration.php');

// Requête pour récupérer les données (tu peux reprendre ton filtre)
$sql = "SELECT * FROM caisse WHERE statut = 'actif' ORDER BY date_paiement DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Définit les headers pour téléchargement CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=export_caisse.csv');

// Ouvre un flux en sortie
$output = fopen('php://output', 'w');

// Écrire la ligne d'en-tête
fputcsv($output, ['ID', 'Type', 'Montant', 'Motif', 'Nom client', 'Mode paiement', 'Date paiement', 'Statut']);

// Écrire les données
foreach ($transactions as $row) {
    fputcsv($output, [
        $row['id'],
        $row['type'],
        $row['montant'],
        $row['description'],
        $row['nom_carte'],
        $row['mode_paiement'],
        $row['date_paiement'],
        $row['statut'],
    ]);
}

fclose($output);
exit;
?>
