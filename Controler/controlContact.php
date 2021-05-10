<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail= $_POST['email'];
    $sujet=$_POST['sujet'];
    $message=$_POST['message'];
    $destinataire='appg10c@gmail.com';
    $headers = 'From: '.$mail . "\r\n" .
        'Reply-To: '.$mail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();


    if (mail($destinataire,$sujet,$message,$headers)){
        echo 'Mail envoyé';
    }else {
        echo 'il y a encore du boulot';
    }

}