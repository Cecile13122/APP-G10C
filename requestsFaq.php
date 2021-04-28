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