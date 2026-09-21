<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once "configuration.php";
  date_default_timezone_set('Europe/Paris');//J'ai défini un fuseau horaire

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    // 1. Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => "Format d'e-mail invalide."]);
        exit;
    }

    // 2. Vérification que le client existe
    $stmt = $pdo->prepare("SELECT id, nom FROM client WHERE email = ?");
    $stmt->execute([$email]);
    $client = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($client) {
        // 3. Génération du token et date d'expiration
        $token = bin2hex(random_bytes(32));
        $expiration = date('Y-m-d H:i:s', time() + 3600); // 1 heure
         
        //3.1. supprimer les anciens tokens mdp_oublie pour le client avant d’en créer un nouveau
         $pdo->prepare("DELETE FROM souvenir WHERE client_id = ? AND type = 'mdp_oublie'")
         ->execute([$client['id']]);

        // 4. Insertion dans la table `souvenir`
        $stmt = $pdo->prepare("INSERT INTO souvenir (client_id, token, dateExpiration, type) VALUES (?, ?, ?, ?)");
        $stmt->execute([$client['id'], $token, $expiration, 'mdp_oublie']);

        // 5. Création du lien de réinitialisation
        $lien = "http://localhost/PFE1/reinitialisation_mdp.php?token=" . $token;

        // 6. Envoi de l'e-mail via PHPMailer
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
                Bonjour " . htmlspecialchars($client['nom']) . ",<br><br>
                Nous avons reçu une demande pour réinitialiser votre mot de passe.<br>
                Cliquez sur le lien suivant pour le réinitialiser :<br><br>
                <a href='" . $lien . "'>Réinitialiser mon mot de passe</a><br><br>
                Si vous n'avez pas fait cette demande, vous pouvez ignorer cet e-mail.<br><br>
                – L’équipe SG CAR
            ";

            $mail->send();
            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo]);
        }

    } else {
        echo json_encode(['success' => false, 'message' => "E-mail non reconnu, veuillez entrer un e-mail valide."]);
    }
}
