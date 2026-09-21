<?php
session_start();
include('../configuration.php');
echo '<pre>';
var_dump($_POST);
echo '</pre>';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération sécurisée des données du formulaire
    $id = (int)$_POST['id'];
    $nom = $_POST['nom'];
    $categorie_id = (int)$_POST['categorie_id'];
    $boite_id = (int)$_POST['boite_id'];
    $carburant_id = (int)$_POST['carburant_id'];
    $passagers = (int)$_POST['passagers'];
    $valises = (int)$_POST['valises'];
    $statut = $_POST['statut'];
    var_dump($statut);
    $prix_jour = floatval($_POST['prix_jour']);

    // Requête pour récupérer le chemin de l'ancienne image
    $queryOld = $pdo->prepare("SELECT image_url FROM vehicules WHERE id = ?");
    $queryOld->execute([$id]);
    $vehicule = $queryOld->fetch();

    $image_sql = '';
    $params = [$nom, $categorie_id, $boite_id, $carburant_id, $passagers, $valises, $statut, $prix_jour];

    // Gestion de l’image si une nouvelle est uploadée
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        $extension = pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('vehicule_', true) . '.' . $extension;
        $filePath = $uploadDir . $filename;

        // Déplacer le fichier dans le dossier uploads/
        if (move_uploaded_file($_FILES['image_url']['tmp_name'], $filePath)) {
            // Supprimer l'ancienne image s’il y en avait une
            if (!empty($vehicule['image_url']) && file_exists('../' . $vehicule['image_url'])) {
                unlink('../' . $vehicule['image_url']);
            }

            $image_url_relative = 'uploads/' . $filename;
            $image_sql = ", image_url = ?";
            $params[] = $image_url_relative;
        }
    }

    $params[] = $id;

    // Requête SQL complète
    $sql = "
        UPDATE vehicules 
        SET nom = ?, categorie_id = ?, boite_id = ?, carburant_id = ?, passagers = ?, valises = ?, statut = ?, prix_jour = ?
        $image_sql
        WHERE id = ?
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    header('Location: voiture.php?updated=1');
    exit();
}
?>
