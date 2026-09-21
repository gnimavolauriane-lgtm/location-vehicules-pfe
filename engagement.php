

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Engager.css">
    <script src="https://kit.fontawesome.com/8a1e76e869.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward_ios" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
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

    <div class='image-contenu'> 
      <img src="image/engagement.jpg" alt="">
   </div>
   </div>

   <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> >  
    <a href="#" class="lien1">Nos engagements</a> 
    <h2 class='lien1-texte'>Découvrez nos engagements pour une location de voiture  sans inquiétude!</h2>
</div>

   <section class="image-texte">
      <div class="contenu-image-texte">
         <div class="image-à-droite">
         <div class="texte-sur-image">

              <img src="image/engagement.jpeg" alt="">

              <div class="texte-haut">
                   <p ><strong>Si j'ai envie de louer <br ><span>un véhicule clean sans prise de tête</span> </strong></p>
                   <p id="texte2"><strong>Je demande à qui ?</strong> </p>
          </div>
               <div class="texte-bas">
                  <strong>Chez SG CAR on vous loue des <br>véhicules impeccables selon votre choix</strong>
               </div>
            </div>
         </div>

         <div class="texte-à-droite">
           <h2>Qualité et entretien des véhicules</h2>
           <p>L'engagement principal de SG CAR est de <span class="span">garantir que ses véhicules soient toujours en parfait état de fonctionnement et de propreté</span>. Un entretien régulier est essentiel pour assurer non seulement la sécurité des clients,mais aussi leur confort.Des contrôles fréquents sont effectués pour vérifier le bon état des freins,des pneus,du moteur,ainsi que des équipements intérieurs(climatisation,systèmes audio,etc.).</p>
           <p>De plus,nous nous assurons que nos véhicules sont <span class="span">nettoyés à fond avant chaque location</span> nettoyés à fond avant chaque location,ce qui inclut un nettoyage intérieur et extérieur. En période de forte demande,SG CAR s'assure que la qualité du service ne soit pas compromise par la rapidité des rotations de véhicules.</p>
         </div>
      </div>
   </section>

   <section class="bloc-de-texte">
      <div class="bloc">
         <h3>Transparence des prix et des conditions</h3>
         <p>SG CAR adopte une transparence totale concernant nos tarifs et nos conditions de location.La clarté dans nos offres permet aux clients de mieux comparer et de choisir l'option la plus adaptée  à leurs besoins.Nous nous assurons également  que nos conditions générales de location soient faciles à comprendre et accessible ,notamment via notre <span class="span">site web</span>,pour que les clients puissent prendre des décisions éclairées avant de réserver un véhicule.</p>
      </div>
      <div class="bloc">
         <h3>Service client et réactivité</h3>
         <p>Un engagement fort envers un <span class="span">excellent service client</span> excellent service client est essentiel pour fidéliser une clientèle.Nous offrons un<span class="span">support réactif ,accessible et professionnel</span> pour répndre aux questions des clients,résoudre les problèmes en cas de besoins,et offrons des <span class="span">solutions rapides</span> en cas de contretemps.Cela inclut une  ligne téléphonique disponible pendant les heures d'ouverture.</p>
      </div>
      
   </section>

   <section class="bloc-de-texte">
      <div class="bloc">
         <h3>Accessibilité et flexibilité</h3>
         <p>Nous nous engageons à offrir une <span class="span">expérience de location flexible et accessible</span>  à tous.Cela inclut des horaires de réservation flrxibles,des options de retrait et de retour des véhicules à différents endroits ainsi que la possibilité de prolonger ou de modifier la location facilement.</p>
      </div>
      <div class="bloc">
         <h3>Assurance et sécurité</h3>
         <p>Nous proposons une <span class="span">couverture d'assurance adéquate </span> et proposons des options supplémentaire pour rassurer nos clients.En plus de la couverture de base,elle pourrait offrir des assurances(vol,collision,dommage matériel) pour garantir que le client soit protégé dans toutes les situations Chez nous, la transparence sure les conditions des assurances est également primordiale.</p>
      </div>
      
   </section>
   <section class="bloc-de-texte">
      <div class="bloc">
         <h3>Innovation technologique</h3>
         <p>Nous nous engageons à <span class="span">intégrer des technologies innovantes </span> pour améliorer l'expérience client.Cela inclut l'utilisation d'applications mobiles permettant la réservation,la gestion de la location,le suivi des véhicules,et même l'accès sans clé grâce à des systèmes de verrouillage et déverrouillage à distance.</p>
      </div>
      <div class="bloc">
         <h3>Engagement envers la transparence des conditions de location</h3>
         <p>Nous veillons à ce que nos conditions de locations soient simples,claires et faciles à comprendre.Cela inclut des <span class="span">informations détaillées</span> sur les droits et responsabilités des locataires,les assurances,les politiques de caburant,les frais annexes,ainsi que les conditions en cas d'annulation ou de modification de réservation.</p>
      </div>
      
   </section>
   <section class="bloc-de-texte">
      <div class="bloc">
         <h3>Responsabilité environnementale</h3>
         <p>Chez SG CAR nous favorisons également les <span class="span">comportements de conduite écologiques</span>, comme le respect des limites de vitesse et l’encouragement de la conduite douce, pour réduire la consommation de carburant et les émissions de CO2. Un tel engagement attire une clientèle soucieuse de l’environnement, et positionne l’entreprise comme un acteur responsable.</p>
      </div>
      <div class="bloc">
         <h3>Egagement social et éthique</h3>
         <p>L'ethique de notre entreprise se réflète non seulement dans nos relations avec nos employés,mais aussi daans nos <span class="span">relations avec les clients</span>.Nous garantissons le respect des lois sur les droits des consommateurs et la non exploitation des pratiques trompeuses pour attirer les clients</p>
      </div>
      
   </section>
   <section class="bloc-de-texte">
      <div class="bloc">
         <h3>Formation continue du personnel</h3>
         <p>SG CAR fournir des <span class="span">formations continues</span> pour s'assurer que les employés sont bien informés des dernières réglementations,des nouvelles technologies,et des meilleures pratiques en matière de service à la clientèle. </p>
      </div>
      <div class="bloc">
         <h3>Gestion efficace de la flotte</h3>
         <p>SG CAR investit dans <span class="span">des outils de gestions de flotte</span> pour suivre en temps réel l'état des véhicules,et d'améliorer la satisfaction des clients en garantissant une disponibilité continue.</p>
      </div>
      
   </section>

   
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
   <?php include('langue.php');?>
   <?php include('flèche.php');?>
   <?php include("piedPage.php");?>
</body>
</html>