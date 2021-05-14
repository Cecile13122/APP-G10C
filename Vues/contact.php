    <div class="main">
      <table>
        <tr>
          <td><h1>Nos informations</h1></td>
          <td><h1>Formulaire de contact</h1></td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>+33 _ __ __ __ __</li>
              <li>10 rue de Vanves</li>
              <li>92 130 Issy-Les Moulineaux</li>
              <li><img src="../Images/map.png" alt="Plan" class="plan"></li>
            </ul>
          </td>
          <td>
            <form method="post" action="../Controler/controlContact.php">
              <input type="text" placeholder="Sujet" name="sujet" class="inputForm" required><br>
              <input type="email" name="email" placeholder="exemple@mail.com" class="inputForm" required><br><br>
              <textarea class="inputMessage" name="message" placeholder="Votre message"></textarea><br>
              <input type="submit" value="Envoyer" class="buttonForm">
            </form>
          </td>
        </tr>
      </table>
    </div>
