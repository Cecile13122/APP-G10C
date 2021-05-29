    <div class="main">
      <table>
        <tr>
          <td><h1>Nos informations</h1></td>
          <td><h1>Formulaire de contact</h1></td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>+33 1 75 87 89 23</li>
              <li>10 rue de Vanves</li>
              <li>92 130 Issy-Les Moulineaux</li>
              <li><img src="./images/map.png" alt="Plan" class="plan"></li>
            </ul>
          </td>
          <td>
            <form method="post" action="./index.php?cible=contact&fonction=message">
                <input type="text" placeholder="Prénom Nom" name="nom" class="inputForm" required><br>
                <input type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required><br>
                <br>
                <input type="text" placeholder="Sujet" name="sujet" class="inputForm" required><br>
                <textarea class="inputMessage" name="message" placeholder="Votre message" required></textarea>
                <br>
              <input type="submit" value="Envoyer" class="buttonForm">
            </form>
          </td>
        </tr>
      </table>
    </div>
