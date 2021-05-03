<?php 

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(($_POST['email'] && !empty(trim($_POST['email']))) && ($_POST['mensagem'] && !empty(trim($_POST['mensagem'])))){

	$nome = !empty($_POST['nome']) ? $_POST["nome"] : 'Não Informado';
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem']; 


	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'gustavo.campiteli@novaandradina.org';
	$mail->Password = 'guga357753';
	$mail->Port = 587;

	$mail->setFrom('gustavo.campiteli@novaandradina.org');
	$mail->addAddress('gustavo.campiteli@novaandradina.org');

	$mail->isHTML(true);
	$mail->Subject = "Contato";
	$mail->Body = "Nome: {$nome}<br>
				   Email: {$email}<br>
				   Mensagem: {$mensagem}<br>";

	if($mail->send()) {
		echo 'Email enviado com sucesso.';
	} else {
		echo 'Email não enviado.';
	}
	}else {
		echo 'Não enviado: informar o email e a mensagem';
	}
