<?php
// Connexion a la base de donnée
    try {
        $bdd = new PDO ('mysql:host=localhost;port=3307; dbname=helitest; charset=utf8', 'root', '');
        //$bdd = new PDO ('mysql:host=localhost;port=8889; dbname=helitest; charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }

function connect_bdd(){
  try {
      $bdd = new PDO ('mysql:host=localhost;port=3307; dbname=helitest; charset=utf8', 'root', '');
      //$bdd = new PDO ('mysql:host=localhost;port=8889; dbname=helitest; charset=utf8', 'root', 'root');
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $bdd;

  } catch (PDOException $e) {
      die("Erreur : " . $e->getMessage());
  }
}
