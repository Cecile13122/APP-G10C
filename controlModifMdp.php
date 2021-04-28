<?php
require_once("requestsConnexion.php");
require_once("fonction.php");
session_start();

// Controle du formulaire de modification de profil
$mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$/";
$err_mdp = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mot_de_passe_actuel = test_input($_POST["mot_de_passe"]);
    $nouveau_mot_de_passe =test_input($_POST["nouveau_mdp"]);
    $conf_mot_de_passe =test_input($_POST["conf_nouveau_mdp"]);

    if (!password_verify($mot_de_passe_actuel, recuperation_mdp($_SESSION['mail'])['mdp'])) {
        $err_mdp = "Mot de passe actuel incorrect";
    }

    if (!preg_match($mdp_pattern, $nouveau_mot_de_passe)) {
        $err_mdp = "Mot de passe incorrect";
    } elseif ($nouveau_mot_de_passe != $conf_mot_de_passe) {
        $err_mail = "Le mot de passe de confirmation ne correspond pas";
    } else {
        $nouveau_mot_de_passe = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
    }

    if (empty($err_mail) && empty($err_telephone) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal)) {
        modifier_mot_de_passe($nouveau_mot_de_passe, $_SESSION['mail'],$_SESSION['role']);
        header("Location: pageTypeConnecte.php");
        exit;
    } else {
        echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
        echo  $err_mdp;
    }
}

