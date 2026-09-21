
<?php
session_start();

require_once 'configuration.php';



// Si la réservation arrive via GET, on enregistre le nom du véhicule et le montant dans la session
if (isset($_GET['vehicule_nom'])) {
    $_SESSION['vehicule_nom'] = $_GET['vehicule_nom'];
}
if (isset($_GET['montant_vehicule'])) {
    $_SESSION['montant_vehicule'] = floatval(str_replace(',', '.', $_GET['montant_vehicule']));

}

// On récupère les données depuis la session
$vehicule_nom = $_SESSION['vehicule_nom'] ?? null;

$montant_vehicule = $_SESSION['montant_vehicule'] ?? 0;



$vehicule_infos = null;
if (isset($_SESSION['vehicule_nom'])) {
    $stmt = $pdo->prepare("SELECT * FROM vehicules WHERE nom = :nom LIMIT 1");
    $stmt->execute(['nom' => $_SESSION['vehicule_nom']]);
    $vehicule_infos = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Autres variables session
$date_reception = $_SESSION['date_reception'] ?? '';
$heure_reception = $_SESSION['heure_reception'] ?? '';
$date_restitution = $_SESSION['date_restitution'] ?? '';
$heure_restitution = $_SESSION['heure_restitution'] ?? '';
$categorie = $_SESSION['categorie'] ?? '';
$permis = $_SESSION['permis'] ?? '';
$age_ok = $_SESSION['age_ok'] ?? '';


$erreurs = [];

// Soumission du formulaire en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $email = trim($_POST['email']);

    // Vérifier si l'email existe en base de données
    $stmt = $pdo->prepare("SELECT * FROM client WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $client = $stmt->fetch();

    if (!$client) {
        $erreurs['email'] = "email inconnue. Veuillez entrer votre email";
    }

    // S’il n’y a pas d’erreur, on peut rediriger ou continuer
    if (empty($erreurs)) {
       //redirige vers paiement.php
        header('Location: paiement.php');
        exit;
    }
    
}
//récupérer le nom et le montant pour paiement.php
// Calcul de la durée de location en jours
$date_debut = DateTime::createFromFormat('Y-m-d', $date_reception);
$date_fin = DateTime::createFromFormat('Y-m-d', $date_restitution);


$nombre_jours = 1;
if ($date_debut && $date_fin) {
    $diff = $date_debut->diff($date_fin);
    $nombre_jours = max(1, $diff->days); // minimum 1 jour
}


// Après calculs
$montant_total = $montant_vehicule * $nombre_jours;
$total_ttc = $montant_total;
$nb_jours = $nombre_jours;


$vehicule_nom = $vehicule_infos['nom'] ?? 'Véhicule inconnu';

$_SESSION['commande'] = [
    'identifiant' => uniqid('9-'), 
    'articles' => [
        [
            'code' => 'cmmd',
            'id' => $vehicule_infos['id'] ?? 0,
            'description' => $vehicule_nom . " - {$nombre_jours} jour(s) - Véhicule avec kilométrage illimité, assurance incluse",
            'montant' => $montant_total
        ]
    ],
    'total' => $montant_total
];


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    

    <meta charset="UTF-8" />
    <title>Paiement sécurisé - Compte client</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #5A189A;
            color: white;
            padding: 12px 0;
            text-align: center;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            font-size: 1.3em;
        }
        header svg {
            width: 24px;
            height: 24px;
            fill: white;
        }

        /* ---- Cadran récapitulatif ---- */
        .recap-section {
            padding: 20px;
            background-color: rgba(0,0,0,0.5);
            margin: 50px auto;
            width: 90%;
            border: 2px solid #d1d5db;
            border-radius: 10px;
            display: flex;
            flex-direction: column; 
            align-items: flex-start; 
            gap: 15px;
        }

        .cadran-recap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
         .info-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-left:-10px;
            color: #5A189A
            }

            .info-container:hover{
                text-decoration:underline;
            }

            .icon-info {
            width: 16px;
            height: 20px;
            fill: currentColor;
            position: relative;
            margin-left:350px;
            top: 6px; 
            }

            .tooltip {
            display: none;
            position: absolute;
            bottom: 125%; /* place au-dessus */
            left: 50%;
            transition: opacity 0.2s ease;
            opacity: 0;
            transform: translateX(-50%);
            background-color: #333;
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            white-space: nowrap;
            font-size: 13px;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            pointer-events: none; /* pour éviter que tooltip gêne le hover */
            }

            .info-container:hover .tooltip,
            .info-container:focus-within .tooltip {
                 opacity: 1;
                 display: block;
            }




        .cadran-recap p {
            margin: 5px 0;
            color: #fff;
        }

        #modifierBtn {
            padding: 8px 16px;
            background-color:#495057;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        #modifierBtn:hover {
            background-color:#6c5d7c;
        }
.form-header {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 10px;
   
}

.zone-fermeture {
    position: absolute;
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 99;
    top: 120px;
}

.texte-fermer {
    position: relative;
    left: 100px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
}

.croix-fermer {
    position: absolute;
    left: 1150px;
    font-size: 25px;
    color: #fff;
    cursor: pointer;
    z-index: 99;
    transition: background-color 0.3s ease;
}

#formulaire-container form {
    margin: 20px auto;
    padding: 20px;
    max-width: 1200px; /* ← Augmenté ici */
    background-color: #f0f4ff;
    border-radius: 10px;
    border: 1px solid #ccd;
    display: grid;
    gap: 15px;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}



#formulaire-container input,
#formulaire-container select {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #bbb;
    font-size: 14px;
}

#formulaire-container button[type="submit"] {
    grid-column: 1 / -1;
    padding: 10px;
    background-color: #5b387e;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

#formulaire-container button[type="submit"]:hover {
    background-color: #6c5d7c;
}

.retour-lien-resultats{
    margin-top:-30px;
    margin-left:80px;
}
.retour-lien-resultats a{
    font-size:14px;
    font-weight:bold;
    text-decoration:none;
    color: #5A189A;
    
}
.retour-lien-resultats a:hover{
    text-decoration:underline;
}
        

.annulation-possible {
    display: flex;
    align-items: center;
    gap: 15px;
    background-color: rgba(76, 175, 80, 0.1); 
    border: 2px solid #4CAF50;
    border-radius: 10px;
    padding: 15px 20px;
    width: 750px;
    margin: 30px 70px auto;
}

.annulation-icone {
    flex-shrink:0;
    width: 28px;
    height: 28px;
}


.annulation-texte {
    font-size: 16px;
    color: #333;
    font-weight: bold;
}


.reservation-wrapper {
    display: flex;
    justify-content: space-between;
    align-items:flex-start;
    flex-wrap: nowrap;
    margin: 40px  60px;
    gap: 20px;
}
.reservation-form-card {
    background-color: #fff;
    border: 2px solid #d1d5db;
    border-radius: 10px;
    padding: 30px;
    margin: 0;
    width: 65%;
    flex:0 0 auto;
    max-width: none;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.tarif-card {
    background-color: #fff;
    border: 2px solid #d1d5db;
    border-radius: 10px;
    padding: 25px;
    width: 300px;
    max-width: 350px;
    color: #333;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 1000;
}



.tarif-card h3 {
  margin-bottom: 1rem;
  font-size: 1.4rem;
  background-color: rgba(0,0,0,0.05);
  padding:15px;
  width: 320px;
  margin-left:-25px ;
  padding-bottom: 6px;
}

.tarif-card p {
  font-size:14px;
  line-height: 1.5;
  margin: 12px 0;
}

.tarif-card strong {
  color: #555;
}

.tarif-card span {
  font-weight: 700;
  font-size: 1.15rem;
  color: #222;
}

.tarif-card hr {
  border: none;
  border-top: 1px solid #ddd;
  margin: 1rem 0;
}

.cadran {
  right: 50px;
  width: 320px;
  max-width: 350px;
  display: flex;
  flex-direction: column;
  gap: 20px;       
  z-index: 1000;
}

.annulation-image {
  width: 110%; /* occupe toute la largeur */
  height: auto;
  margin-top:-110px;
  border-radius: 8px;
  margin-bottom: 15px; /* espace sous l'image */
}


.excellent-choix {
 
    background-color: #fff;
    border: 2px solid #d1d5db;
    border-radius: 10px;
    padding: 25px;
    width: 300px;
    max-width: 350px;
    color: #333;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 999;
}

.excellent-choix ul {
  list-style: none;
  padding-left: 0;
}

.excellent-choix li {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
  font-weight: 500;
}

.annulation-icone {
  margin-right: 8px;
  flex-shrink: 0;
  width: 16px;
  height: 16px;
}


.vehicule-selectionne{
    z-index: 998;
    background-color: #fff;
    border: 2px solid #d1d5db;
    border-radius: 10px;
    padding: 25px;
    width: 300px;
    max-width: 350px;
    color: #333;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.vehicule-image {
  max-width: 100%;
  height: auto;
  margin-bottom: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
}

.programme-fidelite {
    margin-top: 10px;
    background-color: #fff;
    border: 2px solid #d1d5db;
    border-radius: 10px;
    padding: 25px;
    width: 300px;
    max-width: 350px;
    color: #333;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 1000;
}


.card-titre {
    font-size: 1.4em;
    color: rgba(0,0,0,0.5);
    margin-bottom: 25px;
    text-align: center;
}

.trait-separateur{
    border:none;
    height:4px;
    background-color:#5A189A;
    width: 100%;
    margin:10px 0 25px;
}
.reservation-form {
    display: flex;
    flex-direction: column;
    gap: 30px;
    
}

.reservation-form fieldset {
    border: none;
    padding: 0;
    display: flex;
    transition: border 0.3s ease;
    flex-direction: column;
    gap: 15px;
}


.reservation-form legend {
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
    font-size: 1.1em;
}

.reservation-form label {
    font-weight: 600;
    color: #444;
}

.reservation-form input,
.reservation-form textarea {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    width: 100%;
}

.paiement-securise {
   background-color: #fff;
    border: 2px solid #d1d5db;
    border-radius: 10px;
    padding: 30px;
    margin:-520px 60px auto;
    width: 59%;
    max-width: 800px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.checkbox-contenu {
    display: flex;
    flex-direction: column;
    gap: 30px;
    padding: 20px 10px;
   

}

.style-checkbox {
    position: relative;
    padding-left: 30px;
    cursor: pointer;
    font-size: 0.95em;
    color: #444;
    user-select: none;
    line-height: 1.4;
}

.style-checkbox a {
    color: #5A189A;
    text-decoration: underline;
}

.style-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

.checkmark {
    position: absolute;
    top: 2px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #eee;
    border: 2px solid #ccc;
    border-radius: 4px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.style-checkbox input:checked ~ .checkmark {
    background-color: #5A189A;
    border-color: #5A189A;
}

.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.style-checkbox input:checked ~ .checkmark:after {
    display: block;
}

.style-checkbox .checkmark:after {
    left: 5px;
    top: 0px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

.bouton-paiement {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.btn-payer {
    background-color: #5A189A;
    color: white;
    padding: 14px 28px;
    font-size: 1em;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-payer:hover {
    background-color: #4c1382;
    transform: scale(1.02);
}

.chargement {
    margin-left: 15px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #5A189A;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    animation: spin 0.8s linear infinite;
    align-self: center;
}

/*pour le chargement dans le bouton après la validation du formulaire*/
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}


/*section conditon d'annulation*/

/* Trait de séparation */
.section-annulation {
  background-color: #fff;
  border: 2px solid #d1d5db;
  border-radius: 10px;
  padding: 28px;
  margin: 10px 60px;
  width: 59%;
  max-width: 800px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.titre-annulation {
  font-size: 1.4em;
  color:rgba(0,0,0,0.5);
  text-align: center;
  cursor: pointer;
  transition: color 0.3s ease;
}

.trait-separateur {
  border: none;
  height: 4px;
  background-color: #5A189A;
  width: 100%;
  margin: 10px 0 25px;
}

.annulation {
  overflow: hidden;
  max-height: 0;
  opacity: 0;
  transition: max-height 0.4s ease, opacity 0.3s ease;
}

.section-annulation.active .annulation{
  max-height: 500px; /* ajuste selon ton contenu */
  opacity: 1;
}



.condition-annulation{
    margin-bottom:20px;
}
.condition-annulation p{
    font-size:14px;
    color:#555;
    line-height:1.5;
    margin:0;
}

.error-message {
    color: red;
    font-size: 0.9em;
    margin-top: 1px;
    display: block;
}

.footer {
    background-color: #f5f5f5; 
    padding: 30px 0;
    text-align: center;
    font-size: 14px;
    color: #333;
    font-weight: bold;
    margin-top: 60px;
    border-top: 4px solid #5A189A;
}




    </style>
</head>
<body>

<header>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 1L3 5v6c0 5.25 3.84 10.74 9 12 5.16-1.26 9-6.75 9-12V5l-9-4zM10.5 15.5l-3.5-3.5 1.42-1.42L10.5 12.67l4.58-4.59 1.42 1.42-6 6z"/>
    </svg>
    Paiement 100% sécurisé
</header>

<?php if ($date_reception && $date_restitution): ?>
    <div class="recap-section">
        <div id="recapitulatif" class="cadran-recap"
             data-date-reception="<?= date('Y-m-d', strtotime($date_reception)) ?>"
            data-date-restitution="<?= date('Y-m-d', strtotime($date_restitution)) ?>">
            <div>
                <p><strong><?= htmlspecialchars($vehicule_nom) ?></strong></p>


                <p>
                    <?= date('D d M Y', strtotime($date_reception)) ?> à <?= htmlspecialchars($heure_reception) ?>
                    → <?= date('D d M Y', strtotime($date_restitution)) ?> à <?= htmlspecialchars($heure_restitution) ?>
                </p>
            </div>

           <span class="info-container" tabindex="0">
                <svg class="icon-info"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                    <line x1="12" y1="8" x2="12" y2="12" stroke="currentColor" stroke-width="2" />
                    <circle cx="12" cy="16" r="1" fill="currentColor"/>
                </svg>
                <span>
                <strong> Vous devez récupérer la voiture à <?= htmlspecialchars($heure_restitution) ?></strong>
                </span>
                <div class="tooltip">
                    La voiture peut ne plus être disponible si vous arrivez après l’heure de prise en charge choisie.
                </div>
            </span>




            <button id="modifierBtn">Modifier</button>
        </div>
    </div>
<?php else: ?>
    <p style="color:red;">Les données de réservation sont manquantes.</p>
<?php endif; ?>

<!-- Formulaire masqué -->
<div id="formulaire-container" style="display: none;">
    <div class="zone-fermeture">
        <span class="texte-fermer">Modifier la recherche</span>
        <span id="fermerFormulaire" class="croix-fermer">&times;</span>
    </div>

    <form action="resultats.php" method="get">
        <input type="date"  name="date_reception" value="<?= $date_reception ?>" required>
        <input type="time" name="heure_reception" value="<?= $heure_reception ?>" required>
        <input type="date"  name="date_restitution" value="<?= $date_restitution ?>" required>
        <input type="time" name="heure_restitution" value="<?= $heure_restitution ?>" required>

        <select name="categorie" required>
            <option value="">Choisir une catégorie</option>
            <option value="Citadine" <?= $categorie === 'Citadine' ? 'selected' : '' ?>>Citadine</option>
            <option value="SUV" <?= $categorie === 'SUV' ? 'selected' : '' ?>>SUV</option>
            <option value="Premium" <?= $categorie === 'Premium' ? 'selected' : '' ?>>Premium</option>
            <option value="Utilitaire" <?= $categorie === 'Utilitaire' ? 'selected' : '' ?>>Utilitaire</option>
            <option value="Minibus" <?= $categorie === 'Minibus' ? 'selected' : '' ?>>Minibus</option>
        </select>

        <label>
            <input type="checkbox" name="permis" <?= $permis ? 'checked' : '' ?>> Permis valide
        </label>
        <label>
            <input type="checkbox" name="age_ok" <?= $age_ok ? 'checked' : '' ?>> Âge 21+
        </label>

        <button type="submit">Rechercher</button>
    </form>
</div>
    <div class="retour-lien-resultats">
        <a href="#" onclick="history.back();return false;">
             Revenir aux résultats de recherche
        </a>
    </div> 
    
    <div style="margin-left:80px; margin-top: -10px;">
    <p style=" font-size: 16px; color: #333;">Prochaine étape: Paiement</p>
    <div style="display: flex;margin-left:-5px ; gap: 10px; margin-top: 4px;">
        <div style="width: 400px; height: 2.5px; background-color: #5A189A;"></div>
        <div style="width: 380px; height: 2.5px; background-color:rgba(0,0,0,0.5);"></div>
    </div>
</div>
<div class="annulation-possible">
    <svg class="annulation-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" fill="#4CAF50"/>
        <path d="M9.5 12.5l2 2 4-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span class="annulation-texte">Annulation gratuite jusqu'à 48 heures à l'avance</span>
</div>

<div class="reservation-wrapper">
<div class="reservation-form-card">
    <h2 class="card-titre">COORDONNÉES DE RÉSERVATION</h2>
     <hr class="trait-separateur">
     <br>
     <br>
    <form action="paiement.php" method="post" class="reservation-form" id="form-reservation" novalidate>
        <!-- Section 1 : Vos données -->
        <fieldset>
            <legend>Vos données de réservation</legend>
            
            
            <br>
      
            <input type="hidden" name="date_reception" value="<?= htmlspecialchars($_GET['date_reception'] ?? '') ?>">
            <input type="hidden" name="heure_reception" value="<?= htmlspecialchars($_GET['heure_reception'] ?? '') ?>">

            <input type="hidden" name="date_restitution" value="<?= htmlspecialchars($_GET['date_restitution'] ?? '') ?>">
            <input type="hidden" name="heure_restitution" value="<?= htmlspecialchars($_GET['heure_restitution'] ?? '') ?>">

            <input type="hidden" name="categorie" value="<?= htmlspecialchars($_GET['categorie'] ?? '') ?>">
            <input type="hidden" name="permis" value="<?= isset($_GET['permis']) ? 'on' : '' ?>">
            <input type="hidden" name="age_ok" value="<?= isset($_GET['age_ok']) ? 'on' : '' ?>">


            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
             <span class="error-message" id="error-nom"></span>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
             <span class="error-message" id="error-prenom"></span>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <span class="error-message" id="error-email"><?= $erreurs['email'] ?? '' ?></span>
            
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required value="<?= htmlspecialchars($_POST['adresse'] ?? '') ?>">
            <span class="error-message" id="error-adresse"> </span>
        </fieldset>
          <br>
            
        <!-- Section 2 : Infos complémentaires -->
        <fieldset>
            <legend>Informations complémentaires</legend>
            <br>
            
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" required value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
             <span class="error-message" id="error-telephone"></span>

            <label for="remarques">Remarques :</label>
            <textarea id="remarques" name="remarques" rows="3" placeholder="Indiquez ici une demande spéciale, un message..."></textarea>
        </fieldset>
    </form>
</div>

 <div class="cadran">
    <img src="image/annulation.png" alt="Image annulation" class="annulation-image" />
 <div class="tarif-card">
    <h3>Détail du tarif de la location</h3>

    <p><strong>Montant de la location :</strong><br>
        <span id="montantLocation"><?= number_format($montant_vehicule, 2, ',', ' ') ?></span> DH / Jour
    </p>

    <p><strong>Nombre de jours :</strong> 
        <span id="nbJours"><?= isset($nb_jours) ? $nb_jours : '--' ?></span>
    </p>

    <hr>

    <p><strong>Total TTC :</strong> 
        <span id="totalTTC"><?= isset($total_ttc) ? number_format($total_ttc, 2, ',', ' ') : '--' ?></span> 
    </p>
</div>

<div class="excellent-choix">
    <h3 style="background-color: rgba(0,0,0,0.05);padding:15px;width: 320px;  margin-left:-25px ;">Excellent choix !</h3>
    <ul>
      <li><svg class="annulation-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#4CAF50"/><path d="M9.5 12.5l2 2 4-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Politique de carburant avantageuse</li>
      <li><svg class="annulation-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#4CAF50"/><path d="M9.5 12.5l2 2 4-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Courte file d'attente</li>
      <li><svg class="annulation-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#4CAF50"/><path d="M9.5 12.5l2 2 4-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Comptoir facile à trouver</li>
      <li><svg class="annulation-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#4CAF50"/><path d="M9.5 12.5l2 2 4-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Personnel de guichet serviable</li>
      <li><svg class="annulation-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="#4CAF50"/><path d="M9.5 12.5l2 2 4-4" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Voitures en bon état</li>
    </ul>
</div>

 <?php if ($vehicule_infos): ?>
<div class="vehicule-selectionne">
  <h3 style="  background-color: rgba(0,0,0,0.05); margin-left:-25px ;
  padding:15px;width: 320px;"> Véhicule sélectionné</h3>
  <img src="<?= htmlspecialchars($vehicule_infos['image_url']) ?>" alt="Image du véhicule" class="vehicule-image">
  <p><strong>Modèle :</strong> <?= htmlspecialchars($vehicule_infos['nom']) ?></p>
  <p><strong>Prix / jour :</strong> <?= number_format($vehicule_infos['prix_jour'], 2, ',', ' ') ?> DH</p>
</div>

<div class="programme-fidelite">
  <h3 style="background-color: rgba(0,0,0,0.05);padding:15px;width: 320px;  margin-left:-25px ;">Cette réservation compte !</h3>
  <p style="font-size:14px;">Chaque réservation honorée contribue à votre progression pour obtenir la carte spéciale client <strong>SG CARTE</strong>.</p><br>
  <hr>
  <p>Le programme de fidélité de SG CAR</p>
</div>
<?php endif; ?>
</div>
</div>





<div class="paiement-securise">
    <h2 class="card-titre">PAIEMENT SÉCURISÉ</h2>
    <hr class="trait-separateur">

    <div class="checkbox-contenu">
        <label class="style-checkbox">
            <input type="checkbox" name="terms" id="terms" required form="form-reservation" >
            <span class="checkmark"></span>
             J’atteste avoir lu et accepté  <a href="#">les Conditions Générales de Location</a> de SG CAR.
        </label>
        <span class="error-message" id="error-terms"></span>


        <label class="style-checkbox">
            <input type="checkbox" name="newsletter">
            <span class="checkmark"></span>
            Je souhaite recevoir les offres promotionnelles, les nouveautés ainsi que les actualités de SG CAR.
        </label>
    </div>
    <!-- Bouton Valider et payer maintenant -->
<div class="bouton-paiement">
    <button type="submit" class="btn-payer" id="btnPayer" form="form-reservation">VALIDER ET PAYER MAINTENANT</button>
    <div id="chargement" class="chargement" style="display: none;"></div>
</div>

</div>

<div class="section-annulation ">
   <h2 class="card-titre titre-annulation">CONDITIONS D'ANNULATION</h2>
   <hr class="trait-separateur">

   <div class="annulation">
     <div class="condition-annulation">
        <p>
            Vous pouvez annuler votre réservation sans frais jusqu'à 48 heures avant la date prévue d'arrivée.
            En cas d'annulation effectuéé moins de 48h avant la date entraîne des frais équivalents à 50% du montant total.
            En cas de non-présent  tion, aucun remboursement ne sera effectué.

        </p>

     </div>

   </div>
</div>





<footer class="footer">
    &copy; 2025 SG Car | Tous droits réservés
</footer>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById('form-reservation');
  const chargement = document.getElementById('chargement');

  // Gestion affichage formulaire
  const recap = document.getElementById("recapitulatif");
  const formContainer = document.getElementById("formulaire-container");
  const btnModifier = document.getElementById("modifierBtn");
  const btnFermer = document.getElementById("fermerFormulaire");

  if (recap && formContainer) {
    recap.style.display = "flex";
    formContainer.style.display = "none";

    btnModifier?.addEventListener("click", () => {
      recap.style.display = "none";
      formContainer.style.display = "block";
    });

    btnFermer?.addEventListener("click", () => {
      recap.style.display = "flex";
      formContainer.style.display = "none";
    });
  }

  // Cacher erreurs en tapant
  form.querySelectorAll('input, select, textarea').forEach(field => {
    field.addEventListener('input', () => {
      const errorSpan = document.getElementById('error-' + field.id);
      if (errorSpan) errorSpan.textContent = '';
    });
  });

  // Calcul total TTC
  const nbJoursSpan = document.getElementById("nbJours");
  const totalTTCSpan = document.getElementById("totalTTC");
  const tarifParJour = <?= json_encode($montant_vehicule) ?>;

  if (recap && nbJoursSpan && totalTTCSpan) {
    const dateReceptionStr = recap.getAttribute("data-date-reception");
    const dateRestitutionStr = recap.getAttribute("data-date-restitution");
    const dateReception = new Date(dateReceptionStr + "T00:00:00");
    const dateRestitution = new Date(dateRestitutionStr + "T00:00:00");

    if (!isNaN(dateReception) && !isNaN(dateRestitution)) {
      const diffMs = dateRestitution - dateReception;
      const diffJours = Math.ceil(diffMs / (1000 * 60 * 60 * 24));
      if (diffJours > 0) {
        nbJoursSpan.textContent = diffJours;
        const total = diffJours * tarifParJour;
        totalTTCSpan.textContent = total.toFixed(2).replace(".", ",") + " DH";
      } else {
        nbJoursSpan.textContent = "--";
        totalTTCSpan.textContent = "--";
      }
    }
  }

  // Validation du formulaire
  form.addEventListener('submit', function (e) {
    let hasError = false;

    // Réinitialise tous les messages
    document.querySelectorAll('.error-message').forEach(span => span.textContent = '');

    const nom = document.getElementById('nom');
    const prenom = document.getElementById('prenom');
    const email = document.getElementById('email');
    const adresse = document.getElementById('adresse');
    const telephone = document.getElementById('telephone');
    const terms = document.getElementById('terms');

    const phpEmailError = document.getElementById('error-email')?.textContent.trim();

    if (!nom.value.trim()) {
      document.getElementById('error-nom').textContent = 'Veuillez entrer votre nom.';
      hasError = true;
    }

    if (!prenom.value.trim()) {
      document.getElementById('error-prenom').textContent = 'Veuillez entrer votre prénom.';
      hasError = true;
    }

    if (!email.value.trim() || !email.value.match(/^[^@\s]+@[^@\s]+\.[^@\s]+$/)) {
      if (!phpEmailError) {
        document.getElementById('error-email').textContent = 'Veuillez entrer une adresse email valide.';
      }
      hasError = true;
    }

    if (!adresse.value.trim()) {
      document.getElementById('error-adresse').textContent = 'Veuillez entrer votre adresse.';
      hasError = true;
    }

    if (!telephone.value.trim() || !telephone.value.match(/^[0-9\s+().-]{6,}$/)) {
      document.getElementById('error-telephone').textContent = 'Veuillez entrer un numéro de téléphone valide.';
      hasError = true;
    }

    if (!terms.checked) {
      document.getElementById('error-terms').textContent = 'Vous devez accepter les Conditions Générales de Location.';
      hasError = true;
    }

    if (hasError) {
      e.preventDefault();
    } else {
      chargement.style.display = 'block';
    }
  });
});

</script>

</body>
</html>
