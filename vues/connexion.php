<script src="verificationFormulaire.js" type="text/javascript"></script>

<h1>Connexion</h1>
      <form method="post" action="index.php?cible=utilisateurs&fonction=connexion">
        <label>Adresse mail :<br>
            <input type="email" id="mail" name="email" placeholder="exemple@mail.com" class="inputForm" required oninput="verificationMail(this.value, this.id)">
        </label>
        <br>
          <span id="err_mail"></span><br>
        <label>Mot de passe :<br>
            <input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required>
        </label><br>
        <span id="err_mdp">
          </span>
          <br>
          <a href="index.php?cible=utilisateurs&fonction=mdp_oublie" class="underline">Mot de passe oublié ?</a>
        <p>Pas encore de compte ? <a href="index.php?cible=utilisateurs&fonction=inscription" class="underline">S'inscrire.</a></p>
        <input type="submit" value="Envoyer" class="buttonForm">
      </form>

      <!--enlever fonction-->
