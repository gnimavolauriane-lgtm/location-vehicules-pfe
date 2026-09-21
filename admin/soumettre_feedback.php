<?php
session_start();
include('../configuration.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

$id_admin = $_SESSION['admin_id'];
$contenu = trim($_POST['contenu'] ?? '');

if (!empty($contenu)) {
    $stmt = $pdo->prepare("INSERT INTO feedback_admin (id_admin, contenu) VALUES (?, ?)");
    $stmt->execute([$id_admin, $contenu]);
}

header('Location: dashboard.php');
exit();
?>
+