<?php 
include('back_end/funcs.php');
   $seras = ExisteForm($_GET['cdform']);
   $sera = $seras->fetch_array();
if(isset($_GET['cdform']) && "" != $sera){
    
      
    
 
   
   
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
                 <?php
                $pergunta = ListaPerguntasPorForm($_GET['cdform']);
                while($perguntas = $pergunta->fetch_array()){
                 echo '<h2>'.$perguntas['NM_PERGUNTA'].'</h2><br>';
                      switch($perguntas['CD_TIPO_PERGUNTA']){
                        case 1:
                          $alt = ListarAlternativasPorPergunta($perguntas['CD_PERGUNTA']);
                          echo'<ul class="list-group">';
                            while($alts = $alt->fetch_array()){
                              echo' <li class="list-group-item">'.$alts['NM_ALTERNATIVA'].'</li>';
                            }
                          echo'</ul>';
                        break;
                        case 2:
                           $alt = ListarAlternativasPorPergunta($perguntas['CD_PERGUNTA']);
                          echo'<ul class="list-group">';
                            while($alts = $alt->fetch_array()){
                              echo' <li class="list-group-item">'.$alts['NM_ALTERNATIVA'].'</li>';
                            }
                          echo'</ul>';
                        break;
                        case 3:
                          $dados = ' google.charts.load(\'current\', {\'packages\':[\'corechart\']});
                                    google.charts.setOnLoadCallback(a'.$perguntas['CD_PERGUNTA'].');
                                      function a'.$perguntas['CD_PERGUNTA'].'() {
                                      var data = google.visualization.arrayToDataTable([[\'nome\', \'quantidade\'],';
                          $alt = ListarAlternativasPorPergunta($perguntas['CD_PERGUNTA']);
                          echo'<ul class="list-group">';
                          
                            while($alts = $alt->fetch_array()){
                            $cont = ContarAlternativa($alts['CD_ALTERNATIVA']);
                             $conts = $cont->fetch_array();
                                
                                 
                                  $dados .= '[\''.$alts['NM_ALTERNATIVA'].'\','.$conts['total'].'],';
                                            
                            }
                            $dados = substr($dados, 0, -1); //retira ultimo caracter
                            $dados .= ']); var options = {title: \''.$perguntas['NM_PERGUNTA'].'\'};
                            var chart = new google.visualization.PieChart(document.getElementById(\'c'.$perguntas['CD_PERGUNTA'].'\'));
                            chart.draw(data, options);
                                      }';
                            echo '<div id=\'c'.$perguntas['CD_PERGUNTA'].'\' style=\'width: 700px; height: 500px;\'></div>';
                                 
                      break;
                        case 4:
                          $dados .= ' 
                                    google.charts.setOnLoadCallback(a'.$perguntas['CD_PERGUNTA'].');
                                      function a'.$perguntas['CD_PERGUNTA'].'() {
                                      var data = google.visualization.arrayToDataTable([[\'nome\', \'quantidade\'],';
                          $alt = ListarAlternativasPorPergunta($perguntas['CD_PERGUNTA']);
                          echo'<ul class="list-group">';
                          
                            while($alts = $alt->fetch_array()){
                            $cont = ContarAlternativa($alts['CD_ALTERNATIVA']);
                             $conts = $cont->fetch_array();
                                
                                // echo' <li class="list-group-item ">nome: '.$alts['NM_ALTERNATIVA'].' || quantidade: '.$conts['total'].'</li>';
                                  $dados .= '[\''.$alts['NM_ALTERNATIVA'].'\','.$conts['total'].'],';
                                            
                            }
                            $dados = substr($dados, 0, -1); //retira ultimo caracter
                            $dados .= ']); var options = {title: \''.$perguntas['NM_PERGUNTA'].'\'};
                            var chart = new google.visualization.ColumnChart(document.getElementById(\'c'.$perguntas['CD_PERGUNTA'].'\'));
                            chart.draw(data, options);
                                      }';
                            echo '<div id=\'c'.$perguntas['CD_PERGUNTA'].'\' style=\'width: 700px; height: 500px;\'></div>';
                          
                        break;
                        
                      }
                
                }
               
              ?>
                
            </div>
          
        </div>
      </div>
      
    
  <!-- Footer -->
  <footer class="footer py-5">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; Data Form 2018</p>
    </div>
  </footer>
  
  
  
  
  
  <!--API GRAFICO-->
  <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>
     google.charts.load('current', {'packages':['corechart']});
      <?php echo $dados; ?>
    </script>
    <!--jquey-->
    <script type="text/javascript" src="js/jquery-3.2.1.min"></script>
   
  <!-- Bootstrap core JavaScript -->
  <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php

 }else{
   include('nao_existe.php');
 }

?>