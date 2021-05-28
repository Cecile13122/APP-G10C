<?php

/**
 * Contrôleur de la foire aux questions
 */

// on inclut le fichier modèle contenant les appels à la BDD
include_once('./modele/requetes.faq.php');

// si la fonction n'est pas définie, on choisit d'afficher la faq
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "afficher_faq";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'afficher_faq':
        $vue = "faq";
        break;

    case 'ajout_question':
      $vue = "faq";
      break;


    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}
if(!session_start()){session_start();}
include ('vues/header.'.$_SESSION['role'].'.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
