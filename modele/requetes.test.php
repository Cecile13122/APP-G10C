<?php
/**
 * Liste des fonctions spécifiques à la table des tests
 */


 // on récupère les requêtes génériques
 include_once('requetes.generiques.php');
 include_once('requetes.utilisateurs.php');

 function recuperation_candidats_session($id){
   $bdd=connect_bdd();
   $requete=$bdd->prepare('SELECT * FROM test WHERE id_session ='.$id);
   $requete->execute();
   $candidats=[];
   while($candidat = $requete->fetch()){
       $candidats[]=$candidat;
   }
   return $candidats;
 }
 ?>
