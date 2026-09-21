
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="détails.css">
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
    <img src="image/Location de voiture à Tromsø – Le guide ultime.jpeg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="Nos véhicules.php" class="lien1">Nos véhicules</a> >  
    <a href="#" class="lien1">Découvrez notre gamme de voiture de location "PREMIUM"  </a> >
     <p class='lien1-description'>Louer une voiture Škoda Superb</p>
    <h2 class='lien1-texte'>Louer une voiture Škoda Superb - Offre en KM illimité </h2>
   </div>

 <div class="detailVoiture">
   <div class='detailVoiture-contenu'>
      <div class='detailVoiture-gauche'>
         <img src="image/image Premium/SKODA.jpeg" alt="">
      </div>

      <div class="detailVoiture-droite">
        <h2>Catégorie PREMIUM</h2>
        <p class='Voiture-description'>Škoda Superb</p>
        <p class='detailVoiture-description'>Gasoil|BV Automatique|5 passagers|5 portes|3 valises |6 Sacs|8 Ch.Fisc|A/C: Oui|GPS: Non </p> 
        <button class="detailVoiture-bouton"><a href="">Réserver cette catégorie</a></button>
      </div>
      
   </div>
 </div>
   
 <div class="titretexte">
       <div class="titretexte-contenu">
          <p>Services inclus <br>Assistance routière 24/7, Surcharge Gare, Assurance CDW et TP avec Franchise, TVA de 20%, Responsabilité Civile, Kilométrage limité à 100 Kms / Jour. <br> Franchises et cautions <br>Franchise accident: 14 400,00 DH, Franchise vol: 14 400,00 DH, Caution: 14 400 DH<br> Pré-requis <br>Âge minimum: 23 ans, Année de permis minimum: 2 an(s)</p>
          
       </div>
       
 </div>

 <div class="traitSeparation">
  <div class="ligne-traitSeparation">
    <h2 class="titre-traitSeparation">Caractéristiques du véhicule</h2>

  </div>
 </div>

    <div class='section-detailIcone'>
        <div class='detailIcone'>
        <i class="fa-solid fa-gas-pump"></i>
           <h3>Gasoil</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-gauge-high"></i>
           <h3>BV Manuelle</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-people-group"></i>
           <h3>5 passagers</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-car-side"></i>
           <h3>5 portes</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-bag-shopping"></i>
           <h3>3 Valises</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-business-time"></i>
           <h3>6 Sacs</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-file-invoice-dollar"></i>
           <h3>8 Ch.Fisc</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-temperature-low"></i>
           <h3>A/C:Oui</h3>
        </div>
        <div class='detailIcone'>
        <i class="fa-solid fa-location-dot"></i>
           <h3>GPS: Oui</h3>
        </div>
    </div>
      
  <div class="classeTitre">
  <h2>Découvrez nos véhicules de la mm catégorie</h2>
  </div>  
 <div class="vehicule-contenu">
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

 <!-- ligne 2 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
     <img src="image/image premium/AWD.jpg" alt="" class="voiture-image">
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