<?php
  include('../back_end/funcs.php');
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Página Inicial | Data Form</title>

  <!-- Bootstrap core CSS -->
  <link href="temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/main.css">
  <link href="temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom" style="border-bottom:1px solid #000;">
    <div class="container">
      <a class="navbar-brand dsa" href="index.php"><img src="img/img.png" height="50px"> Data Form</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Recipient's username"
          aria-describedby="basic-addon1">
        <div class="input-group-append">
          <button class="btn btn-outline-dark" type="button" style="font-family: 'Catamaran'">Pesquisar</button>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php
            if(isset($_GET['logado'])){
              echo '<a class="nav-link" href="user.php">Painel</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="back_end/sair.php">Sair</a></li>';
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
  
<body>
    
      
      <div class="container">
        <div class="row">
            <div class="col-md-6 masds offset-md-3">
                            
                <!-- ========= Conteudo a ser exibido no formulario de resposta =========== -->
                <form action="exibir_form.php" method="POST">
                <?php 
                  $np = 0;
                 $form = ListaPerguntasPorForm($_GET['cdform']);
                 while($forms = $form->fetch_array()){
                  switch($forms['CD_TIPO_PERGUNTA']){
                    case 1:
                      echo $forms['NM_PERGUNTA'].'<input type="text" style="form-control" name="'.$forms['CD_PERGUNTA'].'">  <br>';
                      break;
                    case 2:
                      echo $forms['NM_PERGUNTA'].'<input type="text" style="form-control" name="'.$forms['CD_PERGUNTA'].'">  <br>';
                      break;
                    case 3:
                       $alt = ListarAlternativasPorPergunta($forms['CD_PERGUNTA']);
                       if(0 < $alt->num_rows){
                        echo $forms['NM_PERGUNTA'].'<br>';
                        while($alts = $alt->fetch_array()){
                          echo '<input type="radio" style="form-control" value="'.$alts['CD_ALTERNATIVA'].'" name="'.$forms['CD_PERGUNTA'].'">'.$alts['NM_ALTERNATIVA'].'<br>';
                        }
                       }
                      break;
                    case 4:
                      $alt = ListarAlternativasPorPergunta($forms['CD_PERGUNTA']);
                        if(0 < $alt->num_rows){
                         echo $forms['NM_PERGUNTA'].'<br>';
                          while($alts = $alt->fetch_array()){
                            $i = 1;
                            echo '<input type="checkbox"  value="'.$alts['CD_ALTERNATIVA'].'" name="alternativa[]">'.$alts['NM_ALTERNATIVA'].'<br>';
                            $i++;
                          }
                        }
                      break;
                  }
                   ?>
                <?php    
                 }
                ?>
                <input type="submit" name=""/>
                </form>
                <?php 
                  if($_POST){
                     ResponderForm($_GET['cdform']);
                  }
                ?>
            </div>
          
        </div>
      </div>
      
    
  <!-- Footer -->
  <footer class="py-5 fixed-bottom" style="background-color: rgba(32, 153, 242, 0.8);border-top:1px solid #000;">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Data Form 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>