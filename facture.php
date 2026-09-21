<?php

require_once 'configuration.php';

if (!isset($_GET['transaction_id'])) {
    die(" Transaction manquante.");
}

$transaction_id = $_GET['transaction_id'];

// Récupération du client depuis la base
$stmt = $pdo->prepare("SELECT * FROM caisse WHERE transaction_id = ?");
$stmt->execute([$transaction_id]);
$client = $stmt->fetch();

if (!$client) {
    die(" Transaction introuvable.");
}

// Infos entreprise
$entreprise = [
    'nom' => 'SG Car',
    'adresse' => '84 Av Hassan II , 1° ét. Beni Mellal',
    'telephone' => '+212 668-624984',
    'email' => 'contact@sgcar.ma',
    'rc' => 'RC123456789'
];

// Tu peux aussi stocker les infos suivantes dans la table `caisse` si tu veux les récupérer ici :
$vehicule = [
    'categorie' => $client['vehicule_categorie'] ?? 'Catégorie inconnue',
    'nom' => $client['vehicule_nom'] ?? 'Modèle inconnu'
];

$date_reception = $client['date_reception'] ?? '';
$date_restitution = $client['date_restitution'] ?? '';
$heure_reception = $client['heure_reception'] ?? '';
$heure_restitution = $client['heure_restitution'] ?? '';

$days = 0;
if ($date_reception && $date_restitution) {
    $start = DateTime::createFromFormat('d-m-Y', $date_reception);
    $end = DateTime::createFromFormat('d-m-Y', $date_restitution);
    if ($start && $end) {
        $days = $start->diff($end)->days;
    }
}

$location = [
    'prise_en_charge' => "$date_reception à $heure_reception",
    'restitution' => "$date_restitution à $heure_restitution",
    'jours' => $days,
    'montant' => $client['montant'],
    'mode_paiement' => $client['mode_paiement']
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - SG Car</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 40px;
            background: #f9f9f9;
        }

        .facture {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .entete {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .entete-logo {
            display: flex;
            align-items: center;
        }

        .entete-logo .logo {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: #c0392b; /* rouge SG Car */
            margin: 0;
            text-decoration: none;
        }

        .entete-logo a {
            text-decoration: none;
        }

        h1 {
            color: #c0392b;
        }

        .section {
            margin-top: 20px;
        }

        .section h3 {
            color: #c0392b;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .infos {
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-pdf {
            display: inline-block;
            margin-top: 30px;
            padding: 15px 20px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border:none;
        }
    </style>
</head>
<body>

<div class="facture">
    <div class="entete">
        <div class="entete-logo">
            <a href="#"><h1 class="logo">SG CAR</h1></a>
        </div>
        <div class="infos">
            <strong><?= $entreprise['nom'] ?></strong><br>
            <?= $entreprise['adresse'] ?><br>
            Tél : <?= $entreprise['telephone'] ?><br>
            Email : <?= $entreprise['email'] ?><br>
            RC : <?= $entreprise['rc'] ?>
        </div>
    </div>

    <h1>Facture de Location</h1>

    <div class="section">
        <h3>Informations du client</h3>
        <p class="infos">
            Nom : <?= htmlspecialchars($client['nom']) . ' ' . htmlspecialchars($client['prenom']) ?><br>
            Adresse : <?= nl2br(htmlspecialchars($client['adresse'])) ?><br>
            Email : <?= htmlspecialchars($client['email']) ?><br>
            Téléphone : <?= htmlspecialchars($client['telephone']) ?>
        </p>
    </div>

    <div class="section">
        <h3>Détails de la location</h3>
        <p class="infos">
            Véhicule : <?= htmlspecialchars($vehicule['categorie']) ?> - <?= htmlspecialchars($vehicule['nom']) ?><br>
            Prise en charge : <?= htmlspecialchars($location['prise_en_charge']) ?><br>
            Restitution : <?= htmlspecialchars($location['restitution']) ?><br>
            Nombre de jours facturés : <?= $location['jours'] ?>
        </p>
    </div>

    <div class="section">
        <h3>Résumé de la facture</h3>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Location véhicule (<?= $location['jours'] ?> jours)</td>
                    <td><?= number_format($location['montant'], 2, ',', ' ') ?> MAD</td>
                </tr>
                <tr>
                    <td>Moyen de paiement</td>
                    <td><?= htmlspecialchars($location['mode_paiement']) ?></td>
                </tr>
            </tbody>
        </table>
        <p class="total">Total à payer : <?= number_format($location['montant'], 2, ',', ' ') ?> MAD</p>
    </div>

    <button onclick="window.print()" class="btn-pdf">Imprimer / Enregistrer en PDF</button>
</div>
</body>
</html>
