

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Categorie6.css">
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
    <img src="image/busmini.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="Nos véhicules.php" class="lien1">Nos véhicules</a> >  
    <a href="#" class="lien1">Découvrez notre gamme de voiture de location "Minibus"  </a> >
    <h2 class='lien1-texte'>Découvrez la catégorie Minibus </h2>
   </div>

    <div class="categories-slider">
        <a href="categorie1.php" class="categories" id="citadine">CITADINE</a>
        <a href="categorie2.php" class="categories" id="compacte">COMPACT</a>
        <a href="categorie3.php" class="categories">SUV</a>
        <a href="categorie4.php" class="categories">PREMIUM</a>
        <a href="categorie5.php" class="categories" id="utilitaire">UTILITAIRE</a>
        <a href="categorie6.php" class="categories" id="minibus">MINIBUS</a>
    </div>

    <div class="traitSeparation">
  <div class="ligne-traitSeparation">
  </div>
 </div>
 <div class="vehicule-contenu">
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/KIA Carens.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom" data-vehicule="KIA Carens">KIA Carens</p>
      <P><strong>Catégorie :</strong>Minibus(IVMN)</P>
      <p class="description">Gasoil|BV Automatique|6 passagers|5 portes|2 valises |4 Sacs|6 Ch.Fisc|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/KIA Carens.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom" data-vehicule="KIA Carens">KIA Carens</p>
      <P><strong>Catégorie :</strong>Minibus(IVMR)</P>
      <p class="description">Gasoil|BV Automatique|6 passagers|5 portes|2 valises |4 Sacs|6 Ch.Fisc|A/C: Oui|GPS: Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/carnival.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom" data-vehicule="KIA CARNIVAL 8PAX">KIA CARNIVAL 8PAX</p>
      <P><strong>Catégorie :</strong>Minibus(FVAD)</P>
      <p class="description">Gasoil|BV Automatique |8 passagers |4 Portes |3 Valises |6 Sacs| 9 Ch.FiscA/C:Oui |GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <!-- ligne 2 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/minibus.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom" data-vehicule="Renault Trafic Combi 9Pax">Renault Trafic Combi 9Pax</p>
      <P><strong>Catégorie :</strong>Minibus(FVMR)</P>
      <p class="description">Gasoile|BV Manuelle |9 passagers |4 Portes |4 Valises |8 Sacs| 6 Ch.FiscA/C:Oui |GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/minibus.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom" data-vehicule="Renault Traffic Combi">Renault Trafic Combi </p>
      <P><strong>Catégorie :</strong>Minibus(FVMN)</P>
      <p class="description">Gasoile|BV Manuelle |9 passagers |4 Portes |4 Valises |8 Sacs| 6 Ch.FiscA/C:Oui |GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 

 <div class="offre-contenu">
          
    <p>
     Besoin d’une voiture pour toute la famille ou pour un groupe de personnes? Découvrez notre gamme de location de voiture SG CAR « minibus ». Un large choix de voiture de 7 à 9 places. Vous pourrez mettre vos bagages sans tracas et être assis confortablement chacun de son côté.

     Rouler à plusieurs n’aura jamais été aussi agréable avec SG CAR
    </p>

    <h2 class="offre-soustitre">Fiat DOBLO 7P – Catégorie IVMR</h2>

    <p>
       En mouvement, il est confortable et agréable à conduire, tandis que l'intérieur est à la fois bien fini et robuste. Le Fiat Doblo 7 places possède l'une des meilleures charges utiles de sa catégorie pour vous assurer un bon voyage en famille avec SG CAR.
    </p>

    <h2 class="offre-soustitre">Peugeot Expert – Catégorie FVMR</h2>
    
    <p>
       Si vous recherchez un van moyen avec la meilleure capacité de charge utile, le Peugeot expert 9 places et la meilleure économie de carburant et en vaut la peine. Retrouvez votre location de voiture Peugeot Expert chez SG CAR et bénéficiez des promotions proposées sur le site.
<br>
<br>
<br>
Bénéficiez de véhicules spacieux, ayant moins de 2 ans et en kilométrage illimité avec des offres imbattables en réservant votre véhicule de location directement sur www.SGCAR.ma
    </p>
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




</div>
    <?php include('Apropos.php');?>
    <?php include('langue.php');?>
    <?php include('chat.php');?>
    <?php include('flèche.php');?>
    <?php include('piedPage.php');?>
</body>
</html>