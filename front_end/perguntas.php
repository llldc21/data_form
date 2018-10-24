<?php
session_start();
include('../back_end/funcs.php');

if (isset($_GET['criar'])) {
    CadastrarFormulario();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    $dados = ListarDadosUsuario($_SESSION['cd']);
                while ($dado = $dados->fetch_array()){
                    $nome = explode(' ', $dado['NM_USUARIO'])
                ?>
    <title>Data Form |
        <?php echo $nome[0].' '.$nome[1]?>
    </title>
    <?php };?>
    <!-- Bootstrap core CSS -->
    <link href="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../front_end/css/main.css">
    <link href="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="css/criaform.css" type="text/css" />-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <script>
        $(document).on('click', '.perguntas', function(){
            var botoes = '<i data-toggle="modal" data-target=".bd-example-modal-lg" class="fas fa-plus icone fa-3x"></i><i class="fas fa-check icone fa-3x vai"><button type="submit"></button></i>';
            $('#footer').append(botoes);
        });
        $(document).on('click', '.perguntas', function(){
            $('#footer').parent().hide();
        })
    </script>

</head>

<body style="background-color:#eaf9f9;">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="user.php" method="post">
                    <div class="modal-body">
                        <h3>Alterar foto</h3>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileLang" lang="pt-br">
                            <label class="custom-file-label" id="foto_nova" for="customFileLang">Selecione o arquivo...</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <!-- Modal Perfil -->
        <div class="modal fade" id="examModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header frescuras">
                <h5 class="modal-title" id="exampleModalLabel"> <center>Perfil </center></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body modper">
                    
                     <?php
                        $dados = ListarDadosUsuario($_SESSION['cd']);
                        while ($dado = $dados->fetch_array()){
                            $nome = explode(' ', $dado['NM_USUARIO'])
                        ?>
                        <div class="foto">
                            <center>
                            <img src="<?php echo $dado['IMG_USUARIO']?>" class="rounded-circle card-img-top" width="100%" height="50%">
                            </center>
                        </div>
                        
                        <div style="margin-top: 20px;"> 
                            <h3 class="text-center" id="nome-user">
                                <?php echo $nome[0].' '.$nome[1]?>
                            </h3>
                            
                            <button type="button" class="btn frescuras-btn btn-block" data-toggle="modal" data-target="#exampleModal">Editar dados</button>
                            <button type="button" class="btn frescuras-btn btn-block"><center> Gerenciar Formulários </center></button>
                        </div>
                        
                    <?php };?>
                    
              </div>
              <div class="modal-footer frescuras">
                
              </div>
            </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed">
        <div class="container">
            <a class="navbar-brand mr-5" href="../index.php?logado"><img src="../front_end/img/img.png" height="50px"> Data Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="input-group" >
                <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Recipient's username"
                    aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn btn-outline-dark" type="button" style="font-family: 'Catamaran'">Pesquisar</button>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link ml-2 respo" data-toggle="modal" data-target="#examModal">Perfil</a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="../back_end/sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <br>
        </div>
    </div>
          
            <div class="container-fluid">
              <div class="row">
                
                
                <!-- FORMULARIO -->
                 <div class="col-md-7 scrou offset-md-1" style="background-color:#fff;border:1px solid #70baf4;">
                     <div class="row">
                         <h3 style="padding-left:20px;"> Criar Formularios</h3>
                         
                     </div><!-- row -->
                     <div style="padding-top:5px;border-bottom:1px solid #ccc;"></div>
                     
                     <div class="row conteudo container-fluid" style="padding:20px;">
                        <div class="container-fluid">     
                            <div class="form-group" id="conteudo">
                             <!-- forms vai aqui -->
                             </div>
                        </div>     
                     </div>
                     
                     
                 </div><!-- fim col 5 -->
                <!-- FORMULARIO -->
                
                     
                  <div class="col-md-1" style="padding:0;">
                     
                  </div><!-- div exemplos -->
                
                <div class="col-md-2 pergun sticky-top" style="background-color:#fff;border:1px solid #70baf4;">
                      <h5 class="h5 text-center">Perguntas</h5>
                      <?php
                        $tipo = ListarTipoPergunta();
                        while($tipos = $tipo->fetch_array()){
                      ?>
                      <button class="btn btn-dark btn-block campo" id="<?echo $_SESSION['form']?>"   val="<?php echo $tipos['CD_TIPO_PERGUNTA']?>" ><?php echo $tipos['NM_TIPO_PERGUNTA']?></button>
                        <?php };?>
                      
                      <br><br>
  
                </div>
      </div>
      
</div>     
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="ajax.js"></script>
</body>
</html>