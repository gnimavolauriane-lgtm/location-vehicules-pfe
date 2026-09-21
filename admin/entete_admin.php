

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Location de Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');

/* Reset et font */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

/* Style de la navbar */
nav.navbar {
  background: linear-gradient(90deg, #0a3d62, #3c6382);
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 1000;
}

/* Logo / titre */
nav .navbar-brand {
  font-weight: 700;
  font-size: 1.8rem;
  color: #f9ca24;
  letter-spacing: 1.5px;
  cursor: pointer;
  transition: color 0.3s ease;
}

nav .navbar-brand:hover {
  color: #ffd32a;
}

/* Menu de navigation */
nav .navbar-nav {
  display: flex;
  gap: 2rem;
  list-style: none;
}

nav .navbar-nav li a {
  text-decoration: none;
  color: #d1d8e0;
  font-weight: 500;
  font-size: 1rem;
  padding: 0.5rem 0;
  position: relative;
  transition: color 0.3s ease;
}

/* Souligné animé au hover */
nav .navbar-nav li a::after {
  content: '';
  position: absolute;
  width: 0%;
  height: 3px;
  bottom: 0;
  left: 0;
  background-color: #f9ca24;
  transition: width 0.3s ease;
  border-radius: 2px;
}

nav .navbar-nav li a:hover::after,
nav .navbar-nav li a.active::after {
  width: 100%;
}

nav .navbar-nav li a:hover {
  color: #f9ca24;
}

/* Bouton déconnexion */
nav .navbar-nav li a.logout {
  color: #eb3b5a;
  font-weight: 600;
  padding-left: 1rem;
}

nav .navbar-nav li a.logout:hover {
  color: #fa4659;
}

/* Responsive (menu hamburger si besoin) */
@media (max-width: 768px) {
  nav {
    flex-direction: column;
    align-items: flex-start;
    padding: 1rem;
  }
  nav .navbar-nav {
    flex-direction: column;
    gap: 1rem;
    width: 100%;
  }
}

   </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php"> SGCAR Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Tableau de bord</a></li>
        <li class="nav-item"><a class="nav-link" href="voiture.php">Véhicules</a></li>
        <li class="nav-item"><a class="nav-link" href="reservations.php">Réservations</a></li>
        <li class="nav-item"><a class="nav-link" href="clients.php">Clients</a></li>
        <li class="nav-item"><a class="nav-link" href="caisse.php">Caisse</a></li>
        <li class="nav-item"><a class="nav-link" href="statistique.php">Statistique</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Déconnexion</a></li>
      </ul>
    </div>
  </div>
</nav>
