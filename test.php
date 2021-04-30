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
    <table class="nouvTest">
        <tr>
            <td><h1>Nouveau test</h1></td>
            <td><h1>Configuration session</h1></td>
        </tr>
        <tr>
            <td class="lanceTest">
                <form method="post" action="controlTest.php">
                    <input class="inputForm" type="text" name="mail" placeholder="Adresse mail candidat" required
                           pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                    <br>
                    <input class="inputForm" type="text" name="n_session" placeholder="Numéro de session" required
                           pattern="/d+">
                    <br>
                    <input type="submit" class="buttonForm" value="Lancer la série de tests">
                </form>
            </td>
            <td class="configSession">
                <form method="post" action="controlSession.php">

                    <input type="text" class="inputForm" name="n_session" placeholder="Numéro de session" required
                           pattern="/d+"><br>
                    Nouvelle session? <a class="underline" href>Générer un numéro de session.</a><br>
                    <ul>
                        <li><h2>Seuils</h2></li>
                        <li>Fréquence cardiaque (bpm):</li>
                        <li class="genre">Homme <input type="number" name="frequence_cardiaque_h" min="50" max="75" value="75" required>
                            Femme <input type="number" name="frequence_cardiaque_f" min="50" max="80" value="80" required pattern="/d{2}"></li>

                        <li>Température de la peau (°C):
                            <input type="number" name="temperature" min="24" max="35" value="35" required pattern="/d{2}">
                            </li>

                        <li>Reconnaissance de la tonalité (%): <input type="number" name="tonalite" min="70"
                                                                      max="100" value="70" required pattern="/d{2,3}"></li>

                        <li>Différence de fréquence cardiaque (bpm): <input type="number" name="dif_frequence_cardiaque" min="0"
                                                                          max="20" value="20" required pattern="/d{1,2}"></li>

                        <li>Différence de température (%): <input type="number" name="dif_temperature" min="0" max="10"
                                                                  value="10" required pattern="/d{1,2}"></li>

                        <li>Temps de réaction à un stimuli sonore (ms): <input type="number" name="stimulus_sonore"
                                                                               min="0" max="225" value="225" required pattern="/d{2,3}"></li>

                        <li>Temps de réaction à un stimuli visuel (ms): <input type="number"  name="stimulus_visuel"
                                                                               min="0" max="250" value="250"  required pattern="/d{2,3}"></li>

                        <li><input class="buttonForm" type="submit" value="Confirmer"></li>
                        <li><input type="submit" class="buttonForm" value="Clôturer la session"></li>
                </form>

                </ul>
            </td>
        </tr>
    </table>
</div>
<div class="footer">
    <a href="CGU.html">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a> | <a href="planDuSite.php">Plan du
        site</a>
</div>
</body>
</html>
