<?php
include('../configuration.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $pdo->prepare("DELETE FROM client WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: clients.php');
    exit;
}
?>
