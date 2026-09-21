<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="PPage.css">
</head>
<body>
<footer class="footer">
    <div class="footer-entete">
        <!-- Section Recevez nos offres spéciales -->
        <div class="offre-spéciale">
            <h3 data-i18n="footer.subscribe.title"><i class="fas fa-envelope"></i> Recevez nos offres spéciales</h3> <!-- Icône à côté du texte -->
            <form action="/subscribe" method="POST" class="form">
                <input type="email" placeholder="Votre email" required data-i18n="[placeholder]footer.subscribe.placeholder">
                <button type="submit" data-i18n="footer.subscribe.button">S'INSCRIRE</button>
            </form>
        </div>

        <!-- Section Réseaux sociaux -->
        <div class="sociale-section">
            <h3 data-i18n="footer.social.title"><i class="fas fa-share-alt"></i> Suivez-nous sur les réseaux sociaux</h3> <!-- Icône à côté du texte -->
            <div class="sociale-icone">
                <a href="https://facebook.com/SGCAR" target="_blank" ><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://linkedin.com/SGCAR" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://instagram.com/company/SGCAR" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://youtube.com/company/SGCAR" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-contenu">
    <!-- Colonne 1 - À propos et informations -->
    <div class="footer-section">
        <h3 data-i18n="footer.about.title">À propos de SG CAR</h3>
        <ul>
            <li><a href="/about"data-i18n="footer.about.link1">À propos de nous</a></li>
            <li><a href="/contact"data-i18n="footer.about.link2">Contactez-nous</a></li>
            <li><a href="/faq" data-i18n="footer.about.link3">FAQ</a></li>
        </ul>
    </div>

    <!-- Colonne 2 - Liens utiles -->
    <div class="footer-section">
        <h3 data-i18n="footer.links.title">Liens utiles</h3>
        <ul>
            <li><a href="/privacy-policy"data-i18n="footer.links.link1">Politique de confidentialité</a></li>
            <li><a href="/terms" data-i18n="footer.links.link2">Conditions d’utilisation</a></li>
            <li><a href="/cookie-policy"data-i18n="footer.links.link3">Politique des cookies</a></li>
            <li><a href="/sitemap" data-i18n="footer.links.link4">Plan du site</a></li>
        </ul>
    </div>

    <!-- Colonne 3 - Destinations populaires -->
    <div class="footer-section">
        <h3 data-i18n="footer.destinations.title">Destinations populaires</h3>
        <ul>
            <li><a href="/destinations/cascades d'Ouzoud" data-i18n="footer.destinations.link1">Cascade d'Ouzoud</a></li>
            <li><a href="/destinations/Ain Asserdoun" data-i18n="footer.destinations.link2">Ain Asserdoun</a></li>
            <li><a href="/destinations/medina" data-i18n="footer.destinations.link2">Medina de Béni Mellal</a></li>
            <li><a href="/destinations/jadin" data-i18n="footer.destinations.link3">Jardin de la Ville de Béni Mellal</a></li>
            <li><a href="/destinations/vallée" data-i18n="footer.destinations.link4">Vallée des Roses</a></li>
        </ul>
    </div>

    <!-- Colonne 4 - Nouveaux services -->
    <div class="footer-section">
        <h3 data-i18n="footer.services.title">Nouveaux services</h3>
        <ul>
            <li><a href="/services/programme de fidélité" data-i18n="footer.services.link1">Programmes de Fidélité</a></li>
            <li><a href="/services/bons plans" data-i18n="footer.services.link2">Nos Bons Plans</a></li>
            <li><a href="/services/voitures" data-i18n="footer.services.link3">Nos Voitures de Locations</a></li>
        </ul>
    </div>
</div>
   

<div class="payement-section">
    <h3 data-i18n="footer.payment.title">Moyens de paiement acceptés et 100% sécurisés</h3>
    <div class="payement-images">
        <img src="image/moyen de payement 1.png" alt="Moyen de payement 1" class="payement-image">
        <img src="image/moyen de payement 2.jpeg" alt="Moyen de paiement 2" class="payement-image">
        <img src="image/moyen de payement 3.jpeg" alt="Moyen de paiement 3" class="payement-image">
        <img src="image/moyen de payement 4.png" alt="Moyen de paiement 4" class="payement-image">
        <img src="image/moyen de payement 5.png" alt="Moyen de paiement 5" class="payement-image">
        <img src="image/moyen de payement 6.png" alt="Moyen de paiement 6" class="payement-image">
        <img src="image/moyen de payement 7.png" alt="Moyen de paiement 7" class="payement-image">
    </div>
</div>

    <div class="footer-slogan">
        <p data-i18n="footer.slogan">Avec SG CAR, Réservez et Profitez de votre véhicule sans aucune inquiétude ! </p>
    </div>
</footer>

    <p class="pied" data-i18n="footer.copyright">&copy; 2025 SG Car | Tous droits réservés</p>




<script src="https://kit.fontawesome.com/8a1e76e869.js" crossorigin="anonymous">
</script>
</body>
</html>