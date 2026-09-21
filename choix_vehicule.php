<?php
session_start();

// Après validation choix véhicule + dates valides :
$_SESSION['vehicule_nom'] = $vehicule_nom;
$_SESSION['vehicule_id'] = $vehicule_id;
$_SESSION['date_debut'] = $date_debut;
$_SESSION['date_fin'] = $date_fin;
$_SESSION['montant_vehicule'] = $montant;

// Puis redirection vers identification
header('Location: identification.php');
exit;
