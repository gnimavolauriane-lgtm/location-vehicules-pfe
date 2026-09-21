

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CATEGORIE3.css">
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
    <img src="image/suv.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="Nos véhicules.php" class="lien1">Nos véhicules</a> >  
    <a href="#" class="lien1">Découvrez notre gamme de voiture de location "SUV"  </a> >
    <h2 class='lien1-texte'>Découvrez la catégorie SUV </h2>
   </div>

    <div class="categories-slider">
        <a href="categorie1.php" class="categories" id="citadine">CITADINE</a>
        <a href="categorie2.php" class="categories" id="compacte">COMPACT</a>
        <a href="categorie3.php" class="categories" id="suv">SUV</a>
        <a href="categorie4.php" class="categories">PREMIUM</a>
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
      <img src="image/image SUV/citroen C3.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Citroën C3</p>
      <P><strong>Catégorie :</strong>SUV(CFAN)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Dacia Duster.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">DACIA DUSTER</p>
      <P><strong>Catégorie :</strong>SUV(IFMN)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Dacia Duster.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">DACIA DUSTER 2WD</p>
      <P><strong>Catégorie :</strong>SUV(IFMR)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <!-- ligne 2 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Dacia Duster.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">DACIA DUSTER</p>
      <P><strong>Catégorie :</strong>SUV(IFMN)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Sportage.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SPORTAGE</p>
      <P><strong>Catégorie :</strong>SUV(IXAD)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 3 valises | 6 sacs | 8 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Seltos.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SELTOS</p>
      <P><strong>Catégorie :</strong>SUV(IFAN)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
 <!-- ligne 3 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/KIA.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SELTOS</p>
      <P><strong>Catégorie :</strong>SUV(IFAD)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail5_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Seltos.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SORENTO</p>
      <P><strong>Catégorie :</strong>SUV(FFMN)</P>
      <p class="description">Gasoil | BV Automatique | 7 passagers | 5 portes | 3 valises | 6 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail6_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Seltos.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SORENTO</p>
      <P><strong>Catégorie :</strong>SUV(FFMR)</P>
      <p class="description">Gasoil | BV Automatique | 7 passagers | 5 portes | 3 valises | 6 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail7_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 4 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Seltos.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SORENTO 4X4</p>
      <P><strong>Catégorie :</strong>SUV(FFAR)</P>
      <p class="description">Gasoil | BV Automatique | 7 passagers | 5 portes | 3 valises | 6 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail8_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Toyota Prado.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">TOYOTA PRADO 4X4</p>
      <P><strong>Catégorie :</strong>SUV(FFMD)</P>
      <p class="description">Gasoil | BV Automatique | 7 passagers | 5 portes | 3 valises | 6 sacs | 12 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail9_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Seltos.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SPORTAGE</p>
      <P><strong>Catégorie :</strong>SUV(IXAD)</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 3 valises | 6 sacs | 8 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
<!-- ligne 5-->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/hardtop_L200.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">MITSUBISHI L200 HARDTOP 4X4</p>
      <P><strong>Catégorie :</strong>SUV(IQND)</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 4 portes | 5 valises | 10 sacs | 10 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail10_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/jimny.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SUZUKI JIMNY 4X4</p>
      <P><strong>Catégorie :</strong>SUV(EGAR)</P>
      <p class="description">Essence | BV Automatique | 4 passagers | 4 portes | 1 valise | 2 sacs | 8 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail11_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/geely.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">IXAR/GEELY COOLRAY CONFORT AUTO</p>
      <P><strong>Catégorie :</strong>SUV(IXAR)</P>
      <p class="description">Essence | BV Automatique | 5 passagers | 5 portes | 3 valises | 6 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail12_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 6 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Mitsubishi L200.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">MITSUBISHI L200 4X4</p>
      <P><strong>Catégorie :</strong>SUV(IQNR)</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 4 portes | 5 valises | 10 sacs | 10 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail13_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/Kia Seltos.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SORENTO BVA 4X4</p>
      <P><strong>Catégorie :</strong>SUV(FFAN)</P>
      <p class="description">Gasoil | BV Manuelle | 7 passagers | 5 portes | 4 valises | 8 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail14_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image SUV/alfa.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">ALFA ROMEO STELVIO</p>
      <P><strong>Catégorie :</strong>SUV</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 3 valises | 6 sacs | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail15_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
<div class="offre-contenu">
          
    <p>
    SG CAR est spécialisée dans la location de voiture SUV.Selon notre expertise,voci les modèles plus adaptés pour votre séjours à Béni Mellal.
    </p>

    <h2 class="offre-soustitre">Le Kia Sorento</h2>

    <p>
      Li Kia Sorento à boîte de vitesse automatique est équipé d'un moteur diesel de 200 à 280 chevaux zt dispose de nombreuse options modernes. Avec ses 4 roues motrices et son habitacle spacieux,ce véhicule 4 roues motrices est capables de rouler sur tous type de terrain sans aucune difficulté,tout en offrant une conduite douce à ses passageers.
    </p>

    <h2 class="offre-soustitre">Toyota Prado 4X4 BVA</h2>
    
    <p>
       Le Toyota Prado est un véhicule très populaire chez lzs conducteurs à la recherche d'une voiture robuste et fiable sur les routes  de BM.La boîte de viteese automatique facilite la conduite dans les environnements urbains et ruraux de BM. Le Toyota Prado est équipé d'un moteur diesel de 2,8 litrs et d'un système 4X4 sophistiqué qui est la solution pour une bonne conduite.
    </p>

    <h2 class="offre-soustitre">Dacia Duster</h2>
    
    <p>
       Le dacia Duster est une voiture qui peut aller sur toutes sortes de routes.Equipé d'un moteur diesel,le Duster est connu pour sa faible consommation de carburant.
    </p>
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