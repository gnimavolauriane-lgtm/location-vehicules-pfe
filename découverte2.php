


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

/* section  description de ain asserdoun*/

.activité{
    width: 90%;
    margin: 50px auto;
    font-family: "Roboto",sans-serif;
    color: #111;
    position: relative;
    margin-top: 50px;
    line-height: 1.6;
}

.description-générale p{
    font-size: 18px;
    text-align: justify;
    margin-bottom: 40px;
    font-style: italic;
}

.phrase-description p{
  font-size: 18px;
  font-style: italic;
  text-align: left;
  font-family: "Roboto",sans-serif;
}

.image-lieu{
    text-align: center;
    margin: 30px 0;
}

.image-lieu img{
    width: 50%;
    margin-left: -500px;
    height: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

}

.titre-lieu h2{
    font-size: 24px;
    color: #5A189A;
    margin: 30px 0 10px;
    text-align: left;
}

.texte-lieu p{
    font-size: 16px;
    margin-bottom: 20px;
    text-align: justify;
}

.offrir-bouton{
    background-color:rgba(100, 98, 98, 0.1);
    display: flex;
    align-items: center;
    width: 150px;
    padding: 15px;
    color: #555;
    font-size: 1rem;
    border: none;
    cursor: pointer;
    font-family: "Roboto",sans-serif;
    margin-top: 100px;
    margin-left: 550px;
}

.offrir-bouton a{
    text-decoration: none;
    color: inherit;
}

.offrir-bouton:hover{
    background-color:#9283a0 ;
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
    <img src="image/AinAsserdoum.jpeg" alt="">

   </div>

<div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> >  
    <a href="#" class="lien1">Découvrir Béni Mellal  </a> >
    <a href="#" class="lien1">Kasbah Tadla  </a>
    <h2 class='lien1-texte'>Kasbah Tadla-Voyage au coeur de l'histoire</h2>
</div>
 
<section class="activité">
   <div class="description-generale">
    <p>
    <span>Kasbah Tadla</span>, fondée au début du XIᵉ siècle par la dynastie berbère des <span>Banū Ifren</span>, est située sur la rive droite de l'Oum Er-Rbia. Elle a été un centre névralgique pour les Almoravides, Almohades, Mérinides, Wattassides et Saadiens. Au XVIIᵉ siècle, le <span>sultan Moulay Ismail</span> a renforcé sa position en y construisant une imposante kasbah pour sécuriser la région. Cette forteresse servait de centre administratif, religieux et militaire, avec des mosquées, des casernes et un Dar El Makhzen. Le pont à dix arches, également édifié par Moulay Ismail, traverse l'Oum Er-Rbia et témoigne de l'ingéniosité de l'époque.
    </p>
   </div>

   <div class="phrase-lieu">
      <p>Voici les meilleures coins à visiter à Kasbah Tadla:</p>
   </div>
    
   <div class="image-lieu">
     <img src="image/vueKasbah.jpg" alt="">
   </div>

   <div class="titre-lieu">
     <h2>1.Kasbah de Moulay Ismaïl</h2>
   </div>

   <div class="texte-lieu">
      <p>
      La Kasbah de Moulay Ismaïl est le cœur historique de Kasbah Tadla. Fondée à la fin du XVIIe siècle par le sultan alaouite Moulay Ismaïl, elle fut conçue à la fois comme une forteresse militaire et un centre administratif. Ses remparts massifs, ses tours crénelées et ses portes monumentales témoignent de l'architecture défensive de l'époque. Le complexe comprend deux mosquées et un palais royal, le Dar El Makhzen, qui servait de résidence au sultan et à ses représentants dans la région.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/ismail.jpg" alt="">
   </div>

   <div class="texte-lieu">
      <p>
      Outre sa valeur historique, la kasbah occupe une position stratégique, dominant l'oued Oum Er-Rbia. Le pont à dix arches qui relie les deux rives est l’un des éléments emblématiques du site, offrant une vue spectaculaire sur la vallée environnante. La visite permet d’apprécier le savoir-faire architectural marocain et de mieux comprendre l’organisation politique et militaire du royaume sous Moulay Ismaïl.
      </p>
   </div>


   <div class="titre-lieu">
     <h2>2.Les Khettaras</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Les khettaras sont d’anciens systèmes d’irrigation souterrains utilisés pour acheminer l’eau depuis les nappes phréatiques vers les zones agricoles. À Kasbah Tadla, ces galeries ont été construites dès le XVe siècle pour répondre aux besoins des agriculteurs dans un climat semi-aride. Ce système ingénieux évitait l’évaporation de l’eau et permettait d’irriguer de vastes étendues de terre sans avoir recours à des moyens mécaniques.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/khettara.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Aujourd’hui, certaines khettaras sont encore visibles et témoignent de l’ingéniosité technique des populations d’alors. Les visiteurs peuvent explorer certains tronçons ouverts au public, accompagnés de guides locaux. Ce patrimoine hydraulique rare offre une perspective fascinante sur la relation entre l’homme et son environnement dans le monde rural marocain traditionnel.
      </p>
   </div>

   <div class="titre-lieu">
     <h2>3. Le marché traditionnel </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Le souk hebdomadaire de Kasbah Tadla est un lieu de rencontre incontournable pour les habitants des environs. Il s’y tient chaque semaine, généralement le lundi, et rassemble une grande variété de commerçants et d’artisans. Fruits, légumes, céréales, épices, vêtements, outils agricoles : tout s’y vend dans une ambiance animée et conviviale. C’est l’endroit idéal pour découvrir les produits du terroir et les pratiques de troc encore en usage dans certaines zones rurales.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/marché.webp" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      En plus de son aspect commercial, le marché joue un rôle social important. Il permet aux habitants des douars voisins de se retrouver, d’échanger des nouvelles, et de renforcer les liens communautaires. Pour les visiteurs, c’est l’occasion de s’immerger dans la culture locale et d’observer le quotidien des Tadlis dans un cadre authentique.
      </p>
   </div>


   <div class="titre-lieu">
     <h2>4.Le jardin public</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Ce petit parc, situé à proximité de la kasbah, est un havre de paix apprécié par les habitants de la ville. Bordé d’arbres centenaires, de massifs fleuris et de bancs ombragés, il offre un espace de détente et de fraîcheur, surtout durant les chaudes journées d’été. Les familles s’y retrouvent souvent en fin de journée pour se promener, jouer ou simplement se reposer.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/jardinPublique.jpg" alt="">
   </div>
   

   <div class="texte-lieu">
      <p>
      Le jardin est aussi un lieu d’observation privilégié de la vie quotidienne. On peut y voir des anciens discuter sous les arbres, des enfants courir ou encore des artistes de rue improviser un spectacle. C’est un endroit modeste, mais plein de charme, qui reflète l’âme tranquille et chaleureuse de Kasbah Tadla.
      </p>
   </div><div class="titre-lieu">
     <h2>5.Les ateliers d’artisanat local </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Kasbah Tadla abrite plusieurs ateliers d’artisans spécialisés dans des savoir-faire transmis de génération en génération. La poterie, la vannerie, le tissage de tapis berbères et la fabrication de bijoux traditionnels sont autant d’activités qui témoignent de la richesse culturelle locale. Ces artisans travaillent souvent à la main, avec des outils simples, selon des techniques ancestrales.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/atelier.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Visiter ces ateliers permet non seulement de découvrir l’artisanat marocain dans son expression la plus authentique, mais aussi de soutenir l’économie locale. Certains ateliers proposent des démonstrations et permettent même aux visiteurs de s’initier à certaines techniques. C’est une expérience enrichissante, idéale pour ceux qui souhaitent repartir avec un souvenir unique et fait main.
      </p>
   </div>

   <div class="titre-lieu">
     <h2>6. Les festivals locaux</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Tout au long de l’année, Kasbah Tadla célèbre divers événements culturels et religieux qui donnent lieu à des festivals animés. Parmi les plus populaires figurent les moussem traditionnels, qui honorent des saints locaux avec des processions, des chants religieux et des danses folkloriques. Ces fêtes attirent des visiteurs de toute la région et renforcent l’identité culturelle de la ville.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/festival.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Les festivals incluent aussi des concerts, des expositions artisanales, et parfois des courses de chevaux (fantasia), très appréciées dans le Moyen Atlas. Pour les touristes, c’est l’occasion idéale de vivre une immersion culturelle totale, en partageant les traditions et la convivialité des habitants. Ces moments festifs laissent souvent un souvenir marquant par leur authenticité et leur richesse humaine.
      </p>
   </div>

</section>

    <div class="offrir">
       <button class="offrir-bouton"><a href="découverte4.php">Page précédente</a></button>
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


   </script>
<?php include('Apropos.php');?>
<?php include('langue.php');?>
<?php include('chat.php');?>
<?php include('flèche.php');?>
<?php include('piedPage.php');?>

</body>
</html>