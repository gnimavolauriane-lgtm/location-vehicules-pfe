<?php
session_start();
require_once('configuration.php'); 
// coté validation de l'email
   //je récupère l'email et le mot de passe
    $email=$_POST['email'] ??'';
    $motdepasse=$_POST['motdepasse'] ??'';

    // avec ce code je valide l'email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header('Location:connexion.php?erreur=email_invalide');
        exit;
    }

     // avec ce code je valide le mot de passe
     if(strlen($motdepasse)<8){
        header('Location:connexion.php?erreur=motDePasse_invalide');
        exit;
    }

    // Ici j'accentue le degré de validation du mot de passe 
    if(!preg_match('/[A-Z]/',$motdepasse)|| !preg_match('/[0-9]/',$motdepasse)){
        header('Location:connexion.php?erreur=motDePasse_invalide');
        exit;
    }




//  coté limiter le nombre de tentative à 5 fois

    //avec ce code je vérifie le nombre de tentative échouée dans les 10 dernières minutes
    $sql= "SELECT COUNT(*) AS nombreDeTentative
           FROM tentative_connexion 
           WHERE email=:email 
           AND date > NOW() - INTERVAL 10 MINUTE";
 
            $stmt=$pdo->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $tentative=$stmt->fetch(PDO::FETCH_ASSOC);

           //avec ce code je bloc l'utilisateur s'il a fait 5 tentatives en 10 minutes
           if($tentative['nombreDeTentative']>=5){
            header('Location:connexion.php?erreur=blocage&temps=' .$tempsRestant);//Si l'utilisateur est bloqué il est redirigé vers la page de connexion  avec  un message d'erreur et le temps restant dans l'url
            exit;
           }



//coté sécurité de mot de passe
    // Récupérer les champs email et mdp
        $email = $_POST['email'] ?? '';
        $motdepasse = $_POST['motdepasse'] ?? '';
        $souvenir=isset($_POST['souvenir']);

    // Préparer la requête
        $sql = "SELECT * FROM client WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et le mot de passe est correct
        if ($utilisateur && password_verify($motdepasse, $utilisateur['motdepasse'])) {
    // Connexion réussie
        $_SESSION['utilisateur'] = [
         'id' => $utilisateur['id'],
         'nom' => $utilisateur['nom'],
         'prenom' => $utilisateur['prenom'],
         'email' => $utilisateur['email']
        ];
    
    
    //condition pour se souvenir de l'utilisateur
     if($souvenir){
        $token=bin2hex(random_bytes(32));
        $dateExpiration=time()+(86400*7);

        //stocker le token dans la base de donnée
        $stmt=$pdo->prepare("INSERT INTO souvenir(client_id,token,dateExpiration)VALUES(?,?,?)");
        $stmt->execute([
            $utilisateur["id"],
            hash('sha256',$token),
            date('Y-m-d H:i:s',$dateExpiration)
        ]);

        //creation de cookie
        setcookie('souvenir',$token,[
            'expires'=>$dateExpiration,
            'path'=>'/',
            'secure'=>true,
            'httponly'=>true,
            'samesite'=>'Strict'
        ]);
     }

    //  Redirection vers la page nos véhicules.php
         header('Location: historique.php'); 
        exit;

        } else {
    //avec ce code j'enregistre les tentatives  échouées
           $sql="INSERT INTO tentative_connexion(email,date,adresseIp) VALUES(:email,NOW(),:adresseIp)";
           $stmt=$pdo->prepare($sql);
    //ce code va me permettre d'enregistrer l'email  er l'adresse ip de l'utilisateur qui essaie de se connecter
           $stmt->execute([
           'email'=>$email,
           'adresseIp'=>$_SERVER['REMOTE_ADDR']
           ]);
    // Connexion échouée redirection vers la page connexion avec un message d'erreur
        header('Location: connexion.php?erreur=identifiants');
        exit;
       }
?>

