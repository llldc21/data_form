<?php
include('../back_end/funcs.php');

function NovaSenha($email){
    $sql = 'SELECT * FROM TB_USUARIO WHERE DS_EMAIL="'.$email.'"';
    $res = $GLOBALS['conn']->query($sql);
    // echo $sql;
    // echo " t: ".count($res);
    if($res->num_rows >0){
      $s = $res->fetch_array();
      $pass = md5(date('d/m/Y h:m'));
      $sqll = 'UPDATE TB_USUARIO SET DS_SENHA='.$pass.'"';
      $ress = $GLOBALS['conn']->query($sqll);
      if($res){
           //EMAIL
    include_once("class.phpmailer.php");
    $destino = $email;
    $body = "Sua senha temporária";
    $subject = "assunto";

	$mail = new PHPMailer();
	$mail->SMTPDebug = 3; // descomente  essas linhas e veja o debug para encontrar algum erro

	$mail->Debugoutput = 'html'; //essa linha também
	$mail->setLanguage('br'); //vc sabe (aqui no caso varia de acordo com o servidor, gmail por exemplo usa "br" não "pt" e não acusa erro, e tambem nao envia email)
	$mail->isSMTP(); //envio autenticado
	$mail->Host = 'smtp.gmail.com'; //geralmente, precisa ver no painel de controle do site qual é o endereço 
	//$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls'; //normalmente é c (gmail..etc), aqui deixei esse protocolo que era o indicado pelo servidor
	$mail->Username = 'dataform2018@gmail.com'; // login 
	$mail->Password = 'dataform1234'; // senha
	$mail->Port = 587; //porta pode variar, verifique também
 	$mail->CharSet = 'utf-8'; //vc sabe
	$mail->setFrom('dataform2018@gmail.com','Data Form'); //exemplos..esse email é o que aparece na descrição, normalmente o mesmo apontado no passo do login
	$mail->addReplyTo('no-reply@site.com.br'); // caso queira apontar algum email pra respostas..coloque aqui,
	$mail->addAddress($destino); //email do cliente
	// // //$mail->addCC('email@email.com.br', 'Cópia');
	// // //$mail->addBCC('email@email.com.br', 'Cópia Oculta')

	$mail->isHTML(true); //vai usar html no corpo do email?? eu usei..
	$mail->Subject = $subject;
	$mail->Body    = $body;
	//$mail->AltBody = 'Para visualizar essa mensagem acesse: ...'//opcional

	if(!$mail->send()) {
    	//echo 'Não foi possível enviar a mensagem.<br>';
    	echo 'Erro: ' . $mail->ErrorInfo;    	
	} else {		
	    echo 'Mensagem enviada.';
	}	
	//muito importante, sem limpar os recipientes vc não conseguirá enviar muitos emails..mesmo q não seja de uma vez só..ele lota a fila (as vezes não deixa enviar mais q 3..5 e..sem q esvazie a pasta de saida e etc..)
    $mail->ClearAllRecipients();
      }
    }else{
      echo " n existe";
    }
    
}

?>
<?php

if(isset($_POST['email'])){
   NovaSenha($_POST['email']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>DataForm</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="temas/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="temas/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="temas/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="temas/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="temas/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="temas/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				
				<!-- INCIIO DO FORM -->
				<form method="post" action="nova_senha.php" class="login100-form validate-form">
				<!-- TAG FORM PARA SER MUDADA DIRETO PRO EMAIL -->
					<span class="login100-form-title p-b-49">
						<img src="img/img.png" style="height:70px;"> Data Form
					</span>
						
					
					<div class="text-center p-t-8 p-b-31">
						<p href="#" class="txt2">
							Digite o email cadastrado para a recuperação de senha.
							Será enviado uma mensagem para o mesmo, com os respectivos dados do usuário.
						</p>
					</div>

						<!-- INPUT DE RECUPERAÇÃO -->

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email requerido">
						
						<input class="input100" type="text" name="email" placeholder="Digite seu Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>


						<!-- fim login -->

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
					
						<!-- MODIFICAR O "HREF" DO BUTTON  -->
							<button type="submit" class="login100-form-btn">
						<!-- MODIFICAR O "HREF" DO BUTTON -->
								Enviar
							</button>
						</div>
					</div>

						<br>
						<center>
							<a href="cadastro.php" class="txt2">
								Cadastrar
							</a>
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	
	<script src="temas/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="temas/vendor/animsition/js/animsition.min.js"></script>
	<script src="temas/vendor/bootstrap/js/popper.js"></script>
	<script src="temas/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="temas/vendor/select2/select2.min.js"></script>
	<script src="temas/vendor/daterangepicker/moment.min.js"></script>
	<script src="temas/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="temas/vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>





