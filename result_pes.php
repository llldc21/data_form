<?php
include ('back_end/funcs.php');

if(isset($_GET['palavra']) && '' != $_GET['palavra']){
// if(!(isset($_GET['cat']))){
   
// }

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

<body>

      
        
            <!------ INCLUDE NAV BAR ------->
            
                <?php include('navbar.php'); ?>
            
            <!------ INCLUDE NAV BAR ------->
            
    

      <!--COMECO CONTEUDO-->
		          
		          <!--Tags-->
          <div class="row">
            <div class="col-2 offset-2 left">
              <div class="list-group">
          
                  <a href="result_pes.php?palavra=<?php echo $_GET['palavra'];?>&cat=2" class="list-group-item list-group-item-action">      Informática    <!--Tags a serem exibidas-->   </a> 
                
                  <a href="result_pes.php?palavra=<?php echo $_GET['palavra'];?>&cat=3" class="list-group-item list-group-item-action">      Meio Ambiente    <!--Tags a serem exibidas-->   </a>
                
                  <a href="result_pes.php?palavra=<?php echo $_GET['palavra'];?>&cat=4" class="list-group-item list-group-item-action">      Administração    <!--Tags a serem exibidas-->   </a>
                
                  <a href="result_pes.php?palavra=<?php echo $_GET['palavra'];?>&cat=1" class="list-group-item list-group-item-action">       Sem classificação   <!--Tags a serem exibidas-->    </a>
                
              </div> 
            </div>
            
            
            <div class="col-6 main_res">
              <div class=" ml-2"><h3>Resultados</h3></div>
              <?php
                $results = pesquisa($_GET['cat'],$_GET['palavra']);
                while($result = $results->fetch_array()){
                  echo ' <div class="resu">
                <div class="tig"> <a href="exibir_form.php?cdform='.$result['CD_FORMULARIO'].'" class="result">  '.$result['NM_FORMULARIO'].'</a> </div>
              </div>
              <div class="descri">'.$result['DS_FORMULARIO'].'</div>';  
                }
                
                
              ?>  
            </div>
            
            
          </div>
          
          

            

              <!--Fim resultados-->
              
              
              
              
              
<!-- END THE CONTEUDO -->

      <!-- FOOTER -->
      <footer class="footer py-5" style="background-color: white;  border-top:1px solid #000;">
    <div class="col-md-2 col-12 offset-md-5">
      <p class="m-0 text-center text-black small">Copyright &copy; Data Form 2018</p>
    </div>
    <!-- /.container -->
  </footer>
	  <!--fim footer-->
  
  
  </body>
</html>
<?php
}
?>