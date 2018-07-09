<?php
//PROCESS NEWSLETTER FORM HERE

if(!isset($_POST) || !isset($_POST['email2']))
{ 
    $msg = 'No Ingreso Ningun Dato.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

if($_POST['email2'] == '')
{
    //ERROR: FIELD "email" EMPTY
    $msg = 'Ingrese un E-Mail Valido';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

$email = $_POST['email2'];
$cuerpo = $_POST['message2'];
$nombre = $_POST['name2'];
///////////////////////////////////////////////
//Now yo can save subscriber in your database//
//And send confirmation email if necessary...//
///////////////////////////////////////////////
//include de la clase mail.class
include "mail/mail.class.php";


$mail = new mailer;
$mail->from($email, 'Webmaster');
$mail->add_recipient('info@dpsolutions.com.ar');//add a recipient in the to: field
$mail->html();
$mail->subject('Email confirmation for '.$email);//set subject

$message = 'El usuario: '.$nombre.' Con Email: '.$email.' Envio la siguiente consulta:';					  

$mail->message($message."<br /> Observacion: <br />".$cuerpo);//set message body
if($mail->send()){//send email(s)

	
	//And send success message:
	$msg = 'Su E-Mail Se Envio Correctamente.';
	echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '.$msg.'</p></div>';
	
	
	/*
	$mail = new mailer;
	$mail->from('webmaster@pabloingino.com.ar', 'Webmaster');
	$mail->add_recipient($email);//add a recipient in the to: field
	$mail->html();
	$mail->subject('Email confirmation for '.$email);//set subject
	$message = '<h1>This is a test!</h1>';					  
	$mail->message($message);//set message body
	$mail->send();//send email(s)
	*/
	
	return true;
}else{
	
	    $msg = 'No se pudo enviar correctamente.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
	
}
?>
