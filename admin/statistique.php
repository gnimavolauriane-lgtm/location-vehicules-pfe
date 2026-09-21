<?php
include('../configuration.php');

// --- 1. Clients ---

// Total de clients
$totalClients = $pdo->query("SELECT COUNT(*) FROM client")->fetchColumn();

// Nouveaux clients ce mois
$nouveauxClients = $pdo->query("
    SELECT COUNT(*) FROM client
    WHERE DATE_FORMAT(date_inscription, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')
")->fetchColumn();

// Clients avec le plus de réservations → basé sur nom + prénom (à défaut d'ID)
$topClients = $pdo->query("
    SELECT nom, prenom, COUNT(*) AS nb_resa
    FROM reservations
    GROUP BY nom, prenom
    ORDER BY nb_resa DESC
    LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);


// --- 2. Véhicules ---

// Total des véhicules
$totalVehicules = $pdo->query("SELECT COUNT(*) FROM vehicules")->fetchColumn();

// Répartition par marque/modèle 
$vehiculesParNom = $pdo->query("
    SELECT nom, COUNT(*) AS total
    FROM vehicules
    GROUP BY nom
    ORDER BY total DESC
    LIMIT 10
")->fetchAll(PDO::FETCH_ASSOC);

// Disponibles vs en location
$vehiculesDisponibles = $pdo->query("SELECT COUNT(*) FROM vehicules WHERE statut = 'disponible'")->fetchColumn();
$vehiculesLoues = $pdo->query("SELECT COUNT(*) FROM vehicules WHERE statut = 'en_location'")->fetchColumn();

// Répartition par catégorie 
$vehiculesParCategorie = $pdo->query("
    SELECT categorie_id, COUNT(*) AS total
    FROM vehicules
    GROUP BY categorie_id
")->fetchAll(PDO::FETCH_ASSOC);

// --- 3. Réservations ---
$totalResa = $pdo->query("SELECT COUNT(*) FROM reservations")->fetchColumn();
$resaEnCours = $pdo->query("SELECT COUNT(*) FROM reservations WHERE statut = 'en_cours'")->fetchColumn();
$resaTerminees = $pdo->query("SELECT COUNT(*) FROM reservations WHERE statut = 'terminée'")->fetchColumn();
$resaAnnulees = $pdo->query("SELECT COUNT(*) FROM reservations WHERE statut = 'annulée'")->fetchColumn();


$revenus = 0; // mettre une valeur fictive ou utiliser une estimation si possible


// --- 4. Caisse ---
$ajouts = $pdo->query("SELECT SUM(montant) FROM caisse WHERE type = 'ajout' AND statut = 'actif'")->fetchColumn() ?: 0;
$retraits = $pdo->query("SELECT SUM(montant) FROM caisse WHERE type = 'retrait' AND statut = 'actif'")->fetchColumn() ?: 0;
$solde = $ajouts - $retraits;

// Pour le graphique caisse : solde par mois
$caisseSeries = $pdo->query("
    SELECT DATE_FORMAT(date_paiement, '%Y-%m') AS mois,
        SUM(CASE WHEN type = 'ajout' THEN montant ELSE -montant END) AS solde_mensuel
    FROM caisse
    WHERE statut = 'actif'
    GROUP BY mois
    ORDER BY mois
")->fetchAll(PDO::FETCH_ASSOC);

// Réservations par mois
$resaSeries = $pdo->query("
    SELECT DATE_FORMAT(date_reservation, '%Y-%m') AS mois, COUNT(*) AS nb
    FROM reservations
    GROUP BY mois
    ORDER BY mois
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Statistiques Admin</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body { font-family:sans-serif; background:#f7f9fc; margin:20px; }
    h1 { text-align:center; color:#0d47a1; }
    section { background:white; padding:20px; margin:15px auto; max-width:900px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.1); }
    .grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-top:15px; }
    .card { background:#e3f2fd; padding:15px; text-align:center; font-weight:bold; border-radius:6px; color:#0d47a1; }
    canvas { max-width:100%; margin-top:25px; }
    table { width:100%; border-collapse:collapse; margin-top:20px; }
    th,td { padding:8px; border:1px solid #ddd; text-align:left; }
  </style>
</head>
<body>
  <h1>📊 Dashboard de Statistiques</h1>

  <!-- Clients -->
  <section>
    <h2>🧑‍💼 Clients</h2>
    <div class="grid">
      <div class="card">Total de clients<br><?= $totalClients ?></div>
      <div class="card">Nouveaux ce mois<br><?= $nouveauxClients ?></div>
    </div>
    <h3>Top 5 clients</h3>
    <table>
      <thead><tr><th>Client</th><th>Réservations</th></tr></thead>
      <tbody>
        <?php foreach($topClients as $c): ?>
          <tr><td><?= htmlspecialchars($c['nom'].' '.$c['prenom']) ?></td><td><?= $c['nb_resa'] ?></td></tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <!-- Véhicules -->
  <section>
    <h2>🚗 Véhicules</h2>
    <div class="grid">
      <div class="card">Total véhicules<br><?= $totalVehicules ?></div>
      <div class="card">Disponibles<br><?= $vehiculesDisponibles ?></div>
    </div>
    <h3>Par marque</h3>
    <canvas id="vehiculesChart"></canvas>
  </section>

  <!-- Réservations -->
  <section>
    <h2>📅 Réservations</h2>
    <div class="grid">
      <div class="card">Total réservations<br><?= $totalResa ?></div>
      <div class="card">En cours<br><?= $resaEnCours ?></div>
      <div class="card">Terminées<br><?= $resaTerminees ?></div>
      <div class="card">Annulées<br><?= $resaAnnulees ?></div>
      <div class="card">Revenus (terminées)<br><?= number_format($revenus,2,',',' ') ?> MAD</div>
    </div>
    <h3>Évolution mensuelle</h3>
    <canvas id="resaChart"></canvas>
  </section>

  <!-- Caisse -->
  <section>
    <h2>💰 Caisse</h2>
    <div class="grid">
      <div class="card">Total ajouts<br><?= number_format($ajouts,2,',',' ') ?> MAD</div>
      <div class="card">Total retraits<br><?= number_format($retraits,2,',',' ') ?> MAD</div>
      <div class="card">Solde<br><?= number_format($solde,2,',',' ') ?> MAD</div>
    </div>
    <h3>Évolution du solde</h3>
    <canvas id="caisseChart"></canvas>
  </section>

  <!-- Charts scripts -->
  <script>
    const vehLabels = <?= json_encode(array_column($repartitionMarques, 'marque')) ?>;
    const vehData = <?= json_encode(array_column($repartitionMarques, 'nb')) ?>;
    new Chart(document.getElementById('vehiculesChart'), {
      type: 'pie',
      data: { labels: vehLabels, datasets: [{ data: vehData, backgroundColor: ['#1e88e5','#43a047','#f4511e','#fb8c00','#8e24aa'] }] }
    });

    const resaLabels = <?= json_encode(array_column($resaSeries, 'mois')) ?>;
    const resaData = <?= json_encode(array_column($resaSeries, 'nb')) ?>;
    new Chart(document.getElementById('resaChart'), {
      type: 'line',
      data: { labels: resaLabels, datasets: [{ label:'Réservations', data: resaData, borderColor:'#0d47a1', fill:false }] }
    });

    const caisseLabels = <?= json_encode(array_column($caisseSeries, 'mois')) ?>;
    const caisseData = <?= json_encode(array_column($caisseSeries, 'solde_mensuel')) ?>;
    new Chart(document.getElementById('caisseChart'), {
      type: 'bar',
      data: { labels: caisseLabels, datasets: [{ label:'Solde net', data: caisseData, backgroundColor:'#ffb300' }] }
    });
  </script>
</body>
</html>
