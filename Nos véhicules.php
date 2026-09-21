
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vehicules.css">
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
    <?php include('entete.php')?>
    <div class="separateur"></div>
   <div class="image">
    <div class="slogan">
     <h2>Louez votre voiture en toute simplicité chez SG CAR</h2>
    </div>

    <div class="form-contenu">
        <form class="formulaire" action="resultats.php" method="GET">
            <input type="text" id="input1" name="date_reception"  placeholder="Date de reception" class="form-input" required>
            <input type="text" id="input2" name="heurer_eception" placeholder="Heure" class="form-input" required>
            <input type="text" id="input3" name="date_restitution"  placeholder="Date de restitution" class="form-input" required>
            <input type="texte"id="input4" name="heure_restitution" placeholder="Heure " class="form-input" required>
            <input type="text" id="input5" name="categorie" placeholder="Modèle de véhicule" class="form-input" required>
        <ul id="liste" class="liste">
            <li>Option 1</li>
            <li>Option 2</li>
            <li>Option 3</li>
            <li>Option 4</li>
        </ul>
            <button type="submit" class="boutton">
                <i class="fas fa-search"></i> 
            </button>

            <div class="cocher">
                <div class="caseCocher">
                    <div>
                        <input type="checkbox" id="case1" name="permis">
                        <label for="case1">Conducteur ayant le permis </label>
                    </div>
                    <div>
                        <input type="checkbox" id="case2" name="age_ok">
                        <label for="case2">Conducteur âgé entre 21ans et plus</label>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <img src="image/voiture.jpg" alt="">

   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> >  
    <a href="#" class="lien1">NOS VEHICULES  </a> 
    <h2 class='lien1-texte'>Location de véhicule de tourisme et utilitaire à Béni Mellal/Maroc-SG CAR
    </h2>
</div>

<!-- section toutes les voitures -->
 <!-- ligne 1 -->
 <div class="vehicule-contenu">
 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/suzuki.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SUZUKI SWIFT</p>
      <P><strong>Catégorie :</strong>CITADINE(MDAN)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(MDMR)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(ECMN)</P>
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
      <P><strong>Catégorie :</strong> CITADINE(ECAN)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(EDMD)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(EDMN)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(ECAD)</P>
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
      <P><strong>Catégorie :</strong> CITADINE(CDAR)</P>
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
      <P><strong>Catégorie :</strong> CITADINE(EGAR)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(ECMR)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(EXMN)</P>
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
      <P><strong>Catégorie :</strong>CITADINE(CMMD)</P>
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
   <img src="image/image compacte/Volkswagen Golf.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Volkswagen Golf</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Renault megane.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Renault Mégane</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Ford Focus.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Ford Focus</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 6 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Seat Leon.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">SEAT Leon</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Skoda.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Skoda Octavia</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Alfa Romeo Giulietta.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Alfa Romeo Giulietta</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Manuelle|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail5_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
  <!-- ligne 7 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Toyota Corolla.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Toyota Corolla</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail6_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/MAZDA 3.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Mazda3</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail7_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Honda Civic.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Honda Civic </p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail8_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
    <!-- ligne 8 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Hyundai I30.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Hyundai i30</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail9_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Kia Ceed.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Kia Ceed </p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Automatique|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail10_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image compacte/Dodge.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Dodge Dart</p>
      <P><strong>Catégorie :</strong>Compact</P>
      <p class="description">Essence|BV Manuelle|5 passagers| 5 portes|2 valises|4 Sacs| 6 Ch. Fisc. | A/C : Oui | GPS : Oui</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail11_compact.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 9 -->
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
   <!-- ligne 10 -->
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
   <!-- ligne 11 -->
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
   <img src="image/image SUV/KIA.jpeg" alt="" class="voiture-image">
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
   <img src="image/image SUV/KIA.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA SORENTO</p>
      <P><strong>Catégorie :</strong>SUV(FFMR)</P>
      <p class="description">Gasoil | BV Automatique | 7 passagers | 5 portes | 3 valises | 6 sacs | 9 Ch. Fisc. | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail7_suv.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
    <!-- ligne 12 -->
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
  <!-- ligne 13 -->
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

    <!-- ligne 14 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image utilitaire/express.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">Renault New Express van 3-5m³</p>
      <P><strong>Catégorie :</strong>Utilitaire (VPIW)</P>
      <p class="description">Gasoil | BV Manuelle | 2 passagers | 4 portes | 6 Ch. Fisc. | Volume 4m³ | A/C : Non | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image utilitaire/L1H1.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">Peugeot Expert L1H1</p>
      <P><strong>Catégorie :</strong>Utilitaire(VMIW)</P>
      <p class="description">Gasoil | BV Manuelle | 3 passagers | 4 portes | 9 Ch. Fisc. | Volume 8m³ | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail1_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image utilitaire/peugeot boxer.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Peugeot Boxer L2H2</p>
      <P><strong>Catégorie :</strong>Utilitaire(VGIW)</P>
      <p class="description">Gasoil | BV Manuelle | 3 passagers | 4 portes | 9 Ch. Fisc. | Volume 10m³ | A/C : Oui | GPS : Non </p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
    
  <!-- ligne 15 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
   <img src="image/image utilitaire/peugeot boxer.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">Peugeot Boxer L3H2</p>
      <P><strong>Catégorie :</strong>Utilitaire(VJIW)</P>
      <p class="description">Gasoile|BV Manuelle|3 passagers|4 portes|9 Ch.Fisc |Volume 12m³<|A/C:Oui|GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail3_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
     <img src="image/image utilitaire/KIA K2700.jpeg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA K2500 plateau à ridelles</p>
      <P><strong>Catégorie :</strong>Utilitaire(VGXP)</P>
      <p class="description">Gasoile|BV Manuelle|3 passagers|2 portes|10 Ch.Fisc |A/C:Oui|GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image utilitaire/L2H2.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA K2500 Multiservices L2H2</p>
      <P><strong>Catégorie :</strong>Utilitaire(VGXW)</P>
      <p class="description">Gasoile|BV Manuelle|3 passagers|3 portes|10 Ch.Fisc |Volume 9m³<|A/C:Oui|GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail5_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 16 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image utilitaire/camion.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA K2500 Frigo Négatif</p>
      <P><strong>Catégorie :</strong>Utilitaire(VGXF)</P>
      <p class="description">Gasoile|BV Manuelle|3 passagers|3 portes|10 Ch.Fisc |Volume 9m³<|A/C:Oui|GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail6_utilitaire.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

   <!-- ligne 17 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/KIA Carens.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">KIA Carens</p>
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
      <p class="vehicule-nom">KIA Carens</p>
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
      <p class="vehicule-nom">KIA CARNIVAL 8PAX</p>
      <P><strong>Catégorie :</strong>Minibus(FVAD)</P>
      <p class="description">Gasoil|BV Automatique |8 passagers |4 Portes |3 Valises |6 Sacs| 9 Ch.FiscA/C:Oui |GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail2_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>
   <!-- ligne 18 -->
 <div class="vehicule-voiture">
   <div class="vehicule-info">
      <img src="image/image minibus/minibus.jpg" alt="" class="voiture-image">
      <p class="vehicule-nom">Renault Trafic Combi 9Pax</p>
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
      <p class="vehicule-nom">Renault Trafic Combi </p>
      <P><strong>Catégorie :</strong>Minibus(FVMN)</P>
      <p class="description">Gasoile|BV Manuelle |9 passagers |4 Portes |4 Valises |8 Sacs| 6 Ch.FiscA/C:Oui |GPS:Non</p>
      <button class="reserver">RESERVER CE VEHICULE</button>
 </div>
 <div class="détails">
  <a href="détail4_minibus.php" class="lien-detail">Plus de détails &#10095;</a>
 </div>
 </div>

 <div class="contenu">
<div class="offre-contenu">
        <p class="offre-titre">Une gamme luxueuse de voitures de location chez SG CAR</p> 
        <div class="offre-texte">
            <p>Optez pour une location de voiture chez SG CAR. Notre agence sélectionne des véhicules performants et vous garantit l’accès à un service de qualité. Découvrez toute notre gamme, allant des voitures de luxe aux SUV. Les modèles hybrides et électriques sont aussi présents au catalogue. Vous allez faire des économies en carburant et participer au respect de l’environnement.</p>
            <p>Choisissez votre voiture à louer parmi toutes celles proposées et offrez-vous une expérience de conduite exceptionnelle. Le confort de vos passagers n’est pas en reste avec des intérieurs de grand standing. Vous hésitez entre plusieurs modèles ? Laissez-vous surprendre par la catégorie mystère…<p>
        </div>
    </div>

    <div class="avantage-offre">
    <p class="offre-titre">Une gamme de choix : la catégorie premium</p> 
    <div class="offre-texte">
            <p>C’est dans le secteur automobile le modèle le plus convoité. Regroupant les modèles haut de gamme, y compris en location de voiture, la catégorie premium abrite des bijoux d’automobiles. Que vous soyez un adepte de ces engins puissants et stylés ou un simple passionné, votre location tout compris au Maroc est l’occasion de vous faire plaisir pour arpenter les pistes et les routes au volant d’une voiture de luxe.</p>
            <p>Ces modèles vous accompagnent également lors de vos voyages d’affaires. Ils bénéficient d’un équipement tout confort comprenant :<p>
        </div>
        <div class="avantage-liste">
            <ul>
                <li>La climatisation automatique</li>
                <li>Le GPS</li>
                <li>La boîte automatique</li>
            </ul>
        </div>
        <div class="offre-texte">
            <p>La conduite est simplifiée et la tenue de route parfaite avec cette catégorie. Vous accédez aux derniers modèles Volvo ou Alfa Romeo. Vous pouvez aussi conduire l’emblématique Citroën C5. Au volant, vous êtes prêt à parcourir les kilomètres qui vous séparent de votre destination finale.</p>
        </div>
    </div>

    <div class="avantage-offre">
    <p class="offre-titre">Six gammes de location sont disponibles chez SG CAR :</p> 
        <div class="avantage-liste">
            <ul>
                <li>Citadine</li>
                <li>Compact</li>
                <li>SUV</li>
                <li>Premium</li>
                <li>Utilitaire</li>
                <li>Minibus</li>
            </ul>
        </div>
        <div class="offre-texte">
            <p>Vous avez l’assurance de trouver le modèle qu’il vous faut. Pour faire le bon choix, tenez compte du nombre de personnes que vous emmenez avec vous. Pour chaque automobile, profitez d’un prix exceptionnel. Collectionnez également les miles pour bénéficier de réductions sur vos prochaines locations.</p>
            <p>Une septième catégorie vous est aussi proposée : la voiture mystère. Elle porte bien son nom, masquant son modèle jusqu’à votre arrivée dans notre agence. Seule certitude : le véhicule en location que nous vous réservons est systématiquement issu de la meilleure catégorie disponible. Vous allez ainsi pouvoir accéder à des versions uniques, avec la garantie d’un confort et d’un niveau d’équipements élevé !</p>
        </div>
    </div>
    </div>
    <div class="offre-contenu">
        <p class="offre-titre">Une gamme luxueuse de voitures de location chez SG CAR</p> 
        <div class="offre-texte">
        <p>Optez pour une location de voiture chez SG CAR. Notre agence sélectionne des véhicules performants et vous garantit l’accès à un service de qualité. Découvrez toute notre gamme, allant des voitures de luxe aux SUV. Les modèles hybrides et électriques sont aussi présents au catalogue. Vous allez faire des économies en carburant et participer au respect de l’environnement.</p>
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
    </script>
    <?php include('chargement.php');?> 
    <?php include('Apropos.php');?>
    <?php include('langue.php');?>
    <?php include('chat.php');?> 
    <?php include('flèche.php');?>
    <?php include('piedPage.php');?>
</body>
</html>