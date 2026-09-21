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
.separateur {
    width: 100%; 
    height: 5px; /* épaisseur du trait */
    background-color: #5A189A; /* Couleur du trait */
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
    top: 80px;  
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


 .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 50px;
      max-width: 1200px;
     margin: 80px auto; 
     padding: 0 20px;
    }

   .card {
  position: relative;
  border-radius: 15px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: 0 8px 25px rgba(90, 24, 154, 0.15);
  transition: transform 0.3s ease;
  height: 350px;
  background: #fff;
  text-align: center;
  padding: 0;
}

.card:hover {
  transform: scale(1.05);
}

.discount-badge {
  position: absolute;
  top: 15px;
  left: 15px;
  background-color:#5A189A;
  color: white;
  padding: 7px 12px;
  border-radius: 12px;
  font-weight: 700;
  font-size: 0.95rem;
  z-index: 10;
  box-shadow: 0 2px 8px rgba(0,0,0,0.3);
}

.background-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  filter: brightness(0.9); /* optionnel, pour faire ressortir la voiture */
}

.car-img {
  position: absolute;
  top: 75%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 40%;
  max-height: 50%;
  pointer-events: none;
 

  /* Halo lumineux chaud */
  filter: drop-shadow(0 0 8px rgba(255, 200, 0, 0.8)) drop-shadow(0 0 15px rgba(255, 170, 0, 0.7));
  /* Ajout d’un glow */
  box-shadow: 0 0 30px 15px rgba(255, 215, 0, 0.4);
  border-radius: 15px;

  /* Animation pulsation douce du glow */
  animation: sunGlow 3s ease-in-out infinite alternate;
}

/* Animation cléframes */
@keyframes sunGlow {
  0% {
    box-shadow: 0 0 15px 5px rgba(255, 215, 0, 0.3);
    filter: drop-shadow(0 0 6px rgba(255, 200, 0, 0.6));
  }
  100% {
    box-shadow: 0 0 35px 20px rgba(255, 215, 0, 0.6);
    filter: drop-shadow(0 0 15px rgba(255, 200, 0, 1));
  }
}


  .overlay-text {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(0, 0, 0, 0.6);
      color: white;
      padding: 12px 10px;
      font-size: 0.9em;
      text-align: center;
      font-weight: 500;
      z-index: 1;
    }




    a {
      text-decoration: none;
    }

    @media (max-width: 600px) {
      .card {
        height: 180px;
      }
    }
</style>
</head>
<body>
        <?php include('overlay.php');?> 
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
    <img src="image/promo/promotion.jpg" alt="">

   </div>

      <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="#" class="lien1">Bons plans SG CAR</a>  
    <h2 class='lien1-texte'>BONS PLANS SG CAR LOCATION DE VOITURE</h2>
</div>

  <div class="gallery">
    <!-- Exemple de carte (duplique pour les autres) -->
    <a href="plan1.php">
      <div class="card">
        <div class="discount-badge">5%</div>
        <img src="image/promo/PERSONNE.jpg" alt="Voiture 1">
          <img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" />
        <div class="overlay-text">Réservez directement avec <strong>SG CAR</strong> et payez toujours moins cher !</div>
      </div>
    </a>

    <!-- Répète pour 8 autres véhicules -->
    <a href="plan3.php"><div class="card"><div class="discount-badge">15%</div><img src="image/promo/valentine.jpg"class="background-img">
    <img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" />
    <div class="overlay-text"> Réservez avec<strong>SG CAR</strong> et bénéfissez d'une promotion pour la saint valentin</div></div></a>
    <a href="plan2.php"><div class="card"><div class="discount-badge">15%</div><img src="image/promo/famille.jpg" class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text">Un Aid par comme les autre mais toujours fêté en famille</div></div></a>
    <a href="plan4.php"><div class="card"><div class="discount-badge">20%</div><img src="image/promo/noel.jpg" class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text">Réservez chez <strong>SG CAR</strong> et bénéfissez d'un promo code CHRISTMAS !</div></div></a>
    <a href="plan5.php"><div class="card"><div class="discount-badge">30%</div><img src="image/promo/black.jpg" class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text">Black friday <strong>30%</strong>!</div></div></a>
    <a href="plan6.php"><div class="card"><div class="discount-badge">-15%</div><img src="image/promo/code.jpg" class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text"> Code Promo <strong>-15%</strong>!</div></div></a>
    <a href="plan7.php"><div class="card"><div class="discount-badge">15%</div><img src="image/promo/saint.jpg" class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text">Réservez et célébrez le Toussaint avec <strong>SG CAR</strong>! </div></div></a>
    <a href="plan8.php"><div class="card"><div class="discount-badge">15%</div><img src="image/promo/été.jpg" class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text">Vivez l'été avec <strong>SG CAR</strong>!</div></div></a>
    <a href="plan9.php"><div class="card"><div class="discount-badge">15%</div><img src="image/promo/mouton.jpg"class="background-img"><img src="image/promo/picanto.jpeg" alt="Voiture miniature" class="car-img" /><div class="overlay-text">Retrouvez et fêtez la Tabaski avec vos proche grâce à <strong>SG CAR</strong>  !</div></div></a>
  </div>




   <?php include('chargement.php');?> 
  <?php include('flèche.php');?>
   <?php include('chat.php');?>
   <?php include('piedPage.php');?>


<script>
      // Initialiser Flatpickr pour les inputs
flatpickr("#input1", {
    enableTime: false, // Désactiver la sélection de l'heure
    dateFormat: "d-m-Y", // Format de la date
});

flatpickr("#input3", {
    enableTime: false, // Désactiver la sélection de l'heure
    dateFormat: "d-m-Y", // Format de la date
});

  flatpickr("#input2", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i", // Format: Heure:Minute
    time_24hr: true
  });


 flatpickr("#input4", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i", // Format: Heure:Minute
    time_24hr: true
  });



function validerFormulaire() {
    let valide = true;

    // Effacer les anciens messages
    document.querySelectorAll(".error-message").forEach(div => div.innerText = "");

    // Vérifications des champs obligatoires
    const champs = [
        { id: "input1", message: "Veuillez choisir une date" },
        { id: "input2", message: "Veuillez choisir une heure" },
        { id: "input3", message: "Veuillez choisir une date" },
        { id: "input4", message: "Veuillez choisir une heure" },
        { id: "categorie", message: "Veuillez choisir une catégorie" }
    ];

    champs.forEach(champ => {
        const input = document.getElementById(champ.id);
        if (!input.value.trim()) {
            document.getElementById("error-" + champ.id).innerText = champ.message;
            valide = false;
        }
    });

    // --- Vérification date réception >= aujourd'hui ---

    const input1 = document.getElementById("input1");
    if (input1.value) {
        // La date est au format "d-m-Y" (ex: 29-05-2025)
        
        const parts = input1.value.split("-"); // ["29", "05", "2025"]
        if (parts.length === 3) {
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1; // Mois 0-based
            const year = parseInt(parts[2], 10);

            const dateReceptionObj = new Date(year, month, day);

            // Date d'aujourd'hui, à minuit
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            if (dateReceptionObj < today) {
                document.getElementById("error-input1").innerText = "Veuillez entrer une date valide ";
                valide = false;
            }
        } else {
            // Format invalide, message d'erreur
            document.getElementById("error-input1").innerText = "Format de date invalide";
            valide = false;
        }
    }

    // Vérification des cases à cocher
    if (!document.getElementById("case1").checked) {
        document.getElementById("error-permis").innerText = "Veuillez cocher cette case";
        valide = false;
    }

    if (!document.getElementById("case2").checked) {
        document.getElementById("error-age_ok").innerText = "Veuillez cocher cette case";
        valide = false;
    }

    // Vérification des dates cohérentes (réception <= restitution)

    const input3 = document.getElementById("input3");
    if (input1.value && input3.value) {
        // Convertir date de réception (input1)
        const partsReception = input1.value.split("-");
        const dateReceptionObj = new Date(parseInt(partsReception[2], 10), parseInt(partsReception[1], 10) - 1, parseInt(partsReception[0], 10));

        // Convertir date restitution (input3)
        const partsRestitution = input3.value.split("-");
        const dateRestitutionObj = new Date(parseInt(partsRestitution[2], 10), parseInt(partsRestitution[1], 10) - 1, parseInt(partsRestitution[0], 10));

        if (dateRestitutionObj < dateReceptionObj) {
            document.getElementById("error-input3").innerText = "La date de restitution doit être après la date de réception";
            valide = false;
        }
    }

    // Après la vérification des dates cohérentes,  

const input2 = document.getElementById("input2"); // heure réception
const input4 = document.getElementById("input4"); // heure restitution

if (input1.value && input3.value && input2.value && input4.value) {
    // Convertir les dates en Date objects (déjà fait avant mais à répéter ici si besoin)
    const partsReception = input1.value.split("-");
    const partsRestitution = input3.value.split("-");

    const dateReceptionObj = new Date(parseInt(partsReception[2], 10), parseInt(partsReception[1], 10) - 1, parseInt(partsReception[0], 10));
    const dateRestitutionObj = new Date(parseInt(partsRestitution[2], 10), parseInt(partsRestitution[1], 10) - 1, parseInt(partsRestitution[0], 10));

    // Si les dates sont égales
    if (dateReceptionObj.getTime() === dateRestitutionObj.getTime()) {
        // Fonction utilitaire pour convertir "HH:mm" en minutes depuis minuit
        function heureEnMinutes(heureStr) {
            const [heures, minutes] = heureStr.split(":").map(Number);
            return heures * 60 + minutes;
        }

        const minutesReception = heureEnMinutes(input2.value);
        const minutesRestitution = heureEnMinutes(input4.value);

        if (minutesRestitution <= minutesReception) {
            document.getElementById("error-input4").innerText = "L'heure de restitution identique à l'heure de réception.Veuillez modifier";
            valide = false;
        }
    }
}


    return valide;
}
 



  

</script>
</body>
</html>