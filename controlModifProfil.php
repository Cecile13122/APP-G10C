<?php

require_once("requestsCandidat.php");
require_once("requestsConnexion.php");
require_once("fonction.php");

session_start();

// Controle du formulaire de modification de profil
$nom_pattern = "/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/";
$postal_pattern = "/\d{5,6}/";
$telephone_pattern = "/(0|\+ ?33) *[1-9]( *[0-9]{2}){4}/";
$mail_pattern = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
$mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$/";
$err_mail = $err_civilite = $err_code_postal = $err_mdp = $err_nom = $err_telephone = $err_date_naissance = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = test_input($_POST["prenom"]);
    $nom = test_input($_POST["nom"]);
    $telephone = test_input($_POST["telephone"]);
    $code_postal = test_input($_POST["code_postal"]);
    $email = test_input($_POST["email"]);
    $confirmation_mail = test_input($_POST["confemail"]);
    $mot_de_passe = test_input($_POST["mot_de_passe"]);


    if (!preg_match($nom_pattern, $nom) && !preg_match($nom_pattern, $prenom)) {
        $err_nom = "Nom ou prenom incorrect";
    }

    if (!preg_match($telephone_pattern, $telephone)) {
        $err_telephone = "Telephone incorrect";
    }

    if (!preg_match($postal_pattern, $code_postal)) {
        $err_code_postal = " Le code postal est incorrect";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_mail = "Le mail n'est pas valide";
    }

    if ($email != $confirmation_mail) {
        $err_mail = "Le mail de confirmation ne correspond pas";
    } else {
        if ($email !=$_SESSION['mail']) {
            if (!verification_utilisation_mail_modification($email, $_SESSION)) {
                $err_mail = "L'adresse mail est déjà utilisé";
            }
        }
    }

    if (!password_verify($mot_de_passe, recuperation_profil($_SESSION['mail'])['mdp'])) {
        $err_mdp = "Mot de passe incorrect";
    }

    if (empty($err_mail) && empty($err_telephone) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal)) {
        modifier_profil($prenom, $nom, $telephone, $code_postal, $email, $_SESSION['mail']);
        $_SESSION['mail'] = $email;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        header("Location: pageTypeConnecte.php");
        exit;
    } else {
        echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
        echo $err_nom . "<br>" . $err_telephone . "<br>" . $err_code_postal . "<br>" . $err_mail . "<br>" . $err_mdp;
    }
}

