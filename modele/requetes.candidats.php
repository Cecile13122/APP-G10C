<?php

/**
 * Liste des fonctions spécifiques à la table des candidats
 */

// on récupère les requêtes génériques
include_once('requetes.generiques.php');
include_once('requetes.utilisateurs.php');

//on définit le nom de la table
$table = "candidat";

/**
 * Insère un nouveau candidat dans la table
 * @param PDO $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */
function create_candidat(PDO $bdd, array $values, string $table): bool{
    return insertion($bdd, $values, $table);
}

function verification_utilisation_mail($mail){
    $bdd = connect_bdd();
    $requete = $bdd->prepare('SELECT mail_candidat FROM candidat WHERE mail_candidat=? UNION SELECT mail_recruteur FROM recruteur WHERE mail_recruteur=? UNION SELECT mail_administrateur FROM administrateur WHERE mail_administrateur=? ');
    $requete->execute(array($mail,$mail,$mail));
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
    $requete = $bdd->prepare('SELECT mail_candidat FROM candidat WHERE mail_candidat=? AND prenom!=? AND nom!=? UNION SELECT mail_recruteur FROM recruteur WHERE mail_recruteur=? AND prenom!=? AND nom!=? UNION SELECT mail_administrateur FROM administrateur WHERE mail_administrateur=? AND prenom!=? AND nom!=? ');
    $requete->execute(array($mail, $info_session['prenom'], $info_session['nom'],$mail, $info_session['prenom'], $info_session['nom'],$mail, $info_session['prenom'], $info_session['nom']));
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

function supprimer_candidat($mail){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('DELETE FROM candidat WHERE mail_candidat=?');
    $requete->execute(array($mail));
}

function is_candidat_valide($mail){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('SELECT valider FROM candidat WHERE mail_candidat=?');
    $requete->execute(array($mail));
    $valider = $requete->fetch();
    if($valider['valider']==1){
     return true;
    }
    else {
        return false;
    }
}

function valider_candidat($mail, $key){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('UPDATE candidat SET valider=1 WHERE mail_candidat=? AND clef_confirmation=?');
    $requete->execute(array($mail, $key));
}

function recuperation_profil_clef($mail, $key){
    $bdd =connect_bdd();
    $requete = $bdd->prepare('SELECT * FROM candidat WHERE mail_candidat = ? AND clef_confirmation=?');
    $requete->execute(array($mail,$key));
    $info_candidat= $requete->fetch();
    return $info_candidat;
}

function recuperation_candidats(){
        $bdd=connect_bdd();
        $requete=$bdd->prepare('SELECT * FROM candidat ORDER BY nom');
        $requete->execute();
        $candidats=[];
        while($candidat = $requete->fetch()){
            $candidats[]=$candidat;
        }
        return $candidats;
}


?>
