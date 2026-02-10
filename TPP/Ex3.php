<?php
/**
 * Exercice 3 : Légumes (Toutes variantes combinées)
 * Objectif : Manipuler un tableau de légumes.
 */

$legumes = ["Carotte", "Poireau", "Pomme de terre", "Chou", "Navet", "Radis"];

echo "--- Partie 1 : Hasard ---\n";
// Tirage au sort d'une clé aléatoire
$index_aleatoire = array_rand($legumes);
echo "Légume au hasard : " . $legumes[$index_aleatoire] . "\n\n";


echo "--- Partie 2 (Variante 1) : Choix par index ---\n";
echo "Liste disponible : De 0 à " . (count($legumes) - 1) . "\n";
$index_saisi = (int)readline("Saisissez un index : ");

if (isset($legumes[$index_saisi])) {
    echo "Le légume à l'index $index_saisi est : " . $legumes[$index_saisi] . "\n";
} else {
    echo "Erreur : Index invalide.\n";
}
echo "\n";


echo "--- Partie 3 (Variante 2 & 3) : Recherche par nom ---\n";
$recherche = readline("Quel légume cherchez-vous ? : ");
$trouve = false;

// Utilisation d'une boucle foreach (Variante 2)
// Pour la variante 3 (for), on ferait : for($i=0; $i<count($legumes); $i++) ...
foreach ($legumes as $position => $nom_legume) {
    // Comparaison insensible à la casse
    if (strcasecmp($nom_legume, trim($recherche)) == 0) {
        echo "Trouvé ! '$nom_legume' est à la position $position.\n";
        $trouve = true;
        break; // On arrête dès qu'on a trouvé
    }
}

if (!$trouve) {
    echo "Légume non trouvé.\n";
}
?>