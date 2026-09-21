<?php
// get_reservation.php

include('../configuration.php');

header('Content-Type: application/json');

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = ?");
    $stmt->execute([$id]);
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reservation) {
        echo json_encode($reservation);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Réservation non trouvée']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'ID invalide']);
}
