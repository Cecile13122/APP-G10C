<?php
require_once ('requestsConnexion.php');

function recuperation_faq(){
    $bdd=connect_bdd();
    $requete_faq=$bdd->prepare('SELECT * FROM faq ORDER BY theme');
    $requete_faq->execute();
    $info_faq=[];
    $requete_theme=$bdd->prepare('SELECT DISTINCT theme FROM faq');
    $requete_theme->execute();
    while ($donnee_theme= $requete_theme->fetch()){
        $info_faq[]=$donnee_theme;
    }
    while ($donne_faq=$requete_faq->fetch()){
        foreach ($info_faq as $theme){
            if($donne_faq['theme']==$theme){
                array_push($info_faq[$theme]);
            }
        }
    }
}