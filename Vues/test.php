<div class="main">
  <table>
    <tr>
      <td><h1>Nouveau test</h1></td>
      <td><h1>Configuration session</h1></td>
    </tr>
    <tr>
      <td>
        <form method="post" action="index.php?cible=test.session&fonction=nouveau_test">
          <input type="text" name="mail" placeholder="Adresse mail candidat" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"><br><br>
          <input list="id_session" name="n_session" placeholder="Numéro de session" required pattern="/d+"><br>
          <datalist id="id_session">
            <?php foreach ($id_sessions as $id){?>
              <option value="<?=$id?>">
              <?php }?>
            </datalist><br><br>
          <input type="submit" class="button_session" value="Lancer la série de tests">
        </form><br><br>
      </td>
      <td rowspan="6" class="config_session">
        <form method="post" action="index.php?cible=test.session&fonction=configurer_session">
          <h2>Numéro de session :</h2>
          <input list="id_session" name="n_session" oninput="configurer(this.value)" required>
          <h2 class="underline"><a href="index.php?cible=test.session&fonction=nouvelle_session">Générer un numéro de session.</a></h2>
          <datalist id="id_session">
            <?php foreach ($id_sessions as $id){?>
              <option value="<?=$id?>">
              <?php }?>
            </datalist>

            <h2>Fréquence cardiaque (bpm) :</h2>
            <h2>Homme :<input type="number" id="frequence_cardiaque_h" name="frequence_cardiaque_h" min="50" max="75" value="<?=$session[2]?>" required>
              Femme :<input type="number" id="frequence_cardiaque_f" name="frequence_cardiaque_f" min="50" max="80" value="<?=$session[3]?>" required pattern="/d{2}"></h2><br>

              <h2>Température de la peau (°C) :</h2>
              <input type="number" id="temperature" name="temperature" min="24" max="35" value="<?=$session[4]?>" required pattern="/d{2}"><br><br>

              <h2>Reconnaissance de la tonalité (%) : </h2>
              <input type="number" id="tonalite" name="tonalite" min="70" max="100" value="<?=$session[5]?>" required pattern="/d{2,3}"><br><br>

              <h2>Différence de fréquence cardiaque (bpm) : </h2>
              <input type="number" id="dif_frequence_cardiaque" name="dif_frequence_cardiaque" min="0" max="20" value="<?=$session[6]?>" required pattern="/d{1,2}"><br><br>

              <h2>Différence de température (%) : </h2>
              <input type="number" id="dif_temperature" name="dif_temperature" min="0" max="10" value="<?=$session[7]?>" required pattern="/d{1,2}"><br><br>

              <h2>Temps de réaction à un stimuli sonore (ms) :</h2>
              <input type="number" name="stimulus_sonore" id="stimulus_sonore" min="0" max="225" value="<?=$session[8]?>" required pattern="/d{2,3}"><br><br>

              <h2>Temps de réaction à un stimuli visuel (ms) : </h2>
              <input type="number"  name="stimulus_visuel" id="stimulus_visuel" min="0" max="250" value="<?=$session[9]?>"  required pattern="/d{2,3}"><br><br>

              <input type="submit" class="buttonForm" value="Confirmer">
              <input type="submit" class="buttonForm" value="Clôturer la session">
            </form>
          </td>
        </tr>
        <tr>
          <td><h1>Sessions</h1></td>
        </tr>
        <tr>
          <td>
            <table class="resultat">
              <thead class="resultat">
                <tr>
                <td>Numéro</td>
                <td>État</td>
                <td>Candidats</td>
                <td>Admissibles</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sessions as $session){?>
                <tr>
                  <td><?=$session['id_session']?></td>
                  <td><?=$session['session_finie']?></td>
                  <td><?=$session['id_session']*2?></?=calcul_candidats_session($session['id_session'])?></td>
                  <td><?=$session['id_session']*3?></?=calcul_ratio_admissibles($session['id_session'])?></td>
                  <td><a href="index.php?cible=test.session&fonction=afficher_resultats&id=<?=$session['id_session']?>" class="underline">Voir les resultats.</a></td>
                </tr>
              <?php }?></tbody>
              </table>
            </td>
          </tr>
      </table>

    </div>

    <script>
    function configurer(id){
      confirm("salut");
      window.location.href = "index.php?cible=test.session&fonction=remplir_seuils&id="+id.toString();
      /*
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("frequence_cardiaque_h").getAttributeNode("value").value = $f_cardiaque_h;
      document.getElementById("frequence_cardiaque_f").getAttributeNode("value").value = $f_cardiaque_f;
      document.getElementById("temperature").getAttributeNode("value").value = ;
      document.getElementById("tonalite").getAttributeNode("value").value = ;
      document.getElementById("dif_frequence_cardiaque").getAttributeNode("value").value = ;
      document.getElementById("dif_temperature").getAttributeNode("value").value = ;
      document.getElementById("stimulus_sonore").getAttributeNode("value").value = ;
      document.getElementById("stimulus_visuel").getAttributeNode("value").value = ;
    }
  };
  xhttp.open("GET", "index.php?cible=test.session&fonction=remplir_seuils&id="+id, true);
  xhttp.send();
  */
}
</script>
