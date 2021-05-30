<?php
include_once('modele/requetes.candidats.php');

function calcul_age($date)
{
    $aujourdhui = date("Y-m-d");
    $diff = date_diff(date_create($date), date_create($aujourdhui));
    return intval($diff->format('%y'));
}

function verification_nom($nom, $prenom)
{
    $nom_pattern = "/^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$/";
    if (!preg_match($nom_pattern, $nom) && !preg_match($nom_pattern, $prenom)) {
        return "Nom ou prenom incorrect";
    }
}

function verification_civilite($civilite)
{
    if (strlen($civilite) != 1) {
        return "Civilité incorrect";
    }
}

function verification_age($date_naissance)
{
    $date_pattern = "#\d{4}(-\d{2}){2}#";
    if (!preg_match($date_pattern, $date_naissance)) {
        return " La date de naissance est incorecte";
    } else {
        if (calcul_age($date_naissance) > 32) {
            return "Malheureusement vous avez dépassé l'âge maximal requis";
        } elseif (calcul_age($date_naissance) < 18) {
            return "Malheureusement vous n'avez pas l'âge minimum requis. Revenez dans " . (18 - calcul_age($date_naissance)) . " ans.";
        }

    }
}

function verification_numero($telephone)
{
    $telephone_pattern = "/(0|\+ ?33) *[1-9]( *[0-9]{2}){4}/";
    if (!preg_match($telephone_pattern, $telephone)) {
        return "Telephone incorrect";
    }
}

function verification_postal($code_postal)
{
    $postal_pattern = "/\d{5,6}/";
    if (!preg_match($postal_pattern, $code_postal)) {
        return "Le code postal est incorrect";
    }
}

function verification_mail($email, $confirmation_mail, $mail_actuel = NULL)
{
    $mail_pattern = "/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Le mail n'est pas valide";
    }

    if ($email != $confirmation_mail) {
        return "Le mail de confirmation ne correspond pas";
    }
    if ($mail_actuel != NULL && $email != $mail_actuel) {
        if (!verification_utilisation_mail($email)) {
            return "L'adresse mail que vous avez rentré est déjà utilisée";
        }
    }
}

function verification_mdp($mot_de_passe, $confirmation_mdp)
{
    $mdp_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&\._-]{8,}$/";
    if (!preg_match($mdp_pattern, $mot_de_passe)) {
        return "Mot de passe incorrect";
    } elseif ($mot_de_passe != $confirmation_mdp) {
        return "Le mot de passe de confirmation ne correspond pas";
    }
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

function confirmation_compte(){
    $longeurclef = 15;
    $clef ="";
    for ($i=1; $i<$longeurclef; $i++){
        $clef .= mt_rand(0,9);
    }
    return $clef;
}

function mail_confirmation_compte($mail, $key){
    $destinataire = $mail;
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Helitest"<appg10c@mail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $sujet ='Confirmation de votre compte Helitest';

    $message= ' <html>
                        <body>
                           <div align="center">
                              <a href="http://localhost/APP-G10C/index?cible=utilisateurs&fonction=confirmation&mail='.urlencode($mail).'&key='.$key.'">Confirmez votre compte !</a>
                           </div>
                        </body>
                     </html>
    ';
        return (mail($destinataire, $sujet, $message, $header));

}

function mail_reinitialisation_mdp($mail, $jeton){
    $destinataire = $mail;
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Helitest"<appg10c@mail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $sujet ='Reinitialisation mot de passe Helitest';

    $message= ' <html>
                        <body>
                           <div align="center">
                           <p>Bonjour, <br> Voici le lien pour réinitialiser votre mot de passe : </p>
                              <a href="http://localhost/APP-G10C/index?cible=utilisateurs&fonction=reinitialisation_mdp&mail='.urlencode($mail).'&jeton='.$jeton.'">Nouveau mot de passe</a>
                           </div>
                        </body>
                     </html>
    ';
    return (mail($destinataire, $sujet, $message, $header));

}


function redirection($form, $vue, $erreur){
  if (session_status() == 1 || session_status() == 0) {
      session_start();
  }

  if (!empty($form)) {
      include('vues/header.form.php');
  } else {
    if (isset($_SESSION['role'])){
        $role = $_SESSION['role'];
    }else {
        $role="";
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
     array_push($id,$session['id_session']);
   endforeach;
   return $id;
}

function calcul_candidats_session($id){
  return calcul_candidats($id);
}

function calcul_ratio_admissibles($id){
  //faire fonction, modifier les db
}
