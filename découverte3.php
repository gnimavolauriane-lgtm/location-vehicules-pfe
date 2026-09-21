
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
    margin-top: 80px;
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
    <a href="#" class="lien1"> Taghzirt </a>
    <h2 class='lien1-texte'>Taghzirt et le Moyen Atlas -L'évasion grandeur nature </h2>
</div>
 
<section class="activité">
   <div class="description-generale">
    <p>
    Taghzirt est une commune rurale située dans la province de Béni Mellal, dans la région Béni Mellal-Khénifra, au cœur du Moyen Atlas marocain. Anciennement connue sous le nom d'Afza, cette localité est réputée pour sa beauté naturelle, ses paysages montagneux et son agriculture traditionnelle. Avec une population d'environ 18 942 habitants selon le recensement de 2004, Taghzirt demeure un lieu authentique, loin des circuits touristiques habituels.
    </p>
   </div>

   <div class="phrase-lieu">
      <p>Voici les meilleures coins à visiter de  Taghzirt:</p>
   </div>
    
   <div class="image-lieu">
     <img src="image/taghzirt.jpg" alt="">
   </div>

   <div class="titre-lieu">
     <h2>1.Barrages de Taghzirt</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Les barrages de Taghzirt constituent une infrastructure vitale pour la gestion de l’eau dans cette zone rurale. Conçus pour réguler le débit des oueds et garantir une irrigation stable, ces barrages soutiennent la vie agricole, essentielle à l’économie locale. Ils alimentent en eau les cultures de céréales, les vergers et les plantations de légumes, tout en prévenant les inondations en période de crues.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/barrage.jpg" alt="">
   </div>

   <div class="texte-lieu">
      <p>
      Outre leur utilité technique, les barrages de Taghzirt sont devenus des lieux de balade et d’observation pour les curieux. Leurs abords offrent des points de vue paisibles sur les reliefs environnants, particulièrement appréciés au lever ou au coucher du soleil. C’est un exemple de l’harmonie possible entre développement rural et respect de l’environnement.
      </p>
   </div>


   <div class="titre-lieu">
     <h2>2.Vallée de la Zat</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Nichée entre montagnes et plateaux, la vallée de la Zat séduit par ses paysages variés et ses villages berbères authentiques. Les cultures en terrasse, les figuiers, les oliviers et les petits cours d’eau donnent à la vallée une atmosphère paisible. On y découvre aussi une architecture traditionnelle, avec des maisons en pisé et des greniers communautaires qui témoignent d’un mode de vie ancestral.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/zat.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      C’est un lieu idéal pour les randonnées à pied ou à dos de mulet, permettant d’explorer une nature intacte tout en rencontrant des habitants chaleureux. Plusieurs circuits mènent à des sources naturelles et à des points de vue spectaculaires. La vallée est un concentré de patrimoine naturel et humain, incarnant l’âme de la région du Moyen Atlas.
      </p>
   </div>

   <div class="titre-lieu">
     <h2>3.  Gorges de l’Oum Er-Rbia </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Ces gorges impressionnantes, façonnées par le fleuve Oum Er-Rbia, révèlent la puissance naturelle de l’érosion au fil du temps. Entre falaises abruptes et eaux vives, le paysage est spectaculaire, offrant un terrain d’exploration idéal pour les amoureux de nature brute. Le site est propice à la randonnée, à la baignade et à l’observation de la faune locale.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/source.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      En parcourant les sentiers escarpés qui longent les gorges, on découvre des panoramas saisissants, entre ombres fraîches et lumière éclatante. Les villages alentour, souvent perchés sur les hauteurs, proposent un accueil simple et chaleureux. Cette immersion entre eau, roche et forêt en fait un des joyaux naturels de la région.
      </p>
   </div>


   <div class="titre-lieu">
     <h2>4. Parc national de Khénifra</h2>
   </div>

   <div class="texte-lieu">
      <p>
      Le parc national de Khénifra, proche de Taghzirt, est une vaste réserve naturelle couvrant plus de 200 000 hectares. Il abrite une faune riche — comme le singe magot, le renard et le faucon — ainsi qu’une flore luxuriante composée notamment de cèdres millénaires. Le parc est un havre pour les biologistes, photographes et amoureux d’écotourisme.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/parc.jpg" alt="">
   </div>
   

   <div class="texte-lieu">
      <p>
      Outre sa biodiversité, le parc propose plusieurs sentiers balisés et des aires de pique-nique. L’altitude modérée et l’air pur du Moyen Atlas en font une destination idéale en été pour fuir la chaleur. Ce site renforce l’importance de la conservation environnementale au Maroc, tout en étant ouvert aux visiteurs désireux de découvrir un écosystème d’exception.
      </p>
   </div><div class="titre-lieu">
     <h2>5.Lac Aguelmam Azegza </h2>
   </div>

   <div class="texte-lieu">
      <p>
      À une trentaine de kilomètres de Taghzirt, ce lac naturel lové dans la forêt est l’un des plus beaux coins d’eau douce du Moyen Atlas. Son nom, qui signifie “lac vert” en amazigh, décrit bien la couleur envoûtante de ses eaux. Le lac est entouré de cèdres et de chênes verts, créant un décor propice à la détente et à la contemplation.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/lac.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Les visiteurs viennent s’y baigner, pêcher ou simplement pique-niquer au bord de l’eau. Des sentiers permettent de faire le tour du lac à pied ou en VTT, et de rejoindre d’autres sites forestiers à proximité. C’est un lieu rafraîchissant, à la fois accessible et encore préservé du tourisme de masse.
      </p>
   </div>

   <div class="titre-lieu">
     <h2>6.Souks et artisanat local </h2>
   </div>

   <div class="texte-lieu">
      <p>
      Les souks de Taghzirt et des communes voisines sont de véritables trésors culturels où l'on découvre le quotidien des habitants. On y trouve des produits artisanaux faits main : tapis berbères, poteries, bijoux en argent, ustensiles en bois et vêtements brodés. C’est aussi l’endroit idéal pour goûter aux spécialités locales comme le pain cuit au feu de bois ou le miel de montagne.
      </p>
   </div>

   <div class="image-lieu">
     <img src="image/souk et artisanat.jpg" alt="">
   </div>
   
   <div class="texte-lieu">
      <p>
      Ces marchés, souvent hebdomadaires, ne sont pas seulement des lieux d’échange économique, mais aussi de rencontres et de transmission de savoir-faire. Le visiteur est immergé dans une ambiance vivante, rythmée par les négociations, les salutations chaleureuses et la richesse des étals. Un passage par le souk, c’est aussi un voyage dans le temps et les traditions amazighes.
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