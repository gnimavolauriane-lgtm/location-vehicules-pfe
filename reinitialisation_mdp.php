<?php

require_once "configuration.php";



// Vérifier que le token est fourni
if (!isset($_GET['token']) || empty($_GET['token'])) {
    die("Token invalide");
}

$token = $_GET['token'];

// Récupérer le token sans filtrer la dateExpiration dans la requête SQL
$stmt = $pdo->prepare("SELECT client_id, dateExpiration FROM souvenir WHERE token = ? AND type = 'mdp_oublie'");
$stmt->execute([$token]);
$souvenir = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$souvenir) {
    die("Token invalide ou introuvable");
}


// Comparaison en PHP pour vérifier si le token est expiré
if (strtotime($souvenir['dateExpiration']) <= time()) {
    die("Token expiré");
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="reinitialisation.css"> <!-- Réutilise ton style existant -->
</head>
<body>

<?php include('entete.php'); ?>

<div class="connexion">
    <div class="connecter">
        <div class="connexion1-contenu">
            <h2>Réinitialisation du mot de passe</h2>
            <p style="margin: 10px 0 20px 0;">Saisissez un nouveau mot de passe pour votre compte SG CAR</p>

            <form action="traiterRéinitialisation_mdp.php" method="POST" id="formReinitialisation">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

                <input type="password" name="motdepasse" id="motdepasse" placeholder="Nouveau mot de passe" required minlength="8">
                <span class="messageErreur" id="erreur-mdp"></span>

                <input type="password" name="confirmation" id="confirmation" placeholder="Confirmer le mot de passe" required>
                <span class="messageErreur" id="erreur-confirmation"></span>

                <button type="submit" id="btn-reinit">Réinitialiser</button>
            </form>
        </div>
    </div>
</div>


<script>
document.getElementById("btn-reinit").addEventListener("click", function(e) {
    e.preventDefault();

    const mdp = document.getElementById("motdepasse").value.trim();
    const confirmation = document.getElementById("confirmation").value.trim();

    let valid = true;

    // Réinitialiser les messages d’erreur
    document.getElementById("erreur-mdp").textContent = "";
    document.getElementById("erreur-confirmation").textContent = "";

    // Vérifier si les champs sont vides
    if (!mdp) {
        document.getElementById("erreur-mdp").textContent = "Veuillez saisir un nouveau mot de passe.";
        valid = false;
    } else if (mdp.length < 8) {
        // Vérifier la longueur du mot de passe seulement si rempli
        document.getElementById("erreur-mdp").textContent = " mot de passe invalide.";
        valid = false;
    }

    if (!confirmation) {
        document.getElementById("erreur-confirmation").textContent = "Veuillez confirmer votre mot de passe.";
        valid = false;
    } else if (mdp !== confirmation) {
        // Vérifier la correspondance uniquement si confirmation remplie
        document.getElementById("erreur-confirmation").textContent = "Les mots de passe ne correspondent pas.";
        valid = false;
    }

    if (valid) {
        document.getElementById("formReinitialisation").submit();
    }
});

</script>



<footer class="footer">
    &copy; 2025 SG Car | Tous droits réservés
</footer>

<?php include('langue.php'); ?>
</body>
</html>
