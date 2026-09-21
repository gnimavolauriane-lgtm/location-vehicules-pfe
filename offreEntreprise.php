<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="entreprise.css">
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
</head>
<body>
    <?php include("entete.php");?>
    <div class="separateur"></div>
   <div class="image">
    <div class="slogan">
     <h2>Louez votre voiture en toute simplicité chez SG CAR</h2>
    </div>

    <div class="form-contenu">
        <form class="formulaire">
            <input type="text" id="input1" placeholder="Date de reception" class="form-input" required>
            <input type="text" id="input2" placeholder="Heure" class="form-input" required>
            <input type="text" id="input3"placeholder="Date de restitution" class="form-input" required>
            <input type="texte" id="input4" placeholder="Heure " class="form-input" required>
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
    <a href="accueil3.php" class="lien1">Nos offres spéciales pour entreprise</a> >
    <a href="#" class="lien1">Entreprises</a> 
    <h2 class='lien1-texte'>SG CAR Solutions</h2>
</div>

<!-- ligne 1 -->
<div class="entreprise-contenu">
 <div class="entreprise">
   <div class="entreprise-info">
      <img src="image/offre1.jpeg" alt="" class="entreprise-image">
      <h2 class="entreprise-nom">Nos offres spéciales</h2>
      <p class="entreprise-description">Découvrez nos offres exclusives pour les professionnels : des tarifs compétitifs, des services premium et des solutions de location flexibles adaptées aux besoins de votre entreprise.</p>
 </div>
 <div class="entreprise-détails">
  <a href="" class="Elien-detail">Suite de l'article &#10095;</a>
 </div>
</div>
 <div class="entreprise">
   <div class="entreprise-info">
      <img src="image/offre2.jpg" alt="" class="entreprise-image" id="offre2">
      <h2 class="entreprise-nom">Conctact business</h2>
      <p class="entreprise-description">Besoin d’assistance ou d’informations supplémentaires sur nos solutions pour entreprises ? Notre équipe dédiée est là pour vous aider. Cliquez ici pour nous contacter.</p>
 </div>
 <div class="entreprise-détails">
  <a href="" class="Elien-detail">Suite de l'article &#10095;</a>
 </div>
</div>
<!--ligne2 -->
<div class="entreprise">
   <div class="entreprise-info">
      <img src="image/offre3.jpeg" alt="" class="entreprise-image">
      <h2 class="entreprise-nom">Nos produits SCS</h2>
      <p class="entreprise-description">Découvrez nos produits exclusifs destinés aux entreprises. Que vous cherchiez des options de location flexibles, des services personnalisés ou des solutions de gestion de flotte, nous proposons une variété de produits pour optimiser votre mobilité...</p>
 </div>
 <div class="entreprise-détails">
  <a href="" class="Elien-detail">Suite de l'article &#10095;</a>
 </div>
</div>
 <div class="entreprise">
   <div class="entreprise-info">
      <img src="image/offre4.jpg" alt="" class="entreprise-image">
      <h2 class="entreprise-nom">Notre Flotte SCS</h2>
      <p class="entreprise-description">Explorez notre flotte diversifiée de véhicules adaptés aux besoins des professionnels. De la voiture compacte au véhicule utilitaire, chaque modèle est sélectionné pour offrir performance, confort et fiabilité. Cliquez ici pour découvrir notre gamme...</p>
 </div>
 <div class="entreprise-détails">
  <a href="" class="Elien-detail">Suite de l'article &#10095;</a>
 </div>
</div>
 <!--ligne3 -->
<div class="entreprise">
   <div class="entreprise-info">
      <img src="image/offre5.jpg" alt="" class="entreprise-image">
      <h2 class="entreprise-nom">Location de voiture entreprise</h2>
      <p class="entreprise-description">De la courte à la moyenne durée, nous proposons à notre clientèle des offres sur mesure avec des services personnalisés en fonction des besoins de chacun de nos clients.</p>
 </div>
 <div class="entreprise-détails">
  <a href="" class="Elien-detail">Suite de l'article &#10095;</a>
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
<?php include('Apropos.php');?>
<?php include('langue.php');?>
<?php include('chat.php');?> 
<?php include('flèche.php');?>
<?php include('piedPage.php');?>
</body>
</html>