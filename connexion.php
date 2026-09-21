

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Connection.css">
    <script src="https://kit.fontawesome.com/8a1e76e869.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward_ios" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
</head>
<body>
    <?php include('overlay.php');?>
    <?php include('entete.php');?>
    <?php
$alerteSuccess = false;

// Si on a été redirigé depuis creer_compte.php avec le message de succès
if (isset($_GET['inscription']) && $_GET['inscription'] === 'success') {
    $alerteSuccess = true;
}
?>

<?php if ($alerteSuccess): ?>
    <div id="messageReussite" class="confirmation">
        <span class="fermer-alert" onclick="fermerAlerte()">&times;</span>
        🎉 Votre compte a été créé avec succès ! Un email de bienvenue vous a été envoyé.
    </div>
<?php endif; ?>

<?php if (isset($_GET['erreur']) && $_GET['erreur'] === 'identifiants'): ?>
    <div id="messager" class="messager">
    <span class="fermer-alert" onclick="fermerAlerte()">&times;</span>
        ❌ Email ou mot de passe incorrect.
    </div>
<?php endif; ?>

<?php if (isset($_GET['erreur']) && $_GET['erreur'] === 'blocage' && isset($_GET['temps'])):
    if(isset($_GET['temps']) && is_numeric($_GET['temps']) && $_GET['temps']!==''){

   $temps=(int)$_GET['temps']; //convertir temps en entier
        if($temps>0){
            $tempsRestant=ceil($temps/60);//calcule le temps
            }
}
    ?>
    
    <div id="messager" class="messager">
    <span class="fermer-alert" onclick="fermerAlerte()">&times;</span>
        ❌ Trop de tentatives. Réessayez dans quelques minutes.
    </div>
<?php endif; ?>

   <?php
   $alerteMdp=false;
   if(isset($_GET['mdp']) && $_GET['mdp']==='envoi_ok'){
    $alerteMdp=true;
   }
   ?>

<?php if ($alerteMdp): ?>
    <div id="messageReussite" class="confirmation">
        <span class="fermer-alert" onclick="fermerAlerte()">&times;</span>
        📧 Un lien de réinitialisation vous a été envoyé par e-mail. Veuillez vérifier votre boîte de réception.
    </div>
<?php endif; ?>

<?php if (isset($_GET['mdp']) && $_GET['mdp'] === 'erreur_utilisateur'): ?>
    <div id="messager" class="messager">
        <span class="fermer-alert" onclick="fermercadran()">&times;</span>
        ❌ Aucun compte ne correspond à cet email.
    </div>
<?php endif; ?>

<?php if (isset($_GET['mdp']) && $_GET['mdp'] === 'modifie_ok'): ?>
    <div id="messageReussite" class="confirmation">
        <span class="fermer-alert" onclick="fermerAlerte()">&times;</span>
        ✅ Votre mot de passe a bien été modifié ! Vous pouvez maintenant vous connecter.
    </div>
<?php endif; ?>

    <div class="separateur"></div>
    <section class="connexion">
        
     <div class="connecter">
      <div class="connexion1-contenu">
         <h2>Les avantages du compte client</h2>
         <ul>
            <li>Bénéficiez des promotions ou des réductions personnalisées réservées aux membres </li>
            <li>Réservez plus vite sans ressaisir à chaque fois vos informations personnelles</li>
            <li>Modifiez ou annulez facilement vos réservations</li>
            <li>Retrouvez facilement l'historique de vos anciennes locations</li>
         </ul>
         <button id="bouton-compte">Créer mon compte</button>

        <form action="form-connexion.php" method="POST" autocomplete="off">
        
         <div class="connexion2-contenu">
         <!--Bloc pour connexion-->
            <div class="connexion2-texte">
            <h2>Je me connecte</h2>
            <div class="séparer"></div>
            <input type="email" placeholder="Email" required maxlength="100" id="email-validation" name="email" autocomplete="off">
            <span class="messageErreur" id="erreur-email"></span>

            <input type="password" placeholder="mot de passe" required minlength="8" maxlength="64" id="password-validation" name="motdepasse" autocomplete="new-password">
            <span class="messageErreur" id="erreur-password"></span>

            
            <label  class="cheker">
              <input type="checkbox" name="souvenir" id="souvenir">
              <span >Se souvenir de moi</span>
            </label>
            <div class="mot">
            <a href="javascript:void(0);" id="mdpOublié" style="color:inherit;color:#59189A">Mot de passe oublié </a>
            </div>
            <button type="submit" id="btn-validation">Me connecter</button>
         </div>
        </form>

         <!--Bloc pour mot de passe oublié-->
         <div id="mdp"> 
            <span id="fermetureIcone" style="cursor:pointer;">&#x2715;</span>
           <div class="contenu-mdp">
            <h2 id="titre2">J'ai oublié mon mot de passe</h2>
            <p style="font-size:12px ;width:90%; margin-left:20px;">Indiquez-nous votre email (qui correspond à votre nom d'utilisateur) pour générer un nouveau mot de passe. Vous allez recevoir un e-mail pour réinitialiser votre mot de passe dans quelques instants</p>

            <form  id="form-mdp" action="mdpOublié.php" method="POST">
                <input type="email" name="email" placeholder="Email" id="recevoirEmail" required>
                <span class="messageErreur" id="erreur-mdp-email"></span>
                <button id="reinitialiserMdp" type="submit">Réinitialiser mon mot de passe</button>
            </form>

          </div>
         </div>

      </div>
     </div>
    

     <!-- Nouveau bloc pour la création de compte -->
      <form action="creer_compte.php" method="POST">
    <div class="connexion2-contenu" id="nouveau-bloc" style="display: none;">
    <div class="connexion2-texte">
        <h2 id='titre2'>Créer un compte</h2>
        <div id="trait2" class="séparer"></div>
        <div class="input-compte">
  <div class="champ">
    <input type="text" placeholder="Nom" id="nom" required maxlength="50" name="nom">
    <span class="messageErreur" id="erreur-nom"></span>
  </div>

  <div class="champ">
    <input type="text" placeholder="Prénom" id="prenom" required maxlength="50" name="prenom">
    <span class="messageErreur" id="erreur-prenom"></span>
  </div>

  <div class="champ">
    <input type="email" placeholder="Email" id="email" required maxlength="100" name="email" 
           value="<?php echo htmlspecialchars($email ?? ''); ?>">
    <span class="messageErreur" id="erreurEmail"></span>
    <?php if (!empty($erreurEmailExistant)): ?>
        <div class="messageErreur">Cet email est déjà utilisé.</div>
    <?php endif; ?>
</div>


  <div class="champ">
    <input type="password" placeholder="Mot de passe" id="motdepasse" required minlength="8" maxlength="64" name="motdepasse" autocomplete="new-password">
    <span class="messageErreur" id="erreur-motdepasse"></span>
  </div>
</div>

        <div class="checkbox-container">
            <label class="cheker">
                <input type="checkbox" id="checkbox1">  
                <span>J'accepte les conditions d'utilisation</span>
            </label>
            <span class="messageErreur" id="erreur-checkbox1"></span>

            <label class="cheker">
                <input type="checkbox" id="checkbox2" name="newsletter">  
                <span id="span">Je souhaite m'inscrire à la newsletter</span>
            </label>
        </div>

        <button type="submit" id="creer-compte">Créer mon compte</button>
    </div>
    </div>
    </form>

    <!-- Partie droite vide quand on clique sur 'Créer mon compte' -->
    <div class="connexion-droit-vide">
        <!-- Titre, texte et bouton vont apparaitre ici lorsque le formulaire de connexion sera caché -->
        <h2>J'ai déjà un compte</h2>
        <p>Je me connecte pour bénéficier de tous les avantages du compte client</p>
        <button id="retour-compte">Me connecter</button>
    </div>
</div>

    </section>

    <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> >  
    <a href="#" class="lien1">Mon compte</a> 
</div>


    
    <?php include('chargement.php');?> 
    <?php include('Apropos.php');?>
    <?php include('langue.php');?>
    <?php include('chat.php');?>
    <?php include('flèche.php');?>
    <?php include('piedPage.php');?>

   <script>
    document.getElementById('bouton-compte').addEventListener('click', function() {
    // pour cacher  le bloc de connexion existant
    document.querySelector('.connexion2-contenu').style.display = 'none';

    // Afficher le nouveau bloc (formulaire de création de compte)
    document.getElementById('nouveau-bloc').style.display = 'block';

    // Afficher la partie droite avec titre, texte, bouton
    document.querySelector('.connexion-droit-vide').style.display = 'block';
    document.querySelector('.connexion1-contenu').classList.add('active');
});

// Lorsque l'utilisateur clique sur "Retour à la connexion", on cache la partie droite et réaffiche la connexion
document.getElementById('retour-compte').addEventListener('click', function() {
    // cacher la partie droite
    document.querySelector('.connexion-droit-vide').style.display = 'none';

    //pour réafficher la partie connexion
    document.querySelector('.connexion2-contenu').style.display = 'block';

    //  pour cacher le formulaire de création de compte
    document.getElementById('nouveau-bloc').style.display = 'none';

    //  pour revenir à l'état initial
    document.querySelector('.connexion1-contenu').classList.remove('active');
});

// SECTION Sécurité des formulaires

function afficherErreur(input) {
    return input.replace(/[<>]/g, "").trim(); //supprme les guillemets //trim()efface les erreurs au début et à la fin
}

document.getElementById("btn-validation").addEventListener("click", function(e) {
    e.preventDefault(); //empeche la soumission du formulaire

    // Recupérer des erreurs
    document.getElementById("erreur-email").textContent = "";
    document.getElementById("erreur-password").textContent = "";

    const email = afficherErreur(document.getElementById("email-validation").value);
    const password = afficherErreur(document.getElementById("password-validation").value);

    let valider = true;

    // Vérification de l'email
    if (!email) {
        document.getElementById("erreur-email").textContent = "Veuillez entrer votre email.";
        valider = false;
    } else {
        const validerEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!validerEmail.test(email)) {
            document.getElementById("erreur-email").textContent = "Format d'email invalide.";
            valider = false;
        }
    }

    // Vérification du mot de passe
    if (!password) {
        document.getElementById("erreur-password").textContent = "Veuillez entrer votre mot de passe.";
        valider = false;
    } else if (password.length < 8) {
        document.getElementById("erreur-password").textContent = "Le mot de passe doit contenir au moins 8 caractères.";
        valider = false;
    }

       //connexion si tout est juste
       if (valider) {
        document.querySelector('form[action="form-connexion.php"]').submit(); // sélectionne le formulaire pour le soumettre
    }
});



function afficherErreur(input) {
    return input.replace(/[<>]/g, "").trim();
}

document.getElementById("creer-compte").addEventListener("click", function(e) {
    e.preventDefault();

    // A la base le span est vide 
    document.getElementById("erreur-nom").textContent = "";
    document.getElementById("erreur-prenom").textContent = "";
    document.getElementById("erreurEmail").textContent = "";
    document.getElementById("erreur-motdepasse").textContent = "";
    document.getElementById("erreur-checkbox1").textContent = "";

    // Afficher les erreurs  quand un chanp est vide
    const nom = afficherErreur(document.getElementById("nom").value);
    const prenom = afficherErreur(document.getElementById("prenom").value);
    const email = afficherErreur(document.getElementById("email").value);
    const motdepasse = afficherErreur(document.getElementById("motdepasse").value);
    const checkbox1 = document.getElementById("checkbox1").checked;

    let valider = true;

    // Vérification du nom
    if (!nom) {
        document.getElementById("erreur-nom").textContent = "Veuillez renseigner le nom";
        valider = false;
    }

    // Vérification du prénom
    if (!prenom) {
        document.getElementById("erreur-prenom").textContent = "Veuillez renseigner le prénom";
        valider = false;
    }

    // Vérification de l'email
    if (!email) {
        document.getElementById("erreurEmail").textContent = "Veuillez renseigner un email";
        valider = false;
    } else {
        const validerEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!validerEmail.test(email)) {
            document.getElementById("erreurEmail").textContent = "Email invalide.";
            valider = false;
        }
    }
    
    
    // Vérification du mot de passe
    if (!motdepasse) {
        document.getElementById("erreur-motdepasse").textContent = "Veuillez renseigner un mot de passe";
        valider = false;
    } else if (motdepasse.length < 8) {
        document.getElementById("erreur-motdepasse").textContent = "Mot de passe invalide";
        valider = false;
    }

    // Conditions d'utilisation
    if (!checkbox1) {
        document.getElementById("erreur-checkbox1").textContent = "Veuillez accepter les conditions d'utilisation";
        valider = false;
    }


     //vider les cases après la validation
    //Creer compte
    if(valider){
        
            // Envoi réel du formulaire
            this.closest("form").submit();
    }

        document.getElementById("nom").value="";
        document.getElementById("prenom").value="";
        document.getElementById("email").value="";
        document.getElementById("motdepasse").value="";
        document.getElementById("checkbox1").checked=false;
        document.getElementById("checkbox2").checked=false;

      
});


// Fonction  pour effacer les messages d’erreurs lorsque l'utilisateur entre un nouveau mot
function effacerErreur(inputId, errorId) { //inputId:argument pour récupérer l'id du champ;errorId=argument pour récupérer le champ où s'affiche le message d'erreur
    const input = document.getElementById(inputId);
    input.addEventListener("input", function () { //Dès que l'utilisateur commence à retaper dans le champ
        document.getElementById(errorId).textContent = "";//le champ devient vide
    });
}

// Pour le formulaire de création de compte
effacerErreur("nom", "erreur-nom");
effacerErreur("prenom", "erreur-prenom");
effacerErreur("email", "erreurEmail");
effacerErreur("motdepasse", "erreur-motdepasse");

// Pour la connexion
effacerErreur("email-validation", "erreur-email");
effacerErreur("password-validation", "erreur-password");

// pour le checkbox
document.getElementById("checkbox1").addEventListener("change", function () {
    if (this.checked) {
        document.getElementById("erreur-checkbox1").textContent = "";
    }
});



//fonction por fermer les cadrans

  function fermerAlerte() {
        const alerte = document.getElementById('messageReussite');
        if (alerte) {
            alerte.style.transition = "opacity 0.5s ease-out";//pour disparaitre progressivement
            alerte.style.opacity = 0;//il diparait totalement
            setTimeout(() => alerte.remove(), 500); //pour supprimer du DOM après 50ms
        // "setTimeout":fonction pour exécuter une fonction après un délai donné
        }
    }

    // Fermeture automatique  du cadran au bout de 5 secondes
    //windows : représente la page web 
    //DOMContentLoaded : évènement qui agit lorsque la page est chargée grace au DOM
    window.addEventListener('DOMContentLoaded', () => { //addEventListener:pour écouter l'évènement DOMContentLoaded sur Windows
        setTimeout(() => {
            fermerAlerte();
        }, 5000);
    });

     
    function fermercadran() {
        const alerte = document.getElementById('messager');
        if (alerte) {
            alerte.style.transition = "opacity 0.5s ease-out";
            alerte.style.opacity = 0;
            setTimeout(() => alerte.remove(), 500);
        }
    }

    // Fermeture automatique au bout de 5 secondes
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            fermercadran();
        }, 5000);
    });



     //Animation et apparition du bloc de mot de passe oublié
     const mdpOublié=document.getElementById("mdpOublié");
     const mdp=document.getElementById("mdp");
     const connexionBloc=document.querySelector(".connexion2-contenu");
     const fermetureIcone=document.getElementById("fermetureIcone");

     //j'ai crée cette fonction pour afficher le bloc "Mot de passe oublié"
     mdpOublié.addEventListener("click",()=>{
        //afficher le bloc de réinitialisation du mot de passe
        mdp.style.display="flex";
     });

     // j'ai crée fonction pour fermer le bloc mdp oublié
     fermetureIcone.addEventListener("click",()=>{
        //afficher le bloc de connexion
        connexionBloc.style.display="flex";
        //cacher le boc de mdp
        mdp.style.display="none";
     });


     //validation email mot de passe oublié
      document.getElementById("reinitialiserMdp").addEventListener("click",function(e){
        e.preventDefault(); 
        const email=document.getElementById("recevoirEmail").value.trim();
        const messageDerreur=document.getElementById("erreur-mdp-email");
        messageDerreur.textContent="";

        const validerEmail=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if(!email){
            messageDerreur.textContent="Veuillez entrer votre email"
        }
        else if(!validerEmail.test(email)){
            messageDerreur.textContent="Format d'email invalide";
        }
        else{//soumettre le formulaire si l'email est valide//
           document.getElementById("form-mdp").submit();
        }
     });
     //Effacer l'erreur 
     document.getElementById("recevoirEmail").addEventListener("input",function(){
        document.getElementById("erreur-mdp-email").textContent="";
     });

     //fermeture du message d'envoie de réinitialisation
     function fermerAlerte() {
      const alerte = document.getElementById('messageReussite');
      if (alerte) {
          alerte.style.transition = "opacity 0.5s ease-out";
          alerte.style.opacity = 0;
          setTimeout(() => alerte.remove(), 500);
      }
  }

  window.addEventListener('DOMContentLoaded', () => {
      setTimeout(() => {
          fermerAlerte();
      }, 5000);
  });

</script>

</body>
</html>