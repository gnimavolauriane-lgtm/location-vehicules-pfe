


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
    <link rel="stylesheet" href="DECOUVERTE.css">
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
    <a href="#" class="lien1">Ain Asserdoun  </a>
    <h2 class='lien1-texte'>Ain Asserdoun-Le joyau de Beni Mellal</h2>
</div>
 
<section class="activité">
   <div class="description-generale">
    <p>
    Située à l’est de la ville de Béni Mellal, Ain Asserdoun est une source d’eau douce dont l’origine remonte à l’Antiquité. Son nom provient de la langue amazighe : « Ain » signifiant « source » et « Asserdoun » signifiant « mulet », ce qui laisse penser qu’elle fut longtemps un point d’eau vital pour les caravanes, les agriculteurs et les bêtes de somme traversant la région. Cette source exceptionnelle a joué un rôle central dans l’histoire hydraulique de la région de Tadla, une plaine agricole fertile du centre du Maroc. Dès les premiers siècles de l’ère islamique, les communautés locales y ont développé un réseau de canaux d’irrigation traditionnel pour alimenter les cultures en eau. Sous le règne du sultan Moulay Ismaïl au XVIIe siècle, des aménagements ont été renforcés pour stabiliser l’approvisionnement en eau de la région et soutenir le développement urbain de Béni Mellal. Inspiré de l’architecture andalouse, un jardin en terrasses a été aménagé autour de la source, avec des bassins, des fontaines et des escaliers de pierre. En 1947, Ain Asserdoun est officiellement classée patrimoine national en raison de sa valeur écologique, historique et culturelle. Depuis, elle a connu plusieurs campagnes de restauration pour en faire un véritable parc naturel, aujourd’hui doté de sentiers, d’aires de repos, d’un musée, d’un café panoramique et de jardins botaniques.
    </p>
   </div>

   <div class="phrase-lieu">
      <p>Voici les meilleures coins à visiter de  Ain Asserdoun:</p>
   </div>
    
   <div class="image-lieu">
     <img src="image/vueAin.jpg" alt="">
   </div>

   <div class="titre-lieu">
     <h2>1. Les Cascades d'Ain Asserdoun</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Ces chutes d'eau pittoresques, situées au cœur d'un jardin andalou, sont l'attraction principale du site. L'eau cristalline s'écoule en cascades, créant une ambiance rafraîchissante et apaisante. C'est un endroit idéal pour se détendre, prendre des photos ou simplement profiter de la nature.​
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/cascade.jpeg" alt="">
   </div>

   <div class="texte-lieu">
      <p>
      Au cœur de ce site se trouvent les cascades d’Ain Asserdoun, petites chutes d’eau qui coulent à travers un décor fleuri et verdoyant. Elles offrent un lieu paisible et frais, très apprécié pour les balades, les photos ou simplement pour profiter de la nature. Le ruissellement de l’eau et les jardins en terrasses donnent au site un charme unique, mêlant histoire et beauté naturelle.
      </p>
   </div>


   <div class="titre-lieu">
     <h2>2.Borj Ras el Ain (Le Palais de Beni Mellal)</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Situé au sommet de la colline qui surplombe Ain Asserdoun, ce palais historique offre une vue panoramique spectaculaire sur la ville et ses environs. Accessible à pied depuis le parc, il représente un témoignage du passé de la région et constitue un excellent point de vue pour les amateurs de photographie.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/palais.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Non loin d’Ain Asserdoun se dresse le Palais de Béni Mellal, aussi appelé Borj Ras el Ain. Construit au XVIIe siècle par le sultan Moulay Ismaïl, ce palais-forteresse surplombe la ville et servait à la fois de poste militaire et de point de surveillance stratégique. Offrant une vue panoramique sur la plaine de Tadla et les montagnes du Moyen Atlas, il est aujourd’hui un lieu emblématique de l’histoire et de l’identité de Béni Mellal.
      </p>
   </div>

   <div class="titre-lieu">
     <h2>3. Les Jardins Andalous </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Les Jardins Andalous d’Ain Asserdoun sont un véritable écrin de verdure niché au pied du Moyen Atlas, autour de la source principale. Conçus dans un style inspiré des jardins hispano-mauresques, ils se caractérisent par leurs allées pavées, leurs escaliers fleuris, leurs fontaines sculptées et leurs bassins où se reflète la lumière naturelle. Ce mélange de végétation ordonnée et d’eau en mouvement crée une atmosphère de calme et d’harmonie, très prisée par les visiteurs en quête de fraîcheur et de sérénité.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/Jardin.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      En se promenant dans ces jardins, on est entouré de haies de buissons soigneusement taillés, de fleurs colorées et d’arbres fruitiers qui dégagent un parfum subtil, surtout au printemps. L’agencement en terrasses permet d’admirer la vue sur la vallée de Béni Mellal tout en découvrant, à chaque niveau, un nouvel angle sur la source et les montagnes environnantes. C’est un lieu parfait pour se détendre, prendre des photos, ou simplement s’imprégner du charme intemporel de ce coin paisible, au croisement de l’histoire et de la nature.
      </p>
   </div>


   <div class="titre-lieu">
     <h2>4.Le Café Panoramique</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Situé en hauteur, non loin du sommet du parc d’Ain Asserdoun, le Café Panoramique est l’un des meilleurs endroits pour faire une pause tout en admirant le paysage. Installé sur une grande terrasse surplombant la plaine de Tadla et la ville de Béni Mellal, ce café offre une vue spectaculaire qui s’étend jusqu’aux contreforts du Moyen Atlas. Le cadre est calme et aéré, parfait pour savourer un thé à la menthe, un café marocain ou une pâtisserie locale après une promenade dans les jardins et les sentiers.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/Café.jpg" alt="">
   </div>
   

   <div class="texte-lieu">
      <p>
      L’ambiance y est conviviale, souvent rythmée par le bruit de l’eau des cascades en contrebas et le chant des oiseaux. Le mobilier simple, en bois ou en fer forgé, s’intègre parfaitement dans l’environnement naturel. En fin d’après-midi, c’est l’un des meilleurs points pour admirer le coucher du soleil sur la vallée, avec une lumière dorée qui enveloppe la ville et les montagnes. Que tu sois seul, en couple ou en famille, c’est un endroit parfait pour se détendre tout en profitant d’un panorama inoubliable.
      </p>
   </div><div class="titre-lieu">
     <h2>5.Souk Ain Asserdoun </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Ce marché propose une variété de  produits artisanaux, notamment des <span>colliers</span>, des <span>bracelets</span>, des <span>sacs en cuir</span>, des <span>poteries</span>, des <span>tapis berbères</span> et des <span>articles en bois sculpté</span>. Les artisans locaux y vendent leurs créations, offrant ainsi aux touristes une occasion unique de découvrir et d'acquérir des objets faits main, témoignant du savoir-faire traditionnel de la région.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/Souk.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Ce marché est idéal pour ceux qui souhaitent ramener un souvenir authentique de leur visite à Ain Asserdoun. Il est situé à quelques pas de la source, ce qui permet de combiner la découverte du site naturel avec l'achat de produits artisanaux locaux. N'hésite pas à flâner entre les étals, à discuter avec les artisans et à négocier les prix pour repartir avec un souvenir unique de Béni Mellal.
      </p>
   </div>

   <div class="titre-lieu">
     <h2>6.Les sentiers et points de vue autour de la source </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Autour de la source d’Ain Asserdoun, un réseau de sentiers bien tracés permet aux visiteurs de découvrir le site sous différents angles. Ces chemins serpentent à travers les jardins, longent les petits canaux d’irrigation et grimpent en douceur vers des hauteurs offrant de superbes panoramas. Chaque détour révèle un nouveau point de vue sur la ville de Béni Mellal, la plaine de Tadla ou les reliefs du Moyen Atlas. Certains sentiers sont bordés de murets en pierre ou de bancs, parfaits pour faire une pause et admirer le cadre naturel.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/Antourage.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Ces points de vue discrets et tranquilles sont idéals pour les amateurs de photographie ou ceux qui cherchent un moment de calme. En fin de journée, la lumière dorée du coucher de soleil illumine les montagnes et fait scintiller les eaux de la source, offrant un spectacle apaisant et mémorable. Le bruit régulier de l’eau, combiné au chant des oiseaux et à la végétation environnante, donne une ambiance presque méditative. Ces chemins sont accessibles à tous et permettent de vivre Ain Asserdoun à un rythme paisible, loin de l’agitation de la ville.
      </p>
   </div>

</section>

    <div class="offrir">
       <button class="offrir-bouton"><a href="découverte5.php">Page précédente</a></button>
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