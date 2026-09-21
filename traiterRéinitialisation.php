<?php
require_once "configuration.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $mdp = $_POST['motdepasse'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';

    if (strlen($mdp) < 8 || $mdp !== $confirmation) {
        header("Location: reinitialiser_mdp.php?token=$token&erreur=validation");
        exit;
    }

    $stmt = $pdo->prepare("SELECT client_id FROM souvenir WHERE token = ? AND type = 'mdp_oublie' AND dateExpiration > NOW()");
    $stmt->execute([$token]);
    $souvenir = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$souvenir) {
        header("Location: connexion.php?mdp=token_expire");
        exit;
    }

    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

    // Mettre à jour le mot de passe
    $stmt = $pdo->prepare("UPDATE client SET motdepasse = ? WHERE id = ?");
    $stmt->execute([$mdpHash, $souvenir['client_id']]);

    // Supprimer le token
    $stmt = $pdo->prepare("DELETE FROM souvenir WHERE token = ?");
    $stmt->execute([$token]);

    // Rediriger avec message de succès
    header("Location: connexion.php?mdp=modifie_ok");
    exit;
}