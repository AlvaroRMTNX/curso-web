<?php
include "class.phpmailer.php";
include "class.smtp.php";

$email_user = "gibran.martinez@teinux.com";
$email_password = "";

$the_subject = " Alinnovatri.com | Mensaje de contacto ";
$address_to = "gibran.martinez@teinux.com";

$from_name = $_POST['usr-name'];
$email = $_POST['usr-email'];
$age = $_POST['usr-age'];
$phone = $_POST['usr-phone'];
$msj = (empty($_POST['usr-msj'])) ? 'No dejo mensaje.' : $_POST['usr-msj'];

$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
date_default_timezone_set('America/Mexico_City');
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
$phpmailer->CharSet = 'UTF-8';
$phpmailer->Subject = $the_subject;	


$phpmailer->Body .="
<div style='background-color: #243033; width:90%; height:autto; border-radius:10px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); margin:20px auto;'>
    <div style='height:50px; background-color:#00ACB4; font-size:30px; text-align:center; padding:10px; border-radius:10px 0px;'>
        <img src='https://teinux.com/recursos/img/conocenos/palestra_conocenos.png' alt='lOGO' style='max-width:100%; height:50px;'>
    </div>
    <div style='padding:20px;'>
        <h2 style='color:white;'>Información de contacto</h2>
        <h5 style='color:white; font-size:20px;'>Mensaje enviado por: ".$from_name." </h5>
        <h5 style='color:white; font-size:15px;'>Datos de contacto: </h5>
        <div style='margin-left:30px; color: white; font-size:15px;'>
        <span > Teléfono: <div style='text-decoration:none; color:#00ACB4;'>".$phone."</div> </span>
        <span > Edad: <div style='text-decoration:none; color:#00ACB4;'>".$age."</div> </span>
        <br> <span > Correo: <div style='text-decoration:none; color:#00ACB4;'>".$email." </div></span>
        </div>
        <h5 style='color:white; font-size:20px;'>Mensaje: ".$msj." </h5>
        <p style='color:white;'>Fecha y Hora: ".date('d-m-Y h:i:s')."</p>
    </div>
    <div style='color:white; text-align:right; padding:10px;'>
        Creado por <a href='http://www.alinnovatri.com/' style='text-decoration:none; color:#00ACB4;'>Gibrán Martínez</a>
    </div>
</div>
";
$phpmailer->IsHTML(true);

$resqserver = $phpmailer->Send();


if(!$resqserver){
    http_response_code(200);
    echo "Upsss! A ocurrido un error al enviar tu mensaje.". $mail->ErrorInfo;  
    
}else{
    http_response_code(200);
    echo "¡Gracias! Tu mensaje ha sido enviado."; 
}
?>