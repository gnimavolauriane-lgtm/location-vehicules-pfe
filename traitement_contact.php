<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "configuration.php";


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
// Récupération des données POST
$prenom = $_POST['prenom'] ?? '';
$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$telephone = $_POST['telephone'] ?? '';
$ville = $_POST['ville'] ?? '';
$type_demande = $_POST['type_demande'] ?? '';
$commentaire = $_POST['commentaire'] ?? '';

// Préparer et exécuter la requête
try {
    $stmt = $pdo->prepare("
        INSERT INTO contact 
        (prenom, nom, email, telephone, ville, type_demande, commentaire) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([$prenom, $nom, $email, $telephone, $ville, $type_demande, $commentaire]);
    echo "ok";
} catch (PDOException $e) {
    http_response_code(500);
    echo "Erreur lors de l'enregistrement : " . $e->getMessage();
}


$mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'gnimavolauriane2005@gmail.com';
            $mail->Password   = 'xpkp jsur fdgv mmtp'; // mot de passe d'application Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('gnimavolauriane2005@gmail.com', 'SG CAR');
            $mail->addAddress($email, $client['nom']);

            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';
            $mail->Body    = "
            <h2>Bonjour $prenom $nom,</h2>
        <p>Nous avons bien reçu votre demande de type : <strong>$type_demande</strong>.</p>
        <p>Notre équipe vous répondra dans les plus brefs délais.</p>
        <p>Merci pour votre confiance.</p>
        <p>— L’équipe SG CAR</p>
    ";
    $mail->AltBody = "Bonjour $prenom $nom,\n\nNous avons bien reçu votre demande de type : $type_demande.\nNotre équipe vous répondra dans les plus brefs délais.\nMerci pour votre confiance.\n— L’équipe de support";

    // Envoyer l'e-mail
    $mail->send();
    echo 'E-mail de confirmation envoyé avec succès.';
    } catch (Exception $e) {
        echo "L'e-mail n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }