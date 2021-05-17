<?php
session_start();

if (empty($_SESSION)) {
    include_once("headerNonConnecte.php");
} elseif ($_SESSION['role'] == "candidat") {
    include_once("headerCandidat.php");
} elseif ($_SESSION['role'] == "recruteur") {
    include_once("headerRecruteur.php");
}
?>
<div class="main">
    <table>
        <tr>
            <td><h1>Nos informations</h1></td>
            <td><h1>Formulaire de contact</h1></td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li>+33 _ __ __ __ __</li>
                    <li>10 rue de Vanves</li>
                    <li>92 130 Issy-Les Moulineaux</li>
                    <li><img src="../Images/map.png" alt="Plan" class="plan"></li>
                </ul>
            </td>
            <td>
                <form method="post" action="../Controler/controlContact.php">
                    <input type="text" placeholder="Prénom Nom" name="nom" class="inputForm" required><br>
                    <input type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required><br>
                    <br>
                    <input type="text" placeholder="Sujet" name="sujet" class="inputForm" required><br>
                    <textarea class="inputMessage" name="message" placeholder="Votre message" required></textarea>
                    <br>
                    <input type="submit" value="Envoyer" class="buttonForm">
                </form>
            </td>
        </tr>
    </table>
</div>
<div class="footer">
    <a href="cgu.php">CGU</a> | <a href="mentionsLegales.php">Mentions Légales</a> | <a href="planDuSite.php">Plan du
        site</a>
</div>
</body>
</html>