<?php
session_unset();
session_destroy();
?>
<div class="mainForm">
    <p>Vous êtes bien déconnecté.</p>
    <a href="index.php?cible=utilisateurs&fonction=accueil" class="button">Revenir à la page d'accueil</a>
</div>
