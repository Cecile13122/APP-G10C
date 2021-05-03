<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION)){
    include_once("headerNonConnecte.php");
}
elseif($_SESSION['role']=="candidat"){
    include_once("headerCandidat.php");}
elseif ($_SESSION['role']=="recruteur"){
    include_once("headerRecruteur.php");
}
?>
  <div class="main">
    <h1>Bienvenue</h1>
    <p>Sur ce site vous trouverez vos résultats aux différents tests. Une fois que tous les candidats de votre session auront passé les tests vous saurez si vous êtes admis pour la prochaine phase de recrutement.</p>


<br><br>
  <p>Il est important de mesurer les réflexes d’un futur pilote d'hélicoptère. En effet, tout le monde n’a pas les mêmes aptitudes, et dans le cadre des réflexes et du temps de réaction, la part de l’innée est très importante et l’entraînement ne permet pas de rattraper toutes les lacunes. Il est donc très important d’écarter grâce aux tests psychotechniques ceux qui ne pourront jamais obtenir les aptitudes requises.  Pour cela, on va par exemple mesurer la capacité du candidat à reconnaître une tonalité et à la répéter. Cette mesure donnera par exemple un aperçu de la validation opérationnelle d’un candidat face à des bruits extérieurs ayant des fréquences différentes, que l’on peut assimiler à différentes sonneries d’alarmes. On testera aussi ses reflex à l’aide de stimuli sonore ou visuel. La gestion du stress est aussi un élément important dans la vie d’un militaire, c’est pourquoi différents tests permettent de la mesurer.</p>

</div>
<div class="footer">
  <a href="cgu.php">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.php">Plan du site</a>
</div>
</body>
</html>
