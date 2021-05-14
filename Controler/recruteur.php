<?php
include("Model/requestsRecruteur.php");
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
   $function = "accueil";
} else {
   $function = $_GET['fonction'];
}

switch ($function) {
   case 'accueil':
       //Accueil
       $vue = "accueil";
       break;

   case 'cgu':
   // Conditions générales d'utilisation
       $vue = "cgu";
       break;

   case 'contact':
   // Contact
    $vue = "contact";
    break;

    case 'faq':
    // Foire aux questions
      $vue = "faq";
      break;

    case 'mentionsLegales':
      // Mentions legales
      $vue = "mentionsLegales";
      break;

    case 'planDuSite':
      // Plan du site
      $vue = "planDuSite";
      break;
      
    case 'test':
      // code...
      $vue = "test";
      break;

    case 'resultats':
      // Resultats des tests du candidat
      $vue = "resultats";
      break;

   default:
       // si aucune fonction ne correspond au paramètre function passé en GET
       $vue = "erreur404";
       $title = "error404";
       $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('Vues/headerRecruteur.php');
include ('Vues/' . $vue . '.php');
include ('Vues/footer.php');
