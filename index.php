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
            
          		<input type="submit" value="" class="search-submit"> 
          		<input type="search" name="q" class="search-text" placeholder="Procurar..." autocomplete="off">
       x
                  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php
            if(isset($_GET['logado'])){
              echo '<a class="nav-link" href="front_end/user.php">Painel</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="back_end/sair.php">Sair</a></li>';
            }else{
              echo '<a class="nav-link" href="front_end/login.php">Entrar</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="front_end/cadastro.php">Cadastrar</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
<div class="bg">
  <header class="masthead text-center text-white">
    
    <div class="masthead-content">
      <div class="container">
        <h3 class="masthead-heading mb-0">Data Form</h3>
        <h4 class="masthead-subheading mb-0">Crie formulários e compartilhe!</h4>
          <div class="wrap-login100-form-btn" style="width: 30%; margin-top: 60px;">
            <div class="login100-form-bgbtn"></div>
            <button href="#cont" type="submit" class="login100-form-btn">
              Leia Mais!
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid" src="front_end/img/03.jpg" style="border-radius: 5px;" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-5" id="cont">Criar</h2>
            <p>Crie formularios para pesquisas de campo ou qualquer outro tipo de pesquisas.
                construa graficos incriveis com respostas de usuarios ou dados que vc msm coletou.
                Tudo isso de uma maneira rapida e facil com um conforto que o Data Form lhe fornece,
                com total simplicidade rapidez.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid" src="front_end/img/01.jpg" style="border-radius: 5px;" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h3 class="display-5">Pesquisar</h3>
            <p>Trabalho de escola atrasado? tem prova no dia seguinte e n sabe nada?
                que tal usar o Data Form para realizar suas pesquisas com total facilidade e rapidez?
                busque e ache qualquer tipo de informaçao nescessaria para voce,
                buscando pela informaçao desejada voce ira obter apenas aquela informaçao nescessaria.
                nossa plataforma lhe garante uma super facilicade e conforto para realizar suas
                pesquisas.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid" src="front_end/img/02.jpg" style="border-radius: 5px;" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-5">Compartilhar</h2>
            <p>A sua pesquisa pode ser compartilhada para qualquer outra pessoa q precise.
                pesquisou! criou! compartilhe ! 
                Com o Data Form vc tem a opçao de compartilhar a sua pesquisa como preferir, de uma maneira 
                simples de entender.
                Deixando a sua vida e a vida de outros usuarios mt mais facil.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5" style="background-color: rgb(0,0,0);border-top:1px solid #000;">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Data Form 2018</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>