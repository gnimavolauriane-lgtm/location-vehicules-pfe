<?php

include('../configuration.php');
include('../configuration.php');

$parPage = 10;
$page = max(1, intval($_GET['page'] ?? 1));
$offset = ($page - 1) * $parPage;

$statut = $_GET['statut'] ?? '';
$date_debut = $_GET['date_debut'] ?? '';
$date_fin = $_GET['date_fin'] ?? '';
$client = $_GET['client'] ?? '';
$vehicule = $_GET['vehicule'] ?? '';

$where = [];
$params = [];

if ($statut) {
    $where[] = 'statut = :statut';
    $params[':statut'] = $statut;
}
if ($date_debut) {
    $where[] = 'date_debut >= :date_debut';
    $params[':date_debut'] = $date_debut;
}
if ($date_fin) {
    $where[] = 'date_fin <= :date_fin';
    $params[':date_fin'] = $date_fin;
}
if ($client) {
    $where[] = '(nom LIKE :client OR prenom LIKE :client OR email LIKE :client)';
    $params[':client'] = "%$client%";
}

$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

$sql = "SELECT r.*
        FROM reservations r
        $whereSql
        ORDER BY r.date_reservation DESC
        LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);

// Lier les paramètres dynamiques
foreach ($params as $key => $val) {
    $stmt->bindValue($key, $val);
}

// Lier limit et offset (obligatoire en bindValue, car ce sont des entiers)
$stmt->bindValue(':limit', $parPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Nombre total pour pagination
$countSql = "SELECT COUNT(*) FROM reservations r $whereSql";
$countStmt = $pdo->prepare($countSql);
$countStmt->execute($params);
$total = $countStmt->fetchColumn();
$nbPages = ceil($total / $parPage);

$statuts = [
    'en_cours' => 'En cours',
    'valide' => 'Validée',
    'refuse' => 'Refusée'
];


$pdo->query("UPDATE reservations SET vue_admin = 1 WHERE vue_admin = 0");


?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Gestion des réservations</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<style>
  /* Styles simples pour tableau et modal */
  table {border-collapse: collapse; width: 100%;}
  th, td {border: 1px solid #ccc; padding: 8px;}
  th {background: #eee;}
  form {margin-bottom: 1em;}
  
  /* Reset rapide */
* {
  box-sizing: border-box;
}
 #particles-js {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* envoie le fond derrière le contenu */
    background: linear-gradient(135deg,rgb(222, 229, 233),rgb(226, 231, 234)); /* optionnel si tu veux un dégradé sous les particules */
        }

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
  margin: 20px;
  line-height: 1.5;
}

.page-container {
  margin-top: 150px; /* décale tout vers le bas */
}

h1 {
  text-align: center;
  color: #2c3e50;
  margin-left:-650px;
  margin-bottom: 10px;
  font-weight: 700;
  font-size: 2rem;
}

form {
  background: linear-gradient(to right, #ffffff, #f9f9f9);
  padding: 40px;
  border-radius: 16px;
  max-width: 1140px;
  margin: 60px auto;
  box-shadow: 0 0 0 2px #00cec9, 0 0 1px #00cec9aa;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
  transition: box-shadow 0.4s ease, transform 0.3s ease;
  position: relative;
  overflow: hidden;
}

form:hover {
  box-shadow: 0 0 0 2px rgb(227, 209, 9), 0 0 1px rgba(151, 156, 25, 0.67);
  transform: scale(1.01);
}

form::before {
  content: "";
  position: absolute;
  top: -60px;
  right: -60px;
  width: 200px;
  height: 200px;
  background: radial-gradient(circle at center, #00b894, #0984e3);
  opacity: 0.1;
  border-radius: 50%;
  z-index: 0;
}

form label {
  position: relative;
  font-size: 0.85rem;
  color: #2c3e50;
  font-weight: 600;
}

form label span {
  position: absolute;
  top: 50%;
  left: 12px;
  transform: translateY(-50%);
  background: white;
  padding: 0 5px;
  font-size: 0.8rem;
  color: #888;
  transition: all 0.3s ease;
  pointer-events: none;
}

form input[type="text"],
form input[type="date"],
form select {
  width: 100%;
  padding: 14px 12px;
  border: 1.5px solid #ccc;
  border-radius: 10px;
  font-size: 1rem;
  background: white;
  transition: border 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  z-index: 1;
}

form input:focus,
form select:focus {
  border-color: #00b894;
  box-shadow: 0 0 0 3px rgba(0, 184, 148, 0.1);
  outline: none;
}

form input:focus + span,
form input:not(:placeholder-shown) + span,
form select:focus + span,
form select:valid + span {
  top: -10px;
  left: 10px;
  font-size: 0.75rem;
  color: #00b894;
  background: white;
}

/* Boutons */
form button {
  padding: 12px 26px;
  border-radius: 10px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  border: none;
  text-align: center;
  transition: transform 0.3s ease, background-color 0.3s ease;
  margin-top: 10px;
}

.btn-reset {
  display: inline-block;
  padding: 30px 40px;
  border-radius: 10px;
  font-size: 1rem;
  font-weight: bold;
  border: 2px solid #00b894;
  background: transparent;
  color: #00b894;
  text-decoration: none;
  text-align:center;
  transition: all 0.3s ease;
  margin-left: 10px;
  margin-top:10px;
}

.btn-reset:hover {
  background-color: #00b894;
  color: white;
  transform: scale(1.05);
}



form button {
  background: linear-gradient(135deg, #00b894, #00cec9);
  color: white;
  box-shadow: 0 5px 20px rgba(0, 184, 148, 0.3);
}

form button:hover {
  transform: scale(1.05);
  background: linear-gradient(135deg, #00cec9, #00b894);
}

form a {
  color: #00b894;
  background: transparent;
  border: 2px solid #00b894;
  margin-left: 10px;
}

form a:hover {
  background: #00b894;
  color: white;
  transform: scale(1.05);
}


/* Table */
table {
  width: 100%;
  border-collapse: collapse;
  max-width: 1100px;
  margin-left: auto;
  margin-right: auto;
  box-shadow: 0 2px 6px rgb(0 0 0 / 0.1);
  background: white;
  border-radius: 8px;
  overflow: hidden;
}

th, td {
  padding: 12px 15px;
  border-bottom: 1px solid #eee;
  text-align: left;
  font-size: 0.95rem;
}

th {
  background-color:rgb(20, 33, 41);
  color: white;
  font-weight: 700;
}

tbody tr:hover {
  background-color: #f1f9ff;
}

button.btn-details {
  background-color:  #00b894;
  border: none;
  color: white;
  padding: 6px 14px;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 600;
  font-size: 0.9rem;
  transition: background-color 0.3s ease;
}

button.btn-details:hover {
  background-color: #1e8449;
}
.statut-valide {
  background-color:  #00b894; /* vert */
  color: white;
  padding: 6px 14px;
  border-radius: 4px;
  font-weight: 600;
  font-size: 0.9rem;
  display: inline-block;
}

.statut-refuse {
  background-color: #dc3545; /* rouge */
  color: white;
  padding: 6px 14px;
  border-radius: 4px;
  font-weight: 600;
  font-size: 0.9rem;
  display: inline-block;
}

.btn-supprimer {
  background-color: #e74c3c;
  color: white;
  padding: 6px 14px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-weight: 600;
  font-size: 0.9rem;
  margin-left: 8px;
  transition: background-color 0.3s ease;
}

.btn-supprimer:hover {
  background-color: #c0392b;
}

.action-buttons {
  display: flex;
  gap: 10px;
}

/* Modal */
#modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0; top: 0; width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.6);
  backdrop-filter: blur(2px);
  overflow-y: auto;
  padding: 40px 20px;
}

#modal-content {
  background: white;
  max-width: 700px;
  margin: 0 auto;
  border-radius: 10px;
  padding: 30px 25px;
  position: relative;
  box-shadow: 0 10px 30px rgb(0 0 0 / 0.15);
  animation: modalFadeIn 0.3s ease forwards;
}

@keyframes modalFadeIn {
  from {opacity: 0; transform: translateY(-20px);}
  to {opacity: 1; transform: translateY(0);}
}

#modal-close {
  position: absolute;
  right: 15px; top: 15px;
  font-size: 28px;
  color: #888;
  font-weight: bold;
  cursor: pointer;
  transition: color 0.2s ease;
  user-select: none;
}

#modal-close:hover {
  color: #333;
}

#modal-content h2 {
  margin-top: 0;
  color: #2c3e50;
  font-weight: 700;
  margin-bottom: 20px;
  font-size: 1.6rem;
}

#modal-body p {
  margin-bottom: 12px;
  font-size: 1rem;
  color: #555;
  word-wrap: break-word;
}

#modal-body p strong {
  color: #34495e;
}

#modal-body p + p {
  margin-top: 10px;
}

/* Boutons valider/refuser dans modal */
#modal-body button {
  margin-top: 25px;
  padding: 10px 20px;
  font-weight: 700;
  border: none;
  border-radius: 7px;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.3s ease;
  user-select: none;
}

#btn-valider {
  background-color: #27ae60;
  color: white;
  margin-right: 15px;
}

#btn-valider:hover {
  background-color: #1e8449;
}

#btn-refuser {
  background-color: #c0392b;
  color: white;
}

#btn-refuser:hover {
  background-color: #922b21;
}

  /* Modal styles */
  #modal {
    display: none;
    position: fixed;
    z-index: 100;
    left: 0; top: 0; width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.5);
  }
  #modal-content {
    background: white;
    margin: 10% auto;
    padding: 20px;
    width: 500px;
    border-radius: 5px;
    position: relative;
  }
  #modal-close {
    position: absolute;
    right: 10px; top: 10px;
    cursor: pointer;
    font-weight: bold;
    font-size: 20px;
  }
  label {display:block; margin-top:10px;}
  input, select, textarea {width: 100%; padding: 5px;}
  button {margin-top: 15px;}


 .pagination {
  margin: 30px auto 0 auto;
  display: flex;
  justify-content: center;    /* centre horizontalement avec flexbox */
  flex-wrap: wrap;
  gap: 10px;                  /* espace entre boutons */
  max-width: 100%;
}

.pagination a {
  display: inline-block;
  padding: 10px 16px;
  border: 2px solid #2980b9;
  color: #2980b9;
  text-decoration: none;
  border-radius: 8px;
  font-weight: 600;
  font-size: 1rem;
  transition: background-color 0.3s ease, color 0.3s ease;
  user-select: none;
  cursor: pointer;
}

.pagination a:hover {
  background-color: #2980b9;
  color: white;
  border-color: #2980b9;
}

.pagination a.active {
  background-color: #2980b9;
  color: white;
  pointer-events: none;
  border-color: #2980b9;
  cursor: default;
}

.pagination a.arrow {
  font-weight: normal;
  font-size: 0.95rem;
  color: #34495e;
  border-color: #ccc;
}

.pagination a.arrow:hover {
  background-color: #1f6391;
  color: white;
  border-color: #1f6391;
}

.pagination .ellipsis {
  display: inline-block;
  margin: 0 6px;
  color: #999;
  font-size: 1rem;
  user-select: none;
}

#delete-modal {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

#delete-modal .modal-content {
  background: white;
  padding: 20px 25px;
  border-radius: 8px;
  width: 400px;
  position: relative;
  text-align: center;
}

#delete-modal .close-delete {
  position: absolute;
  top: 10px; right: 15px;
  font-size: 20px;
  cursor: pointer;
  color: #888;
}
#form-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

#form-modal #modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  width: 90%;
  max-width: 600px;
  max-height: 90%;
  overflow-y: auto;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  position: relative;
}
.btn-modifier {
  background-color: #2980b9;
  color: white;
  padding: 8px 14px;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-modifier:hover {
  background-color: #1f6391;
}


</style>
</head>
<body>

  <?php include('entete_admin.php'); ?>

<div id="particles-js"></div>

<div class="page-container">
<h1>Gestion des réservations</h1>

<form method="GET" action="">
    <label>Statut :
        <select name="statut">
            <option value="">-- Tous --</option>
            <?php foreach($statuts as $key => $label): ?>
                <option value="<?= htmlspecialchars($key) ?>" <?= ($statut === $key) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($label) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Date début :
        <input type="date" name="date_debut" value="<?= htmlspecialchars($date_debut) ?>">
    </label>

    <label>Date fin :
        <input type="date" name="date_fin" value="<?= htmlspecialchars($date_fin) ?>">
    </label>

    <label>Client (nom, prénom, email) :
        <input type="text" name="client" value="<?= htmlspecialchars($client) ?>" placeholder="Recherche client">
    </label>

    <label>Véhicule :
        <input type="text" name="vehicule" value="<?= htmlspecialchars($vehicule) ?>" placeholder="Nom véhicule">
    </label>

    <button type="submit">Filtrer</button>
    <a href="reservations.php"class="btn-reset">Réinitialiser</a>
</form>



<div style="text-align: center; margin-bottom: 20px; margin-left:-850px">
    <button id="btn-ajouter" style="background-color:  #00b894; color: white; padding: 10px 20px; border-radius: 8px; font-weight: bold; border: none; cursor: pointer;">
        + Ajouter une réservation
    </button>
</div>

<table>
    <thead>
        <tr>
            <th>Client</th>
            <th>Email</th>
            <th>Véhicule</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Statut</th>
            <th>Date réservation</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($reservations): ?>
            <?php foreach($reservations as $r): ?>
            <tr class="<?= htmlspecialchars($r['statut']) ?>">
                <td><?= htmlspecialchars($r['nom'] . ' ' . $r['prenom']) ?></td>
                <td><?= htmlspecialchars($r['email']) ?></td>
                <td><?= htmlspecialchars($r['vehicule_nom'] ?? 'N/A') ?></td>
                <td><?= htmlspecialchars($r['date_debut']) ?></td>
                <td><?= htmlspecialchars($r['date_fin']) ?></td>
                 <td>
                    <?php
                        $statutText = $statuts[$r['statut']] ?? $r['statut'];
                        $class = '';
                        if ($r['statut'] === 'valide') $class = 'statut-valide';
                        elseif ($r['statut'] === 'refuse') $class = 'statut-refuse';
                    ?>
                    <span class="<?= $class ?>"><?= htmlspecialchars($statutText) ?></span>
                  </td>

                <td><?= $r['date_reservation'] ?></td>
               
                <td>
                    <div class="dropdown text-center">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#" class="dropdown-item btn-details" data-id="<?= $r['id'] ?>">
                                    <i class="fas fa-eye me-2"></i> Détails
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item btn-modifier" data-id="<?= $r['id'] ?>">
                                    <i class="fas fa-edit me-2"></i> Modifier
                                </a>
                            </li>
                            <li>
                                <button class="dropdown-item text-danger btn-supprimer" data-id="<?= $r['id'] ?>">
                                    <i class="fas fa-trash-alt me-2"></i> Supprimer
                                </button>
                            </li>
                        </ul>
                    </div>
                </td>


            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="9">Aucune réservation trouvée.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
</div>
<!-- Modal -->
<div id="modal">
    <div id="modal-content">
        <span id="modal-close">&times;</span>
        <h2>Détails de la réservation</h2>
        <div id="modal-body">
            <!-- Contenu chargé par JS -->
            <p>Chargement...</p>
        </div>
    </div>
</div>
<!-- Modal Ajout/Modification -->
<div id="form-modal" style="display:none;">
  <div id="modal-content">
    <span id="modal-close-form">&times;</span>
    <h2 id="form-title">Ajouter une réservation</h2>
    <form id="reservation-form">
      <input type="hidden" name="id" id="res-id">
      
      <label>Nom :
        <input type="text" name="nom" id="res-nom" required>
      </label>
      <label>Prénom :
        <input type="text" name="prenom" id="res-prenom" required>
      </label>
      <label>Email :
        <input type="email" name="email" id="res-email" required>
      </label>
      <label>Nom du véhicule :
        <input type="text" name="vehicule_nom" id="res-vehicule" required>
      </label>
      <label>Date début :
        <input type="date" name="date_debut" id="res-date-debut" required>
      </label>
      <label>Date fin :
        <input type="date" name="date_fin" id="res-date-fin" required>
      </label>
      <label>Statut :
        <select name="statut" id="res-statut" required>
          <option value="en_cours">En cours</option>
          <option value="valide">Validée</option>
          <option value="refuse">Refusée</option>
        </select>
      </label>
      <div style="margin-top: 20px; text-align: right;">
        <button type="submit" style="background-color: #2ecc71; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Enregistrer</button>
      </div>
    </form>
  </div>
</div>

<div id="delete-modal" style="display: none;">
  <div class="modal-content">
    <span class="close-delete">&times;</span>
    <h3>Confirmation</h3>
    <p>Voulez-vous vraiment supprimer cette réservation ?</p>
    <div style="margin-top: 20px; display: flex; justify-content: end; gap: 10px;">
      <button id="confirm-delete" style="background-color: #c0392b; color: white; padding: 8px 15px; border: none; border-radius: 5px;">Oui, supprimer</button>
      <button id="cancel-delete" style="background-color: #ccc; padding: 8px 15px; border: none; border-radius: 5px;">Annuler</button>
    </div>
  </div>
</div>


<!--pagination -->
<?php if ($nbPages > 1): ?>
    <div class="pagination">
        <?php 
        $query = $_GET;

        // Précédent
        if ($page > 1) {
            $query['page'] = $page - 1;
            echo '<a href="?' . http_build_query($query) . '" class="arrow">← Précédent</a>';
        }

        // Pages
        for ($i = 1; $i <= $nbPages; $i++) {
            if (
                $i == 1 ||                                // Toujours afficher la 1ère
                $i == $nbPages ||                         // Toujours afficher la dernière
                ($i >= $page - 1 && $i <= $page + 1)      // Afficher autour de la page active
            ) {
                $query['page'] = $i;
                $activeClass = ($i == $page) ? 'active' : '';
                echo '<a href="?' . http_build_query($query) . '" class="' . $activeClass . '">' . $i . '</a>';
            } elseif (
                $i == 2 && $page > 4 ||                   // Ellipse après 1
                $i == $nbPages - 1 && $page < $nbPages - 3
            ) {
                echo '<span class="ellipsis">...</span>';
            }
        }

        // Suivant
        if ($page < $nbPages) {
            $query['page'] = $page + 1;
            echo '<a href="?' . http_build_query($query) . '" class="arrow">Suivant →</a>';
        }
        ?>
    </div>
<?php endif; ?>


<script>
// Fermeture modal
document.getElementById('modal-close').onclick = function() {
    document.getElementById('modal').style.display = 'none';
};
// Fermer en cliquant en dehors du modal-content
window.onclick = function(event) {
    if(event.target == document.getElementById('modal')) {
        document.getElementById('modal').style.display = 'none';
    }
};

// Charger détails réservation via AJAX
document.querySelectorAll('.btn-details').forEach(btn => {
    btn.onclick = function() {
        const id = this.getAttribute('data-id');
        const modal = document.getElementById('modal');
        const modalBody = document.getElementById('modal-body');
        modal.style.display = 'block';
        modalBody.innerHTML = '<p>Chargement...</p>';
        
        fetch('reservation_detail_ajax.php?id=' + id)
        .then(response => response.text())
        .then(html => {
            modalBody.innerHTML = html;
            // Attacher les événements pour valider/refuser dans modal ici si besoin
            attachActionHandlers(id);
        })
        .catch(() => {
            modalBody.innerHTML = '<p>Erreur de chargement.</p>';
        });
    }
});

// Actions valider/refuser via AJAX
function attachActionHandlers(id) {
    document.getElementById('btn-valider')?.addEventListener('click', () => actionReservation('valider', id));
    document.getElementById('btn-refuser')?.addEventListener('click', () => actionReservation('refuser', id));
}

function actionReservation(action, id) {
    fetch('reservation_action.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: 'action=' + encodeURIComponent(action) + '&id=' + encodeURIComponent(id)
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if(data.success) {
            // Fermer modal et recharger la page pour mettre à jour la liste
            document.getElementById('modal').style.display = 'none';
            window.location.reload();
        }
    })
    .catch(() => alert('Erreur lors de l\'action'));
}




//scrip modal pour le modal supprimer 
let deleteId = null;

document.querySelectorAll('.btn-supprimer').forEach(btn => {
  btn.addEventListener('click', () => {
    deleteId = btn.getAttribute('data-id');
    document.getElementById('delete-modal').style.display = 'flex';
  });
});

document.getElementById('cancel-delete').addEventListener('click', () => {
  document.getElementById('delete-modal').style.display = 'none';
});

document.querySelector('.close-delete').addEventListener('click', () => {
  document.getElementById('delete-modal').style.display = 'none';
});

document.getElementById('confirm-delete').addEventListener('click', () => {
  if (deleteId) {
    fetch('supprimer_reservation.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(deleteId)
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
      if (data.success) {
        window.location.reload();
      }
    })
    .catch(() => {
      alert("Erreur lors de la suppression.");
    });

    document.getElementById('delete-modal').style.display = 'none';
  }
});

// script pour le form ajouterreservation
const formModal = document.getElementById('form-modal');
const closeForm = document.getElementById('modal-close-form');
const form = document.getElementById('reservation-form');
const formTitle = document.getElementById('form-title');

// Ouverture formulaire vide
document.getElementById('btn-ajouter').addEventListener('click', () => {
    form.reset();
    document.getElementById('res-id').value = '';
    formTitle.innerText = "Ajouter une réservation";
    formModal.style.display = 'block';
});

// Fermer modal formulaire
closeForm.onclick = () => formModal.style.display = 'none';
window.onclick = e => { if (e.target === formModal) formModal.style.display = 'none'; };

// Ouverture en mode modification
document.querySelectorAll('.btn-modifier').forEach(btn => {
    btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        fetch('get_reservation.php?id=' + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById('res-id').value = data.id;
                document.getElementById('res-nom').value = data.nom;
                document.getElementById('res-prenom').value = data.prenom;
                document.getElementById('res-email').value = data.email;
                document.getElementById('res-vehicule').value = data.vehicule_nom;
                document.getElementById('res-date-debut').value = data.date_debut;
                document.getElementById('res-date-fin').value = data.date_fin;
                document.getElementById('res-statut').value = data.statut;

                formTitle.innerText = "Modifier la réservation";
                formModal.style.display = 'block';
            });
    });
});

// Soumission AJAX
form.onsubmit = e => {
    e.preventDefault();
    const formData = new FormData(form);
    fetch('ajouter_ou_modifier_reservation.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.success) location.reload();
    })
    .catch(() => alert("Erreur lors de l'enregistrement"));
};


particlesJS('particles-js',
{
  "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});



</script>

</body>
</html>
