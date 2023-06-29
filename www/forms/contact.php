<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

// Configuración de PHPMailer
$mail = new PHPMailer();
$mail->isSMTP(); // Habilita SMTP
$mail->SMTPDebug = 1; // Establece el nivel de depuración a 0 para no mostrar mensajes
$mail->SMTPAuth = true; // Habilita la autenticación SMTP
$mail->SMTPSecure = 'tls'; // Establece el tipo de seguridad (tls o ssl)
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; // Puerto SMTP (tls: 587, ssl: 465)
$mail->isHTML(true);

$mail->Username = 'spike.jujuy10@gmail.com';
$mail->Password = 'tmqqcaueemrpyqyj';
$mail->setFrom($_POST['email'], $_POST['name']);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
$mail->addAddress('spike.jujuy10@gmail.com');

// Intenta enviar el correo electrónico
if (!$mail->send()) {
    // Error al enviar el correo electrónico
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20"></script>';
    echo '<script type="text/javascript">
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "No se pudo enviar el correo electrónico."
            }).then(function() {
                window.location.href = "https://dev-jujuy.net.ar";
            });
        </script>';
} else {
    // Correo electrónico enviado correctamente
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20"></script>';
    echo '<script type="text/javascript">
            Swal.fire({
                icon: "success",
                title: "Éxito",
                text: "Correo electrónico enviado correctamente."
            }).then(function() {
               window.location.href = "https://dev-jujuy.net.ar";
            });
        </script>';
}
?>