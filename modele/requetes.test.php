<?php
/**
 * Liste des fonctions spécifiques à la table des tests
 */

 //on définit le nom de la table
 $table = "test";

 // on récupère les requêtes génériques
 include_once('requetes.generiques.php');
 include_once('requetes.utilisateurs.php');

 /**
  * Insère un nouveau test dans la table
  * @param PDO $bdd
  * @param array $values
  * @param string $table
  * @return boolean
  */
 function enregistrer_resultats(PDO $bdd, array $values, string $table): bool{
     return insertion($bdd, $values, $table);
 }

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
