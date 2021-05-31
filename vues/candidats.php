
<div id="afficher_candidat">
    <h3>Utilisateurs</h3>
    <table>
        <thead>
        <tr>
            <th>Mail</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Numéro de Téléphone</th>
            <th>Genre</th>
            <th>Code Postal</th>
            <th>Validation</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($candidats as $candidat): ?>
            <tr>
                <td><?=$candidat['mail_candidat'] ?></td>
                <td><?=$candidat['nom'] ?></td>
                <td><?=$candidat['prenom'] ?></td>
                <td><?=$candidat['date_naissance'] ?></td>
                <td><?=$candidat['numero_tel'] ?></td>
                <td><?=$candidat['genre'] ?></td>
                <td><?=$candidat['code_postal'] ?></td>
                <td><?=$candidat['valider'] ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    </div>
