<h1>Modifier son mot de passe</h1>
<form method="post" action="index.php?cible=utilisateurs&fonction=modification_profil">
    <table>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe actuel :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="nmdp">Nouveau mot de passe :</label></td>
            <td><input type="password" id="nmdp" name="nouveau_mdp" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cnmdp">Confirmation de nouveau mot de passe :</label></td>
            <td><input type="password" id="cnmdp" name="conf_nouveau_mdp" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$"></td>
        </tr>
    </table>
    <input type="submit" value="Envoyer" class="buttonForm">
</form>
