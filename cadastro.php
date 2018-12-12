<?php 
include 'back_end/funcs.php';
session_start();

if (isset($_POST['nome'])) {
	if('' == $_FILES['img_usuario']){
			$img_usuario = 'a.jpg';
	}else{
		$img_usuario = $_FILES['img_usuario'];
	} //Pegando extensão do arquivo
	CadastraUsuario($_POST['nome'], $_POST['email'], $_POST['nascimento'], $_POST['senha'], $img_usuario, $_POST['cpf']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>DataForm</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="shortcut icon" href="front_end/img/icons/favicon.ico">
	<link rel="stylesheet" type="text/css" href="front_end/temas/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="front_end/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="front_end/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="front_end/temas/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="front_end/temas/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="front_end/temas/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="front_end/temas/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="front_end/temas/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="front_end/css/utill.css">
	<link rel="stylesheet" type="text/css" href="front_end/css/cads.css">
</head>
<body style="background-color: #999999;"> 

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('front_end/img/128.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
					<!--Inicio form-->
					
				<form class="login100-form validate-form" action="cadastro.php" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-59">
						<img src="front_end/img/img.png" style="height:60px;"> Data Form
					</span>
							<!--nome-->
							
					<div class="wrap-input100 validate-input" data-validate="Nome requerido">
						<span class="label-input100">Nome completo</span>
						<input class="input100" type="text" name="nome" placeholder="Nome" pattern="[a-zA-Z\s]+$" required title="Não use caracteres especiais!">
						<span class="focus-input100"></span>
					</div>
							<!--fim nome-->
							
							<!--comeco data-->
							
					<div class="wrap-input100 validate-input" data-validate="Data requerida">
						<span class="label-input100">Data de nascimento</span>
						<input class="input100" type="date" name="nascimento" required>
						<span class="focus-input100"></span>
					</div>
							<!--fim data-->
							
							<!--Email-->
					<div class="wrap-input100 validate-input" data-validate = "Endereço de email valido Ex.: ex@gmail.com">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Endereço de email" required>
						<span class="focus-input100"></span>
					</div>
							<!--Fim email-->
							
							<!--Senha-->
							
					<div class="wrap-input100 validate-input" data-validate = "Senha requerida">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="senha" placeholder="*************" required>
						<span class="focus-input100"></span>
					</div>
							
							<!--FIm senha-->
							
							<!--Email recuperação-->
					<div class="wrap-input100 validate-input" data-validate = "CPF valido Ex.: 000.000.000-00">
						<span class="label-input100">CPF</span>
						<input class="input100" type="text" name="cpf" placeholder="CPF" maxlength="14" required>
						<span class="focus-input100"></span>
					</div>
							<!--Fim email-->
							
							<!--Foto-->
				
					<span class="label-input100">Selecione uma imagem de perfil</span>
					<br><br>
					<div class="custom-file">
					  	<input type="file" class="custom-file-input" name="img_usuario" id="customFile">
					  	<label class="custom-file-label" for="customFile">Selecionar Arquivo</label>
					</div>
										
							<!--Fim foto-->
							<br>
							<div style="height:2%; width:100%;"></div>
							<br>
							
							
							<div class="container-login100-form-btn" style="margin-top: 15px">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn"  data-toggle="modal" data-target="#exampleModalCenter">
								Termos de Usuário
							</button>
						</div>
					</div>
							
							<!--Botão cadastro-->
					<div class="container-login100-form-btn" style="margin-top: 15px">
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
	
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p> A equipe do Data Form não se responsabiliza por propagação de informações falsas dentro da plataforma,
        apartir do momento de inscrição o usuário passa a ter total responsabilidade pelos formulários
        que ele gera e pelas informaçãoes que ele cativa.</p><br>
        
        Você aceitar o termo de responsabilidade de uso ?<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	
	
	<script src="front_end/temas/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="front_end/temas/vendor/animsition/js/animsition.min.js"></script>
	<script src="front_end/temas/vendor/bootstrap/js/popper.js"></script>
	<script src="front_end/temas/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="front_end/temas/vendor/select2/select2.min.js"></script>
	<script src="front_end/temas/vendor/daterangepicker/moment.min.js"></script>
	<script src="front_end/temas/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="front_end/temas/vendor/countdowntime/countdowntime.js"></script>
	<script src="front_end/js/main.js"></script>

</body>
</html>