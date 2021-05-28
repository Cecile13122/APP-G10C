<?php

/**
 * Contrôleur des utilisateurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
include_once('./modele/requetes.test.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "afficher_resultats";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'afficher_resultats':

        $vue = "resultats.".$role;

        break;



    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.'.$_SESSION['role'].'.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
