<?php

include_once('requestsCandidat.php');
include_once('index.php');


// Controle du formulaire d'inscription
$nom_pattern = "/[A-Za-z '-]+/";
$postal_pattern = "/\d{5,6}/";
$telephone_pattern = "/\d{10}/";
//"(0|\+33)[1-9]( *[0-9]{2}){4}";
$mdp_pattern = "/.+/";
$err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $civilite = test_input($_POST["genre"]);
    $prenom = test_input($_POST["prenom"]);
    $nom = test_input($_POST["nom"]);
    $date_naissance = $_POST["date_naissance"];
    $telephone = test_input($_POST["telephone"]);
    $code_postal = test_input($_POST["code_postal"]);
    $email = test_input($_POST["email"]);
    $mot_de_passe = test_input($_POST["mot_de_passe"]);

    echo 'date naissance : '.$date_naissance.".";
    echo 'nom : '.$nom.".";
    echo 'prenom : '.$prenom.".";
    echo 'mot de passe: '.$mot_de_passe.".";


    if (strlen($civilite) != 1) {
        $err = "Civilité incorrect";
    }
    if (!preg_match($nom_pattern, $nom) && !preg_match($nom_pattern, $prenom)) {
        $err = "Nom ou prenom incorrect";
    }

    if (!preg_match($telephone_pattern, $telephone)) {
        $err = "Telephone incorrect";
    }

    if (!preg_match($postal_pattern, $code_postal)) {
        $err = " Le code postal est incorrect";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Le mail est pas incorrect";
    }

    if (!preg_match($mdp_pattern, $mot_de_passe)) {
        $err = "Mot de passe incorrect";
    } else {
        $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }


    if (empty($err)) {
        create_candidat($email, $nom, $prenom, $mot_de_passe, $date_naissance, $telephone, $civilite, $code_postal);
        session_start();
        $_SESSION['mail'] = $email;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        header("Location: pageTypeConnecte.php");
        exit;

    }
    
}


?>

