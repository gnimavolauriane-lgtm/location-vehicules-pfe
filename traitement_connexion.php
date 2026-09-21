<?php
session_start();
require_once "configuration.php";

header('Content-Type: application/json');

$email = $_POST['email'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';

$vehicule_nom = $_POST['vehicule_nom'] ?? '';
$montant_vehicule = $_POST['montant_vehicule'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM client WHERE email = ?");
$stmt->execute([$email]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if ($client && password_verify($motdepasse, $client['motdepasse'])) {
    $_SESSION['client_id'] = $client['id'];

    // Construire URL de redirection
    $redirectUrl = 'valider_reservation.php';
    $params = [];

    if ($vehicule_nom !== '') {
        $params[] = 'vehicule_nom=' . urlencode($vehicule_nom);
    }
    if ($montant_vehicule !== '') {
        $params[] = 'montant_vehicule=' . urlencode($montant_vehicule);
    }
    if (!empty($params)) {
        $redirectUrl .= '?' . implode('&', $params);
    }

    echo json_encode([
        'success' => true,
        'redirect' => $redirectUrl
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'E-mail ou mot de passe invalide.'
    ]);
}
exit;

