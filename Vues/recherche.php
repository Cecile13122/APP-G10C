<div class="main">
    <h1>Résultats de la recherche</h1>
    <table>
        <tr class="resultat">
            <td>Nom</td>
            <td>Prénom</td>
            <td>Adresse Mail</td>

        </tr>
        <?php
        if (isset($resultat_recherche)){
        if (empty($resultat_recherche)){
        ?><p> Aucun candidat ne porte le nom recherché
        <p>
            <?php
            }else{
            foreach ($resultat_recherche as $candidat) :?>
                <tr>
                    <td ><a href="index.php?cible=test&fonction=resultat&mail=<?=$candidat['mail']?>"><?= strtoupper($candidat['nom']) ?></a></td>
                    <td ><?= $candidat['prenom'] ?></td>
                    <td ><?= $candidat['mail'] ?></td>
                    </tr>
            <?php endforeach;
            }
        }
            ?>
    </table>
</div>
