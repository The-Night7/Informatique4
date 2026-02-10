<?php
/**
 * Exercice 1 : Bonjour (Variante 3 incluse)
 * Objectif : Demander le prénom et afficher bonjour.
 * Utilisation : Exécuter dans un terminal (php exercice_1.php)
 */

echo "--- Exercice 1 : Bonjour ---\n";
$prenom = "";

// Variante 3 : Boucle do-while pour forcer la saisie
do {
    // Demande à l'utilisateur de saisir son prénom
    // Note : readline fonctionne en ligne de commande (CLI)
    $saisie = readline("Saisissez votre prénom : ");

    // Nettoyage de la saisie (suppression des espaces vides avant/après)
    $prenom = trim($saisie);

    if (empty($prenom)) {
        echo "Erreur : La saisie ne peut pas être vide. Veuillez recommencer.\n";
    }

} while (empty($prenom));

// Si on voulait gérer la Variante 1 (Anonyme), on retirerait la boucle et on ferait :
// if (empty($prenom)) { $prenom = "Anonyme"; }

echo "Bonjour " . $prenom . "\n";
?>