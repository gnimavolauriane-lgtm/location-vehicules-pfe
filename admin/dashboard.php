<?php
session_start();
include('../configuration.php');

// ✅ Vérifier si l’admin est connecté
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
$admin_name = $_SESSION['admin_name'] ?? 'Administrateur';

// ✅ Requêtes pour le tableau de bord
$total_vehicules = $pdo->query("SELECT COUNT(*) FROM vehicules")->fetchColumn();
$total_clients = $pdo->query("SELECT COUNT(*) FROM client")->fetchColumn();
$total_reservations = $pdo->query("SELECT COUNT(*) FROM reservations")->fetchColumn();

// ✅ Caisse : total entrées - total sorties
$total_entrees = $pdo->query("SELECT SUM(montant) FROM caisse WHERE type = 'entrée'")->fetchColumn();
$total_sorties = $pdo->query("SELECT SUM(montant) FROM caisse WHERE type = 'sortie'")->fetchColumn();
$solde_caisse = ($total_entrees ?? 0) - ($total_sorties ?? 0);
?>

<!-- 🔢 Indicateurs avancés -->
<?php


// Durée moyenne des locations (en jours)
$moyenne_duree = $pdo->query("
    SELECT AVG(DATEDIFF(date_fin, date_debut)) 
    FROM reservations 
    WHERE date_fin IS NOT NULL 
      AND date_debut IS NOT NULL 
      AND date_fin > date_debut
")->fetchColumn();

$moyenne_duree = round($moyenne_duree ?? 0, 1);

$vehicules_retard = $pdo->query("
    SELECT COUNT(*) 
    FROM reservations 
    WHERE date_fin < NOW() 
     AND statut = 'en_cours'
")->fetchColumn();

// Revenus moyens par client (si la table caisse est liée aux clients)
$total_clients_valide = max($total_clients, 1); // éviter division par 0
$revenu_par_client = $solde_caisse / $total_clients_valide;

// Véhicules en maintenance (tu peux modifier selon ta logique)
$maintenance_count = $pdo->query("SELECT COUNT(*) FROM vehicules WHERE statut = 'maintenance'")->fetchColumn();
// pour nouvelle réservation
$nb_nouvelles_reservations = $pdo->query("SELECT COUNT(*) FROM reservations WHERE vue_admin = 0")->fetchColumn();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        body {
            padding-top: 80px;
            font-family: 'Poppins', sans-serif;
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
.container{
    margin-top:80px;
}
.text-muted{
     margin-top:20px;
}


.dashboard-card {
  border-radius: 12px;
  border: none;
  min-height: 140px; /* fixe une hauteur identique */
  display: flex;
  margin-top:80px;
  align-items: center;
  padding: 20px;
  transition: transform 0.2s ease;
  cursor: default;
}

.dashboard-card:hover {
  transform: translateY(-5px);
}

.dashboard-card .card-body {
  display: flex;
  align-items: center;
  gap: 15px;
  width: 100%;
}

.icon-box {
  width: 50px;
  height: 50px;
  background: rgba(255,255,255,0.2);
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.5rem;
  flex-shrink: 0;
}

.card-title {
  margin-bottom: 0;
  font-size: 2rem;
  font-weight: bold;
  white-space: nowrap; /* empêche le texte de passer à la ligne */
}

.dashboard-card p {
  margin: 0;
  font-size: 0.9rem;
  color: #ffffffcc;
}
.info-line {
    border-radius: 12px;
    margin-bottom: 0.2rem;
    padding: 1.2rem 2rem;
    width: 90%;
    margin-top:80px;
    margin-left:80px;
    transition: transform 0.3s ease-in-out;
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(8px);
}

.info-line:hover {
    transform: scale(1.02);
}

.info-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.info-label {
    font-weight: 600;
    font-size: 1.1rem;
    color: #1e293b;
}

.info-value {
    font-size: 1.6rem;
    font-weight: bold;
    color: #0a3d62;
}
/* 💡 Zone boîte à idées & feedbacks */
.feedback-section {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.6);
    border-radius: 16px;
    padding: 25px;
    width: 90%;
    margin-left:80px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transition: 0.3s ease;
    margin-bottom: 0.2rem;
}

.feedback-section:hover {
    transform: translateY(-3px);
}

.feedback-section h4 {
    font-weight: 600;
    color: #333;
    border-left: 5px solid #0d6efd;
    padding-left: 10px;
}

.feedback-section textarea {
    border-radius: 10px;
    resize: none;
}

.feedback-section .btn-primary {
    background: linear-gradient(135deg, #007bff, #0dcaf0);
    border: none;
    font-weight: 500;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

/* 💬 Liste des feedbacks */
.list-group-item {
    background: #ffffff;
    border: 1px solid #dee2e6;
    border-left: 5px solid #0d6efd20;
    margin-bottom: 12px;
    border-radius: 10px;
    padding: 15px;
}

.list-group-item strong {
    color: #1e3799;
}

.list-group-item em {
    color: #6c757d;
    font-style: italic;
    font-size: 0.9rem;
}

.badge {
    font-size: 0.75rem;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 6px;
    margin-top: 6px;
    display: inline-block;
}

.footer-custom {
    color: #111;
    font-weight: 500;
    font-size: 1rem;
    letter-spacing: 0.5px;
}

.footer-custom span {
    display: block;
}

.welcome-message {
    font-size: 1.2rem;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(13, 110, 253, 0.25);
    max-width: 600px;
    margin: 0 auto 2rem auto;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

.welcome-message {
  animation: fadeIn 1s ease forwards;
   
}
 #reservation-alert {
    position: fixed;
    top: 350px;      /* un peu plus bas */
    left: 2px;     /* collé à gauche */
    z-index: 9999;
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* aligné à gauche */
    gap: 6px;
  }

  .alert-banner {
    background: linear-gradient(45deg, #2980b9, #6dd5fa);
    color: white;
    padding: 10px 16px;   /* un peu moins large */
    border-radius: 12px 12px 0 0;
    font-size: 0.95rem;   /* taille un peu réduite */
    font-weight: bold;
    animation: slideUpThenDown 5s forwards;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    white-space: nowrap;
  }

  @keyframes slideUpThenDown {
    0%   { transform: translateY(0); opacity: 1; }
    70%  { transform: translateY(-40px); opacity: 1; }  /* moins haut */
    100% { transform: translateY(0); opacity: 0; }
  }

  .reservation-button {
    background: #2980b9;
    color: white;
    font-size: 24px;
    font-weight: bold;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background 0.3s, transform 0.3s;
    cursor: pointer;
  }

  .reservation-button:hover {
    background-color: #1f6391;
    transform: scale(1.1);
  }
    </style>
</head>
<body>

<?php include('entete_admin.php'); ?>

<div id="particles-js"></div>

<div id="welcome-message" class="welcome-message alert alert-primary text-center py-3 rounded" style="opacity:1;">
  <i class="fas fa-handshake"></i>
  <strong>Bienvenue, <?= htmlspecialchars($admin_name) ?> !</strong> Heureux de vous revoir.
</div>

<script>
  const msgDiv = document.getElementById('welcome-message');

  function fadeOut(element, callback) {
    element.style.opacity = '0';
    setTimeout(() => {
      if (callback) callback();
    }, 500); // transition de 0.5s
  }

  function fadeIn(element, content = null, callback) {
    if (content !== null) {
      element.innerHTML = content;
    }
    element.style.opacity = '1';
    if (callback) setTimeout(callback, 500);
  }

  const finalMessageHTML = `
    <div style="
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 1rem 1.5rem;
      border-radius: 16px;
      background: linear-gradient(135deg, #4a90e2, #357ABD);
      color: white;
      box-shadow: 0 8px 20px rgba(53, 122, 189, 0.4);
      max-width: 400px;
      margin-left:80px;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 1.1rem;">
      <i class="fas fa-lightbulb" style="font-size: 1.8rem;"></i>
      <div>
        Des questions ?<br>
        <em style="font-weight: 400; font-size: 0.95rem;">Dirigez-vous vers la boîte à idées !</em>
      </div>
    </div>
  `;

  // Étape 1 : Bienvenue
  setTimeout(() => {
    fadeOut(msgDiv, () => {
      fadeIn(msgDiv, `<i class="fas fa-chart-line"></i> Voici le <strong>nouveau Tableau de bord de cette semaine</strong>`);

      // Étape 2 : 5s plus tard, message final
      setTimeout(() => {
        fadeOut(msgDiv, () => {
          fadeIn(msgDiv, finalMessageHTML, () => {
            // Boucle de disparition/réapparition toutes les 10s
            setInterval(() => {
              fadeOut(msgDiv, () => {
                // Pause de 1 seconde avant de réapparaître
                setTimeout(() => {
                  fadeIn(msgDiv);
                }, 1000);
              });
            }, 10000);
          });
        });
      }, 5000);
    });
  }, 2000);
</script>

<style>
  #welcome-message {
    transition: opacity 0.5s ease-in-out;
  }
</style>






<div class="container">
    <div class="dashboard-header text-center">
        <h1 class="mb-3">🎯 Tableau de bord Administrateur</h1>
        <p class="text-muted">Aperçu global de la plateforme de location</p>
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="dashboard-card text-bg-primary">
                <div class="card-body">
                    <div class="icon-box bg-light text-primary"><i class="fas fa-car"></i></div>
                    <div>
                        <h5 class="card-title"><?= $total_vehicules ?></h5>
                        <p>Véhicules enregistrés</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card text-bg-success">
                <div class="card-body">
                    <div class="icon-box bg-light text-success"><i class="fas fa-users"></i></div>
                    <div>
                        <h5 class="card-title"><?= $total_clients ?></h5>
                        <p>Clients inscrits</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card text-bg-warning">
                <div class="card-body">
                    <div class="icon-box bg-light text-warning"><i class="fas fa-calendar-check"></i></div>
                    <div>
                        <h5 class="card-title"><?= $total_reservations ?></h5>
                        <p>Réservations effectuées</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card text-bg-dark">
                <div class="card-body">
                    <div class="icon-box bg-light text-dark"><i class="fas fa-wallet"></i></div>
                    <div>
                        <h5 class="card-title"><?= number_format($solde_caisse, 0, ',', ' ') ?> DH</h5>
                        <p>Solde actuel de la caisse</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row advanced-stats">
    <div class="col-md-12">
        <div class="info-line bg-white shadow-sm border-start border-4 border-info">
            <div class="info-content">
                <span class="info-label">📊 Durée moyenne de location</span>
                <span class="info-value"><?= $moyenne_duree ?> jours</span>
            </div>
        </div>

        <div class="info-line bg-white shadow-sm border-start border-4 border-success">
            <div class="info-content">
                <span class="info-label">💰 Revenu moyen par client</span>
                <span class="info-value"><?= number_format($revenu_par_client, 0, ',', ' ') ?> DH</span>
            </div>
        </div>

        <div class="info-line bg-white shadow-sm border-start border-4 border-warning">
            <div class="info-content">
                <span class="info-label">🛠️ Véhicules à entretenir</span>
                <span class="info-value"><?= $maintenance_count ?> véhicules</span>
            </div>
        </div>

    </div>
</div>


       <div class="feedback-section mt-5">
        <!-- 💬 Boîte à idées -->
<div class="mt-5">
    <h4 class="mb-3"><i class="fas fa-lightbulb text-warning"></i> Boîte à idées / Suggestions</h4>
    <form action="soumettre_feedback.php" method="POST">
        <div class="mb-3">
            <textarea name="contenu" class="form-control" rows="3" placeholder="Propose une idée ou signale un problème..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>


<!-- 📣 Feedbacks admin -->
<div class="mt-5">
    <h4 class="mb-3"><i class="fas fa-comments text-info"></i> Feedbacks récents</h4>
    <ul class="list-group">
        <?php
        $feedbacks = $pdo->query("SELECT f.contenu, f.date_envoi, f.statut, a.username 
                                  FROM feedback_admin f 
                                  JOIN administrateur a ON f.id_admin = a.id 
                                  ORDER BY f.date_envoi DESC 
                                  LIMIT 5")->fetchAll();

        if ($feedbacks):
            foreach ($feedbacks as $fb):
        ?>
        <li class="list-group-item">
            <strong><?= htmlspecialchars($fb['username']) ?></strong> —
            <em><?= date('d/m/Y H:i', strtotime($fb['date_envoi'])) ?></em><br>
            <?= nl2br(htmlspecialchars($fb['contenu'])) ?><br>
            <span class="badge bg-<?= 
                $fb['statut'] === 'Traité' ? 'success' : 
                ($fb['statut'] === 'En cours' ? 'warning' : 'secondary') ?>">
                <?= $fb['statut'] ?>
            </span>
        </li>
        <?php endforeach; else: ?>
        <li class="list-group-item text-muted">Aucun feedback pour le moment.</li>
        <?php endif; ?>
    </ul>
</div>
</div>


      <div class="container mt-5">
    <h4><i class="fas fa-bell text-danger"></i> Zone d'alertes</h4>

    <?php if ($vehicules_retard == 0): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> Aucun problème détecté. Tout est sous contrôle ✅
        </div>
    <?php else: ?>
         <div id="alert-retard" class="alert alert-warning alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
    <div>
        <i class="fas fa-clock"></i> <strong><?= $vehicules_retard ?> véhicule(s) en retard</strong>
    </div>
    <div>
        <a href="retards.php" class="btn btn-sm btn-outline-dark">
            Voir détails <i class="fas fa-arrow-right"></i>
        </a>
        <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Fermer"></button>
    </div>
</div>

    <?php endif; ?>
</div>

<!-- Son d'alerte -->
<audio id="audio-alert" src="https://actions.google.com/sounds/v1/alarms/alarm_clock.ogg" preload="auto"></audio>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alertRetard = document.getElementById('alert-retard');
        if(alertRetard){
            const audio = document.getElementById('audio-alert');
            audio.play().catch(e => console.log("Lecture audio bloquée par le navigateur", e));
        }
    });
</script>

<?php if ($nb_nouvelles_reservations > 0): ?>
  <div id="reservation-alert">
    <div class="alert-banner">📢 Nouvelle réservation reçue !</div>
    <a href="reservations.php" class="reservation-button">R</a>
  </div>
<?php endif; ?>



<footer class="footer-custom mt-5 py-3 text-center">
    <div class="container">
        <span>&copy; SG Car Admin 2025</span>
    </div>
</footer>


</div>
<script>
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
