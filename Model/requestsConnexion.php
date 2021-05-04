<?php

function connect_bdd() {
// Connexion a la base de donnée
    try {
        $bdd = new PDO ('mysql:host=localhost;port=3307; dbname=helitest; charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

function connexion_personne($mail)
{
    $bdd = connect_bdd();
    $requete = $bdd->prepare('SELECT mail_candidat AS mail, mdp, nom, prenom FROM candidat WHERE mail_candidat= ? UNION SELECT mail_admin AS mail, mdp, nom, prenom FROM administrateur WHERE mail_admin= ? UNION SELECT mail_recruteur AS mail, mdp, nom, prenom FROM recruteur WHERE mail_recruteur= ? ');
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
    $requete_admin= $bdd->prepare('SELECT mail_admin FROM administrateur WHERE mail_admin=?');
    $requete_admin->execute(array($email));
    if ($requete_admin->rowCount()==1){
        return "administrateur";
    }

}

function recuperation_mdp($email){
    $bdd =connect_bdd();
    $requete = $bdd->prepare('SELECT mdp FROM candidat WHERE mail_candidat = ? UNION SELECT mdp FROM recruteur WHERE mail_recruteur = ? UNION SELECT mdp FROM administrateur WHERE mail_admin = ?');
    $requete->execute(array($email,$email, $email));
    return $requete->fetch();
}

function modifier_mot_de_passe($mot_de_passe, $mail, $role){
    $bdd = connect_bdd();
    if ($role == "recruteur"){
        $requete = $bdd ->prepare('UPDATE recruteur SET mdp=:mdp WHERE mail_recruteur = :mail ');
        $requete ->execute(array(
            'mdp'=> $mot_de_passe,
            'mail' => $mail));
    }
    elseif ($role == "administrateur"){
        $requete = $bdd ->prepare('UPDATE administrateur SET mdp=:mdp WHERE mail_admin = :mail ');
        $requete ->execute(array(
            'mdp'=> $mot_de_passe,
            'mail' => $mail));
    }else {
        $requete = $bdd ->prepare('UPDATE candidat SET mdp=:mdp WHERE mail_candidat = :mail ');
        $requete ->execute(array(
            'mdp'=> $mot_de_passe,
            'mail' => $mail));
    }
}
