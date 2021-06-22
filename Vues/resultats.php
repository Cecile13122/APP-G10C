

<div class="main">
  <h1>Résultats</h1>
  <input list="id_session" name="n_session" placeholder="Numéro de session" onchange="afficher_candidats(this.value)" required pattern="\d+"><br><span id="erreur"></span>
  <datalist id="id_session">
    <?php foreach ($id_sessions as $id):?>
      <option value="<?=$id?>">
      <?php endforeach;?>
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
      <?php if (isset($candidats)){
      foreach ($candidats as $candidat) :?>
        <tr class="result">
          <td ><?=$candidat['mail_candidat']?></td>
          <td><?=$candidat['date_test']?></td>
          <td><?=$candidat['frequence_cardiaque']." et ".$candidat['frequence_cardiaque_bis']?></td>
          <td><?=$candidat['temperature']." et ".$candidat['temperature_bis']?></td>
          <td><?=$candidat['tonalite']?></td>
          <td><?=$candidat['stimulus_visuel']?></td>
          <td ><?=$candidat['stimulus_audio']?></td>
        </tr>
      <?php endforeach;}
      else {
          ?><p>Veuillez sélectionner un numéro de session</p><?php
      }?>
  </table>
</div>

<script>
    function afficher_candidats(id){
        let pattern= /\d+/;
        if (id.match(pattern)===null) {
            document.getElementById('erreur').innerHTML = "Un chiffre est attendu";
        }
        else {
            window.location.href = "index.php?cible=test&fonction=recuperation_candidats&id="+id;
        }
    }
</script>
