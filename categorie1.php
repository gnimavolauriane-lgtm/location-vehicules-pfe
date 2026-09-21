
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Categorie.css">
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

    <div class="form-contenu" >
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
    <img src="image/Citadine.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="Nos véhicules.php" class="lien1">Nos véhicules</a> >  
    <a href="#" class="lien1">Découvrez notre gamme de voiture de location "Citadines"  </a> >
    <h2 class='lien1-texte'>Découvrez la catégorie Citadine </h2>
   </div>

    <div class="categories-slider">
        <a href="categorie1.php" class="categories" id="citadine">CITADINE</a>
        <a href="categorie2.php" class="categories" id="compacte">COMPACT</a>
        <a href="categorie3.php" class="categories">SUV</a>
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
      <img src="image/suzuki.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SUZUKI SWIFT</p>
      <P><strong>Catégorie :</strong>MDAN</P>
      <p class="description">Essence | BV Automatique | 4 passagers | 5 portes | 1 valise | 2 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/picanto.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA Picanto</p>
      <P><strong>Catégorie :</strong>MDMR</P>
      <p class="description">Essence | BV Manuelle | 4 passagers | 5 portes | 1 valise | 2 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/dacia.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Dacia Sandero Streetway BVM</p>
      <P><strong>Catégorie :</strong> ECMN</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <!-- ligne 2 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/Fiat 500X.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Fiat 500X</p>
      <P><strong>Catégorie :</strong>ECAN</P>
      <p class="description">Essence | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 8 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/FIAT.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Fiat Tipo</p>
      <P><strong>Catégorie :</strong>EDMD</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/Citroen.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Citroën C Elysée</p>
      <P><strong>Catégorie :</strong>EDMN</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail5.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
 <!-- ligne 3 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/Peugeot.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Peugeot 208</p>
      <P><strong>Catégorie :</strong>ECAD</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail6.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/peugeot 308.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Peugeot 308</p>
      <P><strong>Catégorie :</strong>CDAR</P>
      <p class="description">Gasoil | BV Automatique | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail7.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/jimny.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Suzuki Jimny</p>
      <P><strong>Catégorie :</strong> EGAR</P>
      <p class="description">Essence | BV Automatique | 4 passagers | 4 portes | 1 valise | 2 sacs | 8 Ch. Fisc. | A/C : Oui | GPS : Non 

</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail8.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 4 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/gx3.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">GEELY GX3 PRO </p>
      <P><strong>Catégorie :</strong>ECMR</P>
      <p class="description">Essence | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail9.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/corsa.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">EXMN/OPEL Corsa ou equivalent</p>
      <P><strong>Catégorie :</strong> EXMN</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail10.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/doblo.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">FIAT Doblo</p>
      <P><strong>Catégorie :</strong>CMMD</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail11.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
<!-- ligne 5-->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/opel.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">OPEL CROSSLAND</p>
      <P><strong>Catégorie :</strong>CXMD</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 3 valises | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail12.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/suzuki.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SUZUKI SWIFT</p>
      <P><strong>Catégorie :</strong>Citadine</P>
      <p class="description">Essence | BV Automatique | 4 passagers | 5 portes | 1 valise | 2 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/opel.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">OPEL CROSSLAND</p>
      <P><strong>Catégorie :</strong>CXMD</P>
      <p class="description">Gasoil | BV Manuelle | 5 passagers | 5 portes | 3 valises | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail12.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 6 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/suzuki.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SUZUKI SWIFT</p>
      <P><strong>Catégorie :</strong>Citadine</P>
      <p class="description">Essence | BV Automatique | 4 passagers | 5 portes | 1 valise | 2 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/gx3.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">GEELY GX3 PRO  </p>
      <P><strong>Catégorie :</strong>ECMR</P>
      <p class="description">Essence | BV Manuelle | 5 passagers | 5 portes | 2 valises | 4 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail9.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/suzuki.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SUZUKI SWIFT</p>
      <P><strong>Catégorie :</strong>Citadine</P>
      <p class="description">Essence | BV Automatique | 4 passagers | 5 portes | 1 valise | 2 sacs | 6 Ch. Fisc. | A/C : Oui | GPS : Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

<div class="offre-contenu">
          
    <p>
     Grâce  à leurs tailles et à leurs puisssances,les voitures de location citadines  sont polyvalentes et pratiques. Elles peuvent facilement transporter un couple d'adultes,une petite famille ou tout simplement des amis avec un volume normal de bagages. Leur niveau de confort permet de s'adapter aussi bien à une longue conduite sur la route qu'en ville. Les meilleures citadines sont passées du statut de voitures pratiques de dimensions moyennes,à des véhicules offrant de véritables prouesses mécaniques,avec un luxe digne des grosses cylindrées.

    </p>

    <h2 class="offre-soustitre">La Kia picanto catégorie MDMR</h2>

    <p>
       Mini Citadine d'un design sportif,dotée de 5 portes et de 4 places,la Kia Picanto offre un niveau de confort exceptionnel. A son volant, vous pourrez vous faufiler dans une circulation en garantissant une sécurité totale grâce à la conception de son équipement? Avec elle,chaque trajet est source de plaisir.
    </p>

    <h2 class="offre-soustitre">Peugeot 308 BVA Catégorie CDAR</h2>
    
    <p>
       Sans aucun doute la Peugeot 308 est le meilleure rapport qualité-prix de sa catégorie .Craquez pour son design contemporain,ses lignes captivantes soon confort et sa technique utile. Une voiture élégante et spacieuse pour votre voyage,avec tout l'espace s=dont vous avez besoin.
       <br>
       Nos modèles de moins de 2ans ont un Kilométrage illimité et sont parfaits pour un déplacement personnel ou professionnel.

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
   <?php include('flèche.php');?>
   <?php include('Apropos.php');?>
   <?php include('langue.php');?>
   <?php include('chat.php');?>
   <?php include('piedPage.php');?>


</body>
</html>