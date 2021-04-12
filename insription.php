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
        <input type="text" name="prenom" value="Prénom">
        <input type="text" name="nom" value="Nom">
        <br>
        <label for="naissance">Né(e) le <input type="date" id="naissance" name="dateDeNaissance"></label>
        <br>
        <label for="tel"> Numéro de téléphone :<br>
            <input type="number" id="tel" name="telephone">
        </label>
        <br>
        <label for="genre">Genre à la naissance</label>
        <br>
        <select name="sexe" id="genre" >
            <option value="F">Féminin</option>
            <option value="M">Masculin</option>
        </select>
        <br>
        <label for="cp">Code postal :
            <br>
            <input type="number" id="cp" name="codePostal" value="Code Postal">
        </label>
        <br>
        <input type="email" name="email" value="exemple@mail.com">
        <br>
        <input type="email" name="confemail" value="exemple@mail.com">
        <br>
        <label for="mdp">Mot de passe <br>
            <input type="password" id="mdp" name="motDePasse" value="Mot de Passe">
        </label>
        <br>
        <label for="cmdp">Confirmation de mot de passe <br>
            <input type="password" id="cmdp" name="confmotDePasse" value="Confirmation Mot de Passe">
        </label>
        <br>
        <label for="cgu"><input type="checkbox" id="cgu" name="CGU" value="oui"> J'accepte les conditions d'utilisation</label>
        <br>
        <input type="submit" value="Envoyer">

    </form>
</main>
</body>
</html>