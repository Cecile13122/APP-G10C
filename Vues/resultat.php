<div class="main">
    <h2><?= $_SESSION['prenom'] . " " . strtoupper($_SESSION['nom']) ?> -
        Session <?php if (isset($resultats_candidat)) {
                foreach ($resultats_candidat as $resultat):?>
                <form method="post" action="index.php?cible="
                <select name="test"><option value="<?=$resultat['id_session']?>"><?=$resultat['id_session']?></option> </select>
                <?php endforeach;
        } ?> </h2>
    <table class="resultat">
        <tr>
            <td class="test">
                <h3>Condition Physique</h3>
                <ul>
                    <li class="left">Fréquence cardiaque :</li>
                    <li class="result"><?=$resultats_candidat['frequence_cardiaque']?> bpm</li>
                    <li class="left">Température de la peau :</li>
                    <li class="result"><?=$resultats_candidat['temperature']?> °</li>
                    <li class="left">Reconnaissance de tonalité :</li>
                    <li class="result"><?=$resultats_candidat['tonalite']?> %</li>
                </ul>
            </td>
            <td class="test">
                <h3>Stress</h3>
                <ul>
                    <li class="left">Modification du rythme cardiaque :</li>
                    <li class="result"><?php calcul_modif_cardiaque($resultats_candidat['freqence_cardiaque'],$resultats_candidat['freqence_cardiaque_bis'])?> bpm</li>
                    <li class="left">Modification de la température de peau :</li>
                    <li class="result"><?php calcul_modif_temperature($resultats_candidat['freqence_cardiaque'],$resultats_candidat['freqence_cardiaque_bis'])?> %</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="test">
                <h3>Reflex</h3>
                <ul>
                    <li class="left">Réaction à un stimuli sonore :</li>
                    <li class="result"><?=$resultats_candidat['stimulus_sonore']?> ms</li>
                    <li class="left">Réaction à un stimuli visuel :</li>
                    <li class="result"><?=$resultats_candidat['stimulus_visuel']?> ms</li>
                </ul>
            </td>
            <td class="test">
                <h3>Conclusion</h3>
                <p><?php calcul_resultat($resultats_candidat['id_test'])?></p>
            </td>
        </tr>
    </table>
</div>
