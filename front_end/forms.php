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
    <link rel="stylesheet" href="css/criaform.css" type="text/css" />
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

<body>
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
                            <img src="<?php echo $dado['IMG_USUARIO']?>" class="rounded-circle" width="100%" height="50%">
                            </center>
                        </div>
                        
                        <div style="margin-top: 20px;"> 
                            <h5 class="text-center" id="nome-user">
                                <?php echo $nome[0].' '.$nome[1]?>
                            </h5>
                            
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


    <nav class="navbar navbar-expand-lg navbar-light navbar-custom ">
    <div class="container">
      <a class="navbar-brand dsa" href="../index.php"><img src="img/img.png" height="50px"> Data Form</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            
          		<input type="submit" value="" class="search-submit"> 
          		<input type="search" name="q" class="search-text ml-5" placeholder="Procurar..." autocomplete="off">
       
                  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
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
    
    
        <div class="row rowzin">
            <div class="col-md-2" id="user">
                
                <?php
                $dados = ListarDadosUsuario($_SESSION['cd']);
                while ($dado = $dados->fetch_array()){
                    $nome = explode(' ', $dado['NM_USUARIO'])
                ?>

                <div class="user-dados">
                    
                    <div class="foto-user">
                    
                    <img src="<?php echo $dado['IMG_USUARIO']?>" class="rounded-circle img-responsive img-fluid">
                    
                    </div>
                    

                <div style="margin-top: 20px;"> 
                <h4 class="h4 text-center " id="nome-user">
                        <?php echo $nome[0];?>
                </h4>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" style="color:white;">Editar dados</button>
                <button type="button" class="btn btn-primary btn-block" > <a href="user.php" style="color:white;" >Meus Formulários</a></button>
                <button type="button" class="btn btn-primary btn-block"> <a href="../docs/Manual do Usuario.docx" target="_blank" style="color:white;" > Manual de Usuário</a></button>
                </div>
                </div>
                
                <?php };?>
            </div>
            
            
            <div class="col-md-8 offset-md-1 col-12 contuser" id="conteudo">
                <br>
                    <div class="row">
                        <div class="col-12">
                        <center>
                            <h3>Criação de Formulário</h3>
                        </center>
                        </div>
                    </div>
                <hr>
                        
                     <div class="row">
                      <div class="col-6">
                    
                        <input type="hidden" name="" id="cd_usuario" value="<?php echo $_SESSION['cd']?>">
                        <input type="hidden" name="" id="cd_form" value="<?php echo $_SESSION['form']?>">
                        
                        
                        <br><br><br>
                        
                        
                           <input type="text" class="inputst " name="nome_form" id="nome_form" require placeholder="Insira o nome do Formulário">
                        
                        <br><br><br>
                          
                           <input type="text" class="inputst mt-5" name="desc_form" id="desc_form" cols="30" rows="1" require placeholder="Insira uma descrição">
                        
                        
                        <br><br><br>
                        
                        
                        
                        
                          
                       </div>
                      
                      <div class="col-6">
                        <div class="col-12">
                            <br>
                            <h4 class="h4 text-center">Data de abertura:</h4>
                            <input type="date" class="form-control dara" name="data_abertura" id="data_abertura">
                        </div>
                        <div class="col-12">
                            <br>
                            <h4 class="h4 text-center">Categoria</h4>
                            
                            
                            
                            <select name="categoria" class="form-control dara">
                            <?php
                                $dados = ListarCategoria($_SESSION['cd']);
                                while ($dado = $dados->fetch_array()){
                            ?>
                                <option value="<?php echo $dado['CD_CATEGORIA'];?>" id="categoria" class="form-control"><?php echo $dado['NM_CATEGORIA'];}?></option>
                            </select>
                            
                            
                            
                        </div>
                        <div class="col-12">
                            <br>
                            <h4 class="h4 text-center">Data de fechamento:</h4>
                            <input type="date" class="form-control dara" name="data_fechamento" id="data_fechamento">
                        </div>
                    </div>
                    <br>
                    <br>
                    
                  </div>
        
                            <a href="perguntas.php"><button type="button" class=" mt-5 btn btn-primary btn-block" id="novo">Perguntas</button></a>
                            <button type="button" class="btn btn-success mt-1 btn-block" id="fin">Finalizar</button><br>                            
                            <button class="btn btn-primary btn-block perguntas mt-5" id="criar">Criar Formulário</button><br>
    
            </div>
        </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>


<style type="text/css">
    
    
    
</style>