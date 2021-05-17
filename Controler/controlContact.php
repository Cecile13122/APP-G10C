<?php
include_once("fonction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = test_input($_POST['email']);
    $sujet = test_input($_POST['sujet']);
    $message = test_input($_POST['message']);
    $nom = test_input($_POST['nom']);

    $destinataire = 'appg10c@gmail.com';
    $headers = 'From: ' . $mail . "\r\n" .
        'Reply-To: ' . $mail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $err = '';

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $err = "Le mail n'est pas valide";
    }

    if (empty($err)) {
        if (mail($destinataire, $sujet, $message."\r\n".$nom, $headers)) {
            echo 'Mail envoyé';
        } else {
            echo 'il y a encore du boulot';
        }
    }

}