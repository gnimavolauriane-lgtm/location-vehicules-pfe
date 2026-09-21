<?php
session_start();
require_once "configuration.php";
var_dump($_SESSION['date_reception'], $_SESSION['date_restitution']);


// Vérifier que les données de session existent
if (!isset($_SESSION['date_reception'], $_SESSION['heure_reception'], $_SESSION['date_restitution'], $_SESSION['heure_restitution'], $_SESSION['categorie'])) {
    die("Erreur : Données de réservation manquantes.");
}

// Récupérer les données de session
$date_reception = $_SESSION['date_reception'];
$heure_reception = $_SESSION['heure_reception'];
$date_restitution = $_SESSION['date_restitution'];
$heure_restitution = $_SESSION['heure_restitution'];
$categorie = $_SESSION['categorie'];
$permis = $_SESSION['permis'] === 'on' ? 1 : 0;
$age_ok = $_SESSION['age_ok'] === 'on' ? 1 : 0;
$commande = $_SESSION['commande'] ?? null;

function formatDateForMySQL(?string $dateStr, string $inputFormat = 'd-m-Y'): ?string {
    if (!$dateStr) return null;
    
    $dateObj = DateTime::createFromFormat($inputFormat, $dateStr);
    if ($dateObj && $dateObj->format($inputFormat) === $dateStr) {
        return $dateObj->format('Y-m-d');
    }

    // Optionnel : en cas d'erreur, tu peux logger ou afficher un message
    // error_log("Date invalide : $dateStr");

    return null;
}

// Utilisation
$date_reception = formatDateForMySQL($_SESSION['date_reception'] ?? '', 'Y-m-d');
$date_restitution = formatDateForMySQL($_SESSION['date_restitution'] ?? '', 'Y-m-d');




// Récupérer les données du formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$remarques = $_POST['remarques'] ?? '';
$newsletter = isset($_POST['newsletter']) ? 1 : 0;
$terms = isset($_POST['terms']) ? 1 : 0;


// Validation minimale
$errors = [];
if (!$terms) {
    $errors['terms'] = "Vous devez accepter les conditions.";
}
if (empty($nom) || empty($prenom) || empty($email) || empty($adresse) || empty($telephone)) {
    $errors['form'] = "Tous les champs obligatoires doivent être remplis.";
}
if (!$date_reception || !$date_restitution) {
    $errors['dates'] = "Format de date invalide.";
}

if (!empty($errors)) {
    echo "<pre>";
    print_r($errors);
    echo "</pre>";
    exit;
}

//  Debug
//var_dump($date_reception, $heure_reception, $date_restitution, $heure_restitution);

// Récupération du nom du véhicule depuis la session
$vehicule_nom = $_SESSION['vehicule_nom'] ?? 'Non précisé';
$sql = "SELECT COUNT(*) FROM reservations WHERE vehicule_id = :vehicule_id 
        AND statut IN ('valide', 'en_cours')
        AND date_fin >= :date_debut
        AND date_debut <= :date_fin";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':vehicule_id' => $vehicule_infos['id'],
    ':date_debut' => $date_reception,
    ':date_fin' => $date_restitution
]);
$dejaReserve = $stmt->fetchColumn();

if ($dejaReserve > 0) {
    die("Désolé, ce véhicule est déjà réservé à ces dates.");
}

// Insertion en base
$sql = "INSERT INTO reservations (
    nom, prenom, email, adresse, telephone, remarques, newsletter,
    permis, age_ok, categorie, date_debut, heure_debut, date_fin, heure_fin,
    vehicule_id, statut, frais_retard, caisse_id, vehicule_nom
) VALUES (
    :nom, :prenom, :email, :adresse, :telephone, :remarques, :newsletter,
    :permis, :age_ok, :categorie, :date_debut, :heure_debut, :date_fin, :heure_fin,
    :vehicule_id, :statut, :frais_retard, :caisse_id, :vehicule_nom
)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':email' => $email,
    ':adresse' => $adresse,
    ':telephone' => $telephone,
    ':remarques' => $remarques,
    ':newsletter' => $newsletter,
    ':permis' => $permis,
    ':age_ok' => $age_ok,
    ':categorie' => $categorie,
    ':date_debut' => $date_reception,
    ':heure_debut' => $heure_reception,
    ':date_fin' => $date_restitution,
    ':heure_fin' => $heure_restitution,
    ':vehicule_id' => $vehicule_infos['id'] ?? null,
    ':statut' => 'en_cours',
    ':frais_retard' => 0.00,   // Par défaut 0.00
    ':caisse_id' => null,  
    ':vehicule_nom'=> $vehicule_nom  
]);



$_SESSION['client'] = [
    'nom' => trim("$nom $prenom"),
    'adresse' => $adresse,
    'telephone' => $telephone,
    'email' => $email
];

// Exemple si le montant total est passé en session
$montant_total = $_SESSION['montant_total'] ?? 0;

// Ou si tu le récupères via GET (moins sûr, attention à la validation)
$montant_total = isset($_GET['montant_total']) ? floatval($_GET['montant_total']) : 0;

// Puis tu peux initialiser ta commande avec ce montant
if (!isset($_SESSION['commande']) && isset($_SESSION['vehicule_nom']) && $montant_total > 0) {
    $_SESSION['commande'] = [
        'identifiant' => uniqid('CMD-'),
        'articles' => [
            [
                'code' => 'cmmd',
                'id' => rand(100, 999),
                'description' => $_SESSION['vehicule_nom'],
                'montant' => $montant_total,
            ]
        ],
        'total' => $montant_total
    ];
}


// 2. Définir dynamiquement les données du marchand
if (!isset($_SESSION['marchand'])) {
    $_SESSION['marchand'] = [
        'nom' => 'STARC',
        'id' => '600000351'
    ];
}

// 3. Extraire les sessions
$commande = $_SESSION['commande'] ?? null;
$marchand = $_SESSION['marchand'] ?? null;
$client = $_SESSION['client'] ?? null;
?>

<?php
// Garder l'originale pour l'affichage
$original_date = $_SESSION['date_reception'] ?? '';
$original_heure = $_SESSION['heure_reception'] ?? '';

$datetime = DateTime::createFromFormat('Y-m-d H:i', "$original_date $original_heure");

if ($datetime !== false) {
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    $date_formatee = strftime('%A, %d %B %Y', $datetime->getTimestamp());
    $date_formatee = ucfirst($date_formatee);
    $heure_formatee = $datetime->format('H\hi');

    
} else {
    echo "<p class='error'>Date de réservation invalide.</p>";
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Demande de paiement</title>
    <style>
    .titre-paiement {
    text-align: center;
    color: #c0392b; 
    font-size: 2em;
    font-weight: 600;
    margin-bottom: 0.5em;
    font-family: 'Segoe UI', sans-serif;
    letter-spacing: 1px;
}

.trait-rouge {
    border: none;
    height: 4px;
    background: linear-gradient(to right, #ff4d4d, #ff9999);
    width:  80%;
    margin: 0 auto 2em auto;
    border-radius: 2px;
}

#mode_paiement {
  width: 425px;
}

.paiement-container {
    display: flex;
    align-items: flex-start;
    gap:40px;
    margin-right: 100px;
    
}

.left-panel{
     flex: 1;
     max-width: 100%;
}

.bloc-paiement {
    background-color: #fff6f6;
    border-left: 5px solid #ff4d4d;
    padding: 3em;
    margin-top:15px;
    width: 400px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.bloc-paiement h3 {
    margin-top: 0;
    color: #c0392b;
    font-size: 1.4em;
}

.date-info {
    font-size: 0.95em;
    margin-bottom: 1.5em;
    color: #555;
}

.form-paiement label {
    display: block;
    margin-top: 1em;
    font-weight: bold;
    color: #333;
}

.form-paiement input[type="text"],
.form-paiement select {
    width: 100%;
    padding: 1em;
    margin-top: 0.3em;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.row {
    display: flex;
    flex-wrap:wrap;
    gap:1em;
    margin-top: 1em;
    align-items:flex-start;
}

.col {
   flex:1;
   min-width:180px;
   display:flex;
   width: 50%;
   flex-direction:column;
}

.expiration {
    display: flex;
    gap: 0.5em;
   
}

.checkbox-container {
    display: flex;
    align-items: center;
    margin-top: 1.5em;
    font-size: 0.9em;
    color: #333;
}

.checkbox-container input {
    margin-right: 0.5em;
}

.confidentialite {
    margin-top: 3em;
    font-size: 0.85em;
    color: #888;
    font-style: italic;
}

.tooltip {
    font-size: 0.85em;
    color: #aaa;
    cursor: help;
}

/* les cadrans de droite */
.right-panel {
  width: 40%;
  top:-50px;
  align-self:flex-start;
  padding: 10px;
  background-color: #fdfdfd;
}

.card-box {
  border: 1px solid #e5e5e5;
  padding: 20px;
  margin-bottom: 20px;
  border-radius: 10px;
  background-color: #fff8f8;
  box-shadow: 0 4px 8px rgba(200, 0, 0, 0.05);
}

.card-box h3 {
  margin-top: 0;
  font-size: 1.2rem;
  color: #cc0000;
  border-bottom: 2px solid #ff4d4d;
  padding-bottom: 5px;
  margin-bottom: 15px;
}

.commande-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
  font-size: 0.95rem;
}

.commande-table th,
.commande-table td {
  padding: 8px;
  border: 1px solid #ddd;
  text-align: left;
}

.commande-table th {
  background-color: #ffe5e5;
  color: #cc0000;
}

.total {
  text-align: right;
  font-weight: bold;
  margin-top: 10px;
  color: #000;
}

.boutons-paiement {
    display: flex;
    justify-content: space-between;
    gap: 1em;
    padding-top: 10px;
    margin-left: 10px;
    width: 450px; 
}

.btn-valider,
.btn-annuler {
    flex: 1;
    padding: 0.9em;
    font-size: 1em;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn-valider {
    background-color: #27ae60;
    color: white;
}

.btn-valider:hover {
    background-color: #219150;
}

.btn-annuler {
    background-color: #ff4d4d;
    color: #2c3e50;
}

.btn-annuler:hover {
    background-color:rgb(203, 121, 121);
}


.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.6);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    width: 400px;
    max-width: 90%;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    text-align: center;
}

.modal-content img {
    border-radius: 4px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 24px;
    cursor: pointer;
}
.close:hover {
    color: #333;
}

.erreur-message {
    color: #c0392b;
    font-size: 0.85em;
    margin-top: 0.3em;
}
/* cacher les champs cartes quand le client choisis paypal*/
.carte-champs {
  display: none;
}


.trait-rouge-bas {
    border: none;
    height: 3px;
    background: linear-gradient(to right, #ff4d4d, #ff9999);
    width:  82%;
    margin: 50px auto 2em auto;
    border-radius: 2px;
}

.footer{
    margin-top: -20px;
    font-size: 0.85em;
    color: #888;
    margin-left:120px;
    font-style: italic;
}


    </style>
</head>
<body>

    <h2 class="titre-paiement">Demande de paiement</h2>
    <hr class="trait-rouge">
    
    <div class="paiement-container">
    <div class="left-panel"></div>   
    <div class="bloc-paiement">
        <h3>Détail de Paiement</h3>
        <p class="date-info">🗓️ <?= $date_formatee ?> à <?= $heure_formatee ?></p>

        <form class="form-paiement" id="form-paiement" method="POST" action="paiement_traitement.php" novalidate>
            <input type="hidden" name="montant" id="montant" value="<?= htmlspecialchars($commande['total']) ?>">

            <label for="mode_paiement">Mode de paiement</label>
            <select id="mode_paiement" name="mode_paiement" class="mode_paiement">
                <option value="carte" selected>Carte bancaire</option>
                <option value="paypal">PayPal</option>
            </select>
            <div id="erreur-mode_paiement" class="erreur-message"></div>

            <label for="nom_carte">Nom du porteur de la carte</label>
            <input type="text" id="nom_carte" name="nom_carte" placeholder="Jean Dupont">
            <div id="erreur-nom_carte" class="erreur-message"></div>

            <label for="numero_carte">Numéro de carte de paiement</label>
            <input type="text" id="numero_carte" name="numero_carte" placeholder="1234 5678 9012 3456" maxlength="19">
            <div id="erreur-numero_carte" class="erreur-message"></div>
            

            <div class="row carte-champs">
                <div class="col">
                    <label for="mois_exp">Date d'expiration</label>
                    <div class="expiration">
                        <select id="mois_exp" name="mois_exp">
                            <option>01</option><option>02</option><option>03</option><option>04</option>
                            <option>05</option><option>06</option><option>07</option><option>08</option>
                            <option>09</option><option>10</option><option>11</option><option>12</option>
                        </select>
                        <select id="annee_exp" name="annee_exp">
                            <option>2025</option><option>2026</option><option>2027</option><option>2028</option>
                        </select>
                    </div>
                    <div id="erreur-expiration" class="erreur-message"></div>
                </div>

                <div class="col">
                    <label for="cvv">Code de vérification <span class="tooltip" onclick="openCvvModal()">(?)</span></label>
                    <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="4">
                    <div id="erreur-cvv" class="erreur-message"></div>
                </div>
                </div>

           

            <label class="checkbox-container">
                <input type="checkbox" required>
                <span class="checkmark"></span>
                J’accepte les conditions générales d’utilisation du service
            </label>
            <div id="erreur-checkmark" class="erreur-message"></div>

            <p class="confidentialite">🔒 Les informations sur le paiement resteront strictement confidentielles.</p>
        </form>
</div>



<div class="right-panel">
    <!-- Détail de la commande -->
     <?php if ($commande): ?>
    <div class="card-box">
        <h3>Détail de la commande</h3>
        <p><strong>Identifiant :</strong> <?= htmlspecialchars($commande['identifiant']) ?></p>
        <table class="commande-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Id</th>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commande['articles'] as $article): ?>
                    <tr>
                        <td><?= htmlspecialchars($article['code']) ?></td>
                        <td><?= htmlspecialchars($article['id']) ?></td>
                        <td><?= htmlspecialchars($article['description']) ?></td>
                        <td><?= number_format($article['montant'], 2, ',', ' ') ?> MAD</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="total">
            <strong>Total :</strong> <?= number_format($commande['total'], 2, ',', ' ') ?> MAD
        </div>
    </div>
   
    <?php else: ?>
    <p style="color:red; font-weight:bold;">Erreur : commande non disponible.</p>
<?php endif; ?>

    <!-- Détail Marchand -->
    <div class="card-box">
        <h3>Détail Marchand</h3>
        <p><strong>Nom du marchand :</strong> <?= htmlspecialchars($marchand['nom']) ?> (<?= htmlspecialchars($marchand['id']) ?>)</p>
    </div>

    <!-- Informations du Client -->
    <div class="card-box">
        <h3>Informations du Client</h3>
        <p><strong>Nom :</strong> <?= htmlspecialchars($client['nom']) ?></p>
        <p><strong>Adresse :</strong> <?= nl2br(htmlspecialchars($client['adresse'])) ?></p>
        <p><strong>Tél :</strong> <?= htmlspecialchars($client['telephone']) ?></p>
        <p><strong>E-mail :</strong> <?= htmlspecialchars($client['email']) ?></p>
    </div>
    <div class="boutons-paiement">
        <button type="submit" form="form-paiement" class="btn-valider">Valider</button>
        <button type="button" onclick="window.location.href='identification.php'" class="btn-annuler">Annuler</button>
</div>
</div>


</div>


    
<div id="cvvModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCvvModal()">&times;</span>
        <img src="image/img.jpg" alt="Explication du code CVV" style="max-width: 100%;">
    </div>
</div>

<hr class="trait-rouge-bas">
  <p class="footer">&copy; 2025 SG Car | Tous droits réservés</p>
    

<script>
function openCvvModal() {
    document.getElementById("cvvModal").style.display = "block";
}

function closeCvvModal() {
    document.getElementById("cvvModal").style.display = "none";
}

// Fermer en cliquant en dehors du modal
window.onclick = function(event) {
    const modal = document.getElementById("cvvModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}


// Gestion de l'affichage des champs carte selon mode paiement
document.getElementById("mode_paiement").addEventListener("change", function() {
    const mode = this.value;
    const champsCarte = document.querySelectorAll(".carte-champs");

    if (mode === "carte") {
        champsCarte.forEach(el => el.style.display = "block");
    } else {
        champsCarte.forEach(el => el.style.display = "none");
    }
});

// Déclenchement au chargement pour appliquer l'état correct
window.addEventListener("DOMContentLoaded", () => {
    const select = document.getElementById("mode_paiement");
    const event = new Event("change");
    select.dispatchEvent(event);
});

// Gestion du submit du formulaire
document.getElementById("form-paiement").addEventListener("submit", async function(event) {
    event.preventDefault(); // Empêche rechargement automatique

    let erreurs = 0;

    // Réinitialisation des messages d’erreur
    document.querySelectorAll('.erreur-message').forEach(el => el.textContent = '');

    const modePaiement = document.getElementById("mode_paiement").value;

    if (!modePaiement) {
        document.getElementById("erreur-mode_paiement").textContent = "Veuillez sélectionner un mode de paiement.";
        erreurs++;
    }

    if (modePaiement === "carte") {
        const nomCarte = document.getElementById("nom_carte").value.trim();
        const numeroCarte = document.getElementById("numero_carte").value.replace(/\s/g, '');
        const mois = document.getElementById("mois_exp").value;
        const annee = document.getElementById("annee_exp").value;
        const cvv = document.getElementById("cvv").value.trim();
        

        if (nomCarte === "") {
            document.getElementById("erreur-nom_carte").textContent = "Veuillez entrer le nom du porteur.";
            erreurs++;
        }
        if (!/^\d{16}$/.test(numeroCarte)) {
            document.getElementById("erreur-numero_carte").textContent = "Numéro de carte invalide (16 chiffres).";
            erreurs++;
        }
        if (!mois || !annee) {
            document.getElementById("erreur-expiration").textContent = "Veuillez compléter la date d'expiration.";
            erreurs++;
        } else {
            const now = new Date();
            const expiration = new Date(annee, mois - 1, 1);
            const currentMonth = new Date(now.getFullYear(), now.getMonth(), 1);
            if (expiration < currentMonth) {
                document.getElementById("erreur-expiration").textContent = "Date d'expiration invalide.";
                erreurs++;
            }
        }
        if (!/^\d{3,4}$/.test(cvv)) {
            document.getElementById("erreur-cvv").textContent = "Code CVV invalide.";
            erreurs++;
        }
    }

    const conditions = document.querySelector(".checkbox-container input[type='checkbox']");
    if (!conditions.checked) {
        alert("Vous devez accepter les conditions d’utilisation.");
        erreurs++;
    }

    if (erreurs > 0) return;
    

    if (modePaiement === "paypal") {
         const montant = document.getElementById("montant").value || "10.00"; // fallback
         const nom = document.getElementById("nom_carte").value || "Client PayPal";

        try {
            const response = await fetch("paiement_traitement.php", {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: new URLSearchParams({
                    mode_paiement: "paypal",
                    montant: montant,
                    nom_carte: nom,
                    nom: "<?= addslashes($nom) ?>",
                    prenom: "<?= addslashes($prenom) ?>",
                    email: "<?= addslashes($email) ?>",
                    adresse: "<?= addslashes($adresse) ?>",
                    telephone: "<?= addslashes($telephone) ?>"
                })
            });

            const result = await response.json();
            console.log("Réponse JSON du serveur :", result);
            if (!result.transaction_id) {
                alert("Erreur : Transaction non enregistrée. Veuillez réessayer.");
                return;
            }

            const transactionId = result.transaction_id;

            // Création du formulaire vers PayPal
            const formPaypal = document.createElement("form");
            formPaypal.method = "POST";
            formPaypal.action = "https://www.sandbox.paypal.com/cgi-bin/webscr";

            const inputs = {
                cmd: "_xclick",
                business: "sb-9jbgu43463559@business.example.com", 
                item_name: "Commande en ligne",
                amount: montant,
                currency_code: "USD",
                return: "https://75cb-105-76-185-91.ngrok-free.app/PFE1/facture.php?transaction_id=" + transactionId,
                cancel_return: "https://75cb-105-76-185-91.ngrok-free.app/PFE1/facture.php?cancel=true"
            };

            for (let name in inputs) {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = name;
                input.value = inputs[name];
                formPaypal.appendChild(input);
            }

            document.body.appendChild(formPaypal);
            formPaypal.submit();

        } catch (err) {
            console.error("Erreur réseau ou serveur :", err);
            alert("Une erreur est survenue pendant la communication avec le serveur. Veuillez réessayer.");
        }

        return;
    }


    // Pour le mode carte, soumettre normalement le formulaire
     // Pour le paiement par carte : envoyer aussi vers paiement_traitement.php en AJAX
    try {
        const montant = document.getElementById("montant").value || "10.00";
        const nom = document.getElementById("nom_carte").value || "Client Carte";

        const response = await fetch("paiement_traitement.php", {
            method: "POST",
            headers: {
                'Accept': 'application/json',
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                mode_paiement: "carte",
                montant: montant,
                nom_carte: nom,
                nom: "<?= addslashes($nom) ?>",
                prenom: "<?= addslashes($prenom) ?>",
                email: "<?= addslashes($email) ?>",
                adresse: "<?= addslashes($adresse) ?>",
                telephone: "<?= addslashes($telephone) ?>"
            })
        });

        const result = await response.json();

        if (!result.transaction_id) {
            alert("Erreur : transaction non enregistrée. Veuillez réessayer.");
            return;
        }

        // Rediriger vers la facture une fois l’enregistrement fait
        window.location.href = "facture.php?transaction_id=" + encodeURIComponent(result.transaction_id);

    } catch (err) {
        console.error("Erreur lors du paiement par carte :", err);
        alert("Une erreur est survenue lors de l'enregistrement. Veuillez réessayer.");
    }

});


</script>

</body>
</html>

