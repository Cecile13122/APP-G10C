<?php

// on inclut le fichier modèle contenant les appels à la BDD
//include_once('../modele/requetes.contact.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = 'contact';
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'contact':
        $vue = "contact";
        break;

    case 'message':
    $vue="contact";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = test_input($_POST['email']);
    $sujet = test_input($_POST['sujet']);
    $message = test_input($_POST['message']);
    $nom = test_input($_POST['nom']);

    $destinataire = 'appg10c@gmail.com';
    $headers = 'From: ' . $mail . "\r\n" .
        'Reply-To: ' . $mail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $err = '';

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $err = "Le mail n'est pas valide";
    }

    if (empty($err)) {
        if (mail($destinataire, $sujet, $message."\r\n".$nom, $headers)) {
            echo 'Mail envoyé';
        } else {
            echo 'il y a encore du boulot';
        }
    }

}
    break;
    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}
if(session_status()==1 || session_status()==0){session_start();}
if (isset($_SESSION['role'])){
    $role = $_SESSION['role'];
}else {
    $role="";
}

include ('vues/header.'.$role.'.php');
include ('vues/' . $vue . '.php');
include ('vues/footer.php');
