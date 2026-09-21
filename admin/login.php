<?php
session_start();
include('../configuration.php');

$username = '';
$error = '';

// 🔁 Si une erreur est stockée dans la session après une redirection
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // On l'efface après affichage
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT id, password_hash FROM administrateur WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: dashboard.php');
            exit();
        } else {
            $_SESSION['login_error'] = "Identifiants incorrects.";
        }
    } else {
        $_SESSION['login_error'] = "Veuillez remplir tous les champs.";
    }

    // 🔁 Redirection pour éviter que l'erreur reste après refresh
    header('Location: login.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion Admin - Location de Voitures</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet" />
    <!-- Particles.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

    <style>
        
        body {
            
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* envoie le fond derrière le contenu */
            background: linear-gradient(135deg, #0a3d62, #3c6382); /* optionnel si tu veux un dégradé sous les particules */
        }

        .login-container {
            background: rgba(255,255,255,0.1);
            padding: 2.5rem 3rem;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.5);
            width: 350px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 1.5rem;
            font-weight: 700;
            font-size: 2rem;
            color: #f9ca24;
            letter-spacing: 1.2px;
        }
        .login-container form input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 2rem;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
        }
        .login-container form input[type="submit"] {
            background: #f9ca24;
            color: #1e293b;
            font-weight: 700;
            cursor: pointer;
            width: 50%;
            margin-top:10px;
            margin-left:20px;
            transition: background 0.3s ease;
            border: none;
        }
        .login-container form input[type="submit"]:hover {
            background: #ffd32a;
        }
        .error-message {
            background: #ff4d4f;
            padding: 10px 15px;
            border-radius: 8px;
            width: 100%;
            margin-bottom: 1rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
  
<div id="particles-js"></div>

<div class="login-container">
    <h2>Connexion Admin</h2>

     <?php if (!empty($error)) : ?>
      <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    

    <form method="POST" action="login.php" autocomplete="off" novalidate>
        <input type="text" name="username" placeholder="Nom d'utilisateur"autocomplete="off" required />
        <input type="password" name="password" placeholder="Mot de passe" autocomplete="new-password"required />
        <input type="submit" value="Se connecter" />
    </form>
</div>
<script>
particlesJS('particles-js',
{
  "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
</script>

</body>
</html>
