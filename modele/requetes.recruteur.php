<?php

/**
 * Liste des fonctions spécifiques à la table des recruteurs
 */

// on récupère les requêtes génériques
include_once('requetes.generiques.php');

//on définit le nom de la table
$table = "recruteur";

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

function recuperation_recruteurs(){
  return recupereTous(connect_bdd(),'recruteur');
}
