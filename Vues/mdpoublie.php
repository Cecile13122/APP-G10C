<h1>Mot de passe oublié</h1>
<h2><?php if(isset($erreur)&&!empty($erreur)){echo $erreur;} ?></h2>
<div class="mainForm">
<form method="post" action="index.php?cible=utilisateurs&fonction=mdp_oublie">
    <label>Adresse mail :<br>
        <input type="email" id="mail" name="email" placeholder="exemple@mail.com" class="inputForm" required oninput="verificationMail(this.value, this.id)">
    </label>
    <span id="err_mail"></span>
    <button id="btn" type="submit" value="Envoyer un lien de réinitialisation" class="buttonForm">Envoyer un lien de réinitialisation</button>
</form>
</div>
