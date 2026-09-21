<?php


include('../configuration.php');
// 1. Récupérer les réservations en retard
$sql = "SELECT r.id, r.date_fin, r.statut, r.frais_retard, c.nom, c.email, c.telephone
        FROM reservations r
        LEFT JOIN caisse c ON r.caisse_id = c.id
        WHERE r.date_fin < NOW()
          AND r.statut != 'terminée'";


$stmt = $pdo->query($sql);
$reservations_retard = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2. Gestion des actions (mise à jour statut, frais, etc.)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'terminer') {
        $pdo->prepare("UPDATE reservations SET statut = 'terminée' WHERE id = ?")->execute([$id]);
        $message = "Réservation terminée avec succès.";
    } elseif ($action === 'prolonger') {
        $nouvelle_date = $_POST['nouvelle_date']; // format 'YYYY-MM-DD'
        $pdo->prepare("UPDATE reservations SET date_fin = ? WHERE id = ?")->execute([$nouvelle_date, $id]);
        $message = "Réservation prolongée jusqu'au $nouvelle_date.";
    } elseif ($action === 'ajouter_frais') {
        $frais = floatval($_POST['frais']);
        $pdo->prepare("UPDATE reservations SET frais_retard = ? WHERE id = ?")->execute([$frais, $id]);
        $message = "Frais de retard ajoutés.";
    }
    // Recharge les données après modification
    header("Location: retards.php?msg=" . urlencode($message));
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Véhicules en retard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body >
    <?php include('entete_admin.php'); ?>
    <br>
    <br>
    <br>
    <br>
    <div class="container mt-5">
    <h2><i class="fas fa-clock text-warning"></i> Véhicules en retard</h2>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <?php if (empty($reservations_retard)): ?>
        <div class="alert alert-info">Aucun véhicule en retard pour le moment.</div>
    <?php else: ?>
        <table class="table table-bordered table-hover">
            <thead class="table-warning">
                <tr>
                    <th>Numéro Réservation</th>
                    <th>Client</th>
                    <th>Date fin prévue</th>
                    <th>Statut</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($reservations_retard as $res): ?>
                <tr>
                    <td><?= $res['id'] ?></td>
                    <td><?= htmlspecialchars($res['nom']) ?></td>
                    <td><?= htmlspecialchars($res['date_fin']) ?></td>
                    <td><?= htmlspecialchars($res['statut']) ?></td>
                    <td>
                        Email: <a href="mailto:<?= htmlspecialchars($res['email']) ?>"><?= htmlspecialchars($res['email']) ?></a><br>
                        Tel: <?= htmlspecialchars($res['telephone']) ?>
                    </td>
                    <td>
                        <!-- Formulaire actions -->
                        <form method="post" style="min-width:200px;">
                            <input type="hidden" name="id" value="<?= $res['id'] ?>">
                            <div class="mb-2">
                                <button type="submit" name="action" value="terminer" class="btn btn-success btn-sm">Terminer</button>
                            </div>
                            <div class="mb-2">
                                <input type="date" name="nouvelle_date" class="form-control form-control-sm mb-1" required>
                                <button type="submit" name="action" value="prolonger" class="btn btn-primary btn-sm">Prolonger</button>
                            </div>
                            <div>
                                <input type="number" name="frais" min="0" step="0.01" placeholder="Frais €" class="form-control form-control-sm mb-1" required>
                                <button type="submit" name="action" value="ajouter_frais" class="btn btn-warning btn-sm">Ajouter frais</button>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
 </div>

</body>
</html>
