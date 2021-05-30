<?php

/**
 * Contrôleur des utilisateurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
include_once('./modele/requetes.utilisateurs.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = 'accueil';
} else {
    $function = $_GET['fonction'];
}

switch ($function) {

    case 'modification_profil':
        $form = "form";
        $vue = "modification.profil";
        session_start();

        // Controle du formulaire de modification de profil
        $err_mail = $err_civilite = $err_code_postal = $err_mdp = $err_nom = $err_telephone = $err_date_naissance = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $prenom = test_input($_POST["prenom"]);
            $nom = test_input($_POST["nom"]);
            $telephone = test_input($_POST["telephone"]);
            $code_postal = test_input($_POST["code_postal"]);
            $email = test_input($_POST["email"]);
            $confirmation_mail = test_input($_POST["confemail"]);
            $mot_de_passe = test_input($_POST["mot_de_passe"]);


            $err_nom = verification_nom($nom, $prenom);
            $err_telephone = verification_numero($telephone);
            $err_code_postal = verification_postal($code_postal);
            $err_mail = verification_mail($email, $confirmation_mail, $_SESSION['mail']);

            if (!password_verify($mot_de_passe, recuperation_profil($_SESSION['mail'])['mdp'])) {
                $err_mdp = "Mot de passe incorrect";
            }

            if (empty($err_mail) && empty($err_telephone) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal)) {
                modifier_profil($prenom, $nom, $telephone, $code_postal, $email, $_SESSION['mail']);
                $_SESSION['mail'] = $email;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $role =verification_role($email);
                $_SESSION['role'] = $role;
                $form = "";
                $vue = "accueil"; //TODO ajouter message de confirmation
            } else {
                echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
                echo $err_nom . "<br>" . $err_telephone . "<br>" . $err_code_postal . "<br>" . $err_mail . "<br>" . $err_mdp;
            }
        }
        break;

    case 'modification_mdp':
        $form = "form";
        $vue = "modification.mdp";
        session_start();

        // Controle du formulaire de modification de mot de passe
        $mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$/";
        $err_mdp = "";


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mot_de_passe_actuel = test_input($_POST["mot_de_passe"]);
            $nouveau_mot_de_passe = test_input($_POST["nouveau_mdp"]);
            $conf_mot_de_passe = test_input($_POST["conf_nouveau_mdp"]);

            if (!password_verify($mot_de_passe_actuel, recuperation_mdp($_SESSION['mail'])['mdp'])) {
                $err_mdp = "Mot de passe actuel incorrect";
            }

            if (!preg_match($mdp_pattern, $nouveau_mot_de_passe)) {
                $err_mdp = "Mot de passe incorrect";
            } elseif ($nouveau_mot_de_passe != $conf_mot_de_passe) {
                $err_mdp = "Le mot de passe de confirmation ne correspond pas";
            } else {
                $nouveau_mot_de_passe = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
            }

            if (empty($err_mdp)) {
                modifier_mot_de_passe($nouveau_mot_de_passe, $_SESSION['mail'], $_SESSION['role']);
                $form = "";
                $vue = "accueil"; //ajouter message de confirmation
                $role = $_SESSION['role'];
            } else {
                echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
                echo $err_mdp;
            }
        }
        break;

    case 'inscription':
        $form = "form";
        $vue = "inscription";
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


            $err_civilite = verification_civilite($civilite);
            $err_nom = verification_nom($nom, $prenom);
            $err_telephone = verification_numero($telephone);
            $err_code_postal = verification_postal($code_postal);
            $err_mail = verification_mail($email, $confirmation_mail);
            $err_date_naissance = verification_age($date_naissance);
            $err_mdp = verification_mdp($mot_de_passe, $confirmation_mdp);


            if (empty($err_mail) && empty($err_telephone) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal) && empty($err_civilite) && empty($err_date_naissance)) {
                $mot_de_passe = crypter_mdp($mot_de_passe);
                $clef = confirmation_compte();
                mail_confirmation_compte($email, $clef);
                $values = array('mail_candidat' => $email, 'nom' => $nom, 'prenom' => $prenom, 'mdp' => $mot_de_passe, 'date_naissance' => $date_naissance, 'numero_tel' => $telephone, 'genre' => $civilite, 'code_postal' => $code_postal, 'valider' => 0, 'clef_confirmation' => $clef);
                create_candidat($bdd, $values, $table);
                session_start();
                $role = "candidat";
                $_SESSION['mail'] = $email;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['role'] = $role;
                $form = "";
                $vue = "accueil";
            } else {
                echo "Il y a une erreur dans le remplissage de votre formulaire.<br>";
                echo $err_civilite . "<br>" . $err_nom . "<br>" . $err_date_naissance . "<br>" . $err_telephone . "<br>" . $err_code_postal . "<br>" . $err_mail . "<br>" . $err_mdp;
            }
        }
        break;

    case 'confirmation':
        if (isset($_GET['mail'], $_GET['key']) && !empty($_GET['mail']) && !empty($_GET['key'])) {
            $mail = test_input(urldecode($_GET['mail']));
            $key = intval($_GET['key']);

            $info_user = recuperation_profil_clef($mail, $key);
            if (!$info_user['valider']) {
                valider_candidat($mail, $key);
                echo 'Vous avez bien validé votre compte';
            } else {
                echo 'Votre compte a déjà été valider';
            }
            $form = "";
            $vue = "connexion";
        }
        break;


    case 'mdp_oublie' :
        $form ="form";
        $vue="mdpoublie";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mail = test_input($_POST['email']);
            $jeton =uniqid();
            if (mail_reinitialisation_mdp($mail, $jeton)){
                $role = verification_role($mail);
                initialisation_jeton($mail, $jeton,$role);
            }
            $role='';
            $form='';
            $vue='accueil';
        }
        break;

    case 'reinitialisation_mdp':
        if (isset($_GET['mail'])&& !empty([$_GET['mail']])){
            $mail=($_GET['mail']);
            $role= verification_role($mail);
        if (isset($_GET['jeton'])&& !empty([$_GET['jeton']])){
            $userinfo =recuperation_profil_jeton($_GET['jeton'], $role);
            session_start();
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['nom'] = $userinfo['nom'];
            $role = verification_role($userinfo['mail']);
            $_SESSION['role'] = $role;
            if ($userinfo['mail']){
                $form="form";
                $vue="nouveaumdp";
            }else {
                echo "Le lien n'est plus valide, il faut en redemander un";
                $form='';
                $vue='accueil';
                $role='';
            }
        }}
            $mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$/";
            $err_mdp = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                session_start();
                $nouveau_mot_de_passe = test_input($_POST["nouveau_mdp"]);
                $conf_mot_de_passe = test_input($_POST["conf_nouveau_mdp"]);
                if (!preg_match($mdp_pattern, $nouveau_mot_de_passe)) {
                    $err_mdp = "Mot de passe incorrect";
                } elseif ($nouveau_mot_de_passe != $conf_mot_de_passe) {
                    $err_mdp = "Le mot de passe de confirmation ne correspond pas";
                } else {

                    $nouveau_mot_de_passe = password_hash($nouveau_mot_de_passe, PASSWORD_DEFAULT);
                }
                if (empty($err_mdp)) {

                modifier_mot_de_passe($nouveau_mot_de_passe, $_SESSION['mail'], $_SESSION['role']);
                initialisation_jeton($_SESSION['mail'], 0, $_SESSION['role']);
                $role=$_SESSION['role'];
                $vue="accueil";
                $form='';
            }
            }

        break;

    case 'deconnexion':
        session_start();
        session_unset();
        session_destroy();
        $form = "form";
        $vue = "deconnexion";
        break;

    case 'connexion':
        $vue = "connexion";
        $form = "form";
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
                    $vue = "accueil";
                    $form = "";
                }
            } else {
                $erreur = "?err=1";
            }
        }
        break;

    case 'accueil':
        session_start();
        if (isset($_SESSION['role']) && !empty($_SESSION['role'])){
            $role=$_SESSION['role'];
        }
        $form = "";
        $vue = "accueil";
        break;

    case 'cgu':
        $form = "";
        $vue = "cgu";
        break;

    case 'mentions_legales':
        $form = "";
        $vue = "mentions.legales";
        break;

    case 'plan_site':
        $form = "";
        $vue = "plan.site";
        break;

    case 'candidats':
        $vue = "candidats";
        $form = "";
        break;

    case 'contact' :
        $form = "";
        $vue = "contact";
        break;

    case 'faq' :

        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $form = "";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

if (session_status() == 1 || session_status() == 0) {
    session_start();
}

if (!empty($form)) {
    include('vues/header.form.php');
} else {
    if (!isset($role)) {
        $role = "";
    }
    include('vues/header.' . $role . '.php');
}

if (!isset($erreur)) {
    $erreur = "";
}

include('vues/' . $vue . '.php' . $erreur);
include('vues/footer.php');
