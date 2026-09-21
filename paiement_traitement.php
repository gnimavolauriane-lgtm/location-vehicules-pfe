<?php
require_once "configuration.php";
session_start();

// Debug : activer les erreurs si besoin
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifie si la requête vient d'un fetch JS (ex: PayPal)
$isJsonRequest = isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false;

// Helper JSON
function json_error($msg) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $msg]);
    exit;
}

// Récupération des données
$nom_carte = trim($_POST['nom_carte'] ?? '');
$mode = trim($_POST['mode_paiement'] ?? '');
$montant = floatval($_POST['montant'] ?? 0);
$date_paiement = date('Y-m-d H:i:s');


// Priorité aux POST, sinon session (utile si carte bancaire ne renvoie pas tout)
$nom = trim($_POST['nom'] ?? ($_SESSION['client']['nom'] ?? ''));
$prenom = trim($_POST['prenom'] ?? ($_SESSION['client']['prenom'] ?? ''));
$email = filter_var($_POST['email'] ?? ($_SESSION['client']['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$adresse = trim($_POST['adresse'] ?? ($_SESSION['client']['adresse'] ?? ''));
$telephone = trim($_POST['telephone'] ?? ($_SESSION['client']['telephone'] ?? ''));

if (!$email) {
    $isJsonRequest ? json_error("E-mail invalide") : die("Erreur : e-mail invalide");
}

// Infos réservation
$vehicule_nom = $_SESSION['vehicule_nom'] ?? '';
$vehicule_categorie = $_SESSION['categorie'] ?? '';
$date_reception = $_SESSION['date_reception'] ?? '';
$date_restitution = $_SESSION['date_restitution'] ?? '';
$heure_reception = $_SESSION['heure_reception'] ?? '';
$heure_restitution = $_SESSION['heure_restitution'] ?? '';

// Génération d'ID transaction
$transaction_id = uniqid('CMD-');

// Insertion en BDD
try {
    $stmt = $pdo->prepare("
        INSERT INTO caisse 
        (transaction_id, nom_carte, mode_paiement, montant, nom, prenom, email, adresse, telephone,
         vehicule_nom, vehicule_categorie, date_reception, date_restitution, date_paiement, heure_reception, heure_restitution)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $transaction_id,
        $nom_carte,
        $mode,
        $montant,
        $nom,
        $prenom,
        $email,
        $adresse,
        $telephone,
        $vehicule_nom,
        $vehicule_categorie,
        $date_reception,
        $date_restitution,
        $date_paiement,
        $heure_reception,
        $heure_restitution
    ]);
} catch (PDOException $e) {
    $msg = "Erreur base de données : " . $e->getMessage();
    error_log($msg);
    $isJsonRequest ? json_error($msg) : die("Erreur : $msg");
}

// Mail de confirmation
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gnimavolauriane2005@gmail.com';
    $mail->Password = 'xpkp jsur fdgv mmtp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('gnimavolauriane2005@gmail.com', 'SG CAR');
    $mail->addAddress($email, $nom . ' ' . $prenom);

    $mail->isHTML(true);
    $mail->Subject = 'Confirmation de votre réservation - SG Car';
    $mail->Body = "
        <h2>Bonjour {$prenom} {$nom},</h2>
        <p>Nous avons bien reçu votre paiement de <strong>{$montant} MAD</strong>.</p>
        <p>Votre véhicule sera prêt le <strong>{$date_reception} à {$heure_reception}</strong>.</p>
        <p>Adresse de livraison : <strong>{$adresse}</strong></p>
        <p>📞 Pour toute question : <strong>+212 668-624984</strong></p>
        <br>
        <p>Merci pour votre confiance,<br><strong>SG Car</strong></p>
    ";
    $mail->send();
} catch (Exception $e) {
    error_log("Erreur email : " . $mail->ErrorInfo);
}

// 🔁 Réponse finale
if ($isJsonRequest) {
    // Cas JS (PayPal)
    header('Content-Type: application/json');
    echo json_encode(['transaction_id' => $transaction_id]);
    exit;
} else {
    // Cas carte bancaire : on redirige vers la facture
    header("Location: facture.php?transaction_id=" . urlencode($transaction_id));
    exit;
}
