<?php
session_start();
require ('../mailer.php');
$digits = 4;
$token=str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

$tokenEmailBody='Please use '.$token.' as the token to reset your password. Token lasts for 20 minutes.';
$tokenMail = new Mailer ($tokenEmailBody, $_POST['userEmail'], 'TOKEN RESET');
$_SESSION['token']=$token;
