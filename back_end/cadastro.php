
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>layout</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8"> 

  </head>
  <body >
    <div class="container-fluid">
      <div class="row" >
      <!-- NAVBAR -->
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Teste</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="cadastro.php">CADASTRAR</a></li>
              <li><a href="login.php">ENTRAR</a></li>
              </ul>
              </nav>  
              <!-- FIM NAVBAR -->

           <div class="col-md-5">
              <form action="cadastro.php" method="post" >
                <div class="form-group">
                  <label >Nome:</label>
                  <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-group">
                  <label >Email:</label>
                  <input type="email" class="form-control" name="email">
                </div>
                 <div class="form-group">
                  <label>Data de Nascimento:</label>
                  <input type="date" class="form-control" name="nascimento">
                </div>
                <div class="form-group">
                  <label>Senha:</label>
                  <input type="password" class="form-control" name="senha">
                </div>
                <div class="form-group">
                  <label>Email de recuperação: </label>
                  <input type="email" class="form-control" name="emailrecup">
                </div>

                <button type="submit" class="btn btn-default">Cadastrar</button>
              </form>
              </div>
            </div>
            </div>
            </div>
              
               <?php 
    if ($_POST) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $emailrecup = $_POST['emailrecup'];
      $nascimento = $_POST['nascimento'];
      $senha = $_POST['senha'];
      $data = @date('Y/m/d',strtotime($nascimento));
      // conectando no banco
      include('conexao.php');

      // criar liha de comando
      $sql = 'INSERT INTO TB_USUARIO  VALUES (NULL,"'.$nome.'","'.$email.'","'.$data.'","'.$senha.'","'.$emailrecup.'")';
    
    // seexecutar o ocmando foi cadastrado
    $executar = $conexao->query($sql);
    if ($executar) {
      echo "CADASTRADO COM SUCESSO";
    }else{
      echo "ERRO AO CADASTRAR";
    }
  }
  ?>

  </div>
 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>