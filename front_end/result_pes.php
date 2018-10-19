
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  	<link rel="icon" type="img/png" href="img/icons/favicon.ico"/>
    <link rel="stylesheet" href="css/pes.css">
    <link href="temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
  <title>DataForm</title>

<body>

 <!--------- NAV BAR -------->

      <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top" style="border-bottom:1px solid #000;">
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
              echo '<a class="nav-link asd" href="front_end/user.php">Painel</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="back_end/sair.php">Sair</a></li>';
            }else{
              echo '<a class="nav-link asd" href="front_end/login.php">Entrar</a></li>';
              echo '<li class="nav-item">';
              echo '<a class="nav-link" href="front_end/cadastro.php">Cadastrar</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
     
          <!---------- NAV BAR ----->
        

      <!--COMECO CONTEUDO-->
		          
		          <!--Tags-->
		          
        <div class="left scro">
          
          <div style="margin-left:4%;">
            <h3><b>Categorias</b></h3>
          </div>
          
          <!--Tags a serem exibidas-->
          
          <div class="tags">
            <a href="#" class="hash">      Informática    <!--Tags a serem exibidas-->   </a> 
          </div>
          
          <div class="tags">
            <a href="#" class="hash">      Meio Ambiente    <!--Tags a serem exibidas-->   </a>
          </div>
          
          <div class="tags">
            <a href="#" class="hash">      Administração    <!--Tags a serem exibidas-->   </a>
          </div>
          
          <div class="tags">
            <a href="#" class="hash">       Sem classificação   <!--Tags a serem exibidas-->    </a>
          </div>
        
        </div>
          

              <!--Fim tags-->
              

              <!--Resultados-->
              
        <div class="main">
      
          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e  pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
          
          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e  pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
          

          <div class="resu">
            <div class="tig"> <a href="#" class="result"> O que é Lorem Ipsum?  </a>              <!--Titulo do resultado das pesquisas-->   </div>
Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma 
          </div>
      
        </div>
        
              <!--Fim resultados-->
              
              
              
              
              
<!-- END THE CONTEUDO -->

      <!-- FOOTER -->
      <footer class="navbar navbar-expand-lg navbar-light navbar-custom py-5" style="background-color: rgba(32, 153, 242, 0.8);border-top:1px solid #000;">
    <div class="col-md-2 col-12 offset-md-5">
      <p class="m-0 text-center text-white small">Copyright &copy; Data Form 2018</p>
    </div>
    <!-- /.container -->
  </footer>
	  <!--fim footer-->
  <div class="pagination">
                <buttom class="btn btn-dark" type="buttom">Anterior</buttom>
                <buttom class="btn btn-primary" type="buttom">1</buttom>
                <buttom class="btn btn-primary" type="buttom">2</buttom>
                <buttom class="btn btn-primary" type="buttom">3</buttom>
                <buttom class="btn btn-primary" type="buttom">4</buttom>
                <buttom class="btn btn-primary" type="buttom">5</buttom>
                <buttom class="btn btn-primary" type="buttom">Próximo</buttom>
              </div>
  
  </body>
</html>