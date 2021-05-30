    <div class="main">
      <table>
        <tr>
          <td><h1>Nos informations</h1></td>
          <td><h1>Formulaire de contact</h1></td>
        </tr>
        <tr>
          <td>
            <ul>
              <li><h3>+33 1 75 87 89 23</h3></li>
              <li><h3>10 rue de Vanves</h3></li>
              <li><h3>92 130 Issy-Les Moulineaux</h3></li>
              <li><img src="./images/map.png" alt="Plan" class="plan"></li>
            </ul>
          </td>
          <td>
            <form method="post" action="./index.php?cible=contact&fonction=message">

                <input type="text" name="nom" placeholder="Nom Prénom" class="inputForm" required><br>

                <input type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required><br>
                <input type="text" name="sujet" placeholder="Objet" class="inputForm" required>
                <h3>Message :</h3>
                <input type="text" name="message" class="inputMessage"required>
                <br>
              <input type="submit" value="Envoyer" class="buttonForm">
            </form>
          </td>
        </tr>
      </table>
    </div>
