

<?php
//arquivo de conexao com BD
include('conexao.php');
if ($_POST) {
      $email = $_POST['email'];
       $senha = $_POST['senha'];

$sql = 'SELECT * FROM tb_usuario WHERE ds_email="'.$email.'" AND ds_senha="'.$senha.'" limit 1';

//executando a consulta
$resultado = $conexao->query($sql);

if($resultado){
	$usuario = $resultado->fetch_array();

	echo ' <script> alert("LOGADO"); </script>';  

	}
}	

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>login</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

  </head>
  <body >
    <div class="container">
      <div class="row" >
            <div class="form-control col-md-6 offset-3" id="coll">
              <form action="login.php" method="post" >
                <div class="form-group">
                  <span>email</span>
                  <input type="email"  class="input-group" name="email">
                </div>
                <div class="form-group">
                  <span>Senha</span>
                  <input type="password"  class="input-group" name="senha">
                </div>
                
                  

                 <input class="btn btn-primary" type="submit">
              </div>
            </div>
  </div>
 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

