<?php
require_once __DIR__ . '/../vendor/autoload.php';

include('../configuration.php');

$pdf = new \TCPDF();
$pdf->AddPage();

// Récupérer les données
$sql = "SELECT * FROM caisse WHERE statut = 'actif' ORDER BY date_paiement DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('dejavusans', '', 10);

$html = '<h2>Export des transactions caisse</h2>';
$html .= '<table border="1" cellpadding="4">
<thead>
<tr>
<th>ID</th><th>Type</th><th>Montant</th><th>Motif</th><th>Nom client</th><th>Mode paiement</th><th>Date paiement</th><th>Statut</th>
</tr>
</thead><tbody>';

foreach ($transactions as $row) {
    $html .= '<tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['type'].'</td>
    <td>'.$row['montant'].'</td>
    <td>'.$row['description'].'</td>
    <td>'.$row['nom_carte'].'</td>
    <td>'.$row['mode_paiement'].'</td>
    <td>'.$row['date_paiement'].'</td>
    <td>'.$row['statut'].'</td>
    </tr>';
}

$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('export_caisse.pdf', 'D');
