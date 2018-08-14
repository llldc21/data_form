<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>layout</title>

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
              <form action="index.php" method="post" >
                <div class="form-group">
                  <span>nome</span>
                  <input type="text" class="input-group" name="nome">
                </div>
                <div class="form-group">
                  <span>email</span>
                  <input type="email"  class="input-group" name="email">
                </div>
                <div class="form-group">
                  <span>data de nascimento</span>
                  <input type="date" class="input-group" name="nascimento">
                </div>
                <div class="form-group">
                  <span>Senha</span>
                  <input type="password"  class="input-group" name="senha">
                </div>
                
                  

                 <input class="btn btn-primary" type="submit">
              </div>
            </div>
              
               <?php 
    if ($_POST) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $nascimento = $_POST['nascimento'];
      $senha = $_POST['senha'];
      $data = @date('Y/m/d',strtotime($nascimento));
      // conectando no banco
      include('conexao.php');

      // criar liha de comando
      $sql = 'INSERT INTO tb_usuario VALUES (NULL,"'.$nome.'","'.$email.'","'.$data.'","'.$senha.'","'.$email.'")';
    
    // seexecutar o ocmando foi cadastrado
    $executar = $conexao->query($sql);
    if ($executar) {
      echo "foi cadastrado";
    }else{
      echo "erro ao cadastrar";
    }
  }
  ?>

  </div>
 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>