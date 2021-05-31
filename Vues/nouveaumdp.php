<h1>Modifier son mot de passe</h1>
<h2><?php if(isset($erreur)&&!empty($erreur)){echo $erreur;} ?></h2>
<form method="post" action="index.php?cible=utilisateurs&fonction=reinitialisation_mdp">
    <table>
        <tr>
            <td class="critere"><label for="nmdp">Nouveau mot de passe :</label></td>
            <td><input type="password" id="nmdp" name="nouveau_mdp" placeholder="********" class="inputForm" required
                       oninput="verificationMdp(this.value, this.id)"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cnmdp">Confirmation de nouveau mot de passe :</label></td>
            <td><input type="password" id="cnmdp" name="conf_nouveau_mdp" placeholder="********" class="inputForm" required
                       oninput="verificationConfirmationMdp(this.value, this.id, document.getElementById('nmdp').value, 'nmdp')"></td>
        </tr>
        <tr><td></td>
        <td><span id="err_nmdp"></span></td></tr>
    </table>
    <input type="submit" value="Envoyer" class="buttonForm">
</form>
