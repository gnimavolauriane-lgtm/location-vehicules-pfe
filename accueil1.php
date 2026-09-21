


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/i18next@21.0.2/i18next.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-http-backend@1.3.1/i18nextHttpBackend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-browser-languagedetector@6.0.0/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="js/app.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ACEUIL.css">
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style>
    
    
body {
    background-color: #f5f5f5;
    margin: 0;
    font-family: Arial, sans-serif;
}
/* Effet fondu global */
body.fade-out {
  opacity: 0;
  transition: opacity 0.5s ease;
}

body.fade-in {
  opacity: 0;
  animation: fadeIn 0.6s forwards;
}

@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

.separateur {
    width: 100%; 
    height: 5px; /* épaisseur du trait */
    background-color: #9a1818; /* Couleur du trait */
     /* Permet au trait de se superposer à l'image */
}

.image {
    width: 100%;
    height: 470px;         
    overflow: hidden;      
    position: relative;
}

.image img {
    width: 100%;
    position: relative;
    top: 300px;  
}

.slogan {
    position: absolute;
    top: 280px; /* Positionner le texte au centre verticalement de l'image */
    left: 50%; /* Positionner le texte au centre horizontalement de l'image */
    transform: translate(-50%, -50%); /* Centrer parfaitement le texte */
    width: 80%;
    text-align: center;
    color: #fff;
    font-size: 2rem;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour améliorer la lisibilité */
    padding: 10px 20px 250px 20px;
    
    box-sizing: border-box;
    border-radius: 8px;
    z-index: 2; /* Placer la promesse au-dessus de l'image */
}
.slogan h2{
    font-size: 2rem;
    font-family: "Archivo Black", sans-serif;
}

/* Conteneur du formulaire */
.form-contenu {
    position: absolute;
    bottom: 30px; /* Placer le formulaire juste en dessous de la promesse */
    left: 50%;
    top: 220px;
    z-index: 3;
    transform: translateX(-50%); /* Centrer horizontalement */
    width: 80%; /* La largeur du formulaire */
    padding: 20px;
    border-radius: 8px; /* Coins arrondis */
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

/* Style pour les inputs du formulaire */
.form-input {
    width: 18%;
    padding: 20px;
    margin: 0;
    box-sizing: border-box;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

.form-input:focus {
    border-color: #ad9c9c;
}
#input1:focus{
    border:4px solid #ad9c9c;
}
#input2:focus{
    border:4px solid #ad9c9c;
}
#input3:focus{
    border:4px solid #ad9c9c;
}
#input4:focus{
    border:4px solid #ad9c9c;
}
#input5:focus{
    border:4px solid #ad9c9c;
}


.boutton{
    padding: 3px;
    border-radius: 10px;
}
.boutton:hover{
    background-color: #ad9c9c;
}

.boutton i {
    font-size: 25px;
    color: #111;
}

.liste{
    display: none; /* Masqué par défaut */
    position: absolute;
    background-color: white;
    border-radius: 4px;
    width: 200px;
    right: 5px;
    margin-top: 5px;
    padding:0 50px 50px 50px;
    max-height: 150px;
    overflow-y: auto;
    box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 100;
}
.liste li{
    padding: 8px;
    cursor:pointer;
    list-style: none;
}
.liste li:hover{
  background-color:  rgba(0, 0, 0, 0.5);
}

/* Style pour les cases à cocher*/
.cocher{
    margin-top: 30px;
}

.caseCocher div{
    margin-bottom: 20px;/* mettre de l'espace entre les cases*/
}

label{
    color: #fff;
    font-size: 16px;
}

input[type="checkbox"]{
    width: 20px;
    height: 20px;
}

.image::after{
    content: "";
    position: absolute;
    bottom: 0px;/*pour faire descendre le trait à ma guise*/
    width: 100%;
    left: 0;
    height: 5px;/*epaiiseur du trait*/
    background-color: #5A189A;
    top: 445px;
    z-index: 1000;
}



body {
    background-color: #fff;
    margin: 0;
    font-family: Arial, sans-serif;
}
.separateur {
    width: 100%; 
    height: 5px; /* épaisseur du trait */
    background-color: #5A189A; /* Couleur du trait */
     /* Permet au trait de se superposer à l'image */
}

.image {
    position: relative;
    width: 100%;
    overflow: hidden;
  
}
.image img {
    width: 100%;
    height: auto;
    transform: translateY(-50%);
}
.slogan {
    position: absolute;
    top: 280px; /* Positionner le texte au centre verticalement de l'image */
    left: 50%; /* Positionner le texte au centre horizontalement de l'image */
    transform: translate(-50%, -50%); /* Centrer parfaitement le texte */
    width: 80%;
    text-align: center;
    color: #fff;
    background-image: 8px 8px 8px 8px #fff;
    font-size: 2rem;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour améliorer la lisibilité */
    padding: 10px 20px 250px 20px;
    box-sizing: border-box;
    border-radius: 8px;
    z-index: 2; /* Placer la promesse au-dessus de l'image */
}
.slogan h2{
    font-size: 2rem;
    font-family: "Archivo Black", sans-serif;
}
.slogan h3{
    font-size: 2rem;
    font-family: "Archivo Black", sans-serif;
    margin-left: -100px;
}

/* Conteneur du formulaire */
.form-contenu {
    position: absolute;
    bottom: 30px; /* Placer le formulaire juste en dessous de la promesse */
    left: 50%;
    top: 220px;
    z-index: 3;
    transform: translateX(-50%); /* Centrer horizontalement */
    width: 80%; /* La largeur du formulaire */
    padding: 20px;
    border-radius: 8px; /* Coins arrondis */
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

/* Style pour les inputs du formulaire */

.form-input:hover{
    border:2px solid #ad9c9c ;
}
.form-input:focus {
    border-color: #ad9c9c;
}
#input1:focus{
    border:4px solid #ad9c9c;
}
#input2:focus{
    border:4px solid #ad9c9c;
}
#input3:focus{
    border:4px solid #ad9c9c;
}
#input4:focus{
    border:4px solid #ad9c9c;
}
#input5:focus{
    border:4px solid #ad9c9c;
}


.formulaire {
  display: flex;              /* aligne les champs horizontalement */
  gap: 10px;                  /* espace entre chaque champ */
  align-items: flex-start;    /* aligne au top pour que les messages ne décalent pas */
  flex-wrap: wrap;            /* si écran trop petit, champs passent à la ligne */
}


.champ-formulaire {
  display: flex;
  flex-direction: column;    
  width: 18%;                 
}

.form-input {
width: 100%;                
box-sizing: border-box;
padding: 20px;
margin: 0;
box-sizing: border-box;
font-size: 14px;
border: 1px solid #ccc;
border-radius: 4px;
background-image: 8px 8px 8px 8px rgba(0 0 0 0.1);
outline: none;
}

/* message d’erreur sous le champ */
.error-message {
  color: red;
  font-size: 0.85em;
  margin-top: 4px;
  min-height: 18px; /* réserve un espace même si pas de message */
}

.boutton{
    padding: 3px;
    border-radius: 10px;
    margin-top: 15px;
}
.boutton:hover{
    background-color: #ad9c9c;
}

.boutton i {
    font-size: 25px;
    color: #111;
}


/* Style pour les cases à cocher*/
.cocher{
    margin-top: -20px;
}

.caseCocher div{
    margin-bottom: 5px;/* mettre de l'espace entre les cases*/
}

label{
    color: #fff;
    font-size: 16px;
}

input[type="checkbox"]{
    width: 20px;
    height: 20px;
}

.image::after{
    content: "";
    position: absolute;
    bottom: 0px;/*pour faire descendre le trait à ma guise*/
    width: 100%;
    left: 0;
    height: 5px;/*epaiiseur du trait*/
    background-color: #5A189A;
    top: 465px;
    z-index: 1000;
}

.lien1-contenu {
    position: relative;
    margin-top: 50px; /* espace entre l'image et cette section */
    font-size: 14px;
    padding: 20px 10px;
    width: 100%;
    z-index: 1000;
    margin-bottom: 10px;
    background-color: #f9f9f9;
}

.lien1 {
    position: relative;
    cursor: pointer;
    color: inherit;
    font-size: 0.9rem;
    margin-left: 10px;
}

.lien1-texte {
    position: relative;
    font-size: 2rem;
    margin-left: 10px;
    margin-top: 10px;
}

.carte{
    position: relative;
    width: 100%;
    max-width: 80%;
    margin: 0 auto;
    top: 80px;
    margin-left: 20px;

}

.carte img{
    width: 100%;
    height: auto;
    object-fit: cover;
}


.icones-titre{
    font-size: 2rem;
    margin-bottom: -20px;
    margin-top: 120px;
    margin-left: 20px;
    font-family: 'Roboto',sans-serif;
}
.icones-contenu{
    display: flex;
    justify-content: space-evenly;/*pour espacer les icones*/
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;/*pour avoir plusieurs lignes si la tailles est réduite*/
}

.icones-image{
    text-align: center;
    width: 120px;
    
}

.icones{
    font-size: 50px;
    background-color: #fff;
    color: #5A189A;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 50%;
    border: 4px solid #111;
    position: absolute;
    margin-left:20px ;
   margin-top: 100px;
}

.icone-texte{
    font-size: 1rem;
    margin-top: 250px;
    font-family: 'Roboto',sans-serif;
    

}
.carte1 {
    position: absolute;
    top: 350%;
    left: 20%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%; /* Largeur flexible de la carte */
    padding-top: 100px; /* Ajout d'un espace au-dessus pour que le contenu descende */
}

.carte1-image {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
    padding-left: 500px;
    
}

.carte1-titre {
    font-size: 2rem;
    margin-bottom: 20px;
    font-family: 'Roboto', sans-serif;
}

.carte1-texte {
    font-size: 0.9em;
   margin-left: 380px;
    color: #555;
    width: 100%;
    font-family: Arial, sans-serif;
    margin-bottom: 20px;
}
.carte1-texte1 {
    font-size: 0.9em;
   margin-left: 100px;
    color: #555;
    width: 100%;
    font-family: Arial, sans-serif;
    margin-bottom: 20px;
}

#terms-and-conditions {
    margin-top: 970px;
    font-family: Arial, sans-serif;
}

.acte-titre {
    
    font-size: 2rem;
    margin-bottom: 20px;
    margin-top: -300px;
    margin-left: 20px;
    font-family: 'Roboto',sans-serif;
}

.acte {
    margin-bottom: 15px;
    padding: 10px;
    margin-left: 20px;
    border-bottom: 1px solid #ddd;
}

.acte h3 {
    font-size: 1rem;
    color: #111;
    margin-bottom: 5px;
}

.acte p {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
}


</style>
</head>
<body> <?php include('overlay.php');?> 
    <?php include('entete.php');?> 
    <div class="separateur"></div>
   <div class="image">
    <div class="slogan">
     <h2 data-i18n="accueil.slogan.title">Louez votre voiture en toute simplicité chez SG CAR</h2>
     
    </div>

<div class="form-contenu">
<form class="formulaire" method="GET" action="resultats.php" onsubmit="return validerFormulaire();">
    <div class="champ-formulaire">
        <input type="date" name="date_reception" id="input1" placeholder="📅 Date de réception" class="form-input">
        <div class="error-message" id="error-input1"></div>
    </div>

    <div class="champ-formulaire">
        <input type="text" name="heure_reception" id="input2" placeholder="🕒 Heure" class="form-input">
        <div class="error-message" id="error-input2"></div>
    </div>

    <div class="champ-formulaire">
        <input type="date" name="date_restitution" id="input3" placeholder="📅 Date de restitution" class="form-input">
        <div class="error-message" id="error-input3"></div>
       
    </div>

    <div class="champ-formulaire">
        <input type="text" name="heure_restitution" id="input4" placeholder="🕒 Heure" class="form-input">
        <div class="error-message" id="error-input4"></div>
    </div>

    <div class="champ-formulaire">
        <select name="categorie" id="categorie" class="form-input">
            <option value="">Modèle de véhicule</option>
            <option value="CITADINE">Citadine</option>
            <option value="SUV">SUV</option>
            <option value="Premium">Premium</option>
            <option value="Utilitaire">Utilitaire</option>
            <option value="Minibus">Minibus</option>
        </select>
        <div class="error-message" id="error-categorie"></div>
    </div>

    <button type="submit" class="boutton">
        <i class="fas fa-search"></i> 
    </button>

    <div class="cocher">
        <div class="caseCocher">
            <div>
                <input type="checkbox" name="permis" id="case1">
                <label for="case1">Conducteur ayant le permis</label>
                <div class="error-message" id="error-permis"></div>
            </div>
            <div>
                <input type="checkbox" name="age_ok" id="case2">
                <label for="case2">Conducteur âgé entre 21 ans et plus</label>
                <div class="error-message" id="error-age_ok"></div>
            </div>
        </div>
    </div>
</form>


    </div>
    <img src="image/fidele.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1" data-i18n="breadcrumb.home">Accueil</a> >  
    <a href="#" class="lien1" data-i18n="breadcrumb.loyaltyProgram">PROGRAMME DE FIDÉLITÉ  </a> 
    <h2 class='lien1-texte' data-i18n="breadcrumb.loyaltyTitle">PROGRAMME DE FIDÉLITÉ  SG ASSURANCE</h2>
</div>

   <div class="carte">
    <img src="image/carte.jpeg" alt="" srcset="">

   </div>


   <div class="section-icones">
    <h2 class="icones-titre" data-i18n="advantages.title">5 Avantages du programme SG Assurance</h2>
    <div class="icones-contenu">
        <div class="icone-image">
            <i class="fa-solid fa-percent icones"></i> 
            <p class="icone-texte" data-i18n="advantages.discount">Remises Généreuses</p>
        </div>
        <div class="icone-image">
        <i class="fa-regular fa-gem icones"></i>
            <p class="icone-texte" data-i18n="advantages.exclusives">Avantages Exclusifs</p>
        </div>
        <div class="icone-image">
            <i class="fa-solid fa-gift icones" ></i>
            <p class="icone-texte" data-i18n="advantages.freebies">Gratuités Offertes</p>
        </div>
        <div class="icone-image">
        <i class="fa-solid fa-headset icones"></i>
            <p class="icone-texte" data-i18n="advantages.support">Assistance Client</p>
        </div>
        <div class="icone-image">
        <i class="fa-solid fa-thumbs-up icones"></i>
            <p class="icone-texte" data-i18n="advantages.uniqueExperience">Expérience de location unique</p>
        </div>
    </div>
</div>

<div class="carte1">
        <h2 class="carte1-titre" data-i18n="howToJoin.title">Comment adhérer à SG CARTE ?</h2>
        <p class="carte1-texte" data-i18n="howToJoin.description">
        Afin de bénéficier du programme de fidélité, vous devez tout d'abord effectuer 3 réservations ou accumuler une période de réservation de 60 jours au cours d'une année complète, ultérieurement, notre équipe vous ajoutera dans la liste des membres du programme SG ASSURANCE et vous enverra un email de bienvenue. Par la suite, vous pourrez profiter des  avantages de ce programme .
        </p>
        <img src="image/Carte de fidélité SG car.jpg" alt="Description de l'image" class="carte1-image">
        <p class="carte1-texte1" data-i18n="howToJoin.note">cette carte est offerte aux clients qui ont effectué au moins 3 réservations au cours de l'année précédent</p>
    </div>

   
    <section id="terms-and-conditions">
  <h2 class="acte-titre" data-i18n="terms.title">Termes et Conditions</h2>

  <div class="acte">
    <h3 data-i18n="terms.act1.title">Acte 1 :</h3>
    <p data-i18n="terms.act1.text">L'adhésion est renouvelée chaque année au 1er janvier, et les membres seront avertis par email où ils trouveront leur statut, le code de réduction et les avantages qui y sont associés.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act2.title">Act>Acte 2 :</h3>
    <p data-i18n="terms.act2.text">Chaque nouveau membre sera ajouté à la base de données de Walaa Rewards et sera doté d'un code d'identification unique.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act3.title">Acte 3 :</h3>
    <p data-i18n="terms.act3.text">Les avantages associés à chaque statut sont flexibles : l'entreprise peut les modifier, les supprimer ou en ajouter de nouveaux à tout moment.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act4.title">Acte 4 :</h3>
    <p data-i18n="terms.act4.text"> Les membres du programme Walaa Rewards doivent informer à l’avance l'entreprise par courrier électronique en spécifiant leur code d'identification pour bénéficier de l'un des avantages suivants : conducteur additionnel, accessoire gratuit, surclassement gratuit, et garantie du modèle.</p>
  </div>

  <div class="acte">
    <h3  data-i18n="terms.act5.title">Acte 5 :</h3>
    <p data-i18n="terms.act5.text"> L'entreprise ne garantit pas la disponibilité des accessoires à tout moment. Dans certains cas, l’accessoire désiré peut ne pas être disponible en raison d'une forte demande, d'une rupture de stock ou pour des raisons de maintenance.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act6.title">Acte 6 :</h3>
    <p data-i18n="terms.act6.text">Bien que les accessoires de Walaa Rewards soient fournis au client à titre gratuit, le fait de les perdre ou de leur causer un quelconque dommage, matériel ou technique, entraînera la déduction des frais des dommages subis à partir de la caution précédemment déposée.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act7.title">Acte 7 :</h3>
    <p data-i18n="terms.act7.text">SG CAR ne fournit aucun programme de fidélité autre que Walaa Rewards ; L’entreprise se détache des programmes de fidélité proposés par le réseau  SG CAR national.</p>
  </div>

  <div class="acte">
    <h3 ata-i18n="terms.act8.title">Acte 8 :</h3>
    <p data-i18n="terms.act8.text">Les réservations effectuées à travers les brokers (intermédiaires) ou tout autre site que www.SGCAR.ma ne peuvent pas bénéficier du programme Walaa Rewards.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act9.title">Acte 9 :</h3>
    <p data-i18n="terms.act9.text">Les avantages suivants : second conducteur gratuit, accessoire gratuit, surclassement gratuit, et garantie du modèle, peuvent être obtenus une seule fois par an et restent soumis à la disponibilité lors du check-out.</p>
  </div>

  <div class="acte">
    <h3 data-i18n="terms.act10.title">Acte 10 :</h3>
    <p data-i18n="terms.act10.text">Les remises offertes par Walaa Rewards ne peuvent pas être cumulées avec aucun autre type de réductions.</p>
  </div>
</section>

<?php include('chargement.php');?> 
<?php include('Apropos.php');?>
<?php include('chat.php');?>
<?php include('langue.php');?>
<?php include('flèche.php');?>
<?php include('piedPage.php');?> 




   <script>
   
// Initialiser Flatpickr pour les inputs
    flatpickr("#input1", {
        enableTime: false,
        dateFormat: "d-m-Y",
    });

    flatpickr("#input3", {
        enableTime: false,
        dateFormat: "d-m-Y",
    });

    flatpickr("#input2", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    flatpickr("#input4", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    function validerFormulaire() {
        let valide = true;

        document.querySelectorAll(".error-message").forEach(div => (div.innerText = ""));

        const champs = [
            { id: "input1", message: "Veuillez choisir une date" },
            { id: "input2", message: "Veuillez choisir une heure" },
            { id: "input3", message: "Veuillez choisir une date" },
            { id: "input4", message: "Veuillez choisir une heure" },
            { id: "categorie", message: "Veuillez choisir une catégorie" },
        ];

        champs.forEach(champ => {
            const input = document.getElementById(champ.id);
            if (!input.value.trim()) {
                document.getElementById("error-" + champ.id).innerText = champ.message;
                valide = false;
            }
        });

        const input1 = document.getElementById("input1").value;
        const input3 = document.getElementById("input3").value;
        if (input1 && input3) {
            const dateReception = new Date(input1);
            const dateRestitution = new Date(input3);
            if (dateRestitution < dateReception) {
                document.getElementById("error-input3").innerText = "La date de restitution doit être postérieure à la date de réception";
                valide = false;
            }
        }

        if (!document.getElementById("case1").checked) {
            document.getElementById("error-permis").innerText = "Vous devez confirmer que vous avez le permis";
            valide = false;
        }

        if (!document.getElementById("case2").checked) {
            document.getElementById("error-age_ok").innerText = "Vous devez confirmer avoir plus de 21 ans";
            valide = false;
        }

        return valide;
    }


   </script>
</body>
</html>