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
        $candidats = recuperation_candidats_session($_REQUEST['id']);
        $vue = "resultats";
        break;

    case 'resultat':
        if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) {
            if (isset($_SESSION['role']) && !empty($_SESSION['role'])) {
                if ($_SESSION['role']=='candidat'){
                    $resultats_candidat = recuperation_resultat($_SESSION['mail']);
                    $profil= recuperation_profil($_SESSION['mail']);
                }
                else {
                    if (isset($_GET['mail']) || empty($_GET['mail'])) {
                        $resultats_candidat = recuperation_resultat($_GET['mail']);
                        $profil= recuperation_profil($_GET['mail']);
                    }
                }
            }
        }
        $vue = "resultat";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}
$role=$_SESSION['role'];

include('vues/header.'.$role.'.php');
include('vues/' . $vue . '.php');
include('vues/footer.php');
