<div class="main">
  <h1><?=strtoupper($role_utilisateur)?>S</h1>
  <h2></?=//$message?></h2>
  <table>
    <thead>
      <tr>
        <?php foreach ($attributs_utilisateurs as $attribut):?>
          <th class="utilisateurs"><?=strtoupper($attribut)?></th>
        <?php endforeach;?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($utilisateurs as $utilisateur):?>
        <tr><form method="post" action="index.php?cible=utilisateurs&fonction=modifier_utilisateur">
          <?php foreach ($attributs_utilisateurs as $attribut):?>
            <td class="utilisateurs"><input type="text" name="<?=$attribut?>" value="<?=$utilisateur[$attribut]?>" class="utilisateurs" required></td>
          <?php endforeach;?>
          <td class="button_utilisateurs"><input type="submit" value="OK" class="buttonFaq"></td></form>
          <td class="button_utilisateurs"><button value="<?=$utilisateur['mail_'.$role_utilisateur]?>" onclick="supprimer(this.value)" class="buttonFaqRed">X</button></td>
        </tr>
      <?php endforeach;?>
      <tr><form method="post" action="index.php?cible=utilisateurs&fonction=ajout_utilisateur&role_utilisateur=<?=$role_utilisateur?>">
        <?php foreach ($attributs_utilisateurs as $attribut):?>
          <td class="utilisateurs"><input type="text" name="<?=$attribut?>" class="utilisateurs" required></td>
        <?php endforeach;?>
        <td class="button_utilisateurs"><input type="submit" value="+" class="buttonFaq"></td>
        <td><input type="reset" value="X" class="buttonFaqRed"></td></form>
      </tr>
    </tbody>
  </table>
</div>

<script>
function supprimer(mail){
  if (confirm("Êtes-vous sur de vouloir supprimer cet utilisateur ?")){
    window.location.href = "index.php?cible=utilisateurs&fonction=supprimer_utilisateur&mail="+mail;
  }
}
</script>
