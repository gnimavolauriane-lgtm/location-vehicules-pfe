<?php
include('../configuration.php');


// Exemple : récupère uniquement ce que tu as dans le formulaire
$type = $_POST['type'];
$montant = $_POST['montant'];
$description = $_POST['motif'] ?? '';
$nom_carte = $_POST['nom_carte'] ?? '';
$mode_paiement = $_POST['mode_paiement'] ?? '';

// Pas besoin d'id_reservation si tu ne l'utilises pas ici

// Insertion dans la table caisse
$query = $pdo->prepare("INSERT INTO caisse (type, montant, description, nom_carte, mode_paiement) 
VALUES (:type, :montant, :description, :nom_carte, :mode_paiement)");

$query->execute([
    ':type' => $type,
    ':montant' => $montant,
    ':description' => $description,
    ':nom_carte' => $nom_carte,
    ':mode_paiement' => $mode_paiement,
]);

header('Location: caisse.php');
exit();
