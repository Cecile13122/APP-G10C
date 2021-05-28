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


function verification_role($email){
    $bdd= connect_bdd();
    //faire un bail d'itérations
    $requete_candidat = $bdd->prepare('SELECT mail_candidat FROM candidat WHERE mail_candidat=?');
    $requete_candidat->execute(array($email));
    if ($requete_candidat->rowCount()==1){
        return "candidat";
    }
    $requete_recruteur= $bdd->prepare('SELECT mail_recruteur FROM recruteur WHERE mail_recruteur=?');
    $requete_recruteur->execute(array($email));
    if ($requete_recruteur->rowCount()==1){
        return "recruteur";
    }
    $requete_admin= $bdd->prepare('SELECT mail_administrateur FROM administrateur WHERE mail_administrateur=?');
    $requete_admin->execute(array($email));
    if ($requete_admin->rowCount()==1){
        return "administrateur";
    }

}

function recuperation_mdp($email){
    $bdd =connect_bdd();
    $requete = $bdd->prepare('SELECT mdp FROM candidat WHERE mail_candidat = ? UNION SELECT mdp FROM recruteur WHERE mail_recruteur = ? UNION SELECT mdp FROM administrateur WHERE mail_administrateur= ?');
    $requete->execute(array($email,$email, $email));
    return $requete->fetch();
}

function modifier_mot_de_passe($mot_de_passe, $mail, $role){
    $bdd = connect_bdd();
    $requete = $bdd ->prepare('UPDATE '.$role.' SET mdp=:mdp WHERE mail_'.$role.' = :mail ');
        $requete ->execute(array(
            'mdp'=> $mot_de_passe,
            'mail' => $mail));
}
?>
