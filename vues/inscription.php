<h1>Inscription</h1>
<form method="post" action="index.php?cible=utilisateurs&fonction=inscription">
    <table>
        <tr>
            <td class="critere"><label for="monsieur">Civilité :</label></td>
            <td colspan="2"><input name="genre" type="radio" id="monsieur" value="M" class="inputForm" required> <label
                    for="monsieur">M.</label><input name="genre" type="radio" id="madame" value="F" class="inputForm"
                                                    required> <label for="madame">Mme</label></td>
        </tr>
        <tr>
            <span id="err_nom"></span>
        </tr>
        <tr>
            <td class="critere"><label for="firstname">Prénom :</label></td>
            <td><input id="firstname" type="text" name="prenom" placeholder="Prénom" class="inputForm" required
                       pattern="^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="name">Nom :</label></td>
            <td><input id="name" type="text" name="nom" placeholder="Nom" class="inputForm" required
                       pattern="^[A-Za-zÜ-ü'-]+( *[A-Za-zÜ-ü'-]+)*$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="naissance">Né(e) le :</label></td>
            <td><input type="date" id="naissance" name="date_naissance" placeholder="Date de naissance"
                       class="inputForm" required></td>
        </tr>
        <tr>
            <td class="critere"><label for="tel"> Numéro de téléphone :</label></td>
            <td><input type="text" id="tel" name="telephone" placeholder="+ 33 _ __ __ __ __" class="inputForm"
                       required pattern="(0|\+33) *[1-9]( *[0-9]{2}){4}"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cp">Code postal :</label></td>
            <td><input type="text" id="cp" name="code_postal" placeholder="______" class="inputForm" required
                       pattern="\d{5,6}"></td>
        </tr>
        <tr>
            <td class="critere"><label for="mail">Adresse mail :</label></td>
            <td><input id="mail" type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required
                       pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
            </td>
        </tr>
        <tr>
            <td class="critere"><label for="cmail">Confirmation d'adresse mail :</label></td>
            <td><input id="cmail" type="email" name="confemail" placeholder="exemple@mail.com" class="inputForm"
                       required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"></td>
        </tr>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$">
            </td>
        </tr>
        <tr>
            <td class="critere"><label for="cmdp">Confirmation de mot de passe :</label></td>
            <td><input type="password" id="cmdp" name="confirmation_mdp" placeholder="********" class="inputForm"
                       required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$">
            </td>
        </tr>
        <tr>
            <td colspan="2"><label for="cgu"><input type="checkbox" id="cgu" name="CGU" value="oui" required> J'accepte
                les conditions d'utilisation.</label></td>
    </table>
    <p>Déjà un compte ? <a href="index.php?cible=utilisateurs&fonction=connexion" class="underline">Se connecter.</a></p>
    <input type="submit" value="Envoyer" class="buttonForm">
</form>
