<?php
if (isset($resultats_candidat)){
    $profil=recuperation_profil($resultats_candidat[0]['mail_candidat']);
}
?>
<div class="main">
    <h2><?= $profil['prenom'] . " " . strtoupper($profil['nom']) ?> -
        Session <?php if (isset($resultats_candidat)) {
                foreach ($resultats_candidat as $resultat):?>
                <select name="test" ><option value="<?=$resultat['id_session']?>"><?=$resultat['id_session']?></option> </select>
                <?php endforeach;
        } ?> </h2>
    <table class="resultat">
        <tr>
            <td class="test">
                <h3>Condition Physique</h3>
                <ul>
                    <li class="left">Fréquence cardiaque :</li>
                    <li class="result"><?=$resultats_candidat[0]['frequence_cardiaque']?> bpm</li>
                    <li class="left">Température de la peau :</li>
                    <li class="result"><?=$resultats_candidat[0]['temperature']?> °</li>
                    <li class="left">Reconnaissance de tonalité :</li>
                    <li class="result"><?=$resultats_candidat[0]['tonalite']?> %</li>
                </ul>
            </td>
            <td class="test">
                <h3>Stress</h3>
                <ul>
                    <li class="left">Modification du rythme cardiaque :</li>
                    <li class="result"><?= calcul_modif_cardiaque($resultats_candidat[0]['frequence_cardiaque'],$resultats_candidat[0]['frequence_cardiaque_bis'])?> bpm</li>
                    <li class="left">Modification de la température de peau :</li>
                    <li class="result"><?= calcul_modif_temperature($resultats_candidat[0]['frequence_cardiaque'],$resultats_candidat[0]['frequence_cardiaque_bis'])?> %</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td class="test">
                <h3>Reflex</h3>
                <ul>
                    <li class="left">Réaction à un stimuli sonore :</li>
                    <li class="result"><?=$resultats_candidat[0]['stimulus_audio']?> ms</li>
                    <li class="left">Réaction à un stimuli visuel :</li>
                    <li class="result"><?=$resultats_candidat[0]['stimulus_visuel']?> ms</li>
                </ul>
            </td>
            <td class="test">
                <h3>Conclusion</h3>
                <p><?= calcul_resultat($resultats_candidat[0]['id_test'])?></p>
            </td>
        </tr>
    </table>
</div>
