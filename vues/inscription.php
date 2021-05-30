<script src="verificationFormulaire.js" type="text/javascript"></script>

<h1>Inscription</h1>
<form method="post" action="index.php?cible=utilisateurs&fonction=inscription">
    <table>
        <tr>
            <td class="critere"><label for="monsieur">Civilité :</label></td>
            <td colspan="2"><input name="genre" type="radio" id="monsieur" value="M" class="inputForm" required> <label
                        for="monsieur">M.</label><input name="genre" type="radio" id="madame" value="F"
                                                        class="inputForm"
                                                        required> <label for="madame">Mme</label></td>
        </tr>
        <tr>
            <td class="critere"><label for="firstname">Prénom :</label></td>
            <td><input id="firstname" type="text" name="prenom" placeholder="Prénom" class="inputForm" required
                       oninput='verificationNom(this.value, this.id)'></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_firstname"></span></td>
        </tr>
        <tr>
            <td class="critere"><label for="name">Nom :</label></td>
            <td><input id="name" type="text" name="nom" placeholder="Nom" class="inputForm" required
                       oninput='verificationNom(this.value, this.id)'></td>
        </tr>
        <tr>
            <td></td>
           <td><span id="err_name"></span></td>
        </tr>
        <tr>
            <td class="critere"><label for="naissance">Né(e) le :</label></td>
            <td><input type="date" id="naissance" name="date_naissance" placeholder="Date de naissance"
                       class="inputForm" required onchange='verificationDate(this.value, this.id)'></td>
        </tr>
        <tr><td></td>
            <td><span id="err_naissance"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="tel"> Numéro de téléphone :</label></td>
            <td><input type="text" id="tel" name="telephone" placeholder="+ 33 _ __ __ __ __" class="inputForm"
                       required pattern="(0|\+33) *[1-9]( *[0-9]{2}){4}" oninput='verificationNumero(this.value, this.id )'></td>
        </tr>
        <tr><td></td>
            <td><span id="err_tel"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="cp">Code postal :</label></td>
            <td><input type="text" id="cp" name="code_postal" placeholder="______" class="inputForm" required
                       oninput='verificationPostal(this.value, this.id)'></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_cp"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="mail">Adresse mail :</label></td>
            <td><input id="mail" type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required
                       oninput="verificationMail(this.value, this.id)" >
            </td>
        </tr>
        <tr>
            <td class="critere"><label for="cmail">Confirmation d'adresse mail :</label></td>
            <td><input id="cmail" type="email" name="confemail" placeholder="exemple@mail.com" class="inputForm"
                       required oninput="verificationConfirmationMail(this.value, this.id, document.getElementById('mail').value, 'mail')"></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_mail"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
                       oninput="verificationMdp(this.value, this.id)">
            </td>
        </tr>
        <tr>
            <td class="critere"><label for="cmdp">Confirmation de mot de passe :</label></td>
            <td><input type="password" id="cmdp" name="confirmation_mdp" placeholder="********" class="inputForm"
                       required oninput="verificationConfirmationMdp(this.value, this.id, document.getElementById('mdp').value, 'mdp')">
            </td>
        </tr>
        <tr><td></td>
            <td><span id="err_mdp"></span></td>

        </tr>
        <tr>
            <td colspan="2"><label for="cgu"><input type="checkbox" id="cgu" name="CGU" value="oui" required> J'accepte
                    les conditions d'utilisation.</label></td>
    </table>
    <p>Déjà un compte ? <a href="index.php?cible=utilisateurs&fonction=connexion" class="underline">Se connecter.</a>
    </p>
    <input type="submit" value="Envoyer" class="buttonForm">
</form>