<?php
require_once ('requestsConnexion.php');

function recuperation_faq(){
    $bdd=connect_bdd();
    $requete_faq=$bdd->prepare('SELECT * FROM faq ORDER BY theme');
    $requete_faq->execute();
    $info_theme=[];
    $info_faq=[];
    $requete_theme=$bdd->prepare('SELECT DISTINCT theme FROM faq');
    $requete_theme->execute();
    while ($donnee_theme= $requete_theme->fetch()){
        $info_theme[]=$donnee_theme;
    }
    while ($donne_faq=$requete_faq->fetch()){
        $info_faq[]=$donne_faq;
    }
    return array($info_theme, $info_faq);
}

function ajout_question($theme, $question, $reponse){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('INSERT INTO faq (id_faq, theme, question, reponse) VALUES (NULL, :theme, :question, :reponse)');
    $requete->execute(array(
        'theme'=>$theme,
    'question'=>$question,
    'reponse'=>$reponse
    ));
}

function affiche_faq(){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('SELECT * FROM faq ORDER BY theme');
    $requete->execute();
    $faq=[];
    while($donnee_faq = $requete->fetch()){
        $faq[]=$donnee_faq;
    }
    return $faq;
}

function effacer_question($id){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('DELETE faq FROM faq WHERE id_faq=?');
    $requete->execute(array($id));
}

function modifier_question($id, $theme, $question, $reponse){
    $bdd=connect_bdd();
    $requete=$bdd->prepare('UPDATE faq SET theme=:theme, question=:question, reponse=:reponse WHERE id_faq=:id');
    $requete->execute(array(
        'theme'=> $theme,
        'question'=>$question,
        'reponse'=>$reponse,
        'id'=>$id));
}

