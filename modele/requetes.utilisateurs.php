<?php

/**
 * Liste des fonctions spécifiques à la table des capteurs
 */

// on récupère les requêtes génériques
include_once('requetes.generiques.php');

function connexion_personne($mail){
    $bdd = connect_bdd();
    $requete = $bdd->prepare('SELECT mail_candidat AS mail, mdp, nom, prenom FROM candidat WHERE mail_candidat= ? UNION SELECT mail_administrateur AS mail, mdp, nom, prenom FROM administrateur WHERE mail_administrateur= ? UNION SELECT mail_recruteur AS mail, mdp, nom, prenom FROM recruteur WHERE mail_recruteur= ? ');
    $requete->execute(array(
        $mail,
        $mail,
        $mail
    ));
    $userexit = $requete->rowCount();
    if ($userexit == 1) {
        $userinfo = $requete->fetch();
        return $userinfo;
    } else {
        return null;
    }
}

function supprimer_utilisateur($mail){
  $bdd=connect_bdd();
  $role_utilisateur = verification_role($mail);
  $requete=$bdd->prepare('DELETE FROM '.$role_utilisateur.' WHERE mail_'.$role_utilisateur.'=?');
  $requete->execute(array($mail));
}


function verification_role($mail){
    $bdd= connect_bdd();
    $roles = array("candidat","recruteur","administrateur");
    foreach ($roles as $role_utilisateur) {
      $requete = $bdd->prepare('SELECT mail_'.$role_utilisateur.' FROM '.$role_utilisateur.' WHERE mail_'.$role_utilisateur.'=?');
      $requete->execute(array($mail));
      if ($requete->rowCount()==1){
          return $role_utilisateur;
      }
    }
}

function recuperation_mdp($email){
    $bdd =connect_bdd();
    $requete = $bdd->prepare('SELECT mdp FROM candidat WHERE mail_candidat = ? UNION SELECT mdp FROM recruteur WHERE mail_recruteur = ? UNION SELECT mdp FROM administrateur WHERE mail_administrateur= ?');
    $requete->execute(array($email,$email, $email));
    return $requete->fetch();
}

function modifier_mot_de_passe($mot_de_passe, $mail, $role_utilisateur){
    $bdd = connect_bdd();
    $requete = $bdd ->prepare('UPDATE '.$role_utilisateur.' SET mdp=:mdp WHERE mail_'.$role_utilisateur.' = :mail ');
        $requete ->execute(array(
            'mdp'=> $mot_de_passe,
            'mail' => $mail));
}

function initialisation_jeton($mail, $jeton, $role_utilisateur){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('UPDATE '.$role_utilisateur.' SET jeton =? WHERE mail_'.$role_utilisateur.' = ?');
    $requete->execute(array($jeton, $mail));
}

function recuperation_profil_jeton($jeton, $role_utilisateur){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('SELECT mail_'.$role_utilisateur.' AS mail, nom, prenom FROM '.$role_utilisateur.' WHERE jeton = ?');
    $requete->execute(array($jeton));
    return $requete->fetch();
}

function recuperation_profil_recherche($recherche){
    $bdd=connect_bdd();
    $candidats=[];
    $requete=$bdd->prepare('SELECT mail_candidat AS mail, nom, prenom FROM candidat WHERE nom LIKE ? OR prenom LIKE ?');
    $requete ->execute(array($recherche, $recherche));
    while($candidat = $requete->fetch()){
        $candidats[]=$candidat;
    }
    return $candidats;
}
