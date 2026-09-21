<?php
include('../configuration.php');

$id = $_POST['id'] ?? null;
$data = [
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'vehicule_nom' => $_POST['vehicule_nom'],
    'date_debut' => $_POST['date_debut'],
    'date_fin' => $_POST['date_fin'],
    'statut' => $_POST['statut']
];

if ($id) {
    $sql = "UPDATE reservations SET nom=:nom, prenom=:prenom, email=:email, vehicule_nom=:vehicule_nom, date_debut=:date_debut, date_fin=:date_fin, statut=:statut WHERE id=:id";
    $data['id'] = $id;
} else {
    $sql = "INSERT INTO reservations (nom, prenom, email, vehicule_nom, date_debut, date_fin, statut, date_reservation) 
            VALUES (:nom, :prenom, :email, :vehicule_nom, :date_debut, :date_fin, :statut, NOW())";
}

$stmt = $pdo->prepare($sql);
$success = $stmt->execute($data);

echo json_encode([
    'success' => $success,
    'message' => $success ? "Réservation enregistrée." : "Erreur lors de l'enregistrement."
]);
