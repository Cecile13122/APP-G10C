<h1>Modifier son mot de passe</h1>
<h2><?php if(isset($erreur)&&!empty($erreur)){echo $erreur;} ?></h2>
<form method="post" action="index.php?cible=utilisateurs&fonction=modification_mdp">
    <table>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe actuel :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
                       ></td>
        </tr>
        <tr>
            <td class="critere"><label for="nmdp">Nouveau mot de passe :</label></td>
            <td><input type="password" id="nmdp" name="nouveau_mdp" placeholder="********" class="inputForm" required
                       oninput="verificationMdp(this.value, this.id)"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cnmdp">Confirmation de nouveau mot de passe :</label></td>
            <td><input type="password" id="cnmdp" name="conf_nouveau_mdp" placeholder="********" class="inputForm" required
                       oninput="verificationConfirmationMdp(this.value, this.id, document.getElementById('nmdp').value, 'nmpd')"></td>
        </tr>
        <tr><td></td>
            <td><span id="err_nmdp"></span></td>

        </tr>
    </table>
    <button id="btn" type="submit" value="Envoyer" class="buttonForm">Envoyer</button>
</form>

<!-- faire bouton retour-->
