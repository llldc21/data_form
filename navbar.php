<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Página Inicial | Data Form</title>

  <!-- Bootstrap core CSS -->
  <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="front_end/css/main.css">
  <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom ">
    <div class="container">
      <a class="navbar-brand dsa" href="index.php"><img src="front_end/img/img.png" height="50px"> Data Form</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            
            <form action="<?php if(isset($_GET['logado'])){echo 'result_pes.php';}else{echo 'result_pes.php';}; ?>" style="margin-top:-25px;" method="post" >
          		<input type="search" name="q" class="input-form" placeholder="Procurar..." autocomplete="off">
         </form>
                  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php
            if(isset($_GET['logado'])){
              echo '<a class="nav-link" href="user.php">Painel</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="sair.php">Sair</a></li>';
            }else{
              echo '<a class="nav-link" href="login.php">Entrar</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="cadastro.php">Cadastrar</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
   <!-- Bootstrap core JavaScript -->
  <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>