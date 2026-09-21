<?php
//session_start();
require_once('configuration.php');

if(!isset($_SESSION['utilisateur'])&& isset($_COOKIE['souvenir'])){
    $token=$_COOKIE['souvenir'];
    $hash=hash('sha256',$token);


    $stmt=$pdo->prepare("SELECT * FROM souvenir WHERE token=? AND dateExpiration > NOW()");
    $stmt->execute([$hash]);
    $entry=$stmt->fetch(PDO::FETCH_ASSOC);

    if($entry){
        $stmt=$pdo->prepare("SELECT * FROM client WHERE id=?");
        $stmt->execute([$entry['client_id']]);
        $utilisateur=$stmt->fetch(PDO::FETCH_ASSOC);


        if($utilisateur){
            $_SESSION['utilisateur']=[
                'id'=>$utilisateur['id'],
                'nom'=>$utilisateur['nom'],
                'prenom'=>$utilisateur['prenom'],
                'email'=>$utilisateur['email']
                
            ];
        }
    }

}