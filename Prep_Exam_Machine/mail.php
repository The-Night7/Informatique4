<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Exercice E-MAIL</title>
        <style>
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
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $error = "";
            $nom_extrait = "";

            if (strpos($email, needle: "@") === false) {
                $error .= "Erreur Email : Il manque le '@'.<br>";
            } else {
                $parties = explode("@", $email);
                $nom_extrait = $parties[0];
            }

            if ($error !== "") {
                echo "<div class='msg-error'>$error</div>";
            } else {
                echo "<div class='msg-success'>
                        <h3>Succès !</h3>
                        Identifiant extrait : <strong>$nom_extrait</strong>
                    </div>";
            }
        }
        ?>

        <form action="" method="POST">
            <label for="email">Entrez votre email :</label>
            <input type="text" name="email" id="email" placeholder="prenom.nom@exemple.com">
            <button type="submit">Vérifier les informations</button>
        </form>
    </body>
</html>