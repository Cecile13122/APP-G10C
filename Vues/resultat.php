<?php
if (isset($resultats_candidat) && !empty($resultats_candidat)) {
    $resultats_candidat = $resultats_candidat[0];
} else {

    $resultats_candidat = [
        'id_test' => null,
        'mail_candidat' => null,
        'id_session' => '-',
        'date_test' => null,
        'frequence_cardiaque' => '-',
        'temperature' => '-',
        'tonalite' => '-',
        'frequence_cardiaque_bis' => '-',
        'temperature_bis' => '-',
        'stimulus_visuel' => '-',
        'stimulus_audio' => '-'];
}
?>
<div class="main">
    <h2><?= $profil['prenom'] . " " . strtoupper($profil['nom']) ?> 
        Session <?php if (isset($resultats_candidat)) {
            echo $resultats_candidat['id_session'];
        } ?> </h2>
    <table class="testT">
        <tr class="test">
            <td class="test">
                <h3>Condition Physique</h3>
                <ul>
                    <li class="left">Fréquence cardiaque :</li>
                    <li class="result"><?= $resultats_candidat['frequence_cardiaque'] ?> bpm</li>
                    <li class="left">Température de la peau :</li>
                    <li class="result"><?= $resultats_candidat['temperature'] ?> °</li>
                    <li class="left">Reconnaissance de tonalité :</li>
                    <li class="result"><?= $resultats_candidat['tonalite'] ?> %</li>
                </ul>
            </td>
            <td class="test">
                <h3>Stress</h3>
                <ul>
                    <li class="left">Modification du rythme cardiaque :</li>
                    <li class="result"><?php if (is_numeric($resultats_candidat['frequence_cardiaque'])) {
                            echo calcul_modif_cardiaque($resultats_candidat['frequence_cardiaque'], $resultats_candidat['frequence_cardiaque_bis']);
                        } else {
                            echo '-';
                        } ?> bpm
                    </li>
                    <li class="left">Modification de la température de peau :</li>
                    <li class="result"><?php if (is_numeric($resultats_candidat['temperature'])) {
                            echo calcul_modif_temperature($resultats_candidat['temperature'], $resultats_candidat['temperature_bis']);
                        } else {
                            echo '-';
                        }
                        ?>
                        %
                    </li>
                </ul>
            </td>
        </tr>
        <tr class="test">
            <td class="test">
                <h3>Réflexe</h3>
                <ul>
                    <li class="left">Réaction à un stimuli sonore :</li>
                    <li class="result"><?= $resultats_candidat['stimulus_audio'] ?> ms</li>
                    <li class="left">Réaction à un stimuli visuel :</li>
                    <li class="result"><?= $resultats_candidat['stimulus_visuel'] ?> ms</li>
                </ul>
            </td>
            <td class="test">
                <h3>Conclusion</h3>
                <p><?php if (is_numeric($resultats_candidat['temperature'])){

                    echo calcul_resultat($resultats_candidat['id_test']) ;}
                    else {echo 'En attente.';}?></p>
            </td>
        </tr>
    </table>
</div>
