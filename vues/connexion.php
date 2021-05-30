<h1>Connexion</h1>
      <form method="post" action="index.php?cible=utilisateurs&fonction=connexion">
        <label>Adresse mail :<br>
            <input type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required pattern ="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
        </label>
        <br>
        <label>Mot de passe :<br>
            <input type="password" name="mot_de_passe" placeholder="********" class="inputForm" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\._-])[A-Za-z\d@$!%*?&\._-]{8,}$">
        </label><br>
        <span class="erreur"><?php
              if (isset($_GET['err'])) {
    if ($_GET['err'] == 1) {
        echo "Votre identifiant et/ou votre mot de passe sont incorrects.";
    }
}?>
          </span>
          <a href="index.php?cible=utilisateurs&fonction=mdp_oublie" class="underline">Mot de passe oublié ?</a>
        <p>Pas encore de compte ? <a href="index.php?cible=utilisateurs&fonction=inscription" class="underline">S'inscrire.</a></p>
        <input type="submit" value="Envoyer" class="buttonForm">
      </form>

      <!--enlever fonction-->
