<?php
$faq=recuperation_faq();
?>
<div class="main">
  <h1>FAQ</h1>
          <?php foreach ($faq[0] as $theme): ?>
        <h2><?=$theme['theme']?><img src="../images/edit.png" onclick="modifier(<?=$theme['theme']?>)"><img src="../images/del.png" onclick="supprimer(<?=$theme['theme']?>)"></h2>
        <div class= "themeFAQ">
            <?php foreach ($faq[1] as $donnee):
            if ($donnee['theme'] == $theme['theme']){?>
            <h3><?=$donnee['question'] ?><img src="../images/edit.png" onclick="modifier(<?=$donnee['question'] ?>)"> <img src="../images/del.png" onclick="supprimer(<?=$donnee['question'] ?>)"></h3><br>
            <p><?=$donnee['reponse'] ?><br></p>
            <?php }
           endforeach;?>
           <h3 onclick="ajouter(<?=$theme['theme']?>)">Ajouter une question au thème <?=$theme['theme']?>. </h3>
        </div>
          <?php endforeach;?>
          <h3>Ajouter un thème.</h3>
      </div>
</div>
