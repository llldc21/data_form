<?php
include "back_end/conexao.php";

if(isset($_GET['palavra'])){
$sql = 'SELECT * NM_FORMULARIO AND DS_DESCRICAO FROM TB_FORMULARIO ='.$_GET['palavra'];
$res = $con->query($sql);

while($palavra = $res-> fetch_array()){

  
    }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  	<link rel="icon" type="img/png" href="img/icons/favicon.ico"/>
    <link rel="stylesheet" href="css/pes.css">
    <link href="frond_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front_end/css/main.css">
  <title>DataForm</title>

<body style="background-color:#eaf9f9; font-family: 'Catamaran'">

      
        
            <!------ INCLUDE NAV BAR ------->
            
                <?php include('navbar.php'); ?>
            
            <!------ INCLUDE NAV BAR ------->
            
    

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
        
          <?php
            echo ' <div class="resu">
            <div class="tig"> <a href="result_pes.php" class="result"> '.$palavra['NM_FORMULARIO'].'  </a>              <!--Titulo do resultado das pesquisas-->   </div>
              '.$palavra['DS_DESCRICAO'].'
          </div>';
          ?>   
          

             
      
        </div>
        
              <!--Fim resultados-->
              
              
              
              
              
<!-- END THE CONTEUDO -->

      <!-- FOOTER -->
      <footer class="navbar navbar-expand-lg navbar-light navbar-custom fixed-bottom py-5" style="background-color: rgba(32, 153, 242, 0.8);border-top:1px solid #000;">
    <div class="col-md-2 col-12 offset-md-5">
      <p class="m-0 text-center text-white small">Copyright &copy; Data Form 2018</p>
    </div>
    <!-- /.container -->
  </footer>
	  <!--fim footer-->
  
  
  </body>
</html>