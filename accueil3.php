

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


/* Conteneur principal de la carte */
.carte1 {
    position: relative;
    max-width: 80%;
    margin: 100px auto 0 20px; /* margin-top supprimé */
    
}

.carte1 img {
    width: 110%;
    height: auto;
    object-fit: cover;
}

/* Sections Offre & Avantages */
.offre-contenu,
.offre-contenu1,
.avantage-offre {
    width: 97%;
    margin: 320px auto 0 auto;
}

.offre-titre,
.offre-titre1,
.avantage-titre {
    font-size: 1.5rem;
    font-family: 'Roboto', sans-serif;
    margin-bottom: 20px;
    margin-top: -300px;
    margin-left: -5px;
}

.offre-texte,
.offre-texte1 {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
    text-align: justify;
    margin-top: 20px;
    width: 100%;
}

.offre-texte p,
.offre-texte1 p {
    margin-bottom: 15px;
}

.avantage-liste ul {
    list-style-type: disc;
    padding-left: 40px;
    text-align: left;
}

.avantage-liste li {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 15px;
}

/* Formulaire Offre */
.formulaire-offre {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    margin-top:20px;
    height: auto;
    margin-bottom:50px
}

.form-offre {
    display: flex;
    flex-wrap: wrap;
    width: 97%;
}

.section-gauche,
.section-droite {
    display: flex;

    flex-direction: column;
    gap: 20px;
    width: 50%;
    margin-bottom: 20px;
    padding: 0 20px; /* ajout d'un padding horizontal pour espacement */
}

.section-gauche input,
.section-droite input,
.section-droite select {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    margin: -5px 0;
    box-sizing: border-box;
}

.section-droite input {
    margin: -5px 0;
}

input:hover,
select:hover {
    border: 1.3px solid #111;
}

input:focus,
select:focus,
textarea:focus {
    outline: none;
    border: 2px solid #5A189A;
}

input:focus::placeholder,
select:focus::placeholder,
textarea:focus::placeholder {
    color: #5A189A;
}

input::placeholder,
textarea::placeholder {
    opacity: 1;
    color: #111;
    font-style: italic;
    font-size: 1rem;
    transition: color 0.3s;
}

/* Commentaire textarea */
.section-commentaire {
    width: 98%;
    margin-top:-5px;
    margin-left:10px;
    font-family: Arial, sans-serif;
}

.section-commentaire textarea {
    width: 100%;
    height: 200px;
    padding: 10px;
    font-size: 16px;
    resize: none;
    margin-bottom: 20px;
}

/* Boutons */
.bouton {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px;
    background-color: #7a589b;
    border: none;
    color: #fff;
    font-size: 1.5rem;
    cursor: pointer;
    font-weight: bold;
    margin: 10px 10px 0 0;
    width: 2000%; /* Corrige la largeur excessive */
    max-width: 1200px; /* limite la taille */
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.bouton:hover {
    background-color: #9283a0;
}

/* Offrir bouton */
.offrir-bouton {
    background-color: rgba(100, 98, 98, 0.1);
    display: flex;
    align-items: center;
    width: 150px;
    padding: 15px;
    color: #555;
    font-size: 1rem;
    border: none;
    cursor: pointer;
    font-family: "Roboto", sans-serif;
    margin: 350px 0 0 550px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.offrir-bouton a {
    text-decoration: none;
    color: inherit;
}

.offrir-bouton:hover {
    background-color: #9283a0;
}

/* Toast message succès */
.toast-success {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #d4edda;
    color: #155724;
    padding: 15px 20px;
    border: 1px solid #c3e6cb;
    border-radius: 8px;
    font-weight: bold;
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 10px;
}

.toast-success.hidden {
    display: none;
}

.toast-close {
    background: none;
    border: none;
    font-size: 1.2em;
    cursor: pointer;
    margin-left: auto;
}

/* Messages d'erreur */
.erreur-message {
    color: #d9534f; /* Rouge Bootstrap */
    font-size: 0.9em;
    margin-top: 4px;
    display: block;
    font-weight: 500;
    font-family: 'Segoe UI', sans-serif;
}

/* Correction petits ajustements margin */
#text, #texte, #texte1 {
    margin-top: 0; /* supprime les marges négatives inutiles */
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
    <img src="image/contact.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> >  
    <a href="#" class="lien1">Nos offres spéciales pour entreprise</a> 
    <h2 class='lien1-texte'>NOS OFFRES SPECIALES POUR ENTREPRISE </h2>
</div>
<div class="carte1">
    <img src="image/offre.png" alt="" srcset="">
   </div>

   <div class="offre-contenu">
        <h1 class="offre-titre">Offre Spéciale SG CAR Solutions : Louez Malin, Roulez Pro !</h1>
        <div class="offre-texte">
            <p>Chez SG CAR Solutions, nous comprenons l'importance d'une solution de transport fiable et flexible pour votre entreprise. C'est pourquoi nous vous proposons une offre exclusive de location de véhicules utilitaires L2H2 à seulement 360 MAD HT par jour. Conçus pour répondre aux besoins variés des professionnels, nos véhicules vous permettent de gérer facilement vos missions de transport temporaire, quel que soit votre secteur d'activité.</p>
            <p>Que vous soyez une petite entreprise, un artisan ou un déménageur, cette offre est idéale pour vous offrir une mobilité professionnelle efficace et économique. Profitez de tarifs compétitifs tout en bénéficiant de la qualité et de la fiabilité des véhicules Hertz, conçus pour vous accompagner au quotidien dans vos projets professionnels.</p>
        </div>
    </div>

    <div class="avantage-offre">
        <h1 class="avantage-titre">Les Avantages de cette Offre</h1>
        <div class="avantage-liste">
            <ul>
                <li><strong>Tarif attractif :</strong> À partir de 360 MAD HT par jour, avec des tarifs dégressifs pour les locations prolongées.</li>
                <li><strong>Large choix de véhicules utilitaires L2H2 :</strong> Une gamme variée pour répondre à tous vos besoins professionnels de transport.</li>
                <li><strong>Assistance routière 24/7 :</strong> Pour une tranquillité d’esprit totale en cas de panne ou d'incident.</li>
                <li><strong>Kilométrage inclus :</strong> Forfait kilométrique adapté pour des locations de moyenne durée.</li>
                <li><strong>Révision et entretien inclus :</strong> Des véhicules régulièrement entretenus pour une sécurité optimale.</li>
                <li><strong>Options de livraison et récupération :</strong> Livraison du véhicule à votre adresse et récupération à la fin de votre location pour plus de confort.</li>
                <li><strong>Service client dédié :</strong> Accès à une assistance prioritaire pour toute question ou besoin pendant votre location.</li>
                <li><strong>Véhicules neufs :</strong> Des véhicules modernes, parfaitement équipés et prêts à l’emploi.</li>
            </ul>
        </div>
    </div>

    <div class="offre-contenu">
        <h1 class="offre-titre">Pourquoi choisir SG CAR Solutions ?</h1>
        <div class="offre-texte">
            <p> SG Car Solutions est le partenaire idéal pour les entreprises à la recherche de solutions de transport souples, sécurisées et professionnelles. Nous vous offrons un service personnalisé, avec une large gamme de véhicules adaptés à vos besoins spécifiques. Profitez de cette offre limitée pour louer un véhicule utilitaire à prix réduit et optimiser la mobilité de votre entreprise.</p>
        </div>
    </div>
    
    <div class="offre-contenu1">
        <h1 class="offre-titre1">Attention,offre limitée !</h1>
        <div class="offre-texte1">
            <p>Ne laissez pas passer cette occasion de bénéficier de notre offre promotionnelle. Réservez dès maintenant votre véhicule utilitaire à un tarif exclusif. L’offre est valable pour une durée limitée, alors ne tardez pas !</p>
        </div>
    </div>
    
    <div class="formulaire-offre">
    <form class="form-offre" id="form-offre" novalidate>
        <div class="section-gauche">
            <input type="text" id="entreprise" placeholder="Dénomination Entreprise" required>
            <div class="erreur-message" id="error-entreprise"></div>

            <input type="text" id="adresse" placeholder="Adresse" required>
            <div class="erreur-message" id="error-adresse"></div>

            <input type="tel" id="telephone" placeholder="Téléphone" required>
            <div class="erreur-message" id="error-telephone"></div>

            <input type="text" id="vehicules" placeholder="Nombre de véhicules" required>
            <div class="erreur-message" id="error-vehicules"></div>
        </div>

        <div class="section-droite">
            <input type="text" id="nom" placeholder="Nom" required>
            <div class="erreur-message" id="error-nom"></div>

            <input type="email" id="email" placeholder="Email" required>
            <div class="erreur-message" id="error-email"></div>

        <select id="categories" required>
            <option value="" disabled selected hidden>Catégorie de véhicules</option>
            <option value="Citadine">Citadine</option>
            <option value="Compact">Compact</option>
            <option value="SUV">SUV 4x4</option>
            <option value="Premium">Premium</option>
            <option value="Utilitaire">Utilitaire</option>
            <option value="Minibus">Minibus</option>
        </select>
        <div class="erreur-message" id="erreur-categories"></div>


            <input type="text" id="duree" placeholder="Durée de votre location" required>
            <div class="erreur-message" id="error-duree"></div>
        </div>

        <div class="section-commentaire">
            <textarea id="infos" placeholder="Informations complémentaires"></textarea>
        </div>

        <div class="section-bouton">
            <button class="bouton" type="submit">Envoyer</button>
        </div>
    </form>
</div>

<!--  Toast de confirmation -->
<div id="toast-success-offre" class="toast-success hidden">
    <span class="toast-icon">✅</span>
    <span class="toast-text">Votre demande a bien été envoyée.</span>
    <button class="toast-close" onclick="fermerToastOffre()">×</button>
</div>



    
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




       
document.addEventListener("DOMContentLoaded", () => {
    console.log("script chargé");

    const form = document.getElementById("form-offre");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
       

        // Réinitialisation des erreurs
        document.querySelectorAll(".erreur-message").forEach(el => el.textContent = "");

        let valide = true;

        // Récupération des champs
        const entreprise = document.getElementById("entreprise");
        const adresse = document.getElementById("adresse");
        const telephone = document.getElementById("telephone");
        const vehicules = document.getElementById("vehicules");
        const nom = document.getElementById("nom");
        const email = document.getElementById("email");
        const categorie = document.getElementById("categories");
        const duree = document.getElementById("duree");
        const infos = document.getElementById("infos");

        // Regex
        const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
        const telRegex = /^\+?[0-9\s\-]{7,15}$/;

        // Vérifications
        if (!entreprise.value.trim()) {
            document.getElementById("error-entreprise").textContent = "Veuillez entrer le nom de l'entreprise.";
            valide = false;
        }

        if (!adresse.value.trim()) {
            document.getElementById("error-adresse").textContent = "Veuillez entrer une adresse.";
            valide = false;
        }

        if (!telephone.value.trim()) {
            document.getElementById("error-telephone").textContent = "Veuillez entrer un numéro de téléphone.";
            valide = false;
        } else if (!telRegex.test(telephone.value.trim())) {
            document.getElementById("error-telephone").textContent = "Numéro de téléphone invalide.";
            valide = false;
        }

        if (!vehicules.value.trim()) {
            document.getElementById("error-vehicules").textContent = "Veuillez indiquer le nombre de véhicules.";
            valide = false;
        } else if (isNaN(vehicules.value) || Number(vehicules.value) <= 0) {
            document.getElementById("error-vehicules").textContent = "Veuillez entrer un nombre valide de véhicules.";
            valide = false;
        }

        if (!nom.value.trim()) {
            document.getElementById("error-nom").textContent = "Veuillez entrer un nom.";
            valide = false;
        }

        if (!email.value.trim()) {
            document.getElementById("error-email").textContent = "Veuillez entrer un email.";
            valide = false;
        } else if (!emailRegex.test(email.value.trim())) {
            document.getElementById("error-email").textContent = "Adresse email invalide.";
            valide = false;
        }

        if (categories.value === "") {
            document.getElementById("erreur-categories").textContent = "Veuillez choisir une catégorie.";
            valide = false;
        }

        if (!duree.value.trim()) {
            document.getElementById("error-duree").textContent = "Veuillez indiquer la durée.";
            valide = false;
        } else if (isNaN(duree.value)) {
            document.getElementById("error-duree").textContent = "Veuillez entrer une durée valide (en jours, semaines, etc).";
            valide = false;
        }

        if (!valide) return;

        // Préparation des données
        const formData = new FormData();
        formData.append("entreprise", entreprise.value);
        formData.append("adresse", adresse.value);
        formData.append("telephone", telephone.value);
        formData.append("vehicules", vehicules.value);
        formData.append("nom", nom.value);
        formData.append("email", email.value);
        formData.append("categories", categories.value);
        formData.append("duree", duree.value);
        formData.append("infos", infos.value);

        // Envoi via Fetch
        fetch("traitement_offre.php", {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (!response.ok) throw new Error("Erreur lors de l'envoi.");
                return response.text();
            })
            .then(data => {
                form.reset();
                afficherToastOffre();
            })
            .catch(error => {
                alert("Une erreur est survenue. Merci de réessayer.");
                console.error(error);
            });
    });
});


function afficherToastOffre() {
    const toast = document.getElementById("toast-success-offre");
    toast.classList.remove("hidden");

    setTimeout(() => {
        toast.classList.add("hidden");
    }, 5000);
}

function fermerToastOffre() {
    document.getElementById("toast-success-offre").classList.add("hidden");
}



    </script>

    <?php include('chargement.php');?> 
    <?php include('langue.php');?>
    <?php include('Apropos.php');?>
    <?php include('flèche.php');?>
    <?php include('piedPage.php');?>
</body>
</html>