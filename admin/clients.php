
<?php
include('../configuration.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT); // sécurise le mot de passe

    $stmt = $pdo->prepare("INSERT INTO client (nom, prenom, email, motdepasse, date_inscription) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$nom, $prenom, $email, $motdepasse]);

    // Redirection pour recharger proprement la page
    header("Location: clients.php");
    exit;
}


$stmt = $pdo->query("SELECT * FROM client");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des clients</title>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background: #f9f9f9;
           margin: 0;
           overflow-x: hidden;
        }

        .content {
            padding-top: 150px;
        }

       h1 {
        text-align: left;        
        color: #2c3e50;
        font-weight: 700;
        font-size: 2rem;
        position: relative;
        top: -50px;              
        left: 80px;             
    }


        table {
            width: 100%;
            max-width: 1100px;
            margin:50px auto 40px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }

        th, td {
            padding: 15px 20px;
            text-align: center;
        }

        th {
            background: #34495e;
            color: #ecf0f1;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background: #f2f6fc;
        }

        tr:hover {
            background: #d1e7ff;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

                /* Lien global */
        a {
            color: #2980b9;
            text-decoration: none !important; /* <- Ajouté */
            font-weight: 600;
            transition: color 0.3s ease;
        }

        /* Hover global */
        a:hover {
            color: #1c5980;
            text-decoration: none !important; /* <- Ajouté */
        }

        /* Boutons d’action */
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .actions a {
            padding: 6px 12px;
            border-radius: 5px;
            background: #3498db;
            color: white;
            font-size: 0.9em;
            box-shadow: 0 2px 6px rgba(52, 152, 219, 0.4);
            text-decoration: none !important; /* <- Ajouté ici aussi */
        }

        .actions a:hover {
            background: #217dbb;
            text-decoration: none !important; /* <- Important ici aussi */
        }


        .add-client {
            display: block;
            width: max-content;
            margin: -10px 80px;
            padding: 12px 28px;
            background: #27ae60;
            color: white;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1em;
            text-align: center;
            box-shadow: 0 3px 8px rgba(39, 174, 96, 0.5);
            transition: background-color 0.3s ease;
        }

        .add-client:hover {
            background: #1e8449;
        }
.actions .btn-historique {
    padding: 6px 12px;
    border-radius: 5px;
    background: #8e44ad;
    color: white;
    font-size: 0.9em;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 2px 6px rgba(142, 68, 173, 0.4);
}

.actions .btn-historique:hover {
    background: #732d91;
    transform: translateY(-1px);
}

      /* Bouton Supprimer */
.btn-supprimer {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 8px 16px;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(231, 76, 60, 0.4);
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-supprimer:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}
  
/* Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
}

/* Contenu du modal */
.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 450px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    position: relative;
    text-align: center;
    font-family: 'Segoe UI', sans-serif;
}

/* Bouton de fermeture (croix) */
.close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    color: #999;
    cursor: pointer;
}

.close:hover {
    color: #e74c3c;
}

/* Boutons de confirmation */
.modal-content button[type="submit"] {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 15px 10px 0;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal-content button[type="submit"]:hover {
    background-color: #c0392b;
}

.modal-content button#annuler-btn {
    background-color: #bdc3c7;
    color: #2c3e50;
    border: none;
    padding: 10px 20px;
    margin: 15px 10px 0;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal-content button#annuler-btn:hover {
    background-color: #95a5a6;
}
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.6);
    backdrop-filter: blur(3px);
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 25px 30px;
    border-radius: 12px;
    width: 80%;
    max-width: 600px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    animation: fadeInModal 0.3s ease;
}

.modal-content h3 {
    margin-top: 0;
    font-size: 1.5em;
    color: #2c3e50;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.modal-content ul {
    padding-left: 0;
}

.modal-content li {
    padding: 12px;
    background: #f9f9f9;
    margin-bottom: 10px;
    border-left: 5px solid #8e44ad;
    border-radius: 5px;
}

.close {
    float: right;
    font-size: 26px;
    font-weight: bold;
    color: #888;
    cursor: pointer;
    transition: color 0.3s ease;
}

.close:hover {
    color: #333;
}

/* Animation */
@keyframes fadeInModal {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}
#historiqueContent {
    max-height: 400px; /* ou la hauteur que tu veux */
    overflow-y: auto;
    position: relative;
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
<div class="content">
    <h1>Liste des clients</h1>

     <a href="#" class="add-client" onclick="openModal('modal-ajouter', 'ajouter_client.php')">➕ Ajouter un nouveau client</a>

    <table>
      
        <tr>
          
            <th>Nom complet</th>
            <th>Email</th>
            <th>Date d'inscription</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($clients as $row) : ?>
        <tr>
            
            <td><?= htmlspecialchars($row['nom'] . ' ' . $row['prenom']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['date_inscription']) ?></td>
            <td class="actions">
                 <button class="btn-supprimer" data-id="<?= $row['id'] ?>">🗑 Supprimer</button>
               <button class="btn-historique" data-email="<?= $row['email'] ?>">📄 Historique</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>


</div>

<!-- MODALES -->
<div class="modal" id="modal-supprimer">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal-supprimer')">&times;</span>
    <div id="modal-body-content-supprimer"></div>
  </div>
</div>

<div class="modal" id="modal-historique">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal-historique')">&times;</span>
    <div id="modal-body-content-historique"></div>
  </div>
</div>

<div class="modal" id="modal-ajouter">
  <div class="modal-content">
    <span class="close" onclick="closeModal('modal-ajouter')">&times;</span>
    <div id="modal-body-content-ajouter"></div>
  </div>
</div>

<!-- Modal de confirmation -->
<div id="modal-confirmation" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Confirmer la suppression</h3>
        <p>Êtes-vous sûr de vouloir supprimer ce client ?</p>
        <form method="post" action="supprimer_client.php">
            <input type="hidden" name="id" id="client-id-confirm">
            <button type="submit" style="background-color:#e74c3c; color:white;">Oui, Supprimer</button>
            <button type="button" id="annuler-btn">Annuler</button>
        </form>
    </div>
</div>

<!-- Modal Historique -->
<div id="modalHistorique" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Historique des réservations</h3>
        <div id="historiqueContent">
            <!-- Contenu chargé dynamiquement -->
            Chargement...
        </div>
                <button id="scrollTopBtn" title="Remonter en haut" style="
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #8e44ad;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(142, 68, 173, 0.6);
            display: none;
            z-index: 10000;
        ">⬆️</button>

    </div>
</div>

<script>
function openModal(modalId, contentUrl) {
    const modal = document.getElementById(modalId);
    const contentDivId = 'modal-body-content-' + modalId.split('-')[1]; // récupérer la bonne div
    const content = document.getElementById(contentDivId);

    fetch(contentUrl)
        .then(response => response.text())
        .then(html => {
            content.innerHTML = html;
            modal.style.display = 'block';
        });
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}



document.querySelectorAll('.btn-supprimer').forEach(button => {
    button.addEventListener('click', function () {
        const clientId = this.dataset.id;
        document.getElementById('client-id-confirm').value = clientId;
        document.getElementById('modal-confirmation').style.display = 'block';
    });
});

document.querySelector('.close').onclick = function () {
    document.getElementById('modal-confirmation').style.display = 'none';
};

document.getElementById('annuler-btn').onclick = function () {
    document.getElementById('modal-confirmation').style.display = 'none';
};

window.onclick = function(event) {
    const modal = document.getElementById('modal-confirmation');
    if (event.target == modal) {
        modal.style.display = "none";
    }
};


document.querySelectorAll('.btn-historique').forEach(btn => {
    btn.addEventListener('click', function () {
        const email = this.dataset.email;

        // Affiche le modal
        const modal = document.getElementById("modalHistorique");
        modal.style.display = "block";

        // Affiche "chargement"
        document.getElementById("historiqueContent").innerHTML = "Chargement...";

        // Requête AJAX vers un fichier PHP qui renvoie l'historique
        fetch('historique_client.php?email=' + encodeURIComponent(email))
            .then(response => response.text())
            .then(data => {
                document.getElementById("historiqueContent").innerHTML = data;
            })
            .catch(err => {
                document.getElementById("historiqueContent").innerHTML = "Erreur lors du chargement.";
            });
    });
});

document.querySelector('#modalHistorique .close').onclick = function () {
    document.getElementById('modalHistorique').style.display = 'none';
};

window.onclick = function(event) {
    const modal = document.getElementById('modalHistorique');
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

const scrollBtn = document.getElementById('scrollTopBtn');
const modalHistorique = document.getElementById('modalHistorique');
const historiqueContent = document.getElementById('historiqueContent');

// Affiche ou cache le bouton selon le scroll dans la div historiqueContent
historiqueContent.addEventListener('scroll', () => {
    if (historiqueContent.scrollTop > 100) {
        scrollBtn.style.display = 'block';
    } else {
        scrollBtn.style.display = 'none';
    }
});

// Quand on clique sur la flèche, on remonte en douceur en haut du contenu
scrollBtn.addEventListener('click', () => {
    historiqueContent.scrollTo({
        top: 0,
        behavior: 'smooth'
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
