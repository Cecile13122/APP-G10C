<?php
/**
 * Liste des fonctions spécifiques à la table des tests
 */


 // on récupère les requêtes génériques
 include_once('requetes.generiques.php');
 include_once('requetes.utilisateurs.php');

 function recuperation_candidats_session($id){
   $bdd=connect_bdd();
   $requete=$bdd->prepare('SELECT * FROM test WHERE id_session =?');
   $requete->execute(array($id));
   $candidats=[];
   while($candidat = $requete->fetch()){
       $candidats[]=$candidat;
   }
   return $candidats;
 }

 function recuperation_resultat($mail){
     $bdd=connect_bdd();
     $requete=$bdd->prepare('SELECT * FROM test WHERE mail_candidat =?');
     $requete->execute(array($mail));
     $resultats=[];
     while($resultat = $requete->fetch()){
         $resultats[]=$resultat;
     }
     return $resultats;
 }

 function recuperation_test($id_test){
    $bdd=connect_bdd();
   $requete=$bdd->prepare('SELECT * FROM test WHERE id_test =?');
   $requete->execute(array($id_test));

   return $requete->fetch();
 }

function ajouter_mesure($colonneBdd, $id_test, $val){
     $bdd=connect_bdd();
     $requete=$bdd->prepare('UPDATE test SET :colonne=:val WHERE id_test=:id');
     $requete->execute(array(
         'colonne'=>$colonneBdd,
         'val'=>$val,
         'id'=>$id_test
     ));
}

function create_test($email, $id_session){
     $bdd=connect_bdd();
     $requete=$bdd->prepare('INSERT INTO test(mail_candidat,id_session) VALUES (:mail, :id) ');
     $requete->execute(array(
         'mail'=>$email,
         'id'=> $id_session
         ));
}