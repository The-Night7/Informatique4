<?php
/**
 * Exercice 2 : Français et Allemand (Variante 6 - Combinaison complète)
 * Objectif : Vérifier les langues parlées dans un pays.
 */

// Variante 4 : Tableau des pays (Configuration des langues parlées)
$pays_langues = [
    'France'    => ['français'],
    'Allemagne' => ['allemand'],
    'Belgique'  => ['français', 'allemand'], // On parle les deux
    'Suisse'    => ['français', 'allemand'], // On parle les deux
    'Espagne'   => [],
    'Italie'    => [],
    'Autriche'  => ['allemand']
];

echo "--- Exercice 2 : Vérification des langues ---\n";

// Demande de saisie
$saisie = readline("Saisissez le nom d'un pays d'Europe : ");

// Variante 3 : Gestion de la casse (tout en minuscule puis première lettre en majuscule)
// Ex: "france" devient "France", "ALLEMAGNE" devient "Allemagne"
$pays_normalise = ucfirst(strtolower(trim($saisie)));

// Vérification si le pays existe dans notre "base de données"
if (array_key_exists($pays_normalise, $pays_langues)) {

    $langues = $pays_langues[$pays_normalise];
    $parle_francais = in_array('français', $langues);
    $parle_allemand = in_array('allemand', $langues);

    // Variante 2 & 5 : Switch ou logique conditionnelle pour afficher le bon message
    echo "Dans le pays '$pays_normalise' : "; // Variante 1 : Rappel du nom

    if ($parle_francais && $parle_allemand) {
        echo "On parle français et allemand.\n";
    } elseif ($parle_francais) {
        echo "On parle français.\n";
    } elseif ($parle_allemand) {
        echo "On parle allemand.\n";
    } else {
        echo "On ne parle ni français, ni allemand (selon mes données).\n";
    }

} else {
    echo "Désolé, je ne connais pas le pays '$pays_normalise' ou il n'est pas dans ma liste.\n";
}
?>