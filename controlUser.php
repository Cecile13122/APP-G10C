<?php
// Controle du formulaire d'inscription
$nom_pattern ="/[A-Za-z '-]+/";
$postal_pattern="/\d{5,6}/";
$telephone_pattern="/\d{10}/";
    //"(0|\+33)[1-9]( *[0-9]{2}){4}";
$err="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $civilite = test_input($_POST["genre"]);
    $prenom = test_input($_POST["prenom"]);
    $nom = test_input($_POST["nom"]);
    $date_naissance = test_input($_POST["date_naissance"]);
    $telephone = test_input($_POST["telephone"]);
    $code_postal = test_input($_POST["code_postal"]);
    $email = test_input($_POST["email"]);
    $mot_de_passe = test_input($_POST["mot_de_passe"]);

    if (strlen($civilite)!= 1){
        $err = "Civilité incorrect";
    }
    if (!preg_match($nom_pattern, $nom) && !preg_match($nom_pattern, $prenom)){
        $err = "Nom ou prenom incorrect";
    }

    if (!preg_match($telephone_pattern, $telephone)){
        $err="Telephone incorrect";
    }

    if (!preg_match($postal_pattern, $code_postal)){
        $err=" Le code postal est incorrect";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $err = "Le mail est pas incorrect";
    }




    echo "$civilite \n
$prenom \n
$nom\n
$date_naissance\n
$telephone\n
$code_postal\n
$email
\n $mot_de_passe";
    if (empty($err)){
    header("Location: requestsCandidat.php");
    exit;
    }
}
function test_input($donnee){
    $donnee = trim($donnee);
    $donnee = stripslashes($donnee);
    $donnee = htmlspecialchars($donnee);
    return $donnee;
}


?>

