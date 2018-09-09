<?php

include('conexao.php');
include ('../../back_end/funcs.php');
      
 if ($_POST) {
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $email_rec = $_POST['email_rec'];
   $nascimento = $_POST['nascimento'];
   $senha = $_POST['senha'];
   $data = @date('Y/m/d',strtotime($nascimento));
      
CadastraUsuario($nome, $email, $nascimento, $senha, $email_rec);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>DataForm</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="images/icons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/utill.css">
	<link rel="stylesheet" type="text/css" href="css/cads.css">
</head>
<body style="background-color: #999999;"> 
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/128.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
					<!--Inicio form-->
					
				<form class="login100-form validate-form" action="cadastro.php" method="post">
					<span class="login100-form-title p-b-59">
						<img src="images/img.png" style="height:60px;"> Data Form
					</span>
							<!--nome-->
							
					<div class="wrap-input100 validate-input" data-validate="Nome requerido">
						<span class="label-input100">Nome completo</span>
						<input class="input100" type="text" name="nome" placeholder="Nome..." pattern="[a-zA-Z\s]+$" title="Não use caracteres especiais!">
						<span class="focus-input100"></span>
					</div>
							<!--fim nome-->
							
							<!--Email-->
					<div class="wrap-input100 validate-input" data-validate = "Endereço de email valido Ex.: ex@gmail.com">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Endereço de email...">
						<span class="focus-input100"></span>
					</div>
							<!--Fim email-->
							
							<!--comeco data-->
							
					<div class="wrap-input100 validate-input" data-validate="Data requerida">
						<span class="label-input100">Data de nascimento</span>
						<input class="input100" type="date" name="nascimento">
						<span class="focus-input100"></span>
					</div>
							<!--fim data-->
							
							<!--Senha-->
							
					<div class="wrap-input100 validate-input" data-validate = "Senha requerida">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="senha" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
							
							<!--FIm senha-->
									
							<!--Email recuperação-->
					<div class="wrap-input100 validate-input" data-validate = "Endereço de email valido Ex.: ex@gmail.com">
						<span class="label-input100">Email Recuperação</span>
						<input class="input100" type="text" name="email_rec" placeholder="Endereço de email...">
						<span class="focus-input100"></span>
					</div>
							<!--Fim email-->
							
							<!--Foto-->
				
					<span class="label-input100">Selecione uma imagem de perfil</span>
					<br><br>
					<div class="custom-file">
					  	<input type="file" class="custom-file-input" id="customFile">
					  	<label class="custom-file-label" for="customFile">Selecionar Arquivo</label>
					</div>
										
							<!--Fim foto-->
							<br>
							<div style="height:6%; width:100%;"></div>
							<br>
							<!--Botão cadastro-->
							
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Cadastrar
							</button>
						</div>
					</div>
					
						<!--Fim botão cadastro-->
					
						<a href="login.php" class="dis-block txt2 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Login
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
						
						<!--Fim form-->
				</form>
			</div>
		</div>
	</div>
	
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>