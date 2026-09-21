<?php
require_once "configuration.php";
session_start();

if (!isset($_SESSION['client_id'])) {
    header('Location: resultats.php');
    exit;
}

$vehicule_nom = $_GET['vehicule_nom'] ?? '';
$montant = $_GET['montant_vehicule'] ?? '';

// Vérifier que les dates et heures sont en session
if (empty($_SESSION['date_reception']) || empty($_SESSION['heure_reception']) || empty($_SESSION['date_restitution']) || empty($_SESSION['heure_restitution'])) {
    $_SESSION['error'] = "Veuillez sélectionner les dates et heures de réservation.";
    header('Location: choix_vehicule.php');
    exit;
}

$date_debut = $_SESSION['date_reception'] . ' ' . $_SESSION['heure_reception'] . ':00';
$date_fin = $_SESSION['date_restitution'] . ' ' . $_SESSION['heure_restitution'] . ':00';

// Récupérer infos du véhicule
$stmt = $pdo->prepare("SELECT * FROM vehicules WHERE nom = :nom LIMIT 1");
$stmt->execute([':nom' => $vehicule_nom]);
$vehicule = $stmt->fetch();

if (!$vehicule) {
    die("Véhicule introuvable.");
}

$vehicule_id = $vehicule['id'];

// Vérifier si le véhicule est déjà réservé sur la période
$sql = "SELECT COUNT(*) FROM reservations 
        WHERE vehicule_id = :vehicule_id
          AND statut IN ('valide', 'en_cours')
          AND date_fin >= :date_debut
          AND date_debut <= :date_fin";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':vehicule_id' => $vehicule_id,
    ':date_debut' => $date_debut,
    ':date_fin' => $date_fin
]);

$nb = $stmt->fetchColumn();

if ($nb > 0) {
    die("Ce véhicule est déjà réservé pendant cette période.");
}

// *** NE PAS FAIRE L'INSERT ICI ***

// Juste stocker les infos utiles en session pour la suite
$_SESSION['vehicule_nom'] = $vehicule_nom;
$_SESSION['vehicule_infos'] = $vehicule;
$_SESSION['montant_vehicule'] = $montant;
$_SESSION['date_debut'] = $date_debut;
$_SESSION['date_fin'] = $date_fin;

// Redirection vers la page identification (ou paiement)
header("Location: identification.php?success=1");
exit;
?>
