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

        <<img src="image/blog/blog.jpg" alt="" />
    </div>

    <div class="lien1-contenu">
        <a href="accueil.php" class="lien1">Accueil</a> &gt;
        <a href="#" class="lien1">BLOG SG CAR</a>
        <h2 class="lien1-texte">BLOG SG CAR LOCATION DE VOITURE</h2>
    </div>

    <!-- Section principale dynamique -->
    <section class="section-llc" id="llc-section">
        <h2 id="main-title">POURQUOI LES GENS AIMENT-ILS UNE LOCATION VOITURE A PROXIMITE</h2>

        <div class="content-display" id="display-area">
            <div class="content-text">
                <h4>Gain de temps</h4>
                <p>Avec la LLD, vous payez un loyer fixe chaque mois, sans surprise. L’assurance, l’entretien, et même l’assistance peuvent être inclus dans votre contrat.</p>
            </div>
            <div class="content-img">
                <img src="image/blog/temps.jpg" alt="Budget maîtrisé" />
            </div>
        </div>

        <div class="grid-cards" id="cards-container">
            <div class="card active" data-id="1"><h3>Gain de temps</h3></div>
            <div class="card" data-id="2"><h3>Economie frais transport</h3></div>
            <div class="card" data-id="3"><h3>Plus de flexibilité</h3></div>
            <div class="card" data-id="4"><h3> services personnalisés</h3></div>
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
            title: "Gain de temps",
            description: "Pourquoi c’est important :Avoir un point de location proche de chez soi ou de son lieu de travail évite les longs déplacements inutiles pour récupérer un véhicule.Concrètement :Possibilité de louer en quelques minutes à pied Idéal en cas de besoin urgent (dépannage, rendez-vous pro, voyage impromptu) Moins de stress pour rendre la voiture (pas de transport retour à prévoir)",
            imgSrc: "image/blog/temps.jpg",
            imgAlt: "Budget maîtrisé"
        },
        2: {
            title: "Economie frais transport",
            description: "Pourquoi c’est important :Louer à proximité permet d’économiser sur les frais annexes.Exemples :Pas besoin de payer un taxi ou un VTC pour aller jusqu’à l’agence Réduction du budget global pour les courts trajets Certains loueurs locaux proposent des tarifs plus compétitifs que les agences d’aéroport",
            imgSrc:"image/blog/transport.jpg" ,
            imgAlt: "Véhicule récent"
        },
        3: {
            title: "Plus de flexibilité",
            description: "Pourquoi c’est important :Les agences ou services de proximité sont souvent plus souples.Concrètement :Réservation possible à la dernière minute Retour 24h/24 parfois possible avec boîtes à clés Moins de files d’attente qu’en centre-ville ou en aéroport",
            imgSrc: "image/blog/flexibilite.jpg",
            imgAlt: "Entretien inclus"
        },
        4: {
            title: "services personnalisés",
            description: "Pourquoi c’est important :La location locale permet souvent un contact humain de qualité et un meilleur suivi.Concrètement :Agents locaux qui connaissent les besoins de la clientèle du quartier Suggestions personnalisées (modèle adapté, options utiles) Parfois possibilité de livraison à domicile ou d’offres fidélité de quartier",
            imgSrc: "image/blog/service.jpg",
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
            titre: "Réussir sa location de voiture : nos conseils",
            img: "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=60",
            url: "blog1.php"
        },
        {
            titre: "Comment bien choisir son modèle de voiture",
            img: "https://images.unsplash.com/photo-1502877338535-766e1452684a?auto=format&fit=crop&w=400&q=60",
            url: "blog2.php"
        },
        {
            titre: "Les avantages de la location longue durée (LLD)",
            img: "image/blog/avantage.jpg",
            url: "blog.php"
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
