<div class="main">
  <h1>Résultats</h1>
  <input list="id_session" name="n_session" placeholder="Numéro de session" oninput="afficher_candidats(this.value)" required pattern="/d+"><br>
  <datalist id="id_session">
    <?php foreach ($id_sessions as $id){?>
      <option value="<?=$id?>">
      <?php }?>
    </datalist><br><br>
  <table>
    <tr class="resultat">
      <td>Candidat</td>
      <td>Date</td>
      <td>Fréquences Cardiaque</td>
      <td>Températures</td>
      <td>Tonalité</td>
      <td>Stimulus Visuel</td>
      <td>Stimulus Audio</td>
    </tr>
      <?php foreach ($candidats as $candidat) {?>
        <tr>
          <td rowspan="2"><?=$candidat['mail_candidat']?></td>
          <td rowspan="2"><?=$candidat['date_test']?></td>
          <td><?=$candidat['frequence_cardiaque']?><br><?=$candidat['frequence_cardiaque_bis']?></td>
          <td><?=$candidat['temperature']?><br><?=$candidat['temperature_bis']?></td>
          <td rowspan="2"><?=$candidat['tonalite']?></td>
          <td rowspan="2"><?=$candidat['stimulus_visuel']?></td>
          <td rowspan="2"><?=$candidat['stimulus_audio']?></td>
        </tr>
      <?php}?>
  </table>
</div>

<script>
function afficher_candidats(id){
  window.location.href = "index.php?cible=test&fonction=recuperation_candidats&id="+id;
}
</script>
