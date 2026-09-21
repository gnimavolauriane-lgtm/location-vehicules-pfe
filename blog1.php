<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Document</title>

    <!-- i18next and other libs -->
    <script src="https://cdn.jsdelivr.net/npm/i18next@21.0.2/i18next.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-http-backend@1.3.1/i18nextHttpBackend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-browser-languagedetector@6.0.0/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="js/app.js"></script> 

    <!-- Stylesheets and fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="Blog.css" />
    <script src="https://kit.fontawesome.com/8a1e76e869.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_forward_ios" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>

    <?php include('overlay.php'); ?>
    <?php include('entete.php'); ?>

    <div class="separateur"></div>

    <div class="image">
        <div class="slogan">
            <h2 data-i18n="accueil.slogan.title">Louez votre voiture en toute simplicité chez SG CAR</h2>
        </div>

        <div class="form-contenu">
            <form class="formulaire" method="GET" action="resultats.php" onsubmit="return validerFormulaire();">
                <div class="champ-formulaire">
                    <input type="date" name="date_reception" id="input1" placeholder="📅 Date de réception" class="form-input" />
                    <div class="error-message" id="error-input1"></div>
                </div>

                <div class="champ-formulaire">
                    <input type="text" name="heure_reception" id="input2" placeholder="🕒 Heure" class="form-input" />
                    <div class="error-message" id="error-input2"></div>
                </div>

                <div class="champ-formulaire">
                    <input type="date" name="date_restitution" id="input3" placeholder="📅 Date de restitution" class="form-input" />
                    <div class="error-message" id="error-input3"></div>
                </div>

                <div class="champ-formulaire">
                    <input type="text" name="heure_restitution" id="input4" placeholder="🕒 Heure" class="form-input" />
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
                            <input type="checkbox" name="permis" id="case1" />
                            <label for="case1">Conducteur ayant le permis</label>
                            <div class="error-message" id="error-permis"></div>
                        </div>
                        <div>
                            <input type="checkbox" name="age_ok" id="case2" />
                            <label for="case2">Conducteur âgé entre 21 ans et plus</label>
                            <div class="error-message" id="error-age_ok"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <img src="image/blog/blog.jpg" alt="" />
    </div>

    <div class="lien1-contenu">
        <a href="accueil.php" class="lien1">Accueil</a> &gt;
        <a href="#" class="lien1">BLOG SG CAR</a>
        <h2 class="lien1-texte">BLOG SG CAR LOCATION DE VOITURE</h2>
    </div>

    <!-- Section principale dynamique -->
    <section class="section-llc" id="llc-section">
        <h2 id="main-title">Réussir sa location de voiture : nos conseils</h2>

        <div class="content-display" id="display-area">
            <div class="content-text">
                <h4>comparer les offres</h4>
                <p>Pourquoi c’est important :
                Les prix, les conditions (assurances, kilométrage inclus, options), et les modèles proposés varient énormément selon les agences.
                Ce qu’il faut faire :
                Utilise des comparateurs (ex. : Kayak, Rentalcars, AutoEurope) pour analyser les offres. Regarde aussi les frais cachés comme les frais de retour hors agence ou les assurances obligatoires.</p>
            </div>
            <div class="content-img">
                <img src="image/blog/comparer.jpg" alt="Budget maîtrisé" />
            </div>
        </div>

        <div class="grid-cards" id="cards-container">
            <div class="card active" data-id="1"><h3>comparer les offres</h3></div>
            <div class="card" data-id="2"><h3>Lire contrat location</h3></div>
            <div class="card" data-id="3"><h3>Contrôler états véhicules</h3></div>
            <div class="card" data-id="4"><h3>Gérer carburant</h3></div>
        </div>
    </section>

    <!-- Section "Vous aimerez aussi" -->
    <section class="suggested-section">
        <h2>Vous aimerez aussi</h2>
        <div class="suggested-articles" id="suggested-container"></div>
    </section>

    <?php include('flèche.php'); ?>
    <?php include('Apropos.php'); ?>
    <?php include('chat.php'); ?>
    <?php include('piedPage.php'); ?>

<script>
    // Initialiser Flatpickr pour les inputs
    flatpickr("#input1", {
        enableTime: false,
        dateFormat: "d-m-Y",
    });

    flatpickr("#input3", {
        enableTime: false,
        dateFormat: "d-m-Y",
    });

    flatpickr("#input2", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    flatpickr("#input4", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    function validerFormulaire() {
        let valide = true;

        document.querySelectorAll(".error-message").forEach(div => (div.innerText = ""));

        const champs = [
            { id: "input1", message: "Veuillez choisir une date" },
            { id: "input2", message: "Veuillez choisir une heure" },
            { id: "input3", message: "Veuillez choisir une date" },
            { id: "input4", message: "Veuillez choisir une heure" },
            { id: "categorie", message: "Veuillez choisir une catégorie" },
        ];

        champs.forEach(champ => {
            const input = document.getElementById(champ.id);
            if (!input.value.trim()) {
                document.getElementById("error-" + champ.id).innerText = champ.message;
                valide = false;
            }
        });

        const input1 = document.getElementById("input1").value;
        const input3 = document.getElementById("input3").value;
        if (input1 && input3) {
            const dateReception = new Date(input1);
            const dateRestitution = new Date(input3);
            if (dateRestitution < dateReception) {
                document.getElementById("error-input3").innerText = "La date de restitution doit être postérieure à la date de réception";
                valide = false;
            }
        }

        if (!document.getElementById("case1").checked) {
            document.getElementById("error-permis").innerText = "Vous devez confirmer que vous avez le permis";
            valide = false;
        }

        if (!document.getElementById("case2").checked) {
            document.getElementById("error-age_ok").innerText = "Vous devez confirmer avoir plus de 21 ans";
            valide = false;
        }

        return valide;
    }

    // Gestion des sections dynamiques "LLD"
    const sectionsData = {
        1: {
            title: "comparer les offres",
            description: "Pourquoi c’est important :Les prix, les conditions (assurances, kilométrage inclus, options), et les modèles proposés varient énormément selon les agences.Ce qu’il faut faire :Utilise des comparateurs (ex. : Kayak, Rentalcars, AutoEurope) pour analyser les offres. Regarde aussi les frais cachés comme les frais de retour hors agence ou les assurances obligatoires.",
            imgSrc: "image/blog/comparer.jpg",
            imgAlt: "Budget maîtrisé"
        },
        2: {
            title: "Lire contrat location",
            description: "Pourquoi c’est important :Le contrat contient toutes les conditions : franchise, responsabilités, conditions de restitution, politique de carburant, etc. Ne rien lire peut te coûter cher.Ce qu’il faut faire :Lis les petites lignes. Vérifie les garanties incluses, la franchise en cas d'accident, et les éventuelles pénalités. N’hésite pas à poser des questions à l’agent si quelque chose n’est pas clair.",
            imgSrc: "image/blog/contrat.jpg",
            imgAlt: "Véhicule récent"
        },
        3: {
            title: "Contrôler états véhicules",
            description: "Pourquoi c’est important :Si tu rends la voiture avec un dommage non signalé, on peut te le facturer, même s’il était là avant.Ce qu’il faut faire :Fais un état des lieux avec l’agent avant de partir, prends des photos et vidéos (extérieur + intérieur), même des jantes ou du pare-brise. Fais la même chose au retour.",
            imgSrc: "image/blog/etat.jpg",
            imgAlt: "Entretien inclus"
        },
        4: {
            title: "Gérer carburant",
            description: "Pourquoi c’est important :Certains loueurs facturent le carburant à un tarif élevé si tu rends la voiture sans le plein.Ce qu’il faut faire :Choisis si possible l’option plein/plein (tu rends la voiture avec le même niveau que lors du retrait). Fais le plein juste avant de la rendre, à une station proche de l’agence.",
            imgSrc: "https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=700&q=60",
            imgAlt: "Flexibilité totale"
        },
    };

    const cards = document.querySelectorAll("#cards-container .card");
    const displayArea = document.getElementById("display-area");

    cards.forEach(card => {
        card.addEventListener("click", () => {
            // Retirer active des autres
            cards.forEach(c => c.classList.remove("active"));
            card.classList.add("active");

            const id = card.getAttribute("data-id");
            const data = sectionsData[id];

            displayArea.innerHTML = `
                <div class="content-text">
                    <h4>${data.title}</h4>
                    <p>${data.description}</p>
                </div>
                <div class="content-img">
                    <img src="${data.imgSrc}" alt="${data.imgAlt}" />
                </div>
            `;
        });
    });

    // Section "Vous aimerez aussi"
    const suggestedArticles = [
        {
            titre: "Les avantages de la location longue durée (LLD)",
            img: "image/blog/avantage.jpg",
            url: "blog.php"
        },
        {
            titre: "Comment bien choisir son modèle de voiture",
            img: "https://images.unsplash.com/photo-1502877338535-766e1452684a?auto=format&fit=crop&w=400&q=60",
            url: "blog2.php"
        },
        {
            titre: "POURQUOI LES GENS AIMENT-ILS UNE LOCATION VOITURE A PROXIMITE",
            img: "image/blog/proche.jpg",
            url: "blog3.php"
        },
    ];

    const suggestedContainer = document.getElementById("suggested-container");
    suggestedArticles.forEach(article => {
        const articleDiv = document.createElement("div");
        articleDiv.classList.add("suggested-article");
         
        articleDiv.innerHTML = `
  <a href="${article.url}">
      <img src="${article.img}" alt="${article.titre}" />
      <div class="plus-icon">+</div>
      <h4>${article.titre}</h4>
  </a>
`;

        
        suggestedContainer.appendChild(articleDiv);
    });

      // Appliquer l'effet d'entrée dès le chargement
  window.addEventListener("DOMContentLoaded", () => {
    document.body.classList.add("fade-in");
  });

  // Appliquer l'effet de sortie avant de quitter la page
  document.querySelectorAll('a[href]:not([target="_blank"])').forEach(link => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      // Ignore les ancres ou les liens vides
      if (href.startsWith("#") || href === "") return;

      e.preventDefault();
      document.body.classList.add("fade-out");

      setTimeout(() => {
        window.location.href = href;
      }, 300); // Temps égal ou supérieur au CSS `transition`
    });
  });

   let currentIndex = 1;

  function showNextCard() {
  displayArea.classList.add("fade-out");
  setTimeout(() => {
    currentIndex++;
    if (currentIndex > Object.keys(sectionsData).length) {
      currentIndex = 1;
    }

    cards.forEach(c => c.classList.remove("active"));
    const activeCard = document.querySelector(`.card[data-id="${currentIndex}"]`);
    if (activeCard) activeCard.classList.add("active");

    const data = sectionsData[currentIndex];
    displayArea.innerHTML = `
      <div class="content-text">
          <h4>${data.title}</h4>
          <p>${data.description}</p>
      </div>
      <div class="content-img">
          <img src="${data.imgSrc}" alt="${data.imgAlt}" />
      </div>
    `;
    displayArea.classList.remove("fade-out");
  }, 300);
}

// Lancer le défilement automatique toutes les 5 secondes
setInterval(showNextCard, 5000);
</script>

</body>
</html>
