<?php

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

// Datos del Formulario a recibir, solo agregar mas variables segun se requieran

$nombre = $_POST["nombre"];

//$apellido = $_POST["apellido"];

//$empresa = $_POST["empresa"];

$telefono = $_POST["telefono"];

$email = $_POST["email"];

//$intereses = $_POST["intereses"];

$mensaje = $_POST["mensaje"];

$aviso = $_POST["aviso"];
//aviso obligatorio

$destino = "ceci.tgm2611@gmail.com"; //el del cliente

// Si requerimos enviar el formulario a mas destinatarios los agregamos
// $destino2 = "dan@studio-8.co";
// $destino3 = "ejemplo@gmail.com";

// Set mailer to use SMTP 
$mail->isSMTP();  //esta opcion es la que encripta

// Si la cuenta es de gmail usar el host
// $mail->Host = 'ssl://smtp.gmail.com';
// Si la cuenta es de Hotmail
// $mail->Host = 'smtp.live.com';

$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers //dependiende del dominio //bluehost es como el ejemplo
$mail->SMTPAuth = true;                               // Enable SMTP authentication //true para activar
$mail->Username = 'Ceci Meneses';                 // SMTP username real
$mail->Password = 'Yunuen-13;                           // SMTP password real sino se negara
$mail->SMTPSecure = 'ssl';                           // Enable TLS encryption, `ssl` also accepted //depende del host
$mail->Port = 465;                                    // TCP port to connect to //depende del host

// Mail que envia y valida el envio del formulario
$mail->setFrom('ceci.tgm2611@gmail.com', 'Contacto'); //solo para validar puede ser otro despues de , se puede poner otro texto

$mail->addAddress($destino, 'Ventas'); //quien recive
//Agrego mas destinos en caso de requerirlo
// $mail->addAddress($destino2, 'Daniel');
// $mail->addAddress($destino3, 'Usuario Destino');

$mail->Subject = 'Nuevo mensaje de Contacto'; //asunto
$mensajeHtml = nl2br($mensaje);

//Se estructura el cuerpo del mensaje, en html para darle formato

$mail->Body    =
//<p>Nombre completo: {$nombre} {$apellido}</p>, <p>Personas Requeridas: {$invitados}</p>, <p>Sucursal de interes: {$sucursal}</p>, <p>En que esta interesado: {$intereses}</p>
"
<html>

<body>

<h2>Recibiste un nuevo mensaje desde el formulario de Contacto</h2>

<p>Informacion enviada por {$nombre}:</p>

<p>Email: {$email}</p>

<p>Telefono: {$telefono}</p>

<p>Lugar de Visita: {$visita}</p>

<p>Mensaje: {$mensaje}</p>

<p>Aviso: {$aviso}</p>

</body>

</html>

<br />";

// Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

//$mail->SMTPOptions = array(
//    'ssl' => array(
//        'verify_peer' => false,
//        'verify_peer_name' => false,
//        'allow_self_signed' => true
//    )
//);


if(!$mail->send()) {
    echo 'Error, mensaje no enviado';
    echo 'Error del mensaje: ' . $mail->ErrorInfo;
} else {
    // Mensaje de envio de formulario correcto o redirección a pagina de agradcimientos para contar los Leeds recibidos de ese formualrio
//   echo 'El mensaje se ha enviado correctamente';
     header("Location:../index.html"); //pagina de gracias o lo puedes regresar al inicio
}
