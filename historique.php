<?php 
require_once 'configuration.php';
session_start();

$email = $_SESSION['client']['email'] ?? '';

if (!$email) {
    die("Utilisateur non connecté");
}

// Paramètres pour la pagination
$limit = 10; // résultats par page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Filtre de recherche
$search = trim($_GET['search'] ?? '');

// Récupérer les données utilisateur
$stmtUser = $pdo->prepare("SELECT * FROM caisse WHERE email = :email LIMIT 1");
$stmtUser->execute(['email' => $email]);
$userData = $stmtUser->fetch(PDO::FETCH_ASSOC);

// Compter le total des réservations filtrées pour pagination
$sqlCount = "SELECT COUNT(*) FROM caisse WHERE email = :email";
$params = ['email' => $email];

if ($search !== '') {
    $sqlCount .= " AND vehicule_nom LIKE :search";
    $params['search'] = "%$search%";
}

$stmtCount = $pdo->prepare($sqlCount);
$stmtCount->execute($params);
$totalReservations = $stmtCount->fetchColumn();

$totalPages = ceil($totalReservations / $limit);

// Récupérer les réservations filtrées et paginées
$sql = "SELECT * FROM caisse WHERE email = :email";
if ($search !== '') {
    $sql .= " AND vehicule_nom LIKE :search";
}
$sql .= " ORDER BY date_reception DESC LIMIT :limit OFFSET :offset";

$stmtReservations = $pdo->prepare($sql);
$stmtReservations->bindValue(':email', $email, PDO::PARAM_STR);
if ($search !== '') {
    $stmtReservations->bindValue(':search', "%$search%", PDO::PARAM_STR);
}
$stmtReservations->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmtReservations->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmtReservations->execute();

$reservations = $stmtReservations->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mon Historique - SG Car</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .page-header {
            background: linear-gradient(135deg, #1E88E5 0%, #43a047 100%);
            color: white;
            text-align: center;
            padding: 50px 20px 40px;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 8px 30px rgba(30, 136, 229, 0.5);
            position: relative;
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-header h1 {
            font-size: 3rem;
            margin: 0;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-shadow: 0 3px 6px rgba(0,0,0,0.3);
        }

        .page-header p {
            margin-top: 10px;
            font-size: 1.25rem;
            font-weight: 300;
            opacity: 0.85;
        }

        .page-header::after {
            content: "";
            width: 120px;
            height: 6px;
            background: #fff;
            border-radius: 3px;
            display: block;
            margin: 20px auto 0;
            box-shadow: 0 0 12px #fff;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        /* Profil */
        .profile h2 {
            margin-top: 0;
            color: #1E88E5;
            border-bottom: 2px solid #43a047;
            padding-bottom: 6px;
            margin-bottom: 20px;
        }

        .profile p {
            font-size: 1.1rem;
            margin: 6px 0;
        }

        /* Recherche */
        .search-form {
            margin-bottom: 25px;
            display: flex;
            gap: 10px;
            max-width: 400px;
        }

        .search-form input[type="text"] {
            flex-grow: 1;
            padding: 10px 15px;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .search-form input[type="text"]:focus {
            border-color: #1E88E5;
            outline: none;
        }

        .search-form button {
            padding: 10px 20px;
            border: none;
            background-color: #1E88E5;
            color: white;
            font-weight: 600;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #1565c0;
        }

        /* Tableau Réservations */
        .reservations h2 {
            color: #1E88E5;
            border-bottom: 2px solid #43a047;
            padding-bottom: 6px;
            margin-bottom: 20px;
        }

        .reservations {
            overflow-x: auto;
        }

        .reservations table {
            width: 100%;
            min-width: 900px;
            border-collapse: separate;
            border-spacing: 0 12px;
            font-size: 16px;
        }

        .reservations thead th {
            background: #1E88E5;
            color: white;
            padding: 15px 20px;
            text-align: left;
            border-radius: 10px 10px 0 0;
            user-select: none;
        }

        .reservations tbody tr {
            background: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: background-color 0.3s ease;
        }

        .reservations tbody tr:hover {
            background: #e3f2fd;
        }

        .reservations tbody td {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        /* Liens facture */
        .reservations a {
            font-weight: 600;
            color: #1E88E5;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .reservations a:hover {
            text-decoration: underline;
            color: #1565c0;
        }

        /* Badges statut */
        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            color: white;
            font-weight: 600;
            font-size: 0.9em;
            display: inline-block;
            min-width: 80px;
            text-align: center;
            user-select: none;
        }

        .badge-passee {
            background-color: #e53935; /* rouge */
        }

        .badge-en-cours {
            background-color: #fb8c00; /* orange */
        }

        .badge-a-venir {
            background-color: #43a047; /* vert */
        }

        /* Pagination */
        nav.pagination {
            margin-top: 30px;
            text-align: center;
            font-size: 1.1rem;
            user-select: none;
        }

        nav.pagination a, nav.pagination strong {
            display: inline-block;
            margin: 0 8px;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            color: #1E88E5;
            font-weight: 600;
            transition: background-color 0.3s ease;
            min-width: 36px;
        }

        nav.pagination strong {
            background-color: #1E88E5;
            color: white;
            cursor: default;
        }

        nav.pagination a:hover {
            background-color: #1565c0;
            color: white;
        }

        /* Déconnexion */
       .logout {
        text-align: right;
        margin-top: 40px;
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }

    .logout a {
        padding: 12px 24px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1rem;
        user-select: none;
        transition: background 0.3s ease;
        color: #fff;
        display: inline-block;
    }

    /* Bouton nouvelle page vert */
    .btn-newpage {
        background-color: #43a047;
    }

    .btn-newpage:hover {
        background-color: #2e7d32;
    }

    /* Bouton déconnexion rouge */
    .btn-logout {
        background-color: #e74c3c;
    }

    .btn-logout:hover {
        background-color: #c0392b;
    }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            .page-header p {
                font-size: 1rem;
            }
            .search-form {
                max-width: 100%;
                flex-direction: column;
                gap: 12px;
            }
            .search-form input[type="text"], .search-form button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="page-header">
        <h1>Mon Historique de Réservations</h1>
        <p>Consultez vos réservations passées, en cours et à venir</p>
    </header>

    <div class="container">
        <!-- Informations personnelles -->
        <section class="profile">
            <h2>Mes Informations</h2>
            <p><strong>Nom :</strong> <?= htmlspecialchars($userData['nom'] ?? '') ?> <?= htmlspecialchars($userData['prenom'] ?? '') ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($userData['email'] ?? '') ?></p>
            <p><strong>Adresse :</strong> <?= htmlspecialchars($userData['adresse'] ?? '') ?></p>
            <p><strong>Téléphone :</strong> <?= htmlspecialchars($userData['telephone'] ?? '') ?></p>
        </section>

        <!-- Réservations -->
        <section class="reservations">
            <h2>Mes Réservations</h2>
              
            <form method="get" class="search-form" role="search" aria-label="Recherche réservations">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Rechercher par véhicule..." 
                    value="<?= htmlspecialchars($search) ?>" 
                    aria-label="Recherche par véhicule"
                />
                <button type="submit" aria-label="Lancer la recherche">Rechercher</button>
            </form>

            

            <?php if (count($reservations) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Véhicule</th>
                        <th>Date de réception</th>
                        <th>Date de restitution</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Facture</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $res): ?>
                         
                        <?php
                        $dateReception = date_create($res['date_reception']);
                        $dateRestitution = date_create($res['date_restitution']);
                        $dateToday = new DateTime();

                        // Calcul statut
                        if ($dateToday > $dateRestitution) {
                            $statusText = 'Passée';
                            $statusClass = 'badge-passee';
                        } elseif ($dateToday >= $dateReception && $dateToday <= $dateRestitution) {
                            $statusText = 'En cours';
                            $statusClass = 'badge-en-cours';
                        } else {
                            $statusText = 'À venir';
                            $statusClass = 'badge-a-venir';
                        }
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($res['vehicule_nom']) ?></td>
                            <td><?= $dateReception->format('d/m/Y') ?></td>
                            <td><?= $dateRestitution->format('d/m/Y') ?></td>
                            <td><?= number_format((float)$res['montant'], 2, ',', ' ') ?> MAD</td>
                            <td><span class="badge <?= $statusClass ?>"><?= $statusText ?></span></td>
                            <td>
                           <?php if (!empty($res['transaction_id'])): ?>
    <a href="facture.php?transaction_id=<?= urlencode($res['transaction_id']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Voir la facture de la réservation #<?= htmlspecialchars($res['transaction_id']) ?>">Voir facture</a>
<?php else: ?>
    N/A
<?php endif; ?>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
            <nav class="pagination" aria-label="Pagination des réservations">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>" aria-label="Page précédente">&laquo; Précédent</a>
                <?php endif; ?>

                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <?php if ($p == $page): ?>
                        <strong aria-current="page"><?= $p ?></strong>
                    <?php else: ?>
                        <a href="?page=<?= $p ?>&search=<?= urlencode($search) ?>"><?= $p ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>" aria-label="Page suivante">Suivant &raquo;</a>
                <?php endif; ?>
            </nav>
            <?php endif; ?>

            <?php else: ?>
                <p>Aucune réservation trouvée.</p>
            <?php endif; ?>
        </section>

        <div class="logout">
            <a href="Nos véhicules.php" class="btn-newpage" aria-label="Aller à la nouvelle page">Nouvelle page</a>
            <a href="deconnexion.php" class="btn-logout" aria-label="Se déconnecter">Déconnexion</a>
        </div>

    </div>

    <?php include('chargement.php');?> 
</body>
</html>
