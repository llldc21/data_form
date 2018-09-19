<?php
session_start();
include('../back_end/funcs.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
        $dados = ListarDadosUsuario($_SESSION['cd']);
        while ($dado = $dados->fetch_array()){
    ?>
    <?php
    $edit = $dado['NM_USUARIO'];
    $n = explode(' ', $edit);
    $nome = $n[0].' '.$n[1];
    ?>
    <title><?php echo $nome.' | Data Form';?></title>
    <?php
        };
    ?>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style type="text/css">
        #navbar { margin-bottom:0; font-family:arial, verdana; }
    </style>
    
</head>

<body>

<!-- MENU LEFT -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <!-- INF DO USER -->
            <div class="sidebar-header">
            <?php
                $dados = ListarDadosUsuario($_SESSION['cd']);
                while ($dado = $dados->fetch_array()){
            ?>
            <img src="<?php echo $dado['IMG_USUARIO'];?>" class="img-fluid">
            <br>
            <?php
                $edit = $dado['NM_USUARIO'];
                $n = explode(' ', $edit);
                $nome = $n[0].' '.$n[1];
            ?>
            <p><?php echo $nome;?></p>
            <?php
                };
            ?>
            </div>
            <!-- INF DO USER -->
            
            <!-- LINKS DO MENU LEFT -->
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-home"></i>
                        Ações
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">link</a>
                        </li>
                        <li>
                            <a href="#">link</a>
                        </li>
                        <li>
                            <a href="#">link</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <!--<a href="#">
                        <i class="fas fa-briefcase"></i>
                        link
                    </a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        link
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">link</a>
                        </li>
                        <li>
                            <a href="#">link</a>
                        </li>
                        <li>
                            <a href="#">link</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-image"></i>
                        link
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        link
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        link
                    </a>
                </li>-->
            </ul>
            <!-- FECHA LINKS MENU LEFT -->
            
        </nav>
<!-- FECHA MENU LEFT -->

        <!-- MENU CIMA  -->
        <div id="content">

<!--------- NAV BAR -------->

      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
         <!-- tag navbar -->
              <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <!-- img logo -->
          
            <!-- inicio form -->
              <div class="input-group col-md-8 col-6 inputNav">
                <!-- input search -->
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                <!-- input search -->
                
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary" type="button">
                    <!-- botao search -->
                    
                    <!-- icon search -->
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <!-- icon search -->

                  </button>
                </div>
              </div>
              <!-- fim form -->
            
            <!-- inicio toggle dropdown -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- botao toggle cel -->
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <!-- colapse sanfona -->
              
              <!-- inicio links -->
              <ul class="navbar-nav" style="margin-left:35px;">
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <p class="nav-link">/</p>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cadastro.php">Cadastre-se <span class="sr-only">(current)</span></a>
                </li>
              </ul>
              <!-- fim links -->
              
            </div>
            </div>
          </nav>
     
          <!---------- NAV BAR ----->




            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <!-- <span>TEXTO BOTAO</span> -->
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="../back_end/sair.php">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <!-- FECHA MENU CIMA -->
            
        <!-- ABRE MENU CIMA 2 -->
            <div class="row">  
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                    <!-- botoes de grupo --> 
                        <div class="col-md-2 col-sm-2 offset-sm-10 offset-md-0 btgroup">
                            <button class="btn btn-outline-secondary"> <i class="fas fa-th fa-2x"></i> </button>
                           <button class="btn btn-outline-secondary"> <i class="fas fa-th-list fa-2x"></i> </button>
                        </div>
                    <!-- botoes de grupo -->
                
                    <!-- search -->
                        <div class="col-md-8">
                            
                        </div>
                    <!-- search -->
                    
                    <!-- input datas -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="exampleSelect1">Data de criação</label>
                                <select class="form-control" id="exampleSelect1">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                             </div>
                        </div>
                    <!-- input datas -->
                    
                    </div><!-- col 12 -->
                </div>
            </div><!-- row -->
        
        
        <!-- FECHA MENU CIMA 2 -->
            
            
        <!-- CONTEUDO -->
        
            <!-- LINHA -->
            <div class="line"></div>
            <!-- LINHA -->
            <div id="content">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                        <div class="row" id="form">
                            
                        <!-- ADD -->
                        <button class="col-md-3 col-sm-8 add" id="add">
                            
                            <span class="fas fa-plus-circle fa-4x" style="margin-bottom:10px;" ></span>
                          
                           
                            <h5>Create new form</h5>
                           
                        </button>
                        <!-- ADD -->
                        
                        
                        
                        
                </div><!-- row -->
                </div><!-- col 12 -->
            </div><!-- row -->
            
            <!-- LINHA -->
            <div class="line"></div>
            <!-- LINHA -->
            
        <!-- FECHA CONTEUDO -->    
        </div><!-- container -->
</div><!-- content -->    
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>

    <script type="text/javascript">

        //$(document).ready(function(){

          //  $('#add').click(function(){
            //    var texto = ;
                
              //  $('#form').append(texto);
            //});

        //});
    
    </script>
</body>

</html>