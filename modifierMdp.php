<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Modifier mot de passe</title>
</head>
<body>
<header>
    <img src="logo.png" alt="Logo d'ATC">
</header>
<main>
    <h1>Modifier votre mot de passe</h1>
    <form>

        <input type="email" name="email" placeholder="Adresse mail">
        <br>
        <input type="password" id="mdp"name="motDePasse" placeholder="Mot de Passe">
        <br>

            <input type="password" id="nmdp" name="NvMotDePasse" placeholder="Nouveau Mot de Passe">

        <br>
            <input type="password" id="cnmdp" name="confNvMotDePasse" placeholder="Confirmation Mot de Passe">
        <br>
        <input type="submit" value="Envoyer">

    </form>
</main>
</body>
</html>