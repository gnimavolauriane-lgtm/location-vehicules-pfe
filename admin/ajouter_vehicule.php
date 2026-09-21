<?php
session_start();
include('../configuration.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des champs
    $nom = $_POST['nom'];
    $categorie_id = (int)$_POST['categorie_id'];
    $boite_id = (int)$_POST['boite_id'];
    $carburant_id = (int)$_POST['carburant_id'];
    $passagers = (int)$_POST['passagers'];
    $valises = (int)$_POST['valises'];
    $statut = $_POST['statut'];
    $prix_jour = (float)$_POST['prix_jour'];

    // Traitement de l'image
    if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/vehicules/'; // dossier à créer avec droits écriture
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $tmpName = $_FILES['image_url']['tmp_name'];
        $fileName = basename($_FILES['image_url']['name']);
        $targetFile = $uploadDir . time() . '_' . $fileName; // nom unique

        // Vérifier l'extension image
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            die('Format d\'image non autorisé.');
        }

        if (move_uploaded_file($tmpName, $targetFile)) {
            $image_url = 'uploads/vehicules/' . basename($targetFile);

            // Insertion en base
            $stmt = $pdo->prepare("INSERT INTO vehicules 
                (nom, categorie_id, boite_id, carburant_id, passagers, valises, statut, prix_jour, image_url) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $categorie_id, $boite_id, $carburant_id, $passagers, $valises, $statut, $prix_jour, $image_url]);

            header('Location: voiture.php?success=1');
            exit();

        } else {
            die('Erreur lors de l\'upload de l\'image.');
        }

    } else {
        die('Veuillez sélectionner une image.');
    }
}
?>
