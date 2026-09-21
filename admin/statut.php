<?php
include('../configuration.php');

// Mise à jour automatique des réservations terminées
$pdo->exec("UPDATE reservations SET statut = 'terminée' WHERE date_fin < NOW() AND statut != 'terminée'");
