<?php

/**
 * Contrôleur des utilisateurs
 */

// on inclut le fichier modèle contenant les appels à la BDD
include_once('./modele/requetes.utilisateurs.php');
include_once('./modele/requetes.recruteur.php');

// si la fonction n'est pas définie, on choisit d'afficher l'accueil
if (!isset($_GET['fonction']) || empty($_GET['fonction'])) {
    $function = 'afficher_page';
    $page = "accueil";
} else {
    $function = $_GET['fonction'];
}

if (!empty($_GET['role_utilisateur'])) {
    $role_utilisateur = $_GET['role_utilisateur'];
}

if (!empty($_GET['utilisateur'])) {
    $utilisateur = $_GET['utilisateur'];
}

if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}


switch ($function) {
    case 'modifier_utilisateur':
        // code...
        break;

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
                $form = "";
                $vue = "accueil";
                $erreur = "Vos modifications ont bien été enregistrées";
            } else {
                $erreur = "Une erreur a eu lien lors de l'enregistrement de vos données,\r\n Merci de réessayer";
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
                $vue = "accueil";
                $erreur = "Votre modification a bien été enregistré";
            } else {
                $erreur = "Une erreur a eu lien lors de l'enregistrement de vos données,\r\n Merci de réessayer";

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

            /*erreurs = array();
            verification_civilite($civilite),verification_nom($nom, $prenom),verification_numero($telephone),erification_postal($code_postal),verification_mail($email, $confirmation_mail),verification_age($date_naissance),verification_mdp($mot_de_passe, $confirmation_mdp)
*/

            /*$err_civilite = verification_civilite($civilite);*/
            $err_nom = verification_nom($nom, $prenom);
            $err_telephone = verification_numero($telephone);
            $err_code_postal = verification_postal($code_postal);
            $err_mail = verification_mail($email, $confirmation_mail);
            $err_date_naissance = verification_age($date_naissance);
            $err_mdp = verification_mdp($mot_de_passe, $confirmation_mdp);


            if (empty($err_mail) && empty($err_telephone) && empty($err_nom) && empty($err_mdp) && empty($err_code_postal) && empty($err_civilite) && empty($err_date_naissance)) {
                $mot_de_passe = crypter_mdp($mot_de_passe);
                $clef = confirmation_compte();
                $jeton = uniqid();
                mail_confirmation_compte($email, $clef);
                $values = array('mail_candidat' => $email, 'nom' => $nom, 'prenom' => $prenom, 'mdp' => $mot_de_passe, 'date_naissance' => $date_naissance, 'numero_tel' => $telephone, 'genre' => $civilite, 'code_postal' => $code_postal, 'valider' => 0,
                 'clef_confirmation' => $clef, 'jeton' => $jeton);
                $role = "candidat";
                create_candidat($bdd, $values, $role);
                session_start();
                $_SESSION['mail'] = $email;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['role'] = $role;
                $form = "";
                $vue = "accueil";
            } else {
                $erreur = "Une erreur a eu lien lors de l'enregistrement de vos données,\r\n Merci de réessayer";
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
                $erreur = 'Vous avez bien validé votre compte';
            } else {
                $erreur = 'Votre compte a déjà été validé';
            }
            $form = "";
            $vue = "connexion";
        }
        break;

    case 'mdp_oublie' :
        $form = "form";
        $vue = "mdpoublie";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mail = test_input($_POST['email']);
            $jeton = uniqid();
            if (mail_reinitialisation_mdp($mail, $jeton)) {
                $role = verification_role($mail);
                initialisation_jeton($mail, $jeton, $role);
            }
            $role = '';
            $form = '';
            $vue = 'accueil';
        }
        break;

    case 'reinitialisation_mdp':
        if (isset($_GET['mail']) && !empty([$_GET['mail']])) {
            $mail = ($_GET['mail']);
            $role = verification_role($mail);
            if (isset($_GET['jeton']) && !empty([$_GET['jeton']])) {
                $userinfo = recuperation_profil_jeton($_GET['jeton'], $role);
                session_start();
                $_SESSION['mail'] = $userinfo['mail'];
                $_SESSION['prenom'] = $userinfo['prenom'];
                $_SESSION['nom'] = $userinfo['nom'];
                $role = verification_role($userinfo['mail']);
                $_SESSION['role'] = $role;
                if ($userinfo['mail']) {
                    $form = "form";
                    $vue = "nouveaumdp";
                } else {
                    $erreur = "Le lien n'est plus valide, recommencez la démarche";
                    $form = '';
                    $vue = 'accueil';
                    $role = '';
                }
            }
        }
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
                $role = $_SESSION['role'];
                $vue = "accueil";
                $form = '';
            } else {
                $erreur = "Une erreur a eu lien lors de l'enregistrement de vos données,\r\n Merci de réessayer";
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
                    $role = verification_role($userinfo['mail']);
                    if ($role === "candidat") {
                        if (is_candidat_valide($mail)) {
                            session_start();
                            $_SESSION['mail'] = $userinfo['mail'];
                            $_SESSION['prenom'] = $userinfo['prenom'];
                            $_SESSION['nom'] = $userinfo['nom'];
                            $_SESSION['role'] = $role;
                            $vue = "accueil";
                            $form = "";
                        } else {
                            $erreur = "Vous n'avez pas validé votre adresse mail. Vous devez le faire pour vous connecter.";
                        }
                    } else {
                        session_start();
                        $_SESSION['mail'] = $userinfo['mail'];
                        $_SESSION['prenom'] = $userinfo['prenom'];
                        $_SESSION['nom'] = $userinfo['nom'];
                        $_SESSION['role'] = $role;
                        $vue = "accueil";
                        $form = "";
                    }
                } else {
                    $erreur = "L'identifiant et/ou le mot de passe sont incorrects ";
                }
            }else{
            $erreur = "L'identifiant et/ou le mot de passe sont incorrects §§§§§§§§§§";
        }}
        break;

    case 'afficher_page':
        $vue = $page;
        break;

    case 'contact':
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
                if (mail($destinataire, $sujet, $message . "\r\n" . $nom, $headers)) {
                    $erreur = 'Mail envoyé !';
                } else {
                    $erreur = "Une erreur s'est produite, veuillez réessayer";
                }
            } else {
                $erreur = "L'adresse mail n'est pas valide";
            }

        }
        $vue="contact";
        $form="";

        break;

    case 'afficher_utilisateurs':
        $utilisateurs = recupereTous(connect_bdd(), $role_utilisateur);
        $attributs_utilisateurs = recuperer_attributs($role_utilisateur);
        $vue = "utilisateurs";
        break;

    case 'supprimer_utilisateur':
        $role_utilisateur = supprimer_utilisateur($_GET['mail']);
        include("index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=" . $role_utilisateur);
        break;

    case 'candidat':
        $vue = "utilisateurs";
        break;

    case 'recherche':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['recherche']) && !empty($_POST['recherche'])) {
                $recherche = test_input($_POST['recherche']);
                $recherche = explode(' ', $recherche);
                $resultat_recherche = recuperation_candidats_recherche($recherche);
                $vue = "recherche";
            }
        }
        break;

    case 'ajout_utilisateur':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $values = array();
            $keys = recuperer_attributs($role_utilisateur);
            foreach ($keys as $key) {
              echo $key."= ";
              echo test_input($_POST[$key])."<br>";
                array_push($values, test_input($_POST[$key]));
            }
            $message = verifications_pattern($keys,$values);
            $utilisateur=array_combine($keys, $values);
            if (empty($message)) {
                if ($role_utilisateur=="candidat"){
                  $utilisateur[$clef_confirmation]= confirmation_compte();
                  $utilisateur[$mdp]=crypter_mdp($mot_de_passe);
                  $utilisateur[$valider]=0;
                }
                mail_confirmation_compte($utilisateur['mail_'+$role_utilisateur], $clef);
                insertion(connect_bdd(), $utilisateur, $role_utilisateur);
                include("index.php?cible=utilisateurs&fonction=afficher_utilisateurs&role_utilisateur=" . $role_utilisateur);
            }
        }
        $vue="utilisateurs";
        break;

    case 'accueil':
        $vue='accueil';
        $form='';
        break;


    case 'plan_site':
        session_start();
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
        } else {
            $role = "";
        }
        $form='';
        $vue= 'plan.site.'.$role;
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "erreur404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}

//redirection($form, $vue, $erreur);
if (session_status() == 1 || session_status() == 0) {
    session_start();
}

if (!empty($form)) {
    include('vues/header.form.php');
} else {
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];
    } else {
        $role = "";
    }
    include('vues/header.' . $role . '.php');
}

include('vues/' . $vue . '.php');
include('vues/footer.php');
