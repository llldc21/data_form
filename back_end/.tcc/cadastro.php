 <?php
                if ($_POST) {
                  echo "a";
                  include_once 'conn.php';
                  include_once 'classe/Usuario.php';
                  $nome = $_POST['nome'];
                  $email = $_POST['email'];
                  $senha = $_POST['senha'];
                  $nascimento = $_POST['data'];
                  $data = @date('Y/m/d',strtotime($nascimento));
                  
                  $user = new Usuario();
                  $user->setNome($nome);
                  $user->setSenha($senha);
                  $user->setEmail($email);
                  $user->setEmailRecu($email);
                  $user->setDataNasc($data);
                  $user->Cadastrar();

                  }
              ?>

<!DOCTYPE html>
<html lang="en">
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
  <body style="background-color: #00bcd4;">
    <div class="container">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
          <div class="card text-center" style="background-color:#00bcd4;">
            <div class="card-header" >
              #POO tcc
            </div>
            <div class="card-body" style="background-color:#00bcd4;">
              <form method="post" action="">
                <div class="form-group">
                  <label>nome</label>
                  <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>email recuperação</label>
                  <input type="email" name="email_recu" class="form-control">
                </div>
                <div class="form-group">
                  <label>senha</label>
                  <input type="password" name="senha" class="form-control">
                </div>
                <div class="form-group">
                  <label>data de nascimento</label>
                  <input type="date" name="data" class="form-control">
                </div>
                <input type="submit" name="">
              </form>
          </div>
        </div>
        <div class="col-1"></div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>