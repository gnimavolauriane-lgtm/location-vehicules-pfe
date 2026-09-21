<?php
include('../configuration.php');

// --- Ton code de filtrage ici ---
$dateDebut = $_GET['date_debut'] ?? null;
$dateFin = $_GET['date_fin'] ?? null;

// Base de la requête avec statut actif uniquement
$sql = "SELECT * FROM caisse WHERE statut = 'actif'";

// Si filtre date
if ($dateDebut && $dateFin) {
    $sql .= " AND date_paiement BETWEEN :dateDebut AND :dateFin";
    $params[':dateDebut'] = $dateDebut . " 00:00:00";
    $params[':dateFin'] = $dateFin . " 23:59:59";
}

$sql .= " ORDER BY date_paiement DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calcul montant total filtré (uniquement actif)
$totalFiltré = 0;
foreach ($transactions as $t) {
    $totalFiltré += ($t['type'] === 'ajout') ? $t['montant'] : -$t['montant'];
}

echo "<p><strong>Montant total (filtré) :</strong> " . number_format($totalFiltré, 2, ',', ' ') . " €</p>";


// Total caisse en ne comptant que les paiements actifs
$ajouts = $pdo->query("SELECT SUM(montant) AS total_ajout FROM caisse WHERE type = 'ajout' AND statut = 'actif'")
              ->fetch(PDO::FETCH_ASSOC)['total_ajout'] ?? 0;

$retraits = $pdo->query("SELECT SUM(montant) AS total_retrait FROM caisse WHERE type = 'retrait' AND statut = 'actif'")
                ->fetch(PDO::FETCH_ASSOC)['total_retrait'] ?? 0;

$solde = $ajouts - $retraits;
?>






<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Gestion de la caisse - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f7f9fc;
            margin: 0; padding: 0;
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 30px 0 10px 0;
            color: #0d47a1;
        }
        .container {
            max-width: 900px;
            margin: 100px auto 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(13, 71, 161, 0.2);
            position: relative;
        }
        button#openModalBtn {
            background: #0d47a1;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            margin-bottom: 20px;
            transition: background 0.3s ease;
        }
        button#openModalBtn:hover {
            background: #1976d2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        thead {
            background: #0d47a1;
            color: white;
            font-weight: 700;
        }
        tbody tr:nth-child(even) {
            background: #f4f6fb;
        }
        tbody tr:hover {
            background: #dbe9ff;
        }
        .type-ajout {
            color: #2e7d32;
            font-weight: 600;
        }
        .type-retrait {
            color: #c62828;
            font-weight: 600;
        }

        /* Modal styles */
        .modal {
            display: none; /* caché par défaut */
            position: fixed;
            z-index: 1000;
            left: 0; top: 0;
            width: 100vw; height: 100vh;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            overflow:auto;
            justify-content: center;
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            width: 400px;
            max-width: 90%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }
        .modal-content h2 {
            margin-top: 40px;
            color: #0d47a1;
            text-align: center;
        }
        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
            transition: color 0.3s ease;
        }
        .close-btn:hover {
            color: #0d47a1;
        }
        form {
            display: grid;
            gap: 15px;
            margin-top: 10px;
        }
        label {
            font-weight: 600;
            color: #0d47a1;
        }
        input[type="text"],
        input[type="number"],
        select {
            padding: 10px 12px;
            border: 2px solid #0d47a1;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            width: 100%;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #1976d2;
            outline: none;
            box-shadow: 0 0 6px #1976d2;
        }
        input[type="submit"] {
            background: #0d47a1;
            color: white;
            font-weight: 700;
            font-size: 18px;
            padding: 12px 0;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease;
        }
        input[type="submit"]:hover {
            background: #1976d2;
        }
        /* Responsive */
        @media(max-width: 480px) {
            .modal-content {
                width: 95%;
                padding: 20px;
            }
        }

    .filtre-form {
        display: flex;
        align-items: flex-end;
        gap: 20px;
        margin: 20px 0;
        flex-wrap: wrap;
    }

    .filtre-item {
        display: flex;
        flex-direction: column;
    }

    .filtre-item label {
        font-weight: 600;
        color: #0d47a1;
        margin-bottom: 5px;
    }

    .filtre-item input[type="date"] {
        padding: 10px;
        border: 2px solid #0d47a1;
        border-radius: 6px;
        font-size: 16px;
        min-width: 200px;
    }

    .filtre-actions {
        display: flex;
        gap: 10px;
        margin-top: 23px; /* Pour aligner avec les champs date */
    }

    .filtre-form button {
        padding: 10px 20px;
        background-color: #0d47a1;
        color: white;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .filtre-form button:hover {
        background-color: #1976d2;
    }

    .filtre-form .reset {
        padding: 10px 20px;
        background-color: #eeeeee;
        color: #333;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 16px;
        transition: background-color 0.3s ease;
        display: inline-block;
    }

    .filtre-form .reset:hover {
        background-color: #cccccc;
    }

    .solde-caisse {
        margin: 20px 0;
        padding: 15px;
        background-color: #e8f5e9;
        border: 1px solid #2e7d32;
        color: #2e7d32;
        font-size: 18px;
        font-weight: bold;
        border-radius: 8px;
    }
    .btn-annuler {
        color: #fff;
        background-color: #e74c3c;
        padding: 5px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        border:none;
    }

    .btn-annuler:hover {
        background-color: #c0392b;
    }
     .modal {
    position: fixed;
    top:0; left:0; right:0; bottom:0;
    background: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  .modal-content {
    background: white;
    padding: 1.5rem;
    border-radius: 8px;
    max-width: 400px;
    width: 90%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    text-align: center;
  }
  .modal-buttons button {
    margin: 0 10px;
    padding: 0.5rem 1.5rem;
    font-size: 1rem;
  }

  .btn-export {
    display: inline-block;
    padding: 10px 15px;
    margin-top:50px;
    margin-right: 10px;
    background-color: #0d47a1;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.btn-export:hover {
    background-color: #1976d2;
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
    </style>
</head>
<body>
    
     <?php include('entete_admin.php'); ?>

     <div id="particles-js"></div>

    <div class="container">
        <h1>Gestion de la caisse</h1>

    
         
        <form method="get" class="filtre-form">
    <div class="filtre-item">
        <label for="date_debut">Date début :</label>
        <input type="date" name="date_debut" id="date_debut" value="<?= htmlspecialchars($dateDebut ?? '') ?>">
    </div>

    <div class="filtre-item">
        <label for="date_fin">Date fin :</label>
        <input type="date" name="date_fin" id="date_fin" value="<?= htmlspecialchars($dateFin ?? '') ?>">
    </div>

    <div class="filtre-actions">
        <button type="submit">Filtrer</button>
        <a href="caisse.php" class="reset">Réinitialiser</a>
    </div>
</form>


<div class="solde-caisse">
    💰 <strong>Montant total dans la caisse :</strong> <?= number_format($solde, 2, ',', ' ') ?> MAD
</div>

         
        <button id="openModalBtn">Ajouter / Retirer un paiement</button>
        <table>
            <thead>
                <tr>
                    
                    <th>Type</th>
                    <th>Montant (MAD)</th>
                    <th>Motif</th>
                    <th>Nom client</th>
                    <th>Mode paiement</th>
                    <th>Date paiement</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach($transactions as $t): ?>
        <?php
            // Style si annulé : texte barré et gris
            $style = ($t['statut'] === 'annulé') ? 'style="text-decoration: line-through; color: gray;"' : '';
        ?>
        <tr <?= $style ?>>
            <td class="type-<?= htmlspecialchars($t['type']) ?>">
                <?= ucfirst(htmlspecialchars($t['type'])) ?>
            </td>
            <td><?= number_format($t['montant'], 2, ',', ' ') ?></td>
            <td><?= htmlspecialchars($t['description'] ?? '') ?></td>
            <td><?= htmlspecialchars($t['nom_carte'] ?? '') ?></td>
            <td><?= htmlspecialchars($t['mode_paiement'] ?? '') ?></td>
            <td><?= htmlspecialchars($t['date_paiement']) ?></td>
            <td>
                <?php if ($t['statut'] === 'actif'): ?>
                    
           <button class="btn-annuler" data-id="<?= htmlspecialchars($t['id']) ?>">Annuler</button>

                <?php else: ?>
                    <em>Annulé</em>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

        </table>
        <div style="margin-bottom: 20px;">
     <strong>Exporter les données :</strong>
    <a href="export_excel.php" class="btn-export">📊 Excel</a>
    <a href="export_pdf.php" class="btn-export">📄 PDF</a>
</div>

    </div>

    <!-- Modal -->
    <div class="modal" id="modal">
        <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <button class="close-btn" id="closeModalBtn" aria-label="Fermer le formulaire">&times;</button>
            <h2 id="modalTitle">Ajouter/Retirer un paiement</h2>
            <form method="post" action="traitement_caisse.php">
                <label for="type">Type :</label>
                <select id="type" name="type" required>
                    <option value="ajout">Ajout</option>
                    <option value="retrait">Retrait</option>
                </select>

                <label for="montant">Montant (MAD) :</label>
                <input type="number" step="0.01" min="0" id="montant" name="montant" required>

                <label for="description">Motif :</label>
                <input type="text" id="motif" name="motif" placeholder="Ex: Paiement location véhicule" required>

                <label for="nom_carte">Nom du client :</label>
                <input type="text" id="nom_carte" name="nom_carte" placeholder="Ex: Jean Dupont">

                <label for="mode_paiement">Mode de paiement :</label>
                <input type="text" id="mode_paiement" name="mode_paiement" placeholder="Ex: Carte bancaire, Espèces, Paypal">

                <input type="submit" value="Ajouter /Retirer">
            </form>
        </div>
    </div><!-- Modal confirmation -->
<div id="confirmModal" class="modal" style="display:none;">
  <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="confirmTitle">
    <h2 id="confirmTitle">Confirmer l'action</h2>
    <p>Êtes-vous sûr de vouloir annuler ce paiement ?</p>
    <div class="modal-buttons">
      <button id="confirmBtn">Confirmer</button>
      <button id="cancelBtn">Annuler</button>
    </div>
  </div>
</div>

    <script>
        const modal = document.getElementById('modal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');

        openBtn.addEventListener('click', () => {
            modal.classList.add('active');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });

        // Fermer modal au clic hors contenu
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('active');
            }
        });

        // Fermer modal avec ESC
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                modal.classList.remove('active');
            }
        });

       document.querySelectorAll('.openConfirmModalBtn').forEach(btn => {
  btn.addEventListener('click', () => {
    const idPaiement = btn.getAttribute('data-id');
    // Ouvrir ta modale confirmation ici
    const confirmModal = document.getElementById('confirmModal');
    confirmModal.style.display = 'flex';

    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    // Nettoyer anciens events (important si plusieurs clics)
    confirmBtn.onclick = null;
    cancelBtn.onclick = null;

    cancelBtn.onclick = () => {
      confirmModal.style.display = 'none';
    };

    confirmBtn.onclick = () => {
      fetch('annuler_paiement.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + encodeURIComponent(idPaiement)
      })
      .then(response => response.json())
      .then(data => {
        alert(data.message);
        if (data.success) {
          // rafraîchir la page ou mettre à jour la ligne/solde dynamiquement
          location.reload();
        }
        confirmModal.style.display = 'none';
      })
      .catch(() => alert('Erreur serveur'));
    };
  });
});

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
