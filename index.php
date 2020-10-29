<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$request = $_POST;
$nome = $request['first_name'];

try{
   
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lucasmeyble123@gmail.com';
    $mail->Password = '81923242';
    $mail->Port = 587;

    $mail->setFrom('lucasmeyble123@gmail.com');
    $mail->addAddress('lucas2meyble@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'teste de email via gmail';
    $mail->Body = '<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>teste</title>
	<style> @import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap%27");
	    
	    div#container table table tbody.email-content{
    	    font-family: "Dancing Script", Garamond, cursive !important;         
            font-size: 1.5rem;
    		font-height: 2;
    		font-weight: bolder;
    		font-style: italic;
    		color: #040303;  
	    }
		
	</style>
</head>

<body style="margin: 0; padding: 0;">
	<div id="container" style=" width: 100%; height: 100%; max-width: 700px; ">
		<table cellpadding="0" cellspacing="0" background="http://www.email.matheuspro.com.br/assets/image/fundo.png" style="
			background-repeat: no-repeat;
			width: 100%;
			text-align: center;
			background-size: 100% 100%;">
			<tbody>
				<tr>
					<td>
						<table cellspacing="0" cellpadding="0" width="100%">
							<tbody>
								<tr>
									<td style="height: 7rem"></td>
								</tr>
								<!--cabeçaçho-->
								<tr>
									<td style="width:20%">&nbsp;</td>
									<td style="width:60%">
										<img style="width:98%;" src="http://www.email.matheuspro.com.br/assets/image/cabecalho.png" alt="" />
									</td>
									<td style="width:20%">&nbsp;</td>
								</tr>
								<!--cabeçaçho-->
								<tr>
									<td style="height: 7rem"></td>
								</tr>
							</tbody>
						</table>
						<table cellspacing="0" cellpadding="0" width="100%">
							<tbody class="email-content">
								<tr>
									<td style="width:10%">&nbsp;</td>
									<td style="
											width:80%;">
											Caro(a) senhor(a) '.$nome.'</td>
									<td style="width:10%">&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3" style="height: 5rem;"></td>
								</tr>
								<tr>
									<td style="width:10%">&nbsp;</td>
									<td style="width: 80%;">
										É com grande prazer que lhe aprovamos para estudar na Escola
										de Bruxaria de HogwAds. Todo o material que você necessitará
										para esse período de aprendizado encontrará dentro da nossa
										escola. Desejamos que tenha ótimos estudos e que esse início
										de jornada faça de você um(a) grande bruxo(a).
									</td>
									<td style="width:10%">&nbsp;</td>
								</tr>
								<tr>
									<td style="height: 7rem"></td>
								</tr>
							</tbody>
						</table>

						<table cellspacing="0" cellpadding="0" width="100%">
							<tbody>
								<tr>
									<td style="width: 10%;">&nbsp;</td>
									<td style="width: 80%; text-align: right;"><img width="60%" src="http://www.email.matheuspro.com.br/assets/image/assinatura.png" alt=""></td>
									<td style="width: 10%;">&nbsp;</td>
								</tr>
								<tr>
									<td style="height: 7rem;"></td>
								</tr>
							</tbody>
						</table>
						<!--corpo2-->
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>';
    $mail->AltBody = 'Nao pegou o css';
    
    
    if($mail->send()){
        echo 'email enviado';
    }else{
        echo 'email nao enviado';
    }
} catch(Exception $e){
    echo "erro ao enviar mensagem: {$mail->ErrorInfo}";
}

?>