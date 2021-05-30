<h1>Mot de passe oublié</h1>
<form method="post" action="index.php?cible=utilisateurs&fonction=mdp_oublie">
    <label>Adresse mail :<br>
        <input type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required pattern ="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
    </label>
    <input type="submit" value="Envoyer un lien de réinitialisation" class="buttonForm">
</form>
