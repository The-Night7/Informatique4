<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adresse mail</title>
    <script src="exoaa.js" defer></script>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; background-color: #f4f4f4; }
        .erreur { background-color: #d9534f; color: white; padding: 10px;}

    </style>
</head>
<body>
    <div class="boite">
        <h2>Vérification d'une adresse e-mail</h2>
        <form id="formulaireEmail" action="" method="POST">
            <input type="text" id="emailInput" name="email" placeholder="Entrez une adresse e-mail">
            <br>
            <button type="submit">Vérifier l'adresse e-mail</button>
        </form>
    </div>
    <?php
    // On vérifie que le formulaire a bien été envoyé.
    if (isset($_POST['email'])) {
        // trim() enlève les espaces inutiles au début et à la fin de l'adresse.
        $email = trim($_POST['email']);
        $error = "";
        $nom = "";

        // On contrôle la présence du caractère obligatoire "@".
        if (strpos($email, "@") === false) {
            $error .= "Erreur : il manque le caractère @.";
        } else {
            // explode() coupe l'adresse en deux parties : avant et après le @.
            $var = explode("@", $email);
            $nom = $var[0];
        }

        // htmlspecialchars() évite d'afficher du HTML saisi par l'utilisateur.
        if ($error !== "") {
            echo "<div class='erreur'>" . htmlspecialchars($error) . "</div>";
        } else {
            echo "<div>Succès : " . htmlspecialchars($nom) . "</div>";
        }
    }
    ?>
</body>
</html>
