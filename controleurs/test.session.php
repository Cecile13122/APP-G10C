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
    $sessions = recuperer_session_recruteur($_SESSION['mail']);
} else {
    $function = $_GET['fonction'];
}

switch ($function) {
    case 'afficher_resultats':
        $id_sessions = recuperer_id_sessions($_SESSION['mail']);
        $sessions = recuperer_session_recruteur($_SESSION['mail']);
        $vue = "resultats";
        break;

    case 'nouveau_test':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['mail']) && isset($_POST['n_session'])) {
                $email = $_POST['mail'];
                $id_session = $_POST['n_session'];
                create_test($email, $id_session);
                $id_test=recuperation_id_test($email, $id_session);
                $trames = recuperation_trames();
                $size = count($trames);
                ajout_mesure($trames[$size - 2], $id_test);
                echo "id test : ".var_dump($trames[$size - 2]);
            }}
        $vue = "test";
        break;
/*  case 'nouveau_test':
    $vue = "resultat";
    $capteurs = array("","","","","",""); type des capteurs
    $num_capteurs = array("","","","","",""); numeros des capteurs
    $resultats = array('mail_candidat' => $_SESSION['mail'], 'id_session' => , 'date_test' => date(),'frequence_cardiaque' => "",'temperature' => "",'tonalite' => "",'frequence_cardiaque_bis' => "",'temperature_bis' => "",'stimulus_visuel' => "",'stimulus_audio' => "");

    envoi_trame(); envoi trame de synchro ??

    for ($i=3; $i++; i<$resultats.size()){
      envoi_trame("2",$capteurs[$i], $num_capteurs[$i], $val, $num_trame, $chk); val num tram et chk ???
      $resultats[$i] = recuperation_donnees();
    }
    enregistrer_resultats($resultats);
    break;
*/
    case 'afficher_sessions':
        $sessions = recuperer_session_recruteur($_SESSION['mail']);
        $id_sessions = recuperer_id_sessions($_SESSION['mail']);
        $vue = "test";
        break;

    case 'remplir_seuils':
        $session = recuperer_session($_REQUEST['id']);
        $sessions = recuperer_session_recruteur($_SESSION['mail']);
        $id_sessions = recuperer_id_sessions($_SESSION['mail']);
        $vue = "test";
        break;

    case 'configurer_session':
        $vue = "test";
        $sessions = recuperer_session_recruteur($_SESSION['mail']);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['valider'])) {
                $session = recuperer_session($_POST['n_session']);
                modifier_session($_SESSION['mail'], $_POST['frequence_cardiaque_h'], $_POST['frequence_cardiaque_f'], $_POST['temperature'], $_POST['tonalite'], $_POST['dif_frequence_cardiaque'], $_POST['dif_temperature'], $_POST['stimulus_sonore'], $_POST['stimulus_visuel'], $_POST['n_session'], $session['session_finie']);
            }
            if (isset($_POST['cloturer'])) {
                cloturer_session($_POST['n_session']);
            }
        }
        break;

    case 'afficher_vierge':

        $vue = "test";

        break;

    case 'nouvelle_session':

        $vue="test";

            generer_session($_SESSION['mail']);

        $sessions = recuperer_session_recruteur($_SESSION['mail']);
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
include("./vues/" . $vue . ".php");
include("./vues/footer.php");
//redirection("", $vue, $erreur);
