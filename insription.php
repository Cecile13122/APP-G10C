<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Inscription</title>
</head>
<body>
<header>
    <img src="logo.png" alt="Logo d'ATC">
</header>
<main>
    <h1>Inscription</h1>
    <form>
        <label for="genre">Civilité</label>
        <input name="genre" type="radio" id="monsieur" value="M" required> <label for="monsieur">M.</label>
        <input name="genre" type="radio" id="madame" value="F" required> <label for="madame">Mme</label>
        <br>

        <label for="firstname">
            <input id="firstname"type="text" name="prenom" placeholder="Prénom" required>
        </label>
        <br>

        <label for="name">
            <input id="name"type="text" name="nom" placeholder="Nom" required>
        </label>
        <br>

        <label for="naissance">Né(e) le <input type="date" id="naissance" name="dateDeNaissance" placeholder="Date de naissance" required></label>
        <br>

        <label for="tel"> Numéro de téléphone :
            <input type="text" id="tel" name="telephone" placeholder="+ 33 _ __ __ __ __" required>
        </label>
        <br>
        <label for="cp">Code postal :
            <input type="number" id="cp" name="codePostal" placeholder="Code postal" required>
        </label>
        <br>

        <label for ="mail">Adresse mail :
            <input id="mail" type="email" name="email" placeholder="exemple@mail.com" required>
        </label>
        <br>

        <label for="cmail">Confirmation d'adresse mail :
            <input id="cmail" type="email" name="confemail" placeholder="exemple@mail.com" required>
        </label>
        <br>
        <label for="mdp">Mot de passe :
            <input type="password" id="mdp" name="motDePasse" placeholder="Mot de Passe" required>
        </label>
        <br>
        <label for="cmdp">Confirmation de mot de passe :
            <input type="password" id="cmdp" name="confmotDePasse" placeholder="Confirmation Mot de Passe" required>
        </label>
        <br>

        <label for="cgu"><input type="checkbox" id="cgu" name="CGU" value="oui" required> J'accepte les conditions d'utilisation</label>
        <br>
        <input type="submit" value="Envoyer">

    </form>
</main>
</body>
</html>