
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CATEGORIE4.css">
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
     <h2>Louez votre voiture en toute simplicité chez SG CAR</h2>
    </div>

    <div class="form-contenu">
        <form class="formulaire" id="reservationForm">
            <input type="text" id="input1" placeholder="Date de reception" class="form-input" required>
            <input type="text" id="input2" placeholder="Heure" class="form-input" required>
            <input type="text" id="input3"placeholder="Date de restitution" class="form-input" required>
            <input type="texte"id="input4" placeholder="Heure " class="form-input" required>
            <input type="text" id="input5" placeholder="Modèle de véhicule" class="form-input" required>
        <ul id="liste" class="liste">
            <li>Citadine</li>
            <li>Compacte</li>
            <li>SUV</li>
            <li>Premium</li>
            <li>Utilitaire</li>
            <li>Minibus</li>
        </ul>
            <button type="submit" class="boutton">
                <i class="fas fa-search"></i> 
            </button>

            <div class="cocher">
                <div class="caseCocher">
                    <div>
                        <input type="checkbox" id="case1">
                        <label for="case1">Conducteur ayant le permis </label>
                    </div>
                    <div>
                        <input type="checkbox" id="case2">
                        <label for="case2">Conducteur âgé entre 21ans et plus</label>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <img src="image/premium.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="Nos véhicules.php" class="lien1">Nos véhicules</a> >  
    <a href="#" class="lien1">Découvrez notre gamme de voiture de location "Premium"  </a> >
    <h2 class='lien1-texte'>Découvrez la catégorie Premium </h2>
   </div>

    <div class="categories-slider">
        <a href="categorie1.php" class="categories" id="citadine">CITADINE</a>
        <a href="categorie2.php" class="categories" id="compacte">COMPACT</a>
        <a href="categorie3.php" class="categories" id="suv">SUV</a>
        <a href="categorie4.php" class="categories" id="premium">PREMIUM</a>
        <a href="categorie5.php" class="categories">UTILITAIRE</a>
        <a href="categorie6.php" class="categories">MINIBUS</a>
    </div>

    <div class="traitSeparation">
  <div class="ligne-traitSeparation">
  </div>
 </div>
 <div class="vehicule-contenu">
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image premium/SKODA.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SKODA SUPERB</p>
      <P><strong>Catégorie :</strong>Premium</P>
      <p class="description">Gasoil|BV Automatique|5 passagers|5 portes|3 valises |6 Sacs|8 Ch.Fisc|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail_premium.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image premium/SKODA.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SKODA SUPERB</p>
      <P><strong>Catégorie :</strong>premium(PDAR)</P>
      <p class="description">Gasoil|BV Automatique|5 passagers|5 portes|3 valises |6 Sacs|8 Ch.Fisc|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1_premium.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image premium/SKODA.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SKODA SUPERB</p>
      <P><strong>Catégorie :</strong>Premium(PDAD)</P>
      <p class="description">Gasoil|BV Automatique|5 passagers|5 portes|3 valises |6 Sacs|8 Ch.Fisc|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2_premium.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <!-- ligne 2 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image premium/BVA.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">Volkswagen Touareg BVA</p>
      <P><strong>Catégorie :</strong>Premium(XFAD)</P>
      <p class="description">Gasoil|BV Automatique|5 passagers|5 portes|3 valises |6 Sacs|12 Ch.Fisc|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3_premium.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image premium/Citroen e-C4.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Cutroen New C4X</p>
      <P><strong>Catégorie :</strong>Premium(SDAD)</P>
      <p class="description">Gasoil|BV Automatique|5 passagers|5 portes|2 valises |4 Sacs|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4_premium.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 

<div class="offre-contenu">
          
    <p>
     SG CAR est une spécialiste de la location de voitures haut de gamme. Parmi les différents de voitures que nous mettons à disposition, nos meilleures recommandations :

    </p>

    <h2 class="offre-soustitre">Alfa Romeo Giulietta boite de vitesse automatique</h2>

    <p>
      L'Alfa Romeo Giulietta BVA est une voiture de luxe élégante et raffinée, offrant des performances exceptionnelles grâce à sa transmission automatique sophistiquée, son moteur puissant, et ses options en tous genres. Elle est parfaitement adaptée aux conducteurs souhaitant allier style et plaisir de conduite pendant leurs vacances sur les routes de BM.


    </p>

    <h2 class="offre-soustitre">Volvo XC60</h2>
    
    <p>
      Le Volvo XC60 est un SUV de luxe très prisé au Maroc, offrant un design élégant, une technologie avancée et des performances fiables. Sa grande capacité de chargement et son confort supérieur en font un choix idéal pour les conducteurs recherchant un véhicule haut de gamme polyvalent avec une faible consommation de carburant pour faire de la route dans Béni Mellal.
    </p>

    <h2 class="offre-soustitre">Volkswagen Touareg BVA</h2>
    
    <p>
      Le Volkswagen Touareg BVA est une voiture de luxe très demandée, offrant une expérience de conduite agréable et un intérieur spacieux et confortable. Sa transmission automatique sophistiquée et ses fonctionnalités avancées en font un choix populaire pour les conducteurs souhaitant allier prestige et performance dans le cadre d’un road trip à BM.
    </p>

    
    <h2 class="offre-soustitre">Quelle voiture de luxe est la plus populaire à Béni Mellal ?</h2>
    
    <p>
      Les types de voitures de luxe les plus populaires au Maroc sont :
<br>
- Pour les couples : Peugeot 508 GT avec ses options premiums et son confort de route inégalable.
<br>
_ Pour les familles : le Volkswagen Touareg grâce à son intérieur spacieux.
    </p>

        <h2 class="offre-soustitre">Pourquoi louer une voiture de luxe à BM?</h2>
    
    <p>
      Louer une voiture de luxe à Béni Mellal, c’est allier confort, élégance et performance pour vos déplacements personnels ou professionnels. Que ce soit pour un événement spécial, un rendez-vous d’affaires ou simplement pour profiter d’un trajet haut de gamme, ce type de véhicule offre une expérience de conduite incomparable. Dans une ville en plein développement comme Béni Mellal, se déplacer avec style renforce votre image et vous garantit un confort optimal sur la route.
    </p>

</div>
</div>

<div>








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


// Récupérer l'input et la liste des modèles de véhicules
const input5 = document.getElementById('input5');
        const liste = document.getElementById('liste');

        // Lorsque l'utilisateur clique sur l'input, afficher la liste
        input5.addEventListener('click', function() {
            liste.style.display = 'block';
        });

        // Fermer la liste si l'utilisateur clique en dehors
        document.addEventListener('click', function(event) {
            if (!input5.contains(event.target) && !liste.contains(event.target)) {
                liste.style.display = 'none';
            }
        });

        // Gérer la sélection d'une option
        const items = liste.getElementsByTagName('li');
        Array.from(items).forEach(item => {
            item.addEventListener('click', function() {
                input5.value = this.textContent; // Mettre la valeur de l'option sélectionnée dans l'input
                liste.style.display = 'none'; // Cacher la liste après la sélection
            });
        });

         const boutons = document.querySelectorAll('.reserver');

  boutons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();

      const modele = btn.getAttribute('data-vehicule');
      const champModele = document.getElementById('input5');
      champModele.value = modele;

      // Faire défiler jusqu'au formulaire avec un décalage
      const form = document.getElementById('reservationForm');
      const yOffset = -100; // décalage vers le haut (en pixels)
      const y = form.getBoundingClientRect().top + window.pageYOffset + yOffset;

      window.scrollTo({ top: y, behavior: 'smooth' });
    });
  });
    </script>
 <?php include('Apropos.php');?>
 <?php include('langue.php');?>
 <?php include('chat.php');?>
 <?php include('flèche.php');?>
 <?php include('piedPage.php');?>
</body>
</html>