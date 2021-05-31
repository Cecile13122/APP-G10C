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
      if ($_SERVER["REQUEST_METHOD"]=="POST"){
        ajout_question(test_input($_POST["theme"]),test_input($_POST["question"]),test_input($_POST["reponse"]));
      }
      break;

    case 'supprimer_question':
      echo $_GET['id'];
      $vue = "faq";
      supprimer_question($_GET['id']);
      break;

    case 'modifier_question':
      $vue = "faq";
      if ($_SERVER["REQUEST_METHOD"]=="POST"){
        modifier_question(test_input($_POST["id_faq"]),test_input($_POST["theme"]),test_input($_POST["question"]),test_input($_POST["reponse"]));
      }
      break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}


if(session_status()==1 || session_status()==0){session_start();}
if (isset($_SESSION['role']) && ($_SESSION['role']=="administrateur")){
        $role = $_SESSION['role'];
        }else {
    $role="";
}
if ($vue=="faq"){
    $vue=$vue.'.'.$role;
}

include ('vues/header.'.$_SESSION['role'].'.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
