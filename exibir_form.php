<?php 
session_start();
include('back_end/funcs.php');
   $seras = ExisteForm($_GET['cdform']);
   $sera = $seras->fetch_array();
if(isset($_GET['cdform']) && "" != $sera){
    // if(!(strtotime(date('Y-m-d')) >= strtotime($sera['DT_FECHAMENTO_FORM']) || strtotime(date('Y-m-d')) < strtotime($sera['DT_ABERTURA_FORM']))){
    if(!(("" == strtotime($sera['DT_FECHAMENTO_FORM']) ? false : strtotime(date('Y-m-d')) >= strtotime($sera['DT_FECHAMENTO_FORM'])) || strtotime(date('Y-m-d')) < strtotime($sera['DT_ABERTURA_FORM']))){
        // if(!("" == strtotime($sera['DT_ABERTURA_FORM']))){
?>
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
  <link rel="stylesheet" href="css/main.css">
  <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

        
            <!------ INCLUDE NAV BAR ------->
            
                <?php include('navbar.php'); ?>
            
            <!------ INCLUDE NAV BAR ------->
            
    
  
<body>
    
      
      <div class="container">
        <div class="row">
            <div class="col-md-6 masds offset-md-3">
                            
                <!-- ========= Conteudo a ser exibido no formulario de resposta =========== -->
                <form action="exibir_form.php?cdform=<?php echo $_GET['cdform']?>" method="POST">
                <?php 
                  $np = 0;
                 $form = ListaPerguntasPorForm($_GET['cdform']);
                 while($forms = $form->fetch_array()){
                  switch($forms['CD_TIPO_PERGUNTA']){
                    case 5:
                      echo $forms['NM_PERGUNTA'].'<input type="text" style="form-control" name="'.$forms['CD_PERGUNTA'].'">  <br>';
                      break;
                    case 6:
                      echo $forms['NM_PERGUNTA'].'<input type="text" style="form-control" name="'.$forms['CD_PERGUNTA'].'">  <br>';
                      break;
                    case 7:
                       $alt = ListarAlternativasPorPergunta($forms['CD_PERGUNTA']);
                       if(0 < $alt->num_rows){
                        echo $forms['NM_PERGUNTA'].'<br>';
                        while($alts = $alt->fetch_array()){
                          echo '<input type="radio" style="form-control" value="'.$alts['CD_ALTERNATIVA'].'" name="'.$forms['CD_PERGUNTA'].'">'.$alts['NM_ALTERNATIVA'].'<br>';
                        }
                       }
                      break;
                    case 8:
                      $alt = ListarAlternativasPorPergunta($forms['CD_PERGUNTA']);
                        if(0 < $alt->num_rows){
                         echo $forms['NM_PERGUNTA'].'<br>';
                          while($alts = $alt->fetch_array()){
                            $i = 1;
                            echo '
                            
                            <input type="checkbox"  value="'.$alts['CD_ALTERNATIVA'].'" name="alternativa[]">'.$alts['NM_ALTERNATIVA'].'<br>
                            
                            ';
                            $i++;
                          }
                        }
                      break;
                  }
                
                 }
                  echo '<input type="submit" >';
                ?>
                
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
  <footer class="py-5 footer">
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
<?php
        // }else{
        //     header('location:fechado.php');
        // }
    }else{
        header('location:fechado.php');
    }
}else{
    header('location:nao_existe.php');
}

?>