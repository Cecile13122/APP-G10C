<?php

// include_once('requestsCandidat.php');
include_once('../Model/requestsConnexion.php');
require_once('fonction.php');


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
            $role = verification_role($userinfo['mail']);
            $_SESSION['role'] = $role;
            if ($role == 'administrateur') {
                header("Location: ..\Administrateur\pageAdministrateur.html");
                exit;
            } else {
                header("Location: ../View/resultat.php");
                exit;
            }
        } else {
            header('Location: ../View/connexion.php?err=1');
            exit;

        }
    } else {
        header('Location: ../View/connexion.php?err=1');
        exit;


    }


}
