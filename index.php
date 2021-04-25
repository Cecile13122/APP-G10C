<?php

include_once('requestsCandidat.php');
include_once('requestsConnexion.php');


function test_input($donnee)
{
    $donnee = trim($donnee);
    $donnee = stripslashes($donnee);
    $donnee = htmlspecialchars($donnee);
    return $donnee;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = test_input($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];

    $userinfo = connexion_personne($mail);

    if ($userinfo != null) {
        $is_mdp_correct = password_verify($mot_de_passe, $userinfo['mdp']);
        if ($is_mdp_correct) {

            session_start();
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['nom'] = $userinfo['nom'];
            header("Location: pageTypeConnecte.php");
            exit;
        } else {
            echo "mot de passe incorrect";

        }
    } else {
        echo "identifiant incorrect";


    }


}
