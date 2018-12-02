<?php
session_start();
include('back_end/funcs.php');

if(isset($_FILES['img_usuario'])){
    AtualizarImg($_POST['email'], $_FILES['img_usuario'], $_SESSION['cd']);
}
if(isset($_POST['nome'])){
   AtualizarUsuario($_POST['nome'],$_POST['data'], $_SESSION['cd']);
}

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
                            <button href="user.php" type="button" class="btn btn-primary btn-block" > Meus Formulários </button>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#mm" > Manual de Usuário</button>
                        </div>
                        
                    <?php };?>
                    
              </div>
              <div class="modal-footer frescuras">
                
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
                     <div class="user-dados">
                    
                    <div class="foto-user">
                    
                    <img src="<?php echo $dado['IMG_USUARIO']?>" class="rounded-circle img-responsive img-fluid">
                    
                    </div>
                    

                <div style="margin-top: 20px;"> 
                <h4 class="h4 text-center " id="nome-user">
                        <?php echo $nome[0].' '.$nome[1];?>
                </h4>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" style="color:white;">Editar dados</button>
                 <button href="user.php" type="button" class="btn btn-primary btn-block" > Meus Formulários </button>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#mm" > Manual de Usuário</button>
                </div>
                </div>
                        
                    <?php };?>
                    
              </div>
              <div class="modal-footer frescuras">
                
              </div>
            </div>
      </div>
    </div>


        
            <!------ INCLUDE NAV BAR ------->
            
                <?php include('navbar.php'); ?>
            
            <!------ INCLUDE NAV BAR ------->
            
    
    
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
                            <h4 class="h4 text-center">Categoria</h4>
                            
                            
                            
                            <select name="categoria" class="form-control dara">
                            <?php
                                $dados = ListarCategoria($_SESSION['cd']);
                                while ($dado = $dados->fetch_array()){
                            ?>
                                <option value="<?php echo $dado['CD_CATEGORIA'];?>" id="categoria" class="form-control"><?php echo $dado['NM_CATEGORIA'];}?></option>
                            </select>
                            
                            
                            
                       
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