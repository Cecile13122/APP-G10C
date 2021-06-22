<?php

/**
 * Contrôleur des sessions de test
 */

// on inclut le fichier modèle contenant les appels à la BDD
include_once('./modele/requetes.session.php');
session_start();

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = "afficher_vierge";
} else {
    $function = $_GET['fonction'];
}

switch ($function) {
  case 'afficher_resultats':
    $id_sessions = recuperer_id_sessions($_SESSION['mail']);
    $sessions = recuperer_session_recruteur($_SESSION['mail']);
    $vue="resultats";
    break;

  case 'nouveau_test':
    $vue = "resultat";
    $capteurs = array("","","","","",""); /*type des capteurs*/
    $num_capteurs = array("","","","","",""); /*numeros des capteurs*/
    $resultats = array('mail_candidat' => $_SESSION['mail'], 'id_session' => , 'date_test' => date(),'frequence_cardiaque' => "",'temperature' => "",'tonalite' => "",'frequence_cardiaque_bis' => "",'temperature_bis' => "",'stimulus_visuel' => "",'stimulus_audio' => "");

    envoi_trame(); /*envoi trame de synchro ??*/

    for ($i=3; $i++; i<$resultats.size()){
      envoi_trame("2",$capteurs[$i], $num_capteurs[$i], $val, $num_trame, $chk); /*val num tram et chk ???*/
      $resultats[$i] = recuperation_donnees();
    }
    enregistrer_resultats($resultats);
    break;

    case 'afficher_sessions':
      $sessions = recuperer_session_recruteur($_SESSION['mail']);
      $id_sessions = recuperer_id_sessions($_SESSION['mail']);
      $vue = "test";
      break;

    case 'remplir_seuils':
      $session = recuperer_session($_REQUEST['id']);
      $sessions = recuperer_session_recruteur($_SESSION['mail']);
      $id_sessions = recuperer_id_sessions($_SESSION['mail']);
      $vue="test";
      break;

    case 'configurer_session':
      $vue = "test";
      if ($_SERVER["REQUEST_METHOD"] == "POST"){
        modifier_session($_SESSION['mail'],$_POST['frequence_cardiaque_h'],$_POST['frequence_cardiaque_f'],$_POST['temperature'],$_POST['tonalite'],$_POST['dif_frequence_cardiaque'],$_POST['dif_temperature'],$_POST['stimulus_sonore'],$_POST['stimulus_visuel'],$session['session_finie']);
      }
      break;

    case 'afficher_vierge':

        $vue = "test";

        break;



    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

if (!isset($erreur)) {
    $erreur = "";
}
include("./vues/header.recruteur.php");
include("./vues/".$vue.".php");
include("./vues/footer.php");
//redirection("", $vue, $erreur);
