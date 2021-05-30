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
                    <form method="post" action="index.php?cible=faq&fonction=modifier_question">
                        <input type="hidden" name="id_faq" value="<?=$donnee['id_faq'] ?>"required>
                        <input type="hidden" name="theme" value="<?=$donnee['theme'] ?>" required>
                        <h3><input type="text" name="question" value="<?=$donnee['question'] ?>" required></h3>
                        <br>
                        <p><input type="text" name="reponse" value="<?=$donnee['reponse'] ?>"required></p>
                        <br>
                        <input type="submit" value="Modifier">
                        <button value="<?=$donnee['id_faq'] ?>" onclick="supprimer(this.value)">Supprimer</button>
                    </form>
                <?php }
            endforeach;?>
          </div>
    <?php endforeach;?>
    <a onclick="openForm()"><img src="./images/add.png"></a><br>
<div class="form-popup" id="myForm">
    <p><form method="post" action="index.php?cible=faq&fonction=ajout_question" class="form-container">
        <input type="text" name="theme" placeholder="Thème" required>
        <br>
        <input type="text" name="question" placeholder="Question" required>
        <br>
        <input type="text" name="reponse" placeholder="Réponse" required>
        <br>
        <input type="submit" value="Ajouter">
       <button type="submit" onclick="closeForm()">Close</button>
    </form></p>
  </div>

</div>

<script>
function supprimer(id){
  if (confirm("Êtes-vous sur de supprimer ?")){
    window.location.href = "index.php?cible=faq&fonction=supprimer&id="+id;
  }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
