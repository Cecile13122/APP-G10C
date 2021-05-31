<script src="verificationFormulaire.js" type="text/javascript"></script>
<?php
$info_candidat = recuperation_profil($_SESSION['mail']);
?>
<h2><?php if(isset($erreur)&&!empty($erreur)){echo $erreur;} ?></h2>
<form method="post" action="index.php?cible=utilisateurs&fonction=modification_profil">
    <table>
        <tr>
            <td class="critere"><label for="firstname">Prénom :</label></td>
            <td><input id="firstname" type="text" name="prenom" value="<?= $info_candidat['prenom'] ?>"
                       class="inputForm" required oninput="verificationNom(this.value, this.id)"></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_firstname"></span></td>
        </tr>
        <tr>
            <td class="critere"><label for="name">Nom :</label></td>
            <td><input id="name" type="text" name="nom" value="<?= $info_candidat['nom'] ?>" class="inputForm" required oninput="verificationNom(this.value, this.id)">
            </td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_name"></span></td>
        </tr>
        <tr>
            <td class="critere"><label for="tel">Numéro de téléphone :</label></td>
            <td><input type="text" id="tel" name="telephone" class="inputForm"
                       value="<?= $info_candidat['numero_tel'] ?>" class="inputForm" required oninput="verificationNumero(this.value, this.id)"></td>
        </tr>
        <tr><td></td>
            <td><span id="err_tel"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="cp">Code postal :</label></td>
            <td><input type="text" id="cp" name="code_postal" value="<?= $info_candidat['code_postal'] ?>"
                       class="inputForm" required oninput="verificationPostal(this.value, this.id)"></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_cp"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="mail">Adresse mail :</label></td>
            <td><input id="mail" type="email" name="email" value="<?= $info_candidat['mail_candidat'] ?>"
                       class="inputForm" required oninput="verificationMail(this.value, this.id)"></td>
        </tr>
        <tr>
            <td class="critere"><label for="cmail">Confirmation d'adresse mail :</label></td>
            <td><input id="cmail" type="email" name="confemail" value="<?= $info_candidat['mail_candidat'] ?>"
                       class="inputForm" required oninput="verificationConfirmationMail(this.value, this.id, document.getElementById('mail').value,'mail' )"></td>
        </tr>
        <tr>
            <td></td>
            <td><span id="err_mail"></span></td>

        </tr>
        <tr>
            <td class="critere"><label for="mdp">Mot de passe actuel :</label></td>
            <td><input type="password" id="mdp" name="mot_de_passe" placeholder="********" class="inputForm" required
                       ></td>
        </tr>
    </table>
    <button id="btn" type="submit" value="Envoyer" class="buttonForm">Envoyer</button>
</form>
