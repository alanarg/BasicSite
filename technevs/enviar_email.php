<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['nome']) && isset($_POST['email'])) {
	$name = $_POST['nome'];
	$email = $_POST['email'];
	$assunto = $_POST['assunto'];
	$body = $_POST['body'];

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	
	$Mailer = new PHPMailer();
	
	//Define que será usado SMTP
	$Mailer->IsSMTP();
	
	//Enviar e-mail em HTML
	$Mailer->isHTML(true);
	
	//Aceitar carasteres especiais
	$Mailer->Charset = 'UTF-8';
	
	//Configurações
	$Mailer->SMTPAuth = true;
	$Mailer->SMTPSecure = 'ssl';
	
	//nome do servidor
	$Mailer->Host = 'smtp.gmail.com';
	//Porta de saida de e-mail 
	$Mailer->Port = 465;
	
	//Dados do e-mail de saida - autenticação
	$Mailer->Username = 'arguelho067@gmail.com';
	$Mailer->Password = 'xaropinho32';
	
	//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
	$Mailer->From = $email;
	
	//Nome do Remetente
	$Mailer->FromName = $name;
	
	//Assunto da mensagem
	$Mailer->Subject = $assunto;
	
	//Corpo da Mensagem
	$Mailer->Body = $body;
	
	//Corpo da mensagem em texto
	$Mailer->AltBody = 'conteudo do E-mail em texto';
	
	//Destinatario 
	$Mailer->AddAddress('arguelho067@gmail.com');
	
	if($Mailer->Send()){
		echo "<script type='javascript'>alert('Email enviado com Sucesso!');";
		header("Location: index.html");
		
	}else{
		echo "<script type='javascript'>alert('Email enviado com Sucesso!');";

		echo "alert('Erro ao enviar email') " . $Mailer->ErrorInfo;

	}
}	
?>



