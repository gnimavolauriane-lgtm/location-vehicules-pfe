<?php
$host='localhost';
$dbnom='sgcar';
$utilisateur='root';
$motdepasse='';

try{
    $pdo=new PDO("mysql:host=$host;dbname=$dbnom;charset=utf8",$utilisateur,$motdepasse);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//exception pour gérer les erreurs avec pdo=php data objects(permet à php de se connecter à une base de donnée)
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);//avec cette ligne php laisse mysql preparé les requetes pour une meilleure sécurité (empeche les bugs etc)
}
catch(PDOException $e){
    die("Erreur de connexion :" . $e->getMessage());
}


?>
