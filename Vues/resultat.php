    <div class="main">
      <h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])?> - Session 1202</h2>
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
