<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Chargement</title>
  <style>
    /* Le fond de la page de chargement */
    #loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    /* Le cercle qui tourne */
    .spinner {
      border: 8px solid #f3f3f3;
      border-top: 8px solid #5A189A; /* violet personnalisé */
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 1s linear infinite;
      margin-bottom: 20px;
    }

    /* Animation de rotation */
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    
  </style>
</head>
<body>

  <!-- Page de chargement -->
  <div id="loader">
    <div class="spinner"></div>
    <div>Chargement...</div>
  </div>

  <script>
    const loader = document.getElementById("loader");
    const content = document.getElementById("content");

    // Affiche ou cache le loader selon la connexion
    function checkConnectionSpeed() {
      if (navigator.connection) {
        const connection = navigator.connection;
        if (connection.downlink < 0.5 || connection.effectiveType === 'slow-2g') {
          loader.style.display = "flex";
          content.style.display = "none";
        }
      }
    }

    // Simulation du chargement
    window.addEventListener("load", () => {
      checkConnectionSpeed();

      setTimeout(() => {
        loader.style.display = "none";
        content.style.display = "block";
      }, 2000); // à ajuster selon ton besoin
    });
  </script>


</body>
</html>
