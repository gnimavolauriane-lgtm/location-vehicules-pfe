<?php
require_once "configuration.php";
$vehicules = []; 

$erreur_email = '';
$erreur_mdp = '';


// Initialisation des variables
$date_reception = $_GET['date_reception'] ?? '';
$heure_reception = $_GET['heure_reception'] ?? '';
$date_restitution = $_GET['date_restitution'] ?? '';
$heure_restitution = $_GET['heure_restitution'] ?? '';
$categorie = $_GET['categorie'] ?? '';
$permis = isset($_GET['permis']);
$age_ok = isset($_GET['age_ok']);

// Tableau pour les messages d'erreur
$errors = [];

// Validation du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Vérification des champs obligatoires
    if (empty($date_reception)) {
        $errors['date_reception'] = "La date de réception est obligatoire.";
    }
    // Vérifier que la date de réception n'est pas antérieure à aujourd'hui
   elseif (new DateTime($date_reception) < new DateTime(date('Y-m-d'))) {
    $errors['date_reception_passee'] = "La date de réception ne peut pas être antérieure à aujourd'hui.";
}



    if (empty($heure_reception)) {
        $errors['heure_reception'] = "L'heure de réception est obligatoire.";
    }
    if (empty($date_restitution)) {
        $errors['date_restitution'] = "La date de restitution est obligatoire.";
    }
    if (empty($heure_restitution)) {
        $errors['heure_restitution'] = "L'heure de restitution est obligatoire.";
    }
    if (empty($categorie)) {
        $errors['categorie'] = "Veuillez choisir une catégorie.";
    }

    if (!$permis) {
       $errors['permis'] = "Vous devez avoir un permis valide.";
    }
    if (!$age_ok) {
       $errors['age_ok'] = "Vous devez avoir au moins 21 ans.";
    }


    // Vérification de la logique des dates
  if (!empty($date_reception) && !empty($date_restitution) && !empty($heure_reception) && !empty($heure_restitution)) {
    $d1 = new DateTime("$date_reception $heure_reception");
    $d2 = new DateTime("$date_restitution $heure_restitution");

    if ($d2 <= $d1) {
        if ($date_reception === $date_restitution) {
            $errors['heure_restitution'] = "L'heure de restitution doit être supérieure à l'heure de réception.";
        } else {
            $errors['date_restitution'] = "La date de restitution doit être après la date de réception.";
        }
    }
}


    // Si aucune erreur, récupération des véhicules disponibles
    if (empty($errors)|| isset($_GET['mdp'])) {
       $sql = "
        SELECT v.nom, c.nom AS categorie, v.image_url, v.lien_detail, v.prix_jour
        FROM vehicules v
        JOIN categories c ON v.categorie_id = c.id
        WHERE c.nom LIKE :categorie
        AND v.statut = 'disponible'
        AND v.id NOT IN (
            SELECT vehicule_id
            FROM reservations
            WHERE NOT (
                :date_restitution <= date_debut_location
                OR :date_reception >= date_fin_location
            )
        )
        ";



        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':date_reception' => "$date_reception $heure_reception",
            ':date_restitution' => "$date_restitution $heure_restitution",
            ':categorie' => $categorie . '%'
        ]);
        $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



session_start();
$erreursConnexion = $_SESSION['erreurs_connexion'] ?? [];
unset($_SESSION['erreurs_connexion']);
// Après avoir récupéré la liste $vehicules
$prix_jour = 0;
$vehicule_nom = $_GET['vehicule_nom'] ?? '';

foreach ($vehicules as $v) {
    if ($v['nom'] === $vehicule_nom) {
        $prix_jour = $v['prix_jour'];
        break;
    }
}
var_dump($prix_jour, $vehicule_nom);
// Stocker dans la session
$_SESSION['date_reception'] = $_GET['date_reception'] ?? '';
$_SESSION['heure_reception'] = $_GET['heure_reception'] ?? '';
$_SESSION['date_restitution'] = $_GET['date_restitution'] ?? '';
$_SESSION['heure_restitution'] = $_GET['heure_restitution'] ?? '';
$_SESSION['categorie'] = $_GET['categorie'] ?? '';
$_SESSION['vehicule_nom'] = $_GET['vehicule_nom'] ?? '';
$_SESSION['permis'] = isset($_GET['permis']) ? 'on' : '';
$_SESSION['age_ok'] = isset($_GET['age_ok']) ? 'on' : '';
$_SESSION['montant_vehicule'] = $prix_jour;






?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats</title>
    <link rel="stylesheet" href="resultats.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
<?php include('overlay.php'); ?>
<?php include('entete.php'); ?>
<div class="separateur"></div>

<!-- Résumé recherche -->
<div class="recap-section">
    <div id="recapitulatif" class="cadran-recap">
        <div>
            <p><strong><?= htmlspecialchars($categorie) ?></strong></p>
            <p><?= date('D d M Y', strtotime($date_reception)) ?> à <?= $heure_reception ?> → <?= date('D d M Y', strtotime($date_restitution)) ?> à <?= $heure_restitution ?></p>
        </div>
        <button id="modifierBtn">Modifier</button>
    </div>

    <!-- Formulaire masqué -->
    <div id="formulaire-container" style="display: none;">
        <div class="zone-fermeture">
            <span class="texte-fermer">Modifier la recherche</span>
            <span id="fermerFormulaire" class="croix-fermer">&times;</span>
        </div>

        <form action="resultats.php" method="get">
            <div class="champ-formulaire">
            <input type="date" name="date_reception" id="input1" value="<?= $date_reception ?>" required>
            <?php if (isset($errors['date_reception'])): ?>
               <div class="erreur-message"><?= $errors['date_reception'] ?></div>
            <?php endif; ?>
            <?php if (isset($errors['date_reception_passee'])): ?>
               <div class="erreur-message"><?= $errors['date_reception_passee'] ?></div>
            <?php endif; ?>
            
            </div>

            <div class="champ-formulaire">
            <input type="time" name="heure_reception" id="input2" value="<?= $heure_reception ?>" required>
            <?php if (isset($errors['heure_reception'])): ?>
                <div class="erreur-message"><?= $errors['heure_reception'] ?></div>
            <?php endif; ?>
            </div>


            <div class="champ-formulaire">
            <input type="date" name="date_restitution" id="input3" value="<?= $date_restitution ?>" required>
            <?php if (isset($errors['date_restitution'])): ?>
                <div class="erreur-message"><?= $errors['date_restitution'] ?></div>
            <?php endif; ?>
            </div>

            <div class="champ-formulaire">
            <input type="time" name="heure_restitution" id="input4" value="<?= $heure_restitution ?>" required>
            <?php if (isset($errors['heure_restitution'])): ?>
                <div class="erreur-message"><?= $errors['heure_restitution'] ?></div>
            <?php endif; ?>
            </div>

           <div class="champ-formulaire">

            <select name="categorie" id="categorie" required>
                <option value="">Choisir une catégorie</option>
                <option value="Citadine" <?= $categorie === 'Citadine' ? 'selected' : '' ?>>Citadine</option>
                <option value="Compact" <?= $categorie === 'Compact' ? 'selected' : '' ?>>Compact</option>
                <option value="SUV" <?= $categorie === 'SUV' ? 'selected' : '' ?>>SUV</option>
                <option value="Premium" <?= $categorie === 'Premium' ? 'selected' : '' ?>>Premium</option>
                <option value="Utilitaire" <?= $categorie === 'Utilitaire' ? 'selected' : '' ?>>Utilitaire</option>
                <option value="Minibus" <?= $categorie === 'Minibus' ? 'selected' : '' ?>>Minibus</option>
            </select>
            
            <?php if (isset($errors['categorie'])): ?>
                <div class="erreur-message"><?= $errors['categorie'] ?></div>
            <?php endif; ?>
            </div>
            

         
            <div class="champ-formulaire">
            <label>
            <input type="checkbox" name="permis" id="case1" <?= $permis ? 'checked' : '' ?>> Permis valide
        </label>
        <?php if (isset($errors['permis'])): ?>
            <div class="erreur-message"><?= $errors['permis'] ?></div>
        <?php endif; ?>
        </div>


        <div class="champ-formulaire">
        <label>
            <input type="checkbox" name="age_ok" id="case2" <?= $age_ok ? 'checked' : '' ?>> Âge 21+
        </label>
        <?php if (isset($errors['age_ok'])): ?>
            <div class="erreur-message"><?= $errors['age_ok'] ?></div>
        <?php endif; ?>
        </div>


            <button type="submit">Rechercher</button>
        </form>
    </div>
</div>

<?php if (empty($errors) && $_SERVER['REQUEST_METHOD'] === 'GET'): ?>
                <div class="result-header">
                    <h2 class="titre-gauche">CHOISISSEZ VOTRE VEHICULE</h2>
                    <span class="nb-resultats">
                        <?php if (!empty($vehicules)): ?>
                            Nous avons trouvé <?= count($vehicules) ?> véhicule<?= count($vehicules) > 1 ? 's' : '' ?>
                        <?php else: ?>
                            Aucun véhicule trouvé
                        <?php endif; ?>
                    </span>
                </div>
 <?php endif; ?>
<!-- Résultats -->
<section class="resultats">
    <div class="container-vehicules">
        <?php if (!empty($vehicules)): ?>
            <?php foreach ($vehicules as $v): ?>
               <div class="carte-vehicule">
                    <img src="<?= htmlspecialchars($v['image_url']) ?>" alt="Image véhicule">
                    <h3><?= htmlspecialchars($v['nom']) ?></h3>
                    <p>Catégorie : <?= htmlspecialchars($v['categorie']) ?></p>
                    
                    <div class="ligne-prix-btn">
                        <span class="prix"><?= number_format($v['prix_jour'], 2) ?> DH/jour</span>
                        <a href="#" 
                            class="btn-payer" 
                            data-vehicule="<?= htmlspecialchars($v['nom']) ?>" 
                            data-montant="<?= htmlspecialchars($v['prix_jour']) ?>">
                            
                            PAYER MAINTENANT
                        </a>
                    </div>

                    <?php $sep = (strpos($v['lien_detail'], '?') === false) ? '?' : '&'; ?>
                    <a href="<?= htmlspecialchars($v['lien_detail']) . $sep . 'montant_vehicule='.urlencode($v['prix_jour']) ?>" class="btn-detail">Voir détails</a>
                </div>
            
            <?php endforeach; ?>
        <?php endif; ?> 
</section>

  

<!-- ... tout ton contenu existant ... -->

<div id="modalPaiement" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.5); 
    justify-content:center; align-items:center; z-index:1000;">
    <div class="modal-form active">
        <button id="closeModal" class="modal-close">&times;</button>
        <h2>Compte client</h2>
        <form id='form-connexion' method="post">
                <input type="hidden" id="vehicule_cache" name="vehicule_nom" value="">
                
                <input type="hidden" name="montant_vehicule" id="montant_cache" value="">

            <div class="champ-formulaire">
                <label for="email">E-mail*</label>
                <input type="email" id="email" name="email" placeholder="••••••@gmail.com" >
                <div class="erreur-champ" id="erreur-email"></div>
            </div>
            <div class="champ-formulaire">
                <label for="password">Mot de passe*</label>
                <input type="password" id="password" name="motdepasse" placeholder="•••••••••••••••" >
                <div class="erreur-champ" id="erreur-password"></div>
            </div>
            <span class="forgot-password">
                <a href="#" id="lien-mdp-oublie" >Mot de passe oublié ?</a>
            </span>
             <!-- Message d'erreur global ici -->
            <div id="erreur-generale" style="color:red;"></div>

            <button type="submit">Me connecter</button>
        </form>
    </div>

    <div id="form-mdp-oublie" class="modal-form-reset" >
    <span id="close-reset" class="modal-close">&times;</span>
    <h2 style="text-align:center;">Vous avez oublié votre mot de passe ?</h2>
    <p style="text-align:center; margin-bottom: 20px;">
        Renseignez votre adresse e-mail et recevez d'ici quelques instants un lien pour réinitialiser votre mot de passe.
    </p>
    <form id="form-mdp-oublie-form" method="post">
        <label for="reset-email">E-mail*</label>
        <input type="email" id="reset-email" name="reset-email" placeholder="••••••@gmail.com" >
        <div class="erreur-champ" id="erreur-reset-email" style="color:red;"></div>

        <button type="submit" style="margin-top:15px;">Valider</button>
        <a href="#" id="annuler-reset" style="display:block; margin-top:10px; text-align:center; color:#555;">Annuler</a>
    </form>
</div>

</div>





<script>
document.addEventListener("DOMContentLoaded", function () {

const mdpStatus = <?= isset($_GET['mdp']) ? json_encode($_GET['mdp']) : 'null' ?>;
if (mdpStatus === 'modifie_ok' || mdpStatus === 'token_expire') {
    // Affiche le modal de connexion
    document.getElementById('modalPaiement').style.display = 'flex';

    // Affiche le formulaire de connexion
    document.querySelector('.modal-form').classList.add('active');
    document.querySelector('.modal-form-reset').classList.remove('active');

    // Affiche un message selon le cas
    if (mdpStatus === 'modifie_ok') {
      document.getElementById('erreur-generale').style.color = 'green';
      document.getElementById('erreur-generale').textContent = "Mot de passe modifié avec succès. Connectez-vous.";
    } else if (mdpStatus === 'token_expire') {
      document.getElementById('erreur-generale').style.color = 'red';
      document.getElementById('erreur-generale').textContent = "Lien expiré. Veuillez recommencer.";
    }

    // 🔴 Masque le formulaire de recherche (même s’il était visible)
    document.getElementById('formulaire-container').style.display = 'none';

    // ✅ Affiche le récapitulatif si des véhicules ont été trouvés
    <?php if (!empty($vehicules)) : ?>
      document.getElementById('recapitulatif').style.display = 'flex';
    <?php endif; ?>
  }  


    const form = document.querySelector('#formulaire-container form');

    if (form) {
        form.querySelectorAll('input, select').forEach(field => {
            field.addEventListener('input', () => {
                const errorDiv = field.parentElement.querySelector('.erreur-message');
                if (errorDiv) {
                    errorDiv.style.display = 'none';
                }
            });
        });
    }

    const recap = document.getElementById("recapitulatif");
    const formContainer = document.getElementById("formulaire-container");
    const btnModifier = document.getElementById("modifierBtn");
    const btnFermer = document.getElementById("fermerFormulaire");

    <?php if ((!empty($vehicules) && empty($errors)) || isset($_GET['mdp'])) : ?>
        recap.style.display = "flex";
        formContainer.style.display = "none";
    <?php else : ?>
        recap.style.display = "none";
        formContainer.style.display = "block";
    <?php endif; ?>

    btnModifier?.addEventListener("click", () => {
        recap.style.display = "none";
        formContainer.style.display = "block";
    });

    btnFermer?.addEventListener("click", () => {
        recap.style.display = "flex";
        formContainer.style.display = "none";
    });
});

    // Ouvre le modal quand on clique sur un bouton "PAYER MAINTENANT"
    let vehiculeChoisi=null;
    let montantChoisi=null;
    document.querySelectorAll('.btn-payer').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault(); // Empêche le lien d'aller ailleurs
            vehiculeChoisi=btn.dataset.vehicule;
            montantChoisi=btn.dataset.montant;
            document.getElementById('vehicule_cache').value=vehiculeChoisi;
            document.getElementById('montant_cache').value=montantChoisi;
            
            document.getElementById('modalPaiement').style.display = 'flex';
        });
    });

    // Ferme le modal quand on clique sur la croix
    document.getElementById('closeModal').addEventListener('click', () => {
        document.getElementById('modalPaiement').style.display = 'none';
    });

    //Pour fermer le modal quand on clique à l'extérieur de la boîte
    document.getElementById('modalPaiement').addEventListener('click', (e) => {
        if(e.target === e.currentTarget){
            e.currentTarget.style.display = 'none';
        }
    });




document.getElementById('form-connexion').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const erreurEmail = document.getElementById('erreur-email');
    const erreurPassword = document.getElementById('erreur-password');
    const erreurGenerale = document.getElementById('erreur-generale');

    // Réinitialise les messages d’erreurs
    erreurEmail.textContent = '';
    erreurPassword.textContent = '';
    erreurGenerale.textContent = '';

    let valid = true;

    if (!email.value.trim()) {
        erreurEmail.textContent = "Veuillez entrer votre adresse e-mail.";
        valid = false;
    }

    if (!password.value.trim()) {
        erreurPassword.textContent = "Veuillez entrer votre mot de passe.";
        valid = false;
    }

    if (!valid) return; // Ne pas envoyer la requête si erreur

   
    // Si tout est ok, j'envoie à PHP (fetch AJAX)
    
    fetch('traitement_connexion.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
            email: email.value,
            motdepasse: password.value,
            vehicule_nom: vehiculeChoisi || '',
            montant_vehicule: montantChoisi || ''
            
        })
    })
    .then(res => res.json())
   .then(data => {
    if (data.success && data.redirect) {
        location.href = data.redirect;
    } else {
        erreurGenerale.style.color = 'red';
        erreurGenerale.textContent = data.message;
    }
})

    .catch(() => {
        erreurGenerale.textContent = "Erreur réseau, veuillez réessayer.";
    });
});

document.getElementById('lien-mdp-oublie').addEventListener('click', function(e) {
    e.preventDefault();

    document.querySelector('.modal-form').classList.remove('active');
    document.querySelector('.modal-form-reset').classList.add('active');
});

document.getElementById('annuler-reset').addEventListener('click', function(e) {
    e.preventDefault();

    document.querySelector('.modal-form-reset').classList.remove('active');
    document.querySelector('.modal-form').classList.add('active');
});

document.getElementById('close-reset').addEventListener('click', function () {
    document.querySelector('.modal-form-reset').classList.remove('active');
    document.querySelector('.modal-form').classList.add('active');
});


document.getElementById('form-mdp-oublie-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const emailInput = document.getElementById('reset-email');
    const erreurEmail = document.getElementById('erreur-reset-email');
    erreurEmail.textContent = '';

    if (!emailInput.value.trim()) {
        erreurEmail.textContent = "Veuillez entrer votre adresse e-mail.";
        return;
    }

    // Ici j'ai envoyer via fetch à un PHP pour traitement
    fetch('traitement_reset_mdp.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ email: emailInput.value.trim() })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
       // Réinitialisation réussie → message de confirmation
            erreurEmail.style.color = "green";
            erreurEmail.textContent = "Un lien a été envoyé à votre adresse e-mail.";
            emailInput.value = '';
        } else {
            // Affiche le message d’erreur retourné par PHP
            erreurEmail.style.color = "red";
            erreurEmail.textContent = data.message || "Une erreur est survenue.";
        }
    })
    .catch(() => {
        erreurEmail.textContent = "email non reconnu. Veuillez réessayer.";
    });
});



</script>


<footer class="footer">
    &copy; 2025 SG Car | Tous droits réservés
</footer>

<?php include('chargement.php');?> 
<?php include('langue.php'); ?>
<?php include('chat.php'); ?>
<?php include('flèche.php'); ?>

</body>
</html>
