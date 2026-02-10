<?php
/**
 * Exercice 4 : La fonction accorder (Variante 4 - Complète)
 * Objectif : Gérer le singulier/pluriel et l'affichage.
 */

/**
 * Fonction accorder
 * @param int|float $nombre La valeur numérique
 * @param string $singulier Le mot au singulier
 * @param string $pluriel Le mot au pluriel
 * @param bool $afficherNombre (Optionnel) Faut-il afficher le nombre devant ? (Défaut: true)
 * @return string La chaîne formatée
 */
function accorder($nombre, $singulier, $pluriel, $afficherNombre = true) {
    // Variante 3 : Prise en compte des valeurs négatives via abs()
    // En français, le pluriel commence à partir de 2 (ou -2) inclus.
    // 0, 1, -1, 1.5 sont au singulier.
    $valeur_absolue = abs($nombre);

    if ($valeur_absolue >= 2) {
        $mot = $pluriel;
    } else {
        $mot = $singulier;
    }

    // Variante 1 & 2 : Gestion de l'affichage du nombre
    if ($afficherNombre) {
        return "$nombre $mot";
    } else {
        return $mot;
    }
}

// --- Tests de la fonction (Exemples du PDF) ---
echo "--- Tests de la fonction accorder ---\n";

echo accorder(3, "cheval", "chevaux") . "\n";          // Affiche : 3 chevaux
echo accorder(1, "voiture", "voitures") . "\n";        // Affiche : 1 voiture
echo accorder(4, "hibou", "hiboux", false) . "\n";     // Affiche : hiboux
echo accorder(-37, "degré", "degrés", true) . "\n";    // Affiche : -37 degrés
echo accorder(0, "faute", "fautes") . "\n";            // Affiche : 0 faute (Singulier en FR)

?>