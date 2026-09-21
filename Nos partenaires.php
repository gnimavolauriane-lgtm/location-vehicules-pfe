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
    <link rel="stylesheet" href="partenaire.css">
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
    <img src="image/partenaire.jpg" alt="">

   </div>

      <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="#" class="lien1">Nos Partenaires SG CAR</a>  
    <h2 class='lien1-texte'>PARTENARIATS SG CAR LOCATION DE VOITURE</h2>
   </div>

<section class="partenariats-sgcar">
    <p class="intro">
        SG CAR – Votre partenaire mobilité à Béni Mellal, avec des avantages exclusifs chez nos partenaires locaux !
    </p>

    <p>
        Chez SG CAR, nous mettons tout en œuvre pour rendre votre expérience de location fluide, agréable et avantageuse. En louant votre voiture chez nous à Béni Mellal, vous bénéficiez d’offres spéciales et de réductions privilégiées auprès de nos partenaires : hôtels, restaurants, services auto, et autres prestataires de la région.
    </p>

    <p>
        Parce que nous savons que louer un véhicule, c’est aussi profiter pleinement de son séjour, nous avons sélectionné pour vous des partenaires de confiance pour compléter votre voyage.
    </p>

    <p>
        Une question ? Un besoin spécifique ?<br>
        N’hésitez pas à nous joindre par téléphone ou par email. Notre équipe se tient à votre disposition pour vous guider et vous faire profiter de ces avantages exclusifs.
    </p>

    <div class="btn-container">
        <a href="contact.php" class="btn-contact">Contactez-nous</a>
    </div>
</section>
<section class="partenaire-ouzoud">
    <div class="partenaire-texte">
        <h3>Hôtel Ouzoud Béni Mellal – Une référence d’hospitalité au cœur du Moyen Atlas</h3>
        <p>
            Situé au pied des montagnes de l’Atlas, l’Hôtel Ouzoud Béni Mellal est un établissement emblématique de la région, alliant confort, élégance et authenticité. Membre du prestigieux groupe <strong>KENZI HOTELS</strong>, il reflète les standards élevés du premier opérateur hôtelier marocain.
        </p>
        <p>
            L’Hôtel Ouzoud incarne une vision moderne de l’hôtellerie marocaine, en offrant un service de classe internationale, porté par un personnel expérimenté et dévoué. Avec ses vastes jardins, sa piscine, ses chambres raffinées, et son restaurant aux saveurs locales et internationales, il promet un séjour d’exception, que ce soit pour les voyageurs d’affaires ou les familles en quête de détente.
        </p>
        <p>
            L’objectif de l’Hôtel Ouzoud est clair : être une référence régionale, reconnue pour la qualité de son accueil, la richesse de son offre et son engagement constant pour l’excellence.
        </p>
        <p class="lien-site">
            🔗 <a href="https://www.hotel-benimellal-ouzoud.com" target="_blank" rel="noopener noreferrer">www.hotel-benimellal-ouzoud.com</a>
        </p>
    </div>
        <div class="partenaire-slider">
        <button class="slider-btn prev" aria-label="Image précédente">&#10094;</button>
        <div class="slider-wrapper">
            <div class="slider-track">
            <img src="image/ouzoud/piscine ouzoud.webp" alt="Hôtel Ouzoud vue extérieure" />
            <img src="image/ouzoud/chambre ouzoud.webp" alt="Piscine de l’Hôtel Ouzoud" />
            <img src="image/ouzoud/entrer ouzoud.webp" alt="Chambre confortable à l’Hôtel Ouzoud" />
             <img src="image/ouzoud/vue d'ensemble ouzoud.webp" alt="Chambre confortable à l’Hôtel Ouzoud" />
            </div>
        </div>
        <button class="slider-btn next" aria-label="Image suivante">&#10095;</button>
        </div>

</section>













   <?php include('chargement.php');?> 
  <?php include('flèche.php');?>
   <?php include('Apropos.php');?>
   <?php include('chat.php');?>
   <?php include('piedPage.php');?>


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
 



  (function() {
    const track = document.querySelector('.slider-track');
    const slides = document.querySelectorAll('.slider-track img');
    const prevBtn = document.querySelector('.slider-btn.prev');
    const nextBtn = document.querySelector('.slider-btn.next');

    let currentIndex = 0;

    function updateSlider() {
      const width = slides[0].clientWidth;
      track.style.transform = `translateX(-${currentIndex * width}px)`;
    }

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
      updateSlider();
    });

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
      updateSlider();
    });

    window.addEventListener('resize', updateSlider);

    // Init
    updateSlider();
  })();


</script>
</body>
</html>