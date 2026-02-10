<?php
/**
 * Exercice 6 : Fichiers (Formulaire + Sauvegarde JSON + Lecture)
 * Pour respecter "1 exercice = 1 fichier", ce fichier gère à la fois
 * l'enregistrement (Partie 1) et l'affichage (Partie 2).
 */

$fichier_json = 'donnees_utilisateur.json';
$mode_affichage = false;
$donnees = [];

// --- TRAITEMENT DU FORMULAIRE (Sauvegarde) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et nettoyage
    $nouvelles_donnees = [
        'prenom' => htmlspecialchars(isset($_POST['prenom']) ? $_POST['prenom'] : ''),
        'date_naissance' => isset($_POST['date_naissance']) ? $_POST['date_naissance'] : '',
        'plat' => isset($_POST['plat']) ? $_POST['plat'] : '',
        'couleur' => isset($_POST['couleur']) ? $_POST['couleur'] : '#ffffff'
    ];

    // Sauvegarde dans le fichier JSON
    file_put_contents($fichier_json, json_encode($nouvelles_donnees, JSON_PRETTY_PRINT));

    // Redirection vers soi-même en mode affichage pour éviter la re-soumission
    header("Location: ?mode=voir");
    exit;
}

// --- MODE AFFICHAGE (Lecture) ---
if (isset($_GET['mode']) && $_GET['mode'] === 'voir') {
    if (file_exists($fichier_json)) {
        $json_content = file_get_contents($fichier_json);
        $donnees = json_decode($json_content, true);
        $mode_affichage = true;
    } else {
        echo "Aucune donnée enregistrée pour le moment.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 6 - Profil</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
            /* Variante 1 : Couleur de fond dynamique */
            background-color: <?= $mode_affichage ? $donnees['couleur'] : '#f0f0f0' ?>;
            /* Astuce pour la lisibilité si la couleur est sombre, on pourrait ajouter du contraste */
        }
        .container { background: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .plat-img { max-width: 100%; height: auto; border-radius: 4px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <?php if ($mode_affichage): ?>
        <!-- --- PAGE 2 : Affichage des données --- -->

        <h1>Profil de <?= $donnees['prenom'] ?></h1>

        <?php
        // Variante 2 & 3 : Calcul de l'âge et Anniversaire
        if (!empty($donnees['date_naissance'])) {
            $date_naissance = new DateTime($donnees['date_naissance']);
            $aujourdhui = new DateTime();
            $age = $aujourdhui->diff($date_naissance)->y;

            // Vérification anniversaire (Mois et Jour identiques)
            if ($date_naissance->format('m-d') === $aujourdhui->format('m-d')) {
                echo "<h2 style='color:red'>🎉 Joyeux Anniversaire ! 🎉</h2>";
            }

            echo "<p>Âge : <strong>$age ans</strong> (" . ($age >= 18 ? "Majeur" : "Mineur") . ")</p>";
        }
        ?>

        <p>Plat préféré : <strong><?= $donnees['plat'] ?></strong></p>

        <!-- Variante 4 : Image du plat (Simulation avec des placeholders) -->
        <?php
        // URL d'image factice basée sur le nom du plat pour la démo
        $img_url = "https://placehold.co/400x200?text=" . urlencode($donnees['plat']);
        ?>
        <img src="<?= $img_url ?>" alt="<?= $donnees['plat'] ?>" class="plat-img">

        <br><br>
        <a href="?">Modifier les informations</a>

    <?php else: ?>
        <!-- --- PAGE 1 : Formulaire --- -->

        <h1>Vos informations</h1>
        <form method="POST">
            <label>Prénom :</label><br>
            <input type="text" name="prenom" required><br><br>

            <label>Date de naissance :</label><br>
            <input type="date" name="date_naissance" required><br><br>

            <label>Plat préféré :</label><br>
            <select name="plat">
                <option value="Pizza">Pizza</option>
                <option value="Sushi">Sushi</option>
                <option value="Raclette">Raclette</option>
                <option value="Salade">Salade</option>
            </select><br><br>

            <label>Couleur préférée (pour le fond) :</label><br>
            <input type="color" name="couleur" value="#ffffff"><br><br>

            <button type="submit">Sauvegarder</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>