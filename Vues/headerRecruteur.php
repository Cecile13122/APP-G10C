<html>
  <head>
    <meta charset="utf-8" name="viewport"/>
    <link type="text/css" rel="stylesheet" href="../Vues/style.css"/>
    <script src=myFile.js></script>
    <title>Helitest</title>
  </head>
  <body>
    <div class="header">
      <img src="../Images/ATC_v200.png" alt="Logo ATC">
      <div class="profil">
        <a href class="modif_profil"><h2><?=$_SESSION['prenom']." ". strtoupper($_SESSION['nom'])?></h2>Mon profil</a>
        <div class = "sous_profil">
          <a href="modificationProfil.php">Modification profil</a>
          <a href="modificationMdp.php">Modification mot de passe</a>
          <a href="deconnexion.php">Déconnexion</a>
        </div>
      </div>
    </div>
    <div class="navbar">
      <a href="resultats.php">Résultats</a>
      <a href="test.php">Tests</a>
      <a href="faq.php">FAQ</a>
      <a href="contact.php">Contact</a>
      <div class="recherche">
        <input type="text" name="recherche" placeholder="Recherche">
        <button type="submit"><img src="../Images/loupe.png" alt="Loupe"></button>
      </div>
    </div>
