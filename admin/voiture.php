<?php
session_start();
include('../configuration.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
$carburants = $pdo->query("SELECT * FROM carburants")->fetchAll();
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(); // si tu ne l’as pas déjà
$boites = $pdo->query("SELECT * FROM boites")->fetchAll();

// 🔁 On prépare les jointures pour afficher les noms (catégorie, carburant, boîte)
$query = $pdo->prepare("
    SELECT v.*, 
           c.nom AS categorie, 
           ca.nom AS carburant, 
           b.type AS boite
    FROM vehicules v
    LEFT JOIN categories c ON v.categorie_id = c.id
    LEFT JOIN carburants ca ON v.carburant_id = ca.id
    LEFT JOIN boites b ON v.boite_id = b.id
    ORDER BY v.id DESC
");
$query->execute();
$vehicules = $query->fetchAll();
$categories = $pdo->query("SELECT id, nom FROM categories ORDER BY nom")->fetchAll();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des véhicules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
     
    <style>
   
  /* Modale plus colorée */
  .modal-content {
    background: #f8f9fa; /* fond gris clair */
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border: 1px solid #dee2e6;
  }

  /* Header coloré */
  .modal-header {
    background-color: #007bff; /* bleu bootstrap */
    color: white;
    border-bottom: 2px solid #0056b3;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  /* Boutons colorés */
  .btn-primary {
    background-color: #0069d9;
    border-color: #0062cc;
  }

  .btn-primary:hover {
    background-color: #004085;
    border-color: #003768;
  }

  /* Bouton Annuler gris plus doux */
  .btn-secondary {
    background-color: #adb5bd;
    border-color: #868e96;
    color: #212529;
  }

  .btn-secondary:hover {
    background-color: #6c757d;
    border-color: #5a6268;
    color: white;
  }

  /* Labels avec un peu de poids */
  label.form-label {
    font-weight: 600;
    color: #343a40;
  }

  /* Inputs un peu plus arrondis */
  input.form-control, select.form-select {
    border-radius: 6px;
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



<div class="container" style="margin-top: 120px;">
    <h2 class="mb-4"> Gestion des véhicules</h2>
    <!-- Bouton Ajouter -->
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalAjouterVehicule">
    + Ajouter un véhicule
    </button>


    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Boîte</th>
                <th>Carburant</th>
                <th>Passagers</th>
                <th>Valises</th>
                <th>Prix/Jour</th>
                <th>Statut</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($vehicules as $v): ?>
            <tr>
                <td><?= htmlspecialchars($v['nom']) ?></td>
                <td><?= htmlspecialchars($v['categorie']) ?></td>
                <td><?= htmlspecialchars($v['boite']) ?></td>
                <td><?= htmlspecialchars($v['carburant']) ?></td>
                <td><?= $v['passagers'] ?></td>
                <td><?= $v['valises'] ?></td>
                <td><?= number_format($v['prix_jour'], 2, ',', ' ') ?> DH</td>
              <td>
                <?php if ($v['statut'] === 'disponible'): ?>
                    <span class="badge bg-success">Disponible</span>
                <?php elseif ($v['statut'] === 'loué'): ?>
                    <span class="badge bg-warning text-dark">Loué</span>
                <?php elseif ($v['statut'] === 'maintenance'): ?>
                    <span class="badge bg-danger">Maintenance</span>
                <?php else: ?>
                    <span class="badge bg-secondary"><?= htmlspecialchars($v['statut']) ?></span>
                <?php endif; ?>
            </td>


               <td>
    <?php if (!empty($v['image_url']) && file_exists('../' . $v['image_url'])): ?>
        <img src="../<?= htmlspecialchars($v['image_url']) ?>" width="80" height="50" style="object-fit:cover;">
    <?php else: ?>
        <span class="text-muted">Aucune</span>
    <?php endif; ?>
</td>



         <td class="text-center">
    <div class="d-inline-flex flex-column align-items-center mt-2">
        <a href="#" class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalModifierVehicule"
            onclick="ouvrirModaleModif(<?= htmlspecialchars(json_encode($v)) ?>)">
            <i class="fas fa-edit"></i> Modifier
        </a>

        <button class="btn btn-outline-danger btn-sm btn-supprimer-vehicule"
        data-id="<?= $v['id'] ?>">
        <i class="fas fa-trash-alt"></i> Supprimer
        </button>


    </div>
</td>



            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Ajouter Véhicule -->
<div class="modal fade" id="modalAjouterVehicule" tabindex="-1" aria-labelledby="modalAjouterVehiculeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAjouterVehiculeLabel">Ajouter un nouveau véhicule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
 
        <form id="formAjouterVehicule" method="POST" action="ajouter_vehicule.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nom" class="form-label">Nom du véhicule</label>
    <input type="text" class="form-control" id="nom" name="nom" required>
  </div>

  <div class="mb-3">
    <label for="categorie_id" class="form-label">Catégorie</label>
    <select class="form-select" id="categorie_id" name="categorie_id" required>
      <option value="">-- Choisir une catégorie --</option>
      <?php foreach ($categories as $cat): ?>
        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nom']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="boite_id" class="form-label">Boîte</label>
    <select class="form-select" id="boite_id" name="boite_id" required>
      <option value="">-- Choisir une boîte --</option>
      <?php foreach ($boites as $boite): ?>
        <option value="<?= $boite['id'] ?>"><?= htmlspecialchars($boite['type']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="carburant_id" class="form-label">Carburant</label>
    <select class="form-select" id="carburant_id" name="carburant_id" required>
      <option value="">-- Choisir un carburant --</option>
      <?php foreach ($carburants as $carb): ?>
        <option value="<?= $carb['id'] ?>"><?= htmlspecialchars($carb['nom']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="passagers" class="form-label">Passagers</label>
    <input type="number" class="form-control" id="passagers" name="passagers" min="1" required>
  </div>

  <div class="mb-3">
    <label for="valises" class="form-label">Valises</label>
    <input type="number" class="form-control" id="valises" name="valises" min="0" required>
  </div>

  <div class="mb-3">
    <label for="statut" class="form-label">Statut</label>
    <select class="form-select" id="statut" name="statut" required>
      <option value="disponible">Disponible</option>
      <option value="indisponible">Indisponible</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="prix_jour" class="form-label">Prix par jour (DH)</label>
    <input type="number" step="0.01" class="form-control" id="prix_jour" name="prix_jour" required>
  </div>

  <div class="mb-3">
    <label for="image_url" class="form-label">Image du véhicule</label>
    <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
  </div>

  <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Annuler</button>
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>
     </div>
    </div>
  </div>
</div>


<!-- Modal Modifier Véhicule -->
<div class="modal fade" id="modalModifierVehicule" tabindex="-1" aria-labelledby="modalModifierVehiculeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalModifierVehiculeLabel">Modifier un véhicule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form id="formModifierVehicule" method="POST" action="modifier_vehicule.php" enctype="multipart/form-data">
          <input type="hidden" name="id" id="modif_id">
          
          <div class="mb-3">
            <label for="modif_nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="modif_nom" name="nom" required>
          </div>
          
          <div class="mb-3">
            <label for="modif_categorie_id" class="form-label">Catégorie</label>
            <select class="form-select" id="modif_categorie_id" name="categorie_id" required>
              <option value="">-- Choisir une catégorie --</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nom']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="modif_boite_id" class="form-label">Boîte</label>
            <select class="form-select" id="modif_boite_id" name="boite_id" required>
              <option value="">-- Choisir une boîte --</option>
              <?php foreach ($boites as $bo): ?>
                <option value="<?= $bo['id'] ?>"><?= htmlspecialchars($bo['type']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="modif_carburant_id" class="form-label">Carburant</label>
            <select class="form-select" id="modif_carburant_id" name="carburant_id" required>
              <option value="">-- Choisir un carburant --</option>
              <?php foreach ($carburants as $carb): ?>
                <option value="<?= $carb['id'] ?>"><?= htmlspecialchars($carb['nom']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="mb-3">
            <label for="modif_passagers" class="form-label">Passagers</label>
            <input type="number" class="form-control" id="modif_passagers" name="passagers" min="1" required>
          </div>
          
          <div class="mb-3">
            <label for="modif_valises" class="form-label">Valises</label>
            <input type="number" class="form-control" id="modif_valises" name="valises" min="0" required>
          </div>
          
            <div class="mb-3">
                <label for="modif_statut" class="form-label">Statut</label>
                 <select class="form-select" id="modif_statut" name="statut" required>
                <option value="disponible">Disponible</option>
                <option value="loué">Loué</option>
                <option value="maintenance">Maintenance</option>
                </select>

            </div>

          
          <div class="mb-3">
            <label for="modif_prix_jour" class="form-label">Prix / jour (DH)</label>
            <input type="number" step="0.01" class="form-control" id="modif_prix_jour" name="prix_jour" required>
          </div>

          <div class="mb-3">
            <label for="modif_image_url" class="form-label">Changer l'image du véhicule</label>
            <input type="file" class="form-control" id="modif_image_url" name="image_url" accept="image/*">
          </div>
          
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de confirmation suppression -->
<div class="modal fade" id="modalConfirmerSuppression" tabindex="-1" aria-labelledby="modalConfirmerSuppressionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalConfirmerSuppressionLabel">Attention !</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer ce véhicule ? Cette action ne peut pas être annulée.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <!-- Lien sera mis à jour dynamiquement -->
        <a href="#" id="btnConfirmerSuppression" class="btn btn-danger">Oui, supprimer</a>
      </div>
    </div>
  </div>
</div>




<script>
  function ouvrirModaleModif(veh) {
    document.getElementById('modif_id').value = veh.id;
    document.getElementById('modif_nom').value = veh.nom;
    document.getElementById('modif_categorie_id').value = veh.categorie_id;
    document.getElementById('modif_boite_id').value = veh.boite_id;
    document.getElementById('modif_carburant_id').value = veh.carburant_id;
    document.getElementById('modif_passagers').value = veh.passagers;
    document.getElementById('modif_valises').value = veh.valises;
    document.getElementById('modif_statut').value = veh.statut;
    document.getElementById('modif_prix_jour').value = veh.prix_jour;
  }

    document.querySelectorAll('.btn-supprimer-vehicule').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.getAttribute('data-id');
      const lienSuppr = document.getElementById('btnConfirmerSuppression');
      lienSuppr.href = 'supprimer_vehicule.php?id=' + encodeURIComponent(id);
      new bootstrap.Modal(document.getElementById('modalConfirmerSuppression')).show();
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
