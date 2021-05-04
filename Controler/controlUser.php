<?php

include_once('requestsCandidat.php');
include_once('fonction.php');

function calcul_age($date)
{
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($aujourdhui));
    return intval($diff->format('%y'));
}


// Controle du formulaire d'inscription
$nom_pattern = "/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/";
$postal_pattern = "/\d{5,6}/";
$telephone_pattern = "/(0|\+ ?33) *[1-9]( *[0-9]{2}){4}/";
$mail_pattern = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
$mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$/";
$date_pattern = "#\d{4}(-\d{2}){2}#";
$err_mail = $err_civilite = $err_code_postal = $err_mdp = $err_nom = $err_telephone = $err_date_naissance = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $civilite = test_input($_POST["genre"]);
    $prenom = test_input($_POST["prenom"]);
    $nom = test_input($_POST["nom"]);
    $date_naissance = $_POST["date_naissance"];
    $telephone = test_input($_POST["telephone"]);
    $code_postal = test_input($_POST["code_postal"]);
    $email = test_input($_POST["email"]);
    $confirmation_mail = test_input($_POST["confemail"]);
    $mot_de_passe = test_input($_POST["mot_de_passe"]);
    $confirmation_mdp = test_input($_POST["confirmation_mdp"]);


    if (strlen($civilite) != 1) {
        $err_civilite = "Civilité incorrect";
    }
    if (!preg_match($nom_pattern, $nom) && !preg_match($nom_pattern, $prenom)) {
        $err_nom = "Nom ou prenom incorrect";
    }

    if (!preg_match($date_pattern, $date_naissance)) {
        $err_date_naissance = " La date de naissance est incorecte";
    } else {
        if (calcul_age($date_naissance) > 32) {
            $err_date_naissance = "Malheureusement vous avez dépassé l'âge maximal requis";
        } elseif (calcul_age($date_naissance) < 18) {
            $err_date_naissance = "Malheureusement vous n'avez pas l'âge minimum requis. Revenez dans " . (18 - calcul_age($date_naissance)) . " ans.";
        }

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
    }
    if (!verification_utilisation_mail($email)) {
        $err_mail = "L'adresse mail est déjà utilisé";
    }

    if (!preg_match($mdp_pattern, $mot_de_passe)) {
        $err_mdp = "Mot de passe incorrect";
    } elseif ($mot_de_passe != $confirmation_mdp) {
        $err_mail = "Le mot de passe de confirmation ne correspond pas";
    } else {
        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }


    if (empty($err_mail) && empty($err_telephone) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal) && empty($err_civilite) && empty($err_date_naissance)) {
        create_candidat($email, $nom, $prenom, $mot_de_passe, $date_naissance, $telephone, $civilite, $code_postal);
        session_start();
        $_SESSION['mail'] = $email;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['role'] = "candidat";
        header("Location: View/resultat.php");
        exit;
    } else {
    echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
    echo $err_civilite . "<br>" . $err_nom . "<br>" . $err_date_naissance . "<br>" . $err_telephone . "<br>" . $err_code_postal . "<br>" . $err_mail . "<br>" . $err_mdp;
}
}




