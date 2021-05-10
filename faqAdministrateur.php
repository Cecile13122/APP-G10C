<?php
require_once('requestsFaq.php');
$faq=affiche_faq();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport"/>
    <link rel="shortcut icon" type="image/x-icon" href="ATC_v200.png"/>
    <title>Helitest</title>
</head>
<body>
<div id="afficher_faq">
    <h3> Données de la FAQ</h3>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Theme</th>
            <th>Question</th>
            <th>Réponse</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($faq as $question): ?>
        <tr>
            <td><?=$question['id_faq'] ?></td>
            <td><?=$question['theme'] ?></td>
            <td><?=$question['question'] ?></td>
            <td><?=$question['reponse'] ?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<div id="ajout_faq">
    <h3>Ajouter questions FAQ</h3>
    <form method="post" action="controlFaq.php">
        <input type="text" name="theme" placeholder="Theme" required>
        <br>
        <input type="text" name="question" placeholder="Question" required>
        <br>
        <label>Réponse
            <textarea name="reponse" required></textarea>
        </label>
        <br>
        <input type="submit" value="Ajouter" >
    </form>
</div>
<div id="modif_faq">
    <h3>Ajouter questions FAQ</h3>
    <form method="post" action="controlFaq.php">
        <label>ID de la question
            <input type="number" name="id_faq" required>
        </label>
        <br>
        <input type="text" name="theme" placeholder="Theme" required>
        <br>
        <input type="text" name="question" placeholder="Question" required>
        <br>
        <label>Réponse
            <textarea name="reponse" required></textarea>
        </label>
        <br>
        <input type="submit" value="Modifier">
    </form>
</div>
<div id="supprimer_faq">
    <h3>Supprimer questions FAQ</h3>
    <form method="post" action="controlFaq.php">
        <label>ID de la question
            <input type="number" name="id_faq" required>
        </label>
        <br>
        <input type="submit" value="Supprimer">
    </form>
</div>
</body>
</html>
