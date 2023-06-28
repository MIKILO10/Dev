<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP(); // habilita SMTP
#$mail->SMTPDebug = 2; // debugging: 1 = errores y mensajes, 2 = sólo mensajes
$mail->SMTPAuth = true; // auth habilitada
$mail->SMTPSecure = 'tls'; // transferencia segura REQUERIDA para Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 465
$mail->IsHTML(true);
$mail->Username = "spike.jujuy10@gmail.com";
$mail->Password = "tmqqcaueemrpyqyj";
$mail->SetFrom($_POST['email'],$_POST['name']);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
$mail->AddAddress("spike.jujuy10@gmail.com");

 if(!$mail->Send()) {
   echo '<script type="text/javascript">'
   . 'Swal.fire({'
   . 'icon: \'error\','
   . 'title: \'Email\','
   . 'text: \'No Enviado!\'});'
   . '</script>'
   . '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
   '  <script>
   setTimeout( function() { window.location.href = "https://dev-jujuy.net.ar"; }, 2000 );'
, '</script>';
 } else 
 
 {

   echo '<script type="text/javascript">'
   . 'Swal.fire('
   . '\'Enviado\','
   . '\'Corecctamente\','
   . '\'Gracias\''
   . ');'
   . '</script>'
   . '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>'
   '  <script>
   setTimeout( function() { window.location.href = "https://dev-jujuy.net.ar"; }, 2000 );'
, '</script>';
   
 
 }





















?>
