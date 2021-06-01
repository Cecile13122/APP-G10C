<?php
include_once('modele/requetes.candidats.php');
include_once('modele/requetes.session.php');
include_once('modele/requetes.test.php');
/*
function verification_form($form){
  $message="";
  foreach ($form as $key => $value) {
    $message.= verifications_pattern($key,$value);
  }
  return $message;
}

function verifications_pattern($key,$value){
  $pattern = array('nom' => "/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/",'prenom'=>"/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/", 'genre'=>"/FOUM/",'date_naissance'=>"#\d{4}(-\d{2}){2}#",'numero_tel'=>"/(0|\+ ?33) *[1-9](*[0-9]{2}){4}/",'code_postal'=> "/\d{5,6}/",'mail_'=>"/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/",'mdp'=>"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&\._-]{8,}$/");

  switch ($key){
    case 'date_naissance':
      if (!preg_match($date_pattern, $value)) {
          return " La date de naissance est incorecte <br>";
      } else {
          if (calcul_age($value) > 32) {
              return "Malheureusement vous avez dépassé l'âge maximal requis <br>";
          } elseif (calcul_age($value) < 18) {
              return "Malheureusement vous n'avez pas l'âge minimum requis. Revenez dans " . (18 - calcul_age($value)) . " ans. <br>";
          }
      }
      break;
  }
}*/
function verification_nom($nom, $prenom)
{
    $nom_pattern = "/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/";
    if (!preg_match($nom_pattern, $nom) && !preg_match($nom_pattern, $prenom)) {
        return "Nom ou prenom incorrect <br>";
    }
}

function verification_civilite($civilite)
{
    if (strlen($civilite) != 1) {
        return "Civilité incorrect <br>";
    }
}

function verification_age($date_naissance)
{
    $date_pattern = "#\d{4}(-\d{2}){2}#";
    if (!preg_match($date_pattern, $date_naissance)) {
        return " La date de naissance est incorecte <br>";
    } else {
        if (calcul_age($date_naissance) > 32) {
            return "Malheureusement vous avez dépassé l'âge maximal requis <br>";
        } elseif (calcul_age($date_naissance) < 18) {
            return "Malheureusement vous n'avez pas l'âge minimum requis. Revenez dans " . (18 - calcul_age($date_naissance)) . " ans. <br>";
        }

    }
}

function verification_numero($telephone)
{
    $telephone_pattern = "/(0|\+ ?33) *[1-9]( *[0-9]{2}){4}/";
    if (!preg_match($telephone_pattern, $telephone)) {
        return "Telephone incorrect <br>";
    }
}

function verification_postal($code_postal)
{
    $postal_pattern = "/\d{5,6}/";
    if (!preg_match($postal_pattern, $code_postal)) {
        return "Le code postal est incorrect <br>";
    }
}

function verification_mail($email, $confirmation_mail, $mail_actuel = NULL)
{
    $mail_pattern = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Le mail n'est pas valide <br>";
    }

    if ($email != $confirmation_mail) {
        return "Le mail de confirmation ne correspond pas <br>";
    }
    if ($mail_actuel != NULL && $email != $mail_actuel) {
        if (!verification_utilisation_mail($email)) {
            return "L'adresse mail que vous avez rentré est déjà utilisée <br>";
        }
    }
}

function verification_mdp($mot_de_passe, $confirmation_mdp)
{
    $mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&\._-]{8,}$/";
    if (!preg_match($mdp_pattern, $mot_de_passe)) {
        return "Mot de passe incorrect <br>";
    } elseif ($mot_de_passe != $confirmation_mdp) {
        return "Le mot de passe de confirmation ne correspond pas <br>";
    }
}

function calcul_age($date)
{
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($aujourdhui));
    return intval($diff->format('%y'));
}

function crypter_mdp($mot_de_passe)
{
    return password_hash($mot_de_passe, PASSWORD_BCRYPT);
}

function test_input($donnee)
{
    $donnee = trim($donnee);
    $donnee = stripslashes($donnee);
    $donnee = htmlspecialchars($donnee);
    return $donnee;
}

function recuperer_attributs($role_utilisateur)
{
    return $role_utilisateur == "candidat" ? array('prenom', 'nom', 'mail_candidat', 'mdp', 'date_naissance', 'numero_tel', 'genre', 'code_postal', 'valider', 'clef_confirmation') : array('prenom', 'nom', 'mail_' . $role_utilisateur, 'mdp');
}

function confirmation_compte()
{
    $longeurclef = 15;
    $clef = "";
    for ($i = 1; $i < $longeurclef; $i++) {
        $clef .= mt_rand(0, 9);
    }
    return $clef;
}

function mail_confirmation_compte($mail, $key)
{
    $destinataire = $mail;
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"Helitest"<appg10c@mail.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $sujet = 'Confirmation de votre compte Helitest';

    $message = ' <html>
                        <body>
                           <div align="center">
                              <a href="http://localhost/APP-G10C/index?cible=utilisateurs&fonction=confirmation&mail=' . urlencode($mail) . '&key=' . $key . '">Confirmez votre compte !</a>
                           </div>
                        </body>
                     </html>
    ';
    return (mail($destinataire, $sujet, $message, $header));

}

function mail_reinitialisation_mdp($mail, $jeton)
{
    $destinataire = $mail;
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"Helitest"<appg10c@mail.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $sujet = 'Reinitialisation mot de passe Helitest';

    $message = ' <html>
                        <body>
                           <div align="center">
                           <p>Bonjour, <br> Voici le lien pour réinitialiser votre mot de passe : </p>
                              <a href="http://localhost/APP-G10C/index?cible=utilisateurs&fonction=reinitialisation_mdp&mail=' . urlencode($mail) . '&jeton=' . $jeton . '">Nouveau mot de passe</a>
                           </div>
                        </body>
                     </html>
    ';
    return (mail($destinataire, $sujet, $message, $header));

}


function redirection($form, $vue, $erreur)
{
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

    include('vues/' . $vue . '.php' . $erreur);
    include('vues/footer.php');
}

function recuperer_id_sessions($mail)
{
    $id = array();
    foreach (recuperer_session_recruteur($mail) as $session):
        array_push($id, $session['id_session']);
    endforeach;
    return $id;
}

function calcul_candidats_session($id)
{
    return calcul_candidats($id);
}

function calcul_ratio_admissibles($id)
{
    $session = recuperer_session($id);
    if ($session['session_finie'] != 'En cours') {

        $candidats = recuperation_candidats_session($id);
        if (count($candidats)>0){
        $ratio = 0;
        foreach ($candidats as $candidat) {
            $resultat = calcul_resultat($candidat['id_test']);
            if ($resultat == "Acceptée" || $resultat == "Accepté") {
                $ratio++;
            }
        }
        return $ratio / (count($candidats)) * 100;
        }
     else {
         return '-';
     }}else{return'-';}

}

function recuperation_candidats_recherche($recherches)
{
    $resultat = array();
    foreach ($recherches as $recherche) {
        $profils = recuperation_profil_recherche('%' . $recherche . '%');
        foreach ($profils as $profil) {
            if (!in_array($profil, $resultat)) {
                array_push($resultat, $profil);
            }

        }
    }

    return $resultat;
}

function calcul_modif_cardiaque($fcardique1, $fcardique2)
{
    return abs($fcardique1 - $fcardique2);
}

function calcul_modif_temperature($temp1, $temp2)
{
    return abs($temp1 - $temp2) / $temp1 * 100;
}

function calcul_resultat($id_test)
{
    $test = recuperation_test($id_test);
    $session = recuperer_session($test['id_session']);
    $profil = recuperation_profil($test['mail_candidat']);
    $score = 0;
    if ($session['session_finie'] == 'En cours') {
        return 'En attente';
    } else {

        if ($profil['genre'] == 'F') {
            if ($test['frequence_cardiaque'] < $session['seuil_frequence_cardiaque_f']) {
                $score++;
            }
        } else {
            if ($test['frequence_cardiaque'] < $session['seuil_frequence_cardiaque_h']) {
                $score++;
            }
        }
        if ($test['temperature'] < $session['seuil_temperature']) {
            $score++;
        }
        if ($test['tonalite'] > $session['seuil_tonalite']) {
            $score++;
        }
        if ($test['stimulus_audio'] < $session['seuil_stimulus_audio']) {
            $score++;
        }
        if ($test['stimulus_visuel'] < $session['seuil_stimulus_visuel']) {
            $score++;
        }
        if (calcul_modif_cardiaque($test['frequence_cardiaque'], $test['frequence_cardiaque_bis']) < $session['seuil_dif_frequence_cardiaque']) {
            $score++;
        }
        if (calcul_modif_temperature($test['temperature'], $test['temperature_bis']) < $session['seuil_dif_temperature']) {
            $score++;
        }
        if ($profil['genre'] == 'F') {
            if ($score < 7) {

                return 'Refusée';
            } else {
                return 'Acceptée';
            }
        } else {
            if ($score < 7) {
                return 'Refusé';
            } else {
                return 'Accepté';
            }
        }
    }

}
