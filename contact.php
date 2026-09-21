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
    <style>

body {
    background-color: #f5f5f5;
    margin: 0;
    font-family: Arial, sans-serif;
}
.separateur {
    width: 100%; 
    height: 5px; /* épaisseur du trait */
    background-color: #5A189A; /* Couleur du trait */
     /* Permet au trait de se superposer à l'image */
}

.image {
    width: 100%;
    height: 470px;         
    overflow: hidden;      
    position: relative;
}

.image img {
    width: 100%;
    position: relative;
    top: 220px;  
}

.slogan {
    position: absolute;
    top: 280px; /* Positionner le texte au centre verticalement de l'image */
    left: 50%; /* Positionner le texte au centre horizontalement de l'image */
    transform: translate(-50%, -50%); /* Centrer parfaitement le texte */
    width: 80%;
    text-align: center;
    color: #fff;
    font-size: 2rem;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour améliorer la lisibilité */
    padding: 10px 20px 250px 20px;
    
    box-sizing: border-box;
    border-radius: 8px;
    z-index: 2; /* Placer la promesse au-dessus de l'image */
}
.slogan h2{
    font-size: 2rem;
    font-family: "Archivo Black", sans-serif;
}

/* Conteneur du formulaire */
.form-contenu {
    position: absolute;
    bottom: 30px; /* Placer le formulaire juste en dessous de la promesse */
    left: 50%;
    top: 220px;
    z-index: 3;
    transform: translateX(-50%); /* Centrer horizontalement */
    width: 80%; /* La largeur du formulaire */
    padding: 20px;
    border-radius: 8px; /* Coins arrondis */
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

/* Style pour les inputs du formulaire */
.form-input {
    width: 18%;
    padding: 20px;
    margin: 0;
    box-sizing: border-box;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

.form-input:focus {
    border-color: #ad9c9c;
}
#input1:focus{
    border:4px solid #ad9c9c;
}
#input2:focus{
    border:4px solid #ad9c9c;
}
#input3:focus{
    border:4px solid #ad9c9c;
}
#input4:focus{
    border:4px solid #ad9c9c;
}
#input5:focus{
    border:4px solid #ad9c9c;
}


.boutton{
    padding: 3px;
    border-radius: 10px;
}
.boutton:hover{
    background-color: #ad9c9c;
}

.boutton i {
    font-size: 25px;
    color: #111;
}

.liste{
    display: none; /* Masqué par défaut */
    position: absolute;
    background-color: white;
    border-radius: 4px;
    width: 200px;
    right: 5px;
    margin-top: 5px;
    padding:0 50px 50px 50px;
    max-height: 150px;
    overflow-y: auto;
    box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 100;
}
.liste li{
    padding: 8px;
    cursor:pointer;
    list-style: none;
}
.liste li:hover{
  background-color:  rgba(0, 0, 0, 0.5);
}

/* Style pour les cases à cocher*/
.cocher{
    margin-top: 30px;
}

.caseCocher div{
    margin-bottom: 20px;/* mettre de l'espace entre les cases*/
}

label{
    color: #fff;
    font-size: 16px;
}

input[type="checkbox"]{
    width: 20px;
    height: 20px;
}

.image::after{
    content: "";
    position: absolute;
    bottom: 0px;/*pour faire descendre le trait à ma guise*/
    width: 100%;
    left: 0;
    height: 5px;/*epaiiseur du trait*/
    background-color: #5A189A;
    top: 445px;
    z-index: 1000;
}



body {
    background-color: #fff;
    margin: 0;
    font-family: Arial, sans-serif;
}
.separateur {
    width: 100%; 
    height: 5px; /* épaisseur du trait */
    background-color: #5A189A; /* Couleur du trait */
     /* Permet au trait de se superposer à l'image */
}

.image {
    position: relative;
    width: 100%;
    overflow: hidden;
  
}
.image img {
    width: 100%;
    height: auto;
    transform: translateY(-50%);
}
.slogan {
    position: absolute;
    top: 280px; /* Positionner le texte au centre verticalement de l'image */
    left: 50%; /* Positionner le texte au centre horizontalement de l'image */
    transform: translate(-50%, -50%); /* Centrer parfaitement le texte */
    width: 80%;
    text-align: center;
    color: #fff;
    background-image: 8px 8px 8px 8px #fff;
    font-size: 2rem;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour améliorer la lisibilité */
    padding: 10px 20px 250px 20px;
    box-sizing: border-box;
    border-radius: 8px;
    z-index: 2; /* Placer la promesse au-dessus de l'image */
}
.slogan h2{
    font-size: 2rem;
    font-family: "Archivo Black", sans-serif;
}
.slogan h3{
    font-size: 2rem;
    font-family: "Archivo Black", sans-serif;
    margin-left: -100px;
}

/* Conteneur du formulaire */
.form-contenu {
    position: absolute;
    bottom: 30px; /* Placer le formulaire juste en dessous de la promesse */
    left: 50%;
    top: 220px;
    z-index: 3;
    transform: translateX(-50%); /* Centrer horizontalement */
    width: 80%; /* La largeur du formulaire */
    padding: 20px;
    border-radius: 8px; /* Coins arrondis */
    display: flex;
    justify-content: space-between;
    gap: 10px;
}

/* Style pour les inputs du formulaire */

.form-input:hover{
    border:2px solid #ad9c9c ;
}
.form-input:focus {
    border-color: #ad9c9c;
}
#input1:focus{
    border:4px solid #ad9c9c;
}
#input2:focus{
    border:4px solid #ad9c9c;
}
#input3:focus{
    border:4px solid #ad9c9c;
}
#input4:focus{
    border:4px solid #ad9c9c;
}
#input5:focus{
    border:4px solid #ad9c9c;
}


.formulaire {
  display: flex;              /* aligne les champs horizontalement */
  gap: 10px;                  /* espace entre chaque champ */
  align-items: flex-start;    /* aligne au top pour que les messages ne décalent pas */
  flex-wrap: wrap;            /* si écran trop petit, champs passent à la ligne */
}


.champ-formulaire {
  display: flex;
  flex-direction: column;    
  width: 18%;                 
}

.form-input {
width: 100%;                
box-sizing: border-box;
padding: 20px;
margin: 0;
box-sizing: border-box;
font-size: 14px;
border: 1px solid #ccc;
border-radius: 4px;
background-image: 8px 8px 8px 8px rgba(0 0 0 0.1);
outline: none;
}

/* message d’erreur sous le champ */
.error-message {
  color: red;
  font-size: 0.85em;
  margin-top: 4px;
  min-height: 18px; /* réserve un espace même si pas de message */
}

.boutton{
    padding: 3px;
    border-radius: 10px;
    margin-top: 15px;
}
.boutton:hover{
    background-color: #ad9c9c;
}

.boutton i {
    font-size: 25px;
    color: #111;
}


/* Style pour les cases à cocher*/
.cocher{
    margin-top: -20px;
}

.caseCocher div{
    margin-bottom: 5px;/* mettre de l'espace entre les cases*/
}

label{
    color: #fff;
    font-size: 16px;
}

input[type="checkbox"]{
    width: 20px;
    height: 20px;
}

.image::after{
    content: "";
    position: absolute;
    bottom: 0px;/*pour faire descendre le trait à ma guise*/
    width: 100%;
    left: 0;
    height: 5px;/*epaiiseur du trait*/
    background-color: #5A189A;
    top: 465px;
    z-index: 1000;
}

.lien1-contenu {
    position: relative;
    margin-top: 50px; /* espace entre l'image et cette section */
    font-size: 14px;
    padding: 20px 10px;
    width: 100%;
    z-index: 1000;
    margin-bottom: 10px;
    background-color: #f9f9f9;
}

.lien1 {
    position: relative;
    cursor: pointer;
    color: inherit;
    font-size: 0.9rem;
    margin-left: 10px;
}

.lien1-texte {
    position: relative;
    font-size: 2rem;
    margin-left: 10px;
    margin-top: 10px;
}

 .contact-section {
        width: 100%;
        margin: 60px 0 80px 0;
        padding: 20px 30px;
        background: transparent;
        max-width: none;
    }

    form.contact-form {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        justify-content: stretch;
    }

    /* Ligne avec 2 champs (Nom + Prénom) */
    .form-row-2 {
        display: flex;
        gap: 25px;
        width: 100%;
    }

    /* Ligne avec 3 champs (Téléphone + Ville) */
    .form-row-3 {
        display: flex;
        gap: 25px;
        width: 100%;
    }

    /* Champs à 50% largeur dans ligne 2 */
    .form-row-2 .form-group {
        flex: 1 1 50%;
        display: flex;
        flex-direction: column;
    }

    /* Champs à ~50% dans ligne 3, 2 champs seulement */
    .form-row-3 .form-group {
        flex: 1 1 50%;
        display: flex;
        flex-direction: column;
    }

    /* Email sur toute la largeur */
    .form-group.full-width {
        flex: 1 1 100%;
        display: flex;
        flex-direction: column;
    }

   

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
        padding: 20px 24px;
        font-size: 1rem;
        border: 2px solid #dcdcdc;
        border-radius: 8px;
        transition: border-color 0.3s ease;
        resize: vertical;
        font-family: inherit;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    select:focus,
    textarea:focus {
        border-color: #5A189A;
        outline: none;
    }

    textarea {
        min-height: 160px;
    }

    .file-upload {
        border: 2px dashed #5A189A;
        padding: 60px;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        color: #5A189A;
        font-weight: 600;
        transition: background-color 0.2s ease;
        user-select: none;
    }
    .file-upload:hover {
        background-color: #f0e6ff;
    }

    input[type="file"] {
        display: none;

    }
      input:hover,
select:hover {
    border: 1.3px solid #111;
}
input:focus::placeholder,
select:focus::placeholder,
textarea:focus::placeholder {
    color: #5A189A;
}

input::placeholder,
textarea::placeholder {
    opacity: 1;
    color: #111;
    font-style: italic;
    font-size: 1rem;
    transition: color 0.3s;
}
    .file-list {
        margin-top: 12px;
        font-size: 0.9rem;
        color: #5A189A;
    }

    .submit-btn {
        margin-top: 25px;
        padding: 14px 0;
        width: 100%;
        font-size: 1.2rem;
        font-weight: 700;
        border-radius: 12px;
        background-color:  #7a589b;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #9283a0;
    }
    
   .toast-success {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #4caf50;
  color: white;
  padding: 12px 20px;
  border-radius: 4px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.2);
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: bold;
  z-index: 9999;
}

.toast-success.hidden {
  display: none;
}

.toast-icon {
  font-size: 1.3em;
}

.toast-close {
  background: transparent;
  border: none;
  color: white;
  font-size: 1.2em;
  cursor: pointer;
}


.toast-icon {
  font-size: 1.5em;
}
.toast-success.hidden {
  display: none;
}
.toast-close {
  background: transparent;
  border: none;
  color: white;
  font-size: 1.2em;
  cursor: pointer;
}


    @media (max-width: 850px) {
        .form-row-2,
        .form-row-3 {
            flex-direction: column;
        }
        .form-row-2 .form-group,
        .form-row-3 .form-group {
            flex: 1 1 100%;
        }
    }
  

    </style>
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
    <img src="image/contactes.jpg" alt="">

   </div>

      <div class="lien1-contenu">
    <a href="accueil.php" class="lien1">Accueil</a> > 
    <a href="#" class="lien1">contactez-nous</a>  
    <h2 class='lien1-texte'>BIENVENUE CHEZ SG CAR LOCATION DE VOITURE</h2>
</div>
    
 <section class="contact-section"  aria-label="Formulaire de contact">
    <form class="contact-form" method="POST"  novalidate>

        <div class="form-row-2">
            <div class="form-group">
                
                <input type="text" id="prenom" name="prenom" placeholder="Prénom *" required />
                <div class="error-message" id="error-prenom"></div>
            </div>

            <div class="form-group">
                
                <input type="text" id="nom" name="nom" placeholder="Nom *" required />
                <div class="error-message" id="error-nom"></div>
            </div>
        </div>

        <div class="form-group full-width">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="Email *" required />
            <div class="error-message" id="error-email"></div>
        </div>

        <div class="form-row-3">
            <div class="form-group">
                
                <input type="tel" id="telephone" name="telephone" placeholder="Téléphone *" pattern="^\+?[0-9\s\-]{7,15}$" required />
                <div class="error-message" id="error-telephone"></div>
            </div>

            <div class="form-group">
                
                <select id="ville" name="ville" required>
                    <option value="" disabled selected>Choisissez votre ville*</option>
                    <option value="BM">Beni Mellal</option>
                    <option value="KH">Khouribga</option>
                    <option value="kh">khénifra</option>
                    <option value="autre">Autre</option>
                </select>
                <div class="error-message" id="error-ville"></div>
            </div>
        </div>

        <div class="form-group full-width">
            <select id="type_demande" name="type_demande" required>
                <option value="" disabled selected>Type de demande*</option>
                <option value="information">Information</option>
                <option value="réclamation">Réclamation</option>
                <option value="suggestion">Suggestion</option>
                <option value="autre">Autre</option>
            </select>
            <div class="error-message" id="error-type_demande"></div>
        </div>

        <div class="form-group full-width">
            <textarea id="commentaire" name="commentaire" placeholder="Question / Commentaire *" required></textarea>
            <div id="compteur-commentaire" style="font-size: 0.9em; color: #666; margin-top: 4px;">
                0 / 500 caractères
            </div>
            <div class="error-message" id="error-commentaire"></div>
        </div>

        <div class="form-group full-width">
            <label for="documents" class="file-upload" id="fileUploadLabel">
                Joindre des documents (max 5 fichiers)
            </label>
            <input type="file" id="documents" name="documents[]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" multiple />
            <div class="file-list" id="fileList"></div>
            <div class="error-message" id="error-documents"></div>

        </div>

        <button type="submit" class="submit-btn">Envoyer</button>
    </form>
</section>
   
<div id="toast-success" class="toast-success hidden">
    <span class="toast-icon">✅</span>
    <span class="toast-text">Votre message a bien été envoyé.</span>
    <button class="toast-close" onclick="fermerToast()">×</button>
</div>



   <?php include('chargement.php');?> 
  <?php include('flèche.php');?>
   <?php include('chat.php');?>
   <?php include('langue.php');?>
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
  

    // Validation des fichiers
    const fichiers = document.getElementById("documents").files;
    const typesAutorises = ["application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "image/jpeg", "image/png"];
    const tailleMaxTotale = 10 * 1024 * 1024; // 10 Mo

    let tailleTotale = 0;

    if (fichiers.length > 5) {
        document.getElementById("error-documents").innerText = "Vous ne pouvez pas envoyer plus de 5 fichiers.";
        valide = false;
    } else {
        for (let i = 0; i < fichiers.length; i++) {
            const fichier = fichiers[i];

            if (!typesAutorises.includes(fichier.type)) {
                document.getElementById("error-documents").innerText = "Un ou plusieurs fichiers ont un format non autorisé.";
                valide = false;
                break;
            }

            tailleTotale += fichier.size;
        }

        if (tailleTotale > tailleMaxTotale) {
            document.getElementById("error-documents").innerText = "La taille totale des fichiers ne doit pas dépasser 10 Mo.";
            valide = false;
        }
    }

     
    document.getElementById("documents").addEventListener("change", function () {
    const fileListDiv = document.getElementById("fileList");
    fileListDiv.innerHTML = "";

    const fichiers = this.files;

    if (fichiers.length > 0) {
        const ul = document.createElement("ul");
        for (let i = 0; i < fichiers.length; i++) {
            const li = document.createElement("li");
            li.textContent = fichiers[i].name;
            ul.appendChild(li);
        }
        fileListDiv.appendChild(ul);
    }
});

    return valide;
}
 



    function validerContact(event) {
    event.preventDefault(); // Empêche l'envoi classique

    let valide = true;

    // Réinitialisation des messages d'erreur
    document.querySelectorAll(".error-message").forEach(div => div.innerText = "");

    // Vérification prénom
    const prenom = document.getElementById("prenom");
    if (!prenom.value.trim()) {
        document.getElementById("error-prenom").innerText = "Veuillez entrer votre prénom.";
        valide = false;
    }

    // Vérification nom
    const nom = document.getElementById("nom");
    if (!nom.value.trim()) {
        document.getElementById("error-nom").innerText = "Veuillez entrer votre nom.";
        valide = false;
    }

    // Vérification email
    const email = document.getElementById("email");
    const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    if (!email.value.trim()) {
        document.getElementById("error-email").innerText = "Veuillez entrer votre adresse email.";
        valide = false;
    } else if (!emailRegex.test(email.value)) {
        document.getElementById("error-email").innerText = "Adresse email invalide.";
        valide = false;
    }

    // Vérification téléphone
    const tel = document.getElementById("telephone");
    const telRegex = /^\+?[0-9\s\-]{7,15}$/;
    if (!tel.value.trim()) {
        document.getElementById("error-telephone").innerText = "Veuillez entrer votre numéro de téléphone.";
        valide = false;
    } else if (!telRegex.test(tel.value)) {
        document.getElementById("error-telephone").innerText = "Numéro de téléphone invalide.";
        valide = false;
    }

    // Vérification ville
    const ville = document.getElementById("ville");
    if (!ville.value) {
        document.getElementById("error-ville").innerText = "Veuillez sélectionner une ville.";
        valide = false;
    }

    // Vérification type de demande
    const typeDemande = document.getElementById("type_demande");
    if (!typeDemande.value) {
        document.getElementById("error-type_demande").innerText = "Veuillez sélectionner un type de demande.";
        valide = false;
    }

    // Vérification commentaire
    const commentaire = document.getElementById("commentaire");
    const message = commentaire.value.trim();

    if (message.length < 10) {
        document.getElementById("error-commentaire").innerText = "Le message doit contenir au moins 10 caractères.";
        valide = false;
    } if (message.length > 500) {
        document.getElementById("error-commentaire").innerText = "Le message ne doit pas dépasser 500 caractères.";
        valide = false;
    }
    if (!valide) return false;

    // Si le formulaire est valide, on prépare les données
    const form = document.querySelector(".contact-form");
    const formData = new FormData(form);

    // Envoi AJAX
    fetch("traitement_contact.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error("Erreur lors de l'envoi.");
        return response.text(); // ou .json() selon ton back-end
    })
    .then(data => {
        // Tu peux ici vérifier `data` si ton PHP renvoie quelque chose
        form.reset(); // Réinitialise le formulaire
        document.getElementById("compteur-commentaire").textContent = "0 / 500 caractères";
        afficherToast(); // Affiche le toast de succès
    })
    .catch(error => {
        alert("Une erreur s'est produite lors de l'envoi. Veuillez réessayer.");
        console.error(error);
    });

    return false;

}

// Script séparé pour afficher le compteur de caractères en direct
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector(".contact-form");
    if (form) {
        form.addEventListener("submit", validerContact);
    }
    
    
    const textarea = document.getElementById("commentaire");
    const compteur = document.getElementById("compteur-commentaire");
    const limite = 500;

    if (textarea && compteur) {
        textarea.addEventListener("input", () => {
            const longueur = textarea.value.length;
            compteur.textContent = `${longueur} / ${limite} caractères`;
            compteur.style.color = longueur > limite ? "red" : "#666";
        });
    }
});


function afficherToast() {
    const toast = document.getElementById("toast-success");
    toast.classList.remove("hidden");

    // Disparaît automatiquement après 5 secondes
    setTimeout(() => {
        toast.classList.add("hidden");
    }, 5000);
}

function fermerToast() {
    document.getElementById("toast-success").classList.add("hidden");
}

</script>
</body>
</html>