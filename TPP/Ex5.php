<?php
/**
 * Exercice 5 : PHP-FPM
 * Objectif : Formulaire Web avec récupération des données.
 * Note : Ce fichier doit être exécuté sur un serveur Web (Apache/Nginx/PHP Server).
 */

// Variante 5 : Utilisation de $_REQUEST pour gérer GET et POST
// Initialisation des variables pour éviter les erreurs "Undefined index"
$prenom1 = isset($_REQUEST['prenom1']) ? htmlspecialchars($_REQUEST['prenom1']) : '';
$prenom2 = isset($_REQUEST['prenom2']) ? htmlspecialchars($_REQUEST['prenom2']) : '';
$message = "";

// Traitement du formulaire
if (!empty($prenom1) || !empty($prenom2)) {
    // Variante 2 & 3 : Afficher les deux ou un seul, gestion du vide
    if (!empty($prenom1) && !empty($prenom2)) {
        $message = "Bonjour $prenom1 et $prenom2 !";
    } elseif (!empty($prenom1)) {
        $message = "Bonjour $prenom1 !";
    } elseif (!empty($prenom2)) {
        $message = "Bonjour $prenom2 !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 5 : PHP-FPM</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .resultat { background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        form { background-color: #f8f9fa; padding: 20px; border-radius: 5px; border: 1px solid #ddd; }
        input { padding: 5px; margin: 5px 0; }
    </style>
</head>
<body>
    <!-- Affichage du message si existant -->
    <?php if (!empty($message)): ?>
        <div class="resultat">
            <h2><?= $message ?></h2>
        </div>
    <?php endif; ?>

    <!-- Variante 1 : Le formulaire reste affiché -->
    <form action="" method="POST"> <!-- Méthode POST par défaut, mais le code gère REQUEST -->
        <label for="p1">Votre prénom :</label><br>
        <input type="text" name="prenom1" id="p1" value="<?= $prenom1 ?>"><br>

        <!-- Variante 2 : Deuxième champ -->
        <label for="p2">Autre prénom (Milou) :</label><br>
        <input type="text" name="prenom2" id="p2" value="<?= $prenom2 ?>"><br>

        <input type="submit" value="Dire Bonjour">
    </form>
</body>