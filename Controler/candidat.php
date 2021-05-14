<?php
include("Model/requestsCandidat.php");

if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
   $function = "accueil";
} else {
   $function = $_GET['fonction'];
}

switch ($function) {
   case 'accueil':
       //Accueil
       $vue = "accueil";
       break;
   case 'inscription':
     // Controle du formulaire d'inscription
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
    $err_nom=verifNom($nom,$prenom);
    $err_date_naissance=verifNaissance($date_naissance);
    $err_code_postal=verifPostal($code_postal);
    $err_mail=verifMail($email, $confirmation_mail);
    $err_mdp=verifMdp($mot_de_passe, $confirmation_mdp);
    $err_telephone=verifNumero($telephone);


    if (empty($err_telephone) && empty($err_mail) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal) && empty($err_civilite) && empty($err_date_naissance)) {
        create_candidat($email, $nom, $prenom, crypter($mot_de_passe), $date_naissance, $telephone, $civilite, $code_postal);
        session_start();
        $_SESSION['mail'] = $email;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['nom'] = $nom;
        $_SESSION['role'] = "candidat";
        $vue="accueil";
        exit;
    } else {
    echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
    echo $err_civilite . "<br>" . $err_nom . "<br>" . $err_date_naissance . "<br>" . $err_telephone . "<br>" . $err_code_postal . "<br>" . $err_mail . "<br>" . $err_mdp;
}
}
     break;

   case 'cgu':
   // Conditions générales d'utilisation
       $vue = "cgu";
       break;

   case 'contact':
   // Contact
    $vue = "contact";
    break;

    case 'faq':
    // Foire aux questions
      $vue = "faq";
      break;

    case 'mentionsLegales':
      // Mentions legales
      $vue = "mentionsLegales";
      break;

    case 'planDuSite':
      // Plan du site
      $vue = "planDuSite";
      break;

    case 'resultat':
      // Resultats des tests du candidat
      $vue = "resultat";
      break;

   default:
       // si aucune fonction ne correspond au paramètre function passé en GET
       $vue = "erreur404";
       $title = "error404";
       $message = "Erreur 404 : la page recherchée n'existe pas.";
}

include ('Vues/headerCandidat.php');
include ('Vues/' . $vue . '.php');
include ('Vues/footer.php');
