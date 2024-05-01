<?php

//mail($email_to='kevin.simms@hotmail.fr', $email_subject='test', $email_message='test message');



$sujet='validation de votre compte';
/* $sujet = htmlspecialchars ( $_GET["sujet"] );

$name =  htmlspecialchars ( $_GET["name"] );


$message = htmlspecialchars ( $_GET["message"] ); */

$email = htmlspecialchars ( $_GET["email"] );

$bodyEmail = "<p>pour valider votre compte clicker ici:</p> <a href='http://coursdeqigong.com/jardin/validate.php?code=$str'>validate</a>";

$from = "contact@coursdeqigong.com";
$headers ="From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";

//var_dump($_GET);

if(mail($email, $sujet, $bodyEmail,$headers)) {
        echo "success2";
        echo $email;
        //header('Location: http://www.coursdeqigong.com/contact.php?send=check');
        exit();
} else {
	echo "email_send_failed";
        exit();
}






?>