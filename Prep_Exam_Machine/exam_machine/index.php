<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's check this password !!</title>
    <style>
        .yessir {background-color: green;}
        .nosir {background-color: red;}
    </style>
</head>
<body>
    <!-- <h2>C'est parti pour vérifier si ce MOT DE PASSE est sécurisé !!!! </h2> -->
     <h2>Let's di this !!</h2>
    <?php 
        // d'abord on vérifie si on a reçu des datas !!
        if (isset($_REQUEST['mdp'])) { // c'est sensé récupérer le mdp envoyé par le form
            // ensuite on vérifie les règles !! (en plus je vais les écrire en anglaiiiiiiiis !!!)
            $mdp = $_REQUEST['mdp'];
            $error = "";
            // règle 1 ! la taille compte ! sous 8 c'est "too short...", entra 8 et 11 c'est "good enough... still, memory issues much ?" au dessus de 12 c'est "now we are talking !!"
            if (strlen($mdp) <= 8) {
                $error .= "<li><ul><div nosir>Too Shoooort~~</div></ul></li>";
            } else if (strlen($mdp) >= 8 && strlen($mdp) <= 11) {
                $error .= "<li><ul><div yessir>Good enough... still, memory issues much ?</div></ul></li>";
            } else if (strlen($mdp) >= 12) {
                $error .= "<li><ul><div yessir>now we are talking !!</div></ul></li>";
            } else {
                $error .= '';
            }
            // règle 2 ! une minuscule et une majuscule minimum ! on discrimine pas !
            if (!preg_match('/[a-z]/', $mdp) || !preg_match('/[A-Z]/', $mdp)) {
                $error .= "<li><ul><div nosir>Forgooot the min or the Forgooot the min or the maaaaaaj~~</div></ul></li>";
            } else {
                $error .= "<li><ul><div yessir>Purrfect~~</div></ul></li>";
            }
            // règle 3 ! un chiffre minimum !!
            if (!preg_match('/[0-9]/', $mdp)) {
                $error .= "<li><ul><div nosir>The numbeeeeeeeer</div></ul></li>";
            } else {
                $error .= "<li><ul><div yessir>Nice</div></ul></li>";
            }
            // règle 4 ! un caractère qui est rien du reste en plus dans le doute
            if (!preg_match('/[A-Z]/', $mdp) && !preg_match('/[a-z]/', $mdp) && !preg_match('/[0-9]/', $mdp)) {
                $error .= "<li><ul><div nosir>Et mon caractère spécial ?</div></ul></li>";
            } else {
                $error .= "<li><ul><div yessir>Good here !</div></ul></li>";
            }
        }
        if ($error !== '') {
            echo $error;
        }
    ?>  
    <form method='POST'>
        <label for="mdp">Please, put in the challenger:</label>
        <input type="text" name="mdp">
        <button type="submit">It is time for the d-d-d-d-d wait... wrong letter... Click to verify</button>
    </form>
</body>
</html>