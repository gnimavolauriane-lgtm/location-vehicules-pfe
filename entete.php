

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entete</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Big+Shoulders+Stencil:opsz,wght@10..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/8a1e76e869.js" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <!-- TEST ENTETE 2025 -->
    <div class="entete-logo">
        <a href="#"><h1 class="logo">SG CAR</h1></a>
    </div>
    <!-- menu amburger -->
    <div class="menu-amburger" id="menu-toggle">
        <i class="fa-solid fa-bars"></i>
    </div>
    <nav class="entete-lien">
    <ul class="lien">
        <li><a href="accueil.php" data-i18n="header.menu.home">ACCUEIL</a></li>
        <li><a href="Nos véhicules.php" data-i18n="header.menu.vehicles">NOS VEHICULES</a></li>
        <li><a href="Nos partenaires.php" data-i18n="header.menu.booking" data-i18n-default="NOS PARTENAIRES"></a></li>
        <li><a href="blog1.php" data-i18n="header.menu.blog">BLOG</a></li>
        <li><a href="plan.php" data-i18n="header.menu.deals">BONs PLANs</a></li>
        <li><a href="contact.php" data-i18n="header.menu.contact">CONTACTEZ-NOUS!</a></li>
    </ul>
    </nav>
    <div class="entete-icone">
     <a href="#" class="icone" id="icone1"><i class="fa-solid fa-location-dot"></i>
     <div class="cadran">
        <p data-i18n="header.info.location">Nous sommes situés au centre ville de Béni Mellal à l'adreese : <span>84 Av Hassan II , 1° ét. Beni Mellal </span></p>
     </div>
    </a>

     <a href="#" class="icone" id="icone2"><i class="fa-solid fa-phone"></i>
     <div class="cadran">
        <p data-i18n="header.info.hours">Notre service est joignable uniquement du lundi au samedi, de 9h à 18h.</p>
     </div>
    </a>
     <a href="connexion.php" class="icone" id="icone3"><i class="fa-solid fa-circle-user"></i>
    </a>
  </div>
  
  </header>  




  <script>
  document.getElementById("menu-toggle").addEventListener("click", function() {
    const lien = document.querySelector(".entete-lien");
    const hamburger = document.querySelector(".menu-amburger");
    lien.classList.toggle("active");
    hamburger.classList.toggle("active");
  });
</script>


</body>
</html>