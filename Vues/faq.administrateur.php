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
                        <input type="hidden" name="id_faq" value="<?=$donnee['id_faq'] ?>" required>
                        <input type="hidden" name="theme" value="<?=$donnee['theme'] ?>" required>
                        <textarea type="text" name="question" class="question_faq" required><?=$donnee['question']?></textarea><br>
                        <textarea type="text" name="reponse" class="reponse_faq" required><?=$donnee['reponse'] ?></textarea>
                        <input type="submit" value="Modifier" class="buttonFaq">
                    </form> <button value="<?=$donnee['id_faq'] ?>" onclick="supprimer(this.value)" class="buttonFaqRed">Supprimer</button>
                <?php }
            endforeach;?>
          </div>
    <?php endforeach;?>
    <a onclick="openForm()"><img src="./images/add.png"></a><br><br>
    <form method="post" action="index.php?cible=faq&fonction=ajout_question" id="myForm">
        <input type="text" name="theme" placeholder="Thème" required>
        <br><br>
        <input type="text" name="question" placeholder="Question" required>
        <br><br>
        <input type="text" name="reponse" placeholder="Réponse" required>
        <br><br>
        <input type="submit" value="Ajouter" class="buttonForm">
        <input type="reset" value="Close" class="buttonFaqRed" onclick="closeForm()">
    </form>
</div>

<script>
function supprimer(id){
  if (confirm("Êtes-vous sur de vouloir supprimer ?")){
    window.location.href = "index.php?cible=faq&fonction=supprimer_question&id="+id;
  }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
