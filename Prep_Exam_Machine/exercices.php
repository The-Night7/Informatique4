<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices - Email et Mot de passe</title>
    <style>
        /* Styles repris de votre fiche de révision */
        body { font-family: sans-serif; margin: 40px; }
        .msg-error { background-color: #ff4444; color: white; padding: 15px; border-radius: 5px; font-weight: bold; margin-bottom: 20px; }
        .msg-success { background-color: #2196F3; color: white; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 5px; max-width: 400px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-bottom: 15px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #333; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Vérification des données</h2>

    <?php
    // 1. On vérifie si le formulaire a été soumis
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
        
        // Récupération des données brutes
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        
        // Initialisation de la variable d'erreur (comme conseillé dans la fiche)
        $error = "";
        $nom_extrait = "";

        // --- EXERCICE 1 : EMAIL ---
        if (strpos($email, "@") === false) {
            $error .= "Erreur Email : Il manque le '@'.<br>";
        } else {
            // On extrait le nom avant le @ avec explode
            $parties = explode("@", $email);
            $nom_extrait = $parties[0];
        }

        // --- EXERCICE 2 : MOT DE PASSE ---
        // Vérification de la longueur avec strlen()
        if (strlen($mdp) <= 8) {
            $error .= "Erreur MDP : Le mot de passe doit faire plus de 8 caractères.<br>";
        }
        // Vérification de la majuscule avec une expression régulière
        if (!preg_match('/[A-Z]/', $mdp)) {
            $error .= "Erreur MDP : Le mot de passe doit contenir au moins une majuscule.<br>";
        }

        // --- AFFICHAGE DES RÉSULTATS ---
        // Si la variable $error n'est pas vide, on affiche les erreurs
        if ($error !== "") {
            echo "<div class='msg-error'>$error</div>";
        } else {
            // Sinon, tout est bon !
            echo "<div class='msg-success'>
                    <h3>Succès !</h3>
                    Identifiant extrait : <strong>$nom_extrait</strong><br>
                    Le mot de passe est valide et sécurisé.
                  </div>";
        }
    }
    ?>

    <form action="" method="POST">
        <label for="email">Entrez votre email :</label>
        <input type="text" name="email" id="email" placeholder="prenom.nom@exemple.com">

        <label for="mdp">Entrez votre mot de passe :</label>
        <input type="password" name="mdp" id="mdp" placeholder="Plus de 8 car. + Majuscule">

        <button type="submit">Vérifier les informations</button>
    </form>

</body>
</html>