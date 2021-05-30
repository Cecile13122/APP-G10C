<?php

/**
 * Contrôleur des utilisateurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
include_once('./modele/requetes.test.php');
session_start();

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = 'resultat';
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'recuperation_candidats':
        $candidats=recuperation_candidats_session($_REQUEST['id']);
        $vue = "resultats";
        break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('vues/header.'.$_SESSION['role'].'.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
