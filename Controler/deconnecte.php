<?php
include("Model/requestsConnexion.php");

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

    case 'mentionsLegales':
      // Mentions legales
      $vue = "mentionsLegales";
      break;

    case 'planDuSite':
      // Plan du site
      $vue = "planDuSite";
      break;

    case 'connexion':
      // code...
      $vue="connexion";
      break;

   default:
       // si aucune fonction ne correspond au paramètre function passé en GET
       $vue = "erreur404";
       $title = "error404";
       $message = "Erreur 404 : la page recherchée n'existe pas.";
}
if ($vue == "connexion"){
  include ('Vues/connexion.html');
}
else{
  include ('Vues/headerDeconnecte.php');
  include ('Vues/' . $vue . '.php');
  include ('Vues/footer.php');
}
