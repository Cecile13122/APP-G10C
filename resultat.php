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
    <h2>Luc Colin - Session 1202</h2>
    <table class="resultat">
        <tr>
            <td class="test">
                <h3>Condition Physique</h3>
                <ul>
                    <li class="left">Fréquence cardiaque :</li>
                    <li class="result">- bpm</li>
                    <li class="left">Température de la peau :</li>
                    <li class="result">- °</li>
                    <li class="left">Reconnaissance de tonalité :</li>
                    <li class="result">- %</li>
                </ul>
            </td>
            <td class="test">
                <h3>Stress</h3>
                <ul>
                    <li class="left">Modification du rythme cardiaque :</li>
                    <li class="result">- %</li>
                    <li class="left">Modification de la température de peau :</li>
                    <li class="result">- %</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="test">
                <h3>Reflex</h3>
                <ul>
                    <li class="left">Réaction à un stimuli sonore :</li>
                    <li class="result">- ms</li>
                    <li class="left">Réaction à un stimuli visuel :</li>
                    <li class="result">- ms</li>
                </ul>
            </td>
            <td class="test">
                <h3>Conclusion</h3>
                <p>En attente.</p>
            </td>
        </tr>
    </table>
</div>
<div class="footer">
    <a href="CGU.html">CGU</a>  |  <a href="mentionsLegales.php">Mentions Légales</a>  |  <a href="planDuSite.php">Plan du site</a>
</div>
</body>
</html>

