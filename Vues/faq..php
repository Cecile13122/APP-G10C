<?php
$faq=recuperation_faq();
?>
<div class="main">
  <h1>Foire aux questions</h1>
          <?php foreach ($faq[0] as $theme): ?>
        <h2><?=$theme['theme']?></h2>
        <div class= "themeFAQ">
            <?php foreach ($faq[1] as $donnee):
            if ($donnee['theme'] == $theme['theme']){?>
            <h3><?=$donnee['question'] ?></h3>
            <p><?=$donnee['reponse'] ?><br></p>
            <?php }
           endforeach;?>
        </div>
          <?php endforeach;?>
      </div>
</div>
