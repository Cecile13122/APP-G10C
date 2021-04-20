<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Modification information</title>
</head>
<body>
<header>
    <img src="logo.png" alt="Logo d'ATC">
</header>
<main>
    <h1>Modifier ses informations</h1>
    <form>
        <input type="text" name="prenom" value="Prénom" required>
        <input type="text" name="nom" value="Nom" required>
        <br>
        <label for="naissance">Né(e) le <input type="date" id="naissance" name="dateDeNaissance" required></label>
        <br>
        <label for="tel"> Numéro de téléphone :<br>
            <input type="number" id="tel" name="telephone" required>
        </label>
        <br>
        <label for="genre">Genre à la naissance</label>
        <br>
        <select name="sexe" id="genre" required>
            <option value="F">Féminin</option>
            <option value="M">Masculin</option>
        </select>
        <br>
        <label for="cp">Code postal :
            <br>
            <input type="number" id="cp" name="codePostal" value="Code Postal" required>
        </label>
        <br>
        <input type="email" name="email" value="exemple@mail.com" required>
        <br>
        <input type="email" name="confemail" value="exemple@mail.com" required>
        <br>
        <input type="submit" value="Envoyer">

    </form>
</main>
</body>
</html>