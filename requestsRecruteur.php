<?php
include_once('requestsConnexion.php');

function create_recruteur($email, $nom, $prenom, $mot_de_passe)
{
    $bdd = connect_bdd();
    $requete = $bdd->prepare('INSERT INTO recruteur(mail_recruteur, nom, prenom, mdp) VALUES (:mail,:nom,:prenom, :mdp)');
    $requete->execute(array(
        'mail' => $email,
        'nom' => $nom,
        'prenom' => $prenom,
        'mdp' => $mot_de_passe));
}

function supprimer_recruteur($mail){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('DELETE recruteur FROM recruteur WHERE mail_recruteur=?');
    $requete->execute(array($mail));
}


