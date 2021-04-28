<?php
include_once('requestsConnexion.php');


function create_candidat($email, $nom, $prenom, $mot_de_passe, $date_naissance, $telephone, $civilite, $code_postal)
{
    $bdd = connect_bdd();
    $requete = $bdd->prepare('INSERT INTO candidat(mail_candidat, nom, prenom, mdp, date_naissance, numero_tel, genre, code_postal) VALUES (:mail,:nom,:prenom, :mdp, :date_naissance, :telephone, :genre, :code_postal)');
    $requete->execute(array(
        'mail' => $email,
        'nom' => $nom,
        'prenom' => $prenom,
        'mdp' => $mot_de_passe,
        'date_naissance' => $date_naissance,
        'telephone' => $telephone,
        'genre' => $civilite,
        'code_postal' => $code_postal));

}

function verification_utilisation_mail($mail)
{
    $bdd = connect_bdd();
    $requete = $bdd->prepare('SELECT mail_candidat FROM candidat WHERE mail_candidat=?');
    $requete->execute(array($mail));
    $userexit = $requete->rowCount();
    if ($userexit === 0) {
        return true;
    } else {
        return false;
    }

}

function recuperation_profil($mail){
    $bdd =connect_bdd();
    $requete = $bdd->prepare('SELECT * FROM candidat WHERE mail_candidat = ?');
    $requete->execute(array($mail));
    $info_candidat= $requete->fetch();
    return $info_candidat;
}

function verification_utilisation_mail_modification($mail, $info_session){
    $bdd = connect_bdd();
    $requete = $bdd->prepare('SELECT mail_candidat FROM candidat WHERE mail_candidat=? AND prenom!=? AND nom!=?');
    $requete->execute(array($mail, $info_session['prenom'], $info_session['nom']));
    $userexit = $requete->rowCount();
    if ($userexit === 0) {
        return true;
    } else {
        return false;
    }
}

function modifier_profil($prenom, $nom, $telephone, $code_postal, $email, $ancien_email){
    $bdd = connect_bdd();
    $requete = $bdd->prepare('UPDATE candidat SET mail_candidat =:mail, nom =:nom, prenom=:prenom, numero_tel=:telephone, code_postal=:code_postal WHERE mail_candidat =:ancien_email');
    $requete->execute(array(
        'mail' => $email,
        'nom' => $nom,
        'prenom' => $prenom,
        'telephone' => $telephone,
        'code_postal' => $code_postal,
        'ancien_email'=> $ancien_email));

}

