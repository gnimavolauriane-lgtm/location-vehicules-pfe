<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once "configuration.php";

// Récupération des données POST
$data = $_POST;
$entreprise = htmlspecialchars($data['entreprise'] ?? '');
$adresse = htmlspecialchars($data['adresse'] ?? '');
$telephone = htmlspecialchars($data['telephone'] ?? '');
$nb_vehicules = htmlspecialchars($data['vehicules'] ?? '');
$nom = htmlspecialchars($data['nom'] ?? '');
$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
$categorie = htmlspecialchars($data['categories'] ?? '');
$duree = htmlspecialchars($data['duree'] ?? '');
$infos = htmlspecialchars($data['informations'] ?? '');

// Validation simple
if (!$email) {
    http_response_code(400);
    echo "Email invalide.";
    exit;
}

// Insertion en base
$stmt = $pdo->prepare("INSERT INTO demandes_offre 
    (entreprise, adresse, telephone, nb_vehicules, nom_contact, email_contact, categorie, duree_location, informations) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$entreprise, $adresse, $telephone, $nb_vehicules, $nom, $email, $categorie, $duree, $infos]);

// Envoi de l'email
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


    $mail->Subject = 'Confirmation de réception de votre demande';
    $mail->Body    = "Bonjour $nom,\n\nNous avons bien reçu votre demande d'offre pour l'entreprise : $entreprise.\n\nNous vous recontacterons rapidement.\n\nCordialement,\nL'équipe SG CAR";

    $mail->send();
    echo "OK";
} catch (Exception $e) {
    http_response_code(500);
    echo "Erreur lors de l'envoi de l'email.";
}
