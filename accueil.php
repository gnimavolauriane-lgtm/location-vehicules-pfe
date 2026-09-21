
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
            <option value="Compact">Compact</option>
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
    <video autoplay muted loop class="video-header">
       <source src="image/entete.mp4" type="video/mp4">
    </video>

   </div>

   <div class="section-location">
       <h2 class="titre"  data-i18n="accueil.section-location.title">Location de voitures chez SG CAR</h2>
        <div class="image-location">
        <a href="accueil1.php" class="image-contenu">
             <img src="image/location 1.jpeg" alt="" class="petite-image">
             <h3 class="image-titre"  data-i18n="accueil.image.title">PROGRAMME DE FIDÉLISATION</h3>
             <p class="image-texte" data-i18n="accueil.image.texte">Gagnez des points à chaque location pour dégager plusieurs avantages gratuits</p>
        </a>

            <a href="accueil2.php" class="image-contenu">
             <img src="image/location 2.jpg" alt="" class="petite-image">
             <h3 class="image-titre" data-i18n="accueil.image.title1">NEWSLETTER</h3>
             <p class="image-texte" data-i18n="accueil.image.texte1">Recevez en exclusivité toutes nos nouvelles offres et promotions</p>
            </a>

            <a href="accueil3.php" class="image-contenu">
             <img src="image/Location3.jpeg" alt="" class="petite-image">
             <h3 class="image-titre" data-i18n="accueil.image.title2">LOCATION COMMERCIALE</h3>
             <p class="image-texte" data-i18n="accueil.image.texte2">Offre de location mensuelle spéciale entreprise sans engagements aux prix les plus bas!
             </p>
            </a>
        </div>
    
   </div>
     
    
   
   <div class="section-vehicules">
    <h2 class="voiture-titre" data-i18n="accueil.voiture.title">Découvrez notre collection de voitures</h2>
    <div class="slider-container">
        <button class="slider-btn left" onclick="moveSlide(-1)">&#10094;</button>
        <div class="slider">
            <div class="vehicule" id="vehicule1">
                <img src="image/voiture 2.jpg" alt="Véhicule 1" class="vehicule-img">
                <h3 class="vehicule-titre" data-i18n="accueil.vehicule.title">Citadine</h3>
                <p class="vehicule-description" data-i18n="accueil.vehicule.texte">Idéales pour se faufiler en ville mais aussi aptes à prendre la route sans trop bagages</p>
                <a href="categorie1.php" class="btn" data-i18n="accueil.voiture.bouton">LOUEZ CETTE CATEGORIE</a>
            </div>
            <div class="vehicule" id="vehicule2">
                <img src="image/voiture1.jpg" alt="Véhicule 2" class="vehicule-img">
                <h3 class="vehicule-titre" data-i18n="accueil.vehicule.title1">Compact</h3>
                <p class="vehicule-description" data-i18n="accueil.vehicule.texte1">Parfaits pour se rendre en ville mais aussi aptes à prendre la route sans trops de bagage</p>
                <a href="categorie2.php?" class="btn" data-i18n="accueil.voiture.bouton1">LOUEZ CETTE CATEGORIE</a>
            </div>
            <div class="vehicule" id="vehicule3">
                <img src="image/voiture 3.jpg" alt="Véhicule 3" class="vehicule-img">
                <h3 class="vehicule-titre" data-i18n="accueil.vehicule.title2">Suv 4*4</h3>
                <p class="vehicule-description" data-i18n="accueil.vehicule.texte2">Cross-Over ou Tout Terrain,idéals pour sortir des sentiers battus en alliant le plaisir</p>
                <a href="categorie3.php" class="btn"data-i18n="accueil.voiture.bouton2">LOUEZ CETTE CATEGORIE</a>
            </div>
            <div class="vehicule" id="vehicule4" >
                <img src="image/voiture 4.jpg" alt="Véhicule 4" class="vehicule-img">
                <h3 class="vehicule-titre" data-i18n="accueil.vehicule.title3">Premium</h3>
                <p class="vehicule-description" data-i18n="accueil.vehicule.texte3">Vivez une expérience unique avec la gamme PREMIUM! Conçue spécialement...</p>
                <a href="categorie4.php" class="btn" data-i18n="accueil.voiture.bouton3">LOUEZ CETTE CATEGORIE</a>
            </div>
            <div class="vehicule hidden" id="vehicule5">
                <img src="image/voiture5.jpg" alt="Véhicule 5" class="vehicule-img">
                <h3 class="vehicule-titre" data-i18n="accueil.vehicule.title4">Utilitaire</h3>
                <p class="vehicule-description" data-i18n="accueil.vehicule.texte4">Une gamme de véhicules utilitaires pour vous accompagner dans vos besoins ...</p>
                <a href="categorie5.php?" class="btn" data-i18n="accueil.voiture.bouton4">LOUEZ CETTE CATEGORIE</a>
            </div>
            <div class="vehicule hidden" id="vehicule6">
                <img src="image/voiture 6.jpg" alt="Véhicule 6" class="vehicule-img">
                <h3 class="vehicule-titre" data-i18n="accueil.vehicule.title5">Minibus</h3>
                <p class="vehicule-description" data-i18n="accueil.vehicule.texte5">Indispensables pour des voyages en familles,ne négligez pas l'espace et le confort pou...</p>
                <a href="categorie6.php" class="btn" data-i18n="accueil.voiture.bouton5">LOUEZ CETTE CATEGORIE</a>
            </div>
        </div>
        <button class="slider-btn right" onclick="moveSlide(1)">&#10095;</button>
    </div>
</div>

<div class="section-louer">
       <h2 class="louer-titre" data-i18n="accueil.louer.title">Louez votre voiture en trois étapes avec SG CAR</h2>
        <div class="louer-location">
            <a href="####" class="louer-contenu" style="color:inherit; color:#5A189A;">
            <video class="louer-video" width="320" height="180" controls >
                <source src="image/choisissez un véhicule.mp4" type="video/mp4">
            </video>
             <h4 class="louer-titre1" data-i18n="accueil.louer.titre1">1-faites le choix de votre voiture </h4>
            </a>

            <a href="####" class="louer-contenu" style="color:inherit; color:#5A189A;">
            <video class="louer-video" width="320" height="180" controls >
                <source src="image/LACROIS.mp4" type="video/mp4">
            </video>
             <h4 class="louer-titre1" data-i18n="accueil.louer.titre2">2-Envoyer nous vos coordonnées </h4>
            </a>

            <a href="####" class="louer-contenu" style="color:inherit; color:#5A189A;">
            <video class="louer-video" width="320" height="180" controls >
                <source src="image/livraison.mp4" type="video/mp4">
            </video>
             <h4 class="louer-titre1" data-i18n="accueil.louer.titre3">3-Votre voiture livrée </h4>
            </a>
        </div>
    
   </div>
  
   
<div class="container">
<section class="prix-location">
    <h2 class=" prix-titre" data-i18n="accueil.container.title">Prix Location Voiture à Beni Mellal</h2>
    <table class="prix-table">
        <thead>
            <tr>
                <th data-i18n="accueil.container.titre1">Catégorie de Voiture</th>
                <th data-i18n="accueil.container.titre2">Basse Saison</th>
                <th data-i18n="accueil.container.titre3">Haute Saison</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-i18n="accueil.container.texte1">Citadine et Compacte</td>
                <td data-i18n="accueil.container.texte2">54dh - 81dh / jour</td>
                <td data-i18n="accueil.container.texte3">72dh - 92dh / jour</td>
            </tr>
            <tr>
                <td data-i18n="accueil.container.texte4">SUV & 4x4</td>
                <td data-i18n="accueil.container.texte5">58dh - 91dh / jour</td>
                <td data-i18n="accueil.container.texte6">82dh - 110dh / jour</td>
            </tr>
            <tr>
                <td data-i18n="accueil.container.texte7">Familiale</td>
                <td data-i18n="accueil.container.texte8">54dh - 82dh/ jour</td>
                <td data-i18n="accueil.container.texte9">83dh - 157dh / jour</td>
            </tr>
            <tr>
                <td data-i18n="accueil.container.texte10">Premium</td>
                <td data-i18n="accueil.container.texte11">150dh - 277dh / jour</td>
                <td data-i18n="accueil.container.texte12">168dh - 250dh / jour</td>
            </tr>
            <tr>
                <td data-i18n="accueil.container.texte13">Utilitaires</td>
                <td data-i18n="accueil.container.texte14">144dh - 245dh / jour</td>
                <td data-i18n="accueil.container.texte15">460dh - 540dh / jour</td>
            </tr>
        </tbody>
    </table>
    <p class="prix-note" data-i18n="accueil.container.texte16">Les prix peuvent varier en fonction des saisons et des disponibilités des véhicules.</p>
</section>

<!-- Section informations -->
<section class="infos-location">
    <div class="info">
        <h3 data-i18n="accueil.info.title1">Quel est le prix pour une location de voiture à Béni Mellal pendant une semaine ?</h3>
        <p data-i18n="accueil.info.texte1">Pour une location d'une semaine, comptez entre 118dh et 344dh pour une voiture Citadine, et entre 225dh et 581dh pour une voiture Familiale.</p>
    </div>
    <div class="info">
        <h3 data-i18n="accueil.info.title2">Quel est le prix pour une location de voiture à Béni Mellal pendant deux semaines ?</h3>
        <p data-i18n="accueil.info.texte2">En moyenne, entre 250dh et 590dh pour une voiture Citadine pour deux semaines. Les tarifs sont similaires dans toutes les autres villes du Maroc.</p>
    </div>
    <div class="info">
        <h3 data-i18n="accueil.info.title3">Quel est le prix pour une location de voiture à Béni Mellal pendant un mois ?</h3>
        <p data-i18n="accueil.info.texte3">Pour un mois de location, il faut compter entre 750dh et 2.900dh pour n'importe quel véhicule, peu importe la ville.</p>
    </div>
    <div class="info">
        <h3 data-i18n="accueil.info.title4">Combien coûte une location de voiture citadine / compacte à Béni Mellal ?</h3>
        <p data-i18n="accueil.info.texte4">Une location de voiture de catégorie Citadine / Compacte à Béni Mellal coûte en moyenne 37 dh par jour selon la ville et l'agence de départ.</p>
    </div>
    <div class="info">
        <h3 data-i18n="accueil.info.title5">Combien coûte une location de voiture familiale à Béni Mellal ?</h3>
        <p data-i18n="accueil.info.texte5">Une location de voiture familiale à Béni Mellal coûte en moyenne autour de 46 dh par jour.</p>
    </div>
    <div class="info">
        <h3 data-i18n="accueil.info.title6">Combien coûte une location de voiture SUV / 4x4 à Béni Mellal ?</h3>
        <p data-i18n="accueil.info.texte6" >Une location de voiture SUV / 4x4 à Béni Mellal coûte 49 dh par jour en moyenne.</p>
    </div>
    <div class="info">
        <h3 data-i18n="accueil.info.title7">Combien coûte une location de voiture de luxe à Béni Mellal ?</h3>
        <p data-i18n="accueil.info.texte7">Une location de voiture de catégorie luxe a Beni Mellal coûte en moyenne 92 dh par jour selon le modèle.</p>
    </div>
</section>
<div >
<div class="faq">
    <h2 class="faq-titre" data-i18n="accueil.faq.title">FAQ -Location voiture Beni Mellal pas cher</h2>
</div>
</div>
</div>


<section class="faq-section">
<div class="faq-contenu">
<button class="faq-question">
 <h3 data-i18n="accueil.faq.title1">De quels documents ai-je besoin pour louer une voiture de location à Béni Mellal ?</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte">Pour la prise en charge de votre voiture de location à Béni Mellal vous devrez vous présenter en agence avec les documents suivants : </p>
<br>
 <li data-i18n="accueil.faq.link1">Pièce d’identité valide (passeport ou carte d’identité)</li>
 <li data-i18n="accueil.faq.link2">Permis de conduire en cours de validité du titulaire du contrat et de chaque conducteur additionnel </li> 
  <li data-i18n="accueil.faq.link3">Carte de crédit (et non carte de débit) pour la caution du véhicule</li>
<br>
<p data-i18n="accueil.faq.link">Attention, seuls les documents originaux sont acceptés pour louer une voiture.</p>
</div>
</div>
 
<div class="faq-contenu">
<button class="faq-question">
<h3 data-i18n="accueil.faq.title2">Quel âge minimum faut-il avoir pour louer une voiture à Béni Mellal ?</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte1">Pour louer une voiture à Béni Mellal, le conducteur doit avoir au moins 21 ans et 12 mois d’ancienneté de permis de conduire.</p>
<br>
<br>
<p data-i18n="accueil.faq.texte2">Les conducteurs de moins de 23 ans doivent obligatoirement souscrire à l’Assurance Jeune Conducteur.</p>
<br>
<br>
<p data-i18n="accueil.faq.texte3">Enfin, pour certains véhicules, l’âge minimum est de 25 ans. </p>
</div>
</div>

<div class="faq-contenu">
<button class="faq-question">
         <h3 data-i18n="accueil.faq.title3">Quel est le montant de la caution d'une voiture à Béni Mellal ?</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte4">Avant la prise en charge de votre voiture de location au Maroc, vous devrez vous acquitter de la caution.</p>
<p data-i18n="accueil.faq.texte5">La somme est bloquée sur votre carte de crédit pendant la durée de la location du véhicule au Maroc, puis automatiquement débloquée à sa restitution en agence.</p>
<br>
<p data-i18n="accueil.faq.texte6">Montant de la caution : </p>

<li data-i18n="accueil.faq.link4">Voitures Catégorie Citadines : à partir de 1000 DH</li>
<li data-i18n="accueil.faq.link5">Voitures Catégorie SUV  : à partir de 2000 DH</li>
<li data-i18n="accueil.faq.link6">Voitures Catégorie Premium  : à partir de 3.400 DH</li>
<li data-i18n="accueil.faq.link7">Voitures Catégorie Familiale et Minibus : à partir de 2000 DH</li>

<br>
<br>
<p data-i18n="accueil.faq.texte8">Assurez-vous d’avoir un plafond bancaire suffisant pour que la caution passe sur votre carte de crédit.</p>
<p data-i18n="accueil.faq.texte9">Dans le cas où votre plafond bancaire serait insuffisant, vous avez la possibilité de souscrire à nos services de Rachat de Franchise Total ou Partiel qui réduisent la caution de moitié ou annulent le besoin de laisser une caution et votre responsabilité financière en cas de sinistre.</p>
</div>
</div>

<div class="faq-contenu">
<button class="faq-question">
         <h3 data-i18n="accueil.faq.title4">Quelles sont les conditions d'annulation d'une location de voiture à Béni Mellal ?</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte10">Si votre demande d’annulation de votre location de voiture à Béni Mellal intervient 48H avant la date de prise en charge du véhicule de location, des frais de dossier de 240 MAD/TTC  s’appliqueront. Le remboursement sera effectué sur la carte de crédit utilisée pour le règlement de la réservation.</p>
<br>
<br>
<p data-i18n="accueil.faq.texte11">Si votre demande d’annulation est transmise moins de 48 heures précédant la date de début de la location au Maroc, aucun remboursement ne sera dû. Aucun remboursement ne sera dû pour toute demande d’annulation faite après la date et l’heure prévue de prise en charge du véhicule dans une de nos agences au Maroc. Les conditions d’annulation sont les mêmes dans toutes nos agences de location de voiture à Béni Mellal.</p>
<br>
<br>
<p data-i18n="accueil.faq.texte12">Pour toute annulation d’une réservation de location de voiture chez SG CAR effectuée auprès d’un comparateur ou acteur tiers, les démarches se feront uniquement auprès de cet intermédiaire.</p>
</div>
</div>

<div class="faq-contenu">
<button class="faq-question">
<h3 data-i18n="accueil.faq.title5">Quelle est la limite de vitesse à Béni Mellal</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte13">La limite de vitesse à Béni Mellal est de : 90-100 km/h sur les routes normales </p>
</div>
</div>

<div class="faq-contenu">
<button class="faq-question">
<h3 data-i18n="accueil.faq.title6">Dans quel état sont les routes à Béni Mellal</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte14">Les routes sont généralement bien entretenues à Béni Mellal. </p>
<br>
<br>
<p data-i18n="accueil.faq.texte15">Si vous prévoyez de vous aventurer dans les montagnes , optez plutôt pour la location d’un SUV ou d’un 4x4  pour plus de confort.</p>
</div>
</div>


<div class="faq-contenu">
<button class="faq-question">
<h3 data-i18n="accueil.faq.title5">Est-il possible de faire une location voiture à Béni Mellal sans caution ?</h3>
         <span class="icone-faq">+</span>
</button>
<div class="faq-reponse">
<p data-i18n="accueil.faq.texte16">Pour récupérer une voiture de location à Béni Mellal vous devez obligatoirement vous acquitter de la caution du véhicule qui varie selon sa catégorie.</p>
<br>
<br>
<p data-i18n="accueil.faq.texte17">Pour une location de voiture au Maroc sans caution, vous pouvez souscrire à notre service de rachat de franchise qui annule la somme à payer en cas d'accident.</p>
</div>
</div>
</section>

   <div class="section-decouverte">
       <h2 class="decouverte-titre" data-i18n="accueil.decouverte.title">Découvrir la région Beni Mellal-Kenifra</h2>
        <div class="decouverte-location">
            <a href="découverte1.php" class="decouverte-contenu">
             <img src="image/AinAsserdoum.jpeg" alt="" class="decouverte-image">
             <h3 class="decouverte-titre1" data-i18n="accueil.decouverte.title1">Ain Asserdoun-Le joyau naturel de Beni Mellal</h3>
                <p class="decouverte-description" data-i18n="accueil.decouverte.texte">Ain Asserdoun est une site touristique qui offre  aux visiteurs une  vue panoramique imprenable sur toute la ville de Beni Mellal et les pleines environnantes.</p>
            </a>

            <a href="découverte2.php" class="decouverte-contenu">
             <img src="image/Kasba tadla.jpg" alt="" class="decouverte-image">
             <h3 class="decouverte-titre1" data-i18n="accueil.decouverte.title2">Kasbat Tadla-Voyage au coeur de l'histoire</h3>
                <p class="decouverte-description" data-i18n="accueil.decouverte.texte1">Plongez dans les délices exotiques de Kasbat Tadla,une ville fortifiée,séduit par ses remparts en pisé et sa majestueuse kasbah qui témoigne d’un riche...</p>
            </a>

            <a href="découverte3.php" class="decouverte-contenu">
             <img src="image/Atlas.jpeg" alt="" class="decouverte-image">
             <h3 class="decouverte-titre1" data-i18n="accueil.decouverte.title3">Taghzirt et le Moyen Atlas-L'évasion grandeur nature</h3>
                <p class="decouverte-description"  data-i18n="accueil.decouverte.texte2">Envie d’un grand bol d’air pur ? Le village de Taghzirt, offre des paysages qui sont à couper le souffle : montagnes verdoyantes,forêts de cèdres et de pins... </p>
            </a>
        </div>
         
   </div>

   

  











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





      
        
        let currentIndex = 0; // L'index des véhicules visibles
        const vehicules = document.querySelectorAll('.vehicule'); // Récupère tous les véhicules
        const totalVehicules = vehicules.length; // Nombre total de véhicules

    // Fonction pour déplacer les véhicules
    function moveSlide(direction) {
    const newIndex = currentIndex + direction;

       // Vérifie si on peut faire défiler les véhicules dans la direction demandée
       if (newIndex >= 0 && newIndex <= totalVehicules - 4) {
        currentIndex = newIndex;

        // Mise à jour de la visibilité des véhicules
        for (let i = 0; i < totalVehicules; i++) {
            if (i >= currentIndex && i < currentIndex + 4) {
                vehicules[i].classList.remove('hidden'); // Affiche les véhicules
            } else {
                vehicules[i].classList.add('hidden'); // Cache les véhicules
            }
        }
         
       function adjustSliderWidth(){
        // Déplace le conteneur pour afficher les 4 véhicules visibles
        const slider = document.querySelector('.slider');
        slider.style.transform = `translateX(-${currentIndex * 25}%)`; // Chaque véhicule occupe 25% de la largeur du conteneur
       }
    }
}
 


// Sélectionner tous les éléments qui contiennent une question et sa réponse
const faqItems = document.querySelectorAll('.faq-contenu');

faqItems.forEach(item => {//Permet d'ouvrir et fermer les réponses de FAQd
    const button = item.querySelector('.faq-question'); // Le bouton de la question
    const reponse = item.querySelector('.faq-reponse'); // La réponse 
    const icone = button.querySelector('.icone-faq'); // L'icône (+ ou -)

    button.addEventListener('click', () => {
        // Fermer toutes les réponses autres que celle de l'élément actuel
        document.querySelectorAll('.faq-reponse').forEach(r => {
            if (r !== reponse) {
                r.classList.remove('open'); // Fermer les autres réponses
                r.previousElementSibling.querySelector('.icone-faq').textContent = '+'; // Réinitialiser l'icône des autres boutons
            }
        });

        // Afficher ou masquer la réponse actuelle
        reponse.classList.toggle('open');
        
        // Changer l'icône entre "+" et "-"
        icone.textContent = reponse.classList.contains('open') ? '-' : '+';
    });
});


</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?php include('Apropos.php');?> 
<?php include('langue.php');?>
<?php include('chat.php');?>
<?php include('flèche.php');?>
<?php include('piedPage.php');?>
<?php include('consentement_cookies.php');?>
</body>
</html>