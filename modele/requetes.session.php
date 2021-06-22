<?php
/**
 * Liste des fonctions spécifiques à la table des sessions
 */


 // on récupère les requêtes génériques
 include_once('requetes.generiques.php');
 include_once('requetes.utilisateurs.php');

 function recuperer_session_recruteur($mail){
   $bdd =connect_bdd();
   $requete = $bdd->prepare('SELECT * FROM session_test WHERE mail_recruteur = ?');
   $requete->execute(array($mail));
   $sessions=[];
   while ($donnees=$requete->fetch()){
       $sessions[]=$donnees;
   }
   return $sessions;
 }

 function recuperer_session($id){
   $bdd =connect_bdd();
   $requete = $bdd->prepare('SELECT * FROM session_test WHERE id_session =?');
   $requete->execute(array($id));
   $infos_session = $requete->fetch();
   return $infos_session;
 }

function create_session($mail_recruteur, $seuil_frequence_cardiaque_h,$seuil_frequence_cardiaque_f,$seuil_temperature,$seuil_tonalite,$seuil_dif_frequence_cardiaque,$seuil_dif_temperature,$seuil_stimulus_audio,$seuil_stimulus_visuel){
   $bdd=connect_bdd();
   $requete = $bdd->prepare('INSERT INTO session_test(mail_recruteur, seuil_frequence_cardiaque_h,seuil_frequence_cardiaque_f,seuil_temperature,seuil_tonalite,seuil_dif_frequence_cardiaque,seuil_dif_temperature,seuil_stimulus_audio,seuil_stimulus_visuel,session_finie) VALUES (:mail_recruteur, :seuil_frequence_cardiaque_h,:seuil_frequence_cardiaque_f,:seuil_temperature,:seuil_tonalite,:seuil_dif_frequence_cardiaque,:seuil_dif_temperature,:seuil_stimulus_audio,:seuil_stimulus_visuel,0)');
   $requete->execute(array(
       'mail_recruteur' => $mail_recruteur,
       'seuil_frequence_cardiaque_h' => $seuil_frequence_cardiaque_h,
       'seuil_frequence_cardiaque_f' => $seuil_frequence_cardiaque_f,
       'seuil_temperature' => $seuil_temperature,
       'seuil_tonalite' => $seuil_tonalite,
       'seuil_dif_frequence_cardiaque' => $seuil_dif_frequence_cardiaque,
       'seuil_dif_temperature' => $seuil_dif_temperature,
       'seuil_stimulus_audio' => $seuil_stimulus_audio,
       'seuil_stimulus_visuel' => $seuil_stimulus_visuel,
      'session_finie' => 0));
 }

 function modifier_session($mail_recruteur, $seuil_frequence_cardiaque_h,$seuil_frequence_cardiaque_f,$seuil_temperature,$seuil_tonalite,$seuil_dif_frequence_cardiaque,$seuil_dif_temperature,$seuil_stimulus_audio,$seuil_stimulus_visuel,$id_session,$session_finie){
   $bdd=connect_bdd();
   $requete = $bdd->prepare('UPDATE session_test SET mail_recruteur =:mail_recruteur, seuil_frequence_cardiaque_h =:seuil_frequence_cardiaque_h,seuil_frequence_cardiaque_f=:seuil_frequence_cardiaque_f,seuil_temperature=:seuil_temperature,seuil_tonalite=:seuil_tonalite,seuil_dif_frequence_cardiaque=:seuil_dif_frequence_cardiaque,seuil_dif_temperature=:seuil_dif_temperature,seuil_stimulus_audio=:seuil_stimulus_audio,seuil_stimulus_visuel=:seuil_stimulus_visuel,session_finie=:session_finie WHERE id_session=:id_session');
   $requete->execute(array(
       'mail_recruteur' => $mail_recruteur,
       'seuil_frequence_cardiaque_h' => $seuil_frequence_cardiaque_h,
       'seuil_frequence_cardiaque_f' => $seuil_frequence_cardiaque_f,
       'seuil_temperature' => $seuil_temperature,
       'seuil_tonalite' => $seuil_tonalite,
       'seuil_dif_frequence_cardiaque' => $seuil_dif_frequence_cardiaque,
       'seuil_dif_temperature' => $seuil_dif_temperature,
       'seuil_stimulus_audio' => $seuil_stimulus_audio,
       'seuil_stimulus_visuel' => $seuil_stimulus_visuel,
     'id_session'=>$id_session,
     'session_finie' => $session_finie));
 }

function calcul_candidats($id){
  $bdd =connect_bdd();
  $requete = $bdd->prepare('SELECT COUNT(id_session) FROM test WHERE id_session ='.$id);
  $requete->execute();
  $nombre_candidat = $requete->fetch();
  return $nombre_candidat;
}

function cloturer_session($id){
    $bdd=connect_bdd();
    $requete = $bdd->prepare('UPDATE session_test SET session_finie=:session_finie WHERE id_session=:id_session');
    $requete->execute(array('session_finie' => "Finie", 'id_session'=>$id));

}
function generer_session($mail){
    $bdd=connect_bdd();
    $requete = $bdd->prepare('INSERT INTO session_test(id_session, mail_recruteur) VALUES (NULL, ?)');
    $requete->execute(array($mail));
}
