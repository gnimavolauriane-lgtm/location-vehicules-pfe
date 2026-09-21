<?php
// Assure-toi que la session est bien démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$date_reception = $_SESSION['date_reception'] ?? '';
$heure_reception = $_SESSION['heure_reception'] ?? '';
$date_restitution = $_SESSION['date_restitution'] ?? '';
$heure_restitution = $_SESSION['heure_restitution'] ?? '';
$categorie = $_SESSION['categorie'] ?? '';
?>

<div class="recap-section">
    <div id="recapitulatif" class="cadran-recap">
        <div>
            <p><strong><?= htmlspecialchars($categorie) ?></strong></p>
            <p><?= date('D d M Y', strtotime($date_reception)) ?> à <?= htmlspecialchars($heure_reception) ?> →
                <?= date('D d M Y', strtotime($date_restitution)) ?> à <?= htmlspecialchars($heure_restitution) ?></p>
        </div>

        <div class="info-retrait" style="margin-right: auto; color: #fff;">
            Vous devez récupérer la voiture à <strong><?= htmlspecialchars($heure_restitution) ?></strong>.
        </div>

        <button id="modifierBtn">Modifier</button>
    </div>

    <!-- Conteneur du formulaire masqué -->
    <div id="formulaire-container" style="display:none;">
        <div class="zone-fermeture">
            <span class="texte-fermer">Modifier la recherche</span>
            <span id="fermerFormulaire" class="croix-fermer">&times;</span>
        </div>

        <form action="resultats.php" method="get">
            <div class="champ-formulaire">
                <input type="date" name="date_reception" value="<?= htmlspecialchars($date_reception) ?>" required>
            </div>
            <div class="champ-formulaire">
                <input type="time" name="heure_reception" value="<?= htmlspecialchars($heure_reception) ?>" required>
            </div>
            <div class="champ-formulaire">
                <input type="date" name="date_restitution" value="<?= htmlspecialchars($date_restitution) ?>" required>
            </div>
            <div class="champ-formulaire">
                <input type="time" name="heure_restitution" value="<?= htmlspecialchars($heure_restitution) ?>" required>
            </div>
            <div class="champ-formulaire">
                <select name="categorie" required>
                    <option value="">Choisir une catégorie</option>
                    <option value="Citadine" <?= $categorie === 'Citadine' ? 'selected' : '' ?>>Citadine</option>
                    <option value="SUV" <?= $categorie === 'SUV' ? 'selected' : '' ?>>SUV</option>
                    <option value="Premium" <?= $categorie === 'Premium' ? 'selected' : '' ?>>Premium</option>
                    <option value="Utilitaire" <?= $categorie === 'Utilitaire' ? 'selected' : '' ?>>Utilitaire</option>
                    <option value="Minibus" <?= $categorie === 'Minibus' ? 'selected' : '' ?>>Minibus</option>
                </select>
            </div>
            <div class="champ-formulaire">
                <label><input type="checkbox" name="permis" checked> Permis valide</label>
            </div>
            <div class="champ-formulaire">
                <label><input type="checkbox" name="age_ok" checked> Âge 21+</label>
            </div>
            <button type="submit">Rechercher</button>
        </form>
    </div>
</div>
