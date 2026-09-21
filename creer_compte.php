<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require_once "configuration.php";

$erreurEmailExistant = false;
$email = $nom = $prenom = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $motdepasse = $_POST['motdepasse'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    if (empty($nom) || empty($prenom) || empty($email) || empty($motdepasse)) {
        $erreur = "Tous les champs sont obligatoires.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM client WHERE email = :email");
        $stmt->execute(['email' => $email]);

        if ($stmt->fetch()) {
            $erreurEmailExistant = true;
        } else {
            $motdepasseHash = password_hash($motdepasse, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO client (nom, prenom, email, motdepasse, newsletter) 
                                   VALUES (:nom, :prenom, :email, :motdepasse, :newsletter)");

            try {
                $stmt->execute([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'motdepasse' => $motdepasseHash,
                    'newsletter' => $newsletter
                ]);

                //  Envoi de l'email seulement après enregistrement réussi
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'gnimavolauriane2005@gmail.com';
                    $mail->Password   = 'xpkp jsur fdgv mmtp'; // mot de passe d'application Gmail
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;

                    $mail->setFrom('gnimavoeunicelaurianemylene@gmail.com', 'SG CAR');
                    $mail->addAddress($email, $prenom);

                    $mail->isHTML(true);
                    $mail->Subject = 'Bienvenue chez SG CAR 🚗';
                    $mail->Body    = "
                        <h2>Bienvenue $prenom $nom!</h2>
                        <p>Merci pour votre inscription sur <strong>SG CAR</strong>.</p>
                        <p>Accédez à votre espace personnel, vos réservations et vos avantages exclusifs !</p>
                        <p>À bientôt  Equipe SG CAR</p>
                    ";

                    $mail->send();
                } catch (Exception $e) {
                    error_log("Erreur envoi mail : " . $mail->ErrorInfo);
                }

                // Redirection après enregistrement et envoi d'email
                header("Location: connexion.php?inscription=success");
                exit;
            } catch (PDOException $e) {
                $erreur = "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
    }
}

include("connexion.php");
?>
