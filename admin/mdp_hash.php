<?php
$password = 'Admin2005'; // Choisis ton mot de passe
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
