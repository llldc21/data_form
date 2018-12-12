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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    
    
    <!--    Include     ------------------   Modal  -->

    <?php include('modal_edit_dados.php'); ?>
    
    
    <!--    Include     ------------------   Modal  -->
    
    


        
            <!------ INCLUDE NAV BAR ------->
            
                <?php include('navbar.php'); ?>
            
            <!------ INCLUDE NAV BAR ------->
            
    
    
        <div class="row h-100">
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
                <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModal" style="color:white;">Editar dados</button>
                <button type="button" class="btn btn-dark btn-block" > <a href="user.php" style="color:white;" >Meus Formulários</a></button>
                <button type="button" class="btn btn-dark btn-block"> <a href="docs/Manual do Usuario.docx" target="_blank" style="color:white;" > Manual de Usuário</a></button>
                </div>
                </div>
                
                <?php };?>
            </div>
            
            
            <div class="col-md-10 h-100 col-12 contuser">
                <br>
                    <div class="row">
                        <div class="col-12">
                        <center>
                            <h4>Criação de Formulário</h4>
                        </center>
                        </div>
                    </div>
                <hr>
                        
                     <div class="row">
                      <div class="col-5 offset-1">
                    
                        <input type="hidden" name="" id="cd_usuario" value="<?php echo $_SESSION['cd']?>">
                        <input type="hidden" name="" id="cd_form" value="<?php echo $_SESSION['form']?>">
                        
                        
                        <br><br><br>
                        
                        
                        <div class="wrap-input100 validate-input m-b-23">
        						<span class="label-input100">Nome do Formulário</span>
        						<input class="input100" type="text" id="nome_form" name="nome_form" require placeholder="Nome do Formulário">
        						<span class="focus-input100" data-symbol="&#9776;"></span>
        				</div>
        					
        					
        					
                        <br><br><br>
                          
                            <div class="wrap-input100 validate-input m-b-23">
        						<span class="label-input100">Descrição do Formulário</span>
        						<input class="input100" type="text" id="desc_form" maxlength="140" name="desc_form" cols="30" rows="1" require placeholder="Insira uma descrição">
        						<span class="focus-input100" data-symbol="&#9776;"></span>
        					</div>                        
                        
                        <br>
                            
                            <span class="label-input100">categoria</span>
                            <select name="categoria" class="form-control mt-3">
                            <?php
                                $dados = ListarCategoria($_SESSION['cd']);
                                while ($dado = $dados->fetch_array()){
                            ?>
                                <option value="<?php echo $dado['CD_CATEGORIA'];?>" id="categoria" class="form-control"><?php echo $dado['NM_CATEGORIA'];}?></option>
                            </select>
                          
                       </div>   
                      
                      <div class="col-5">
                       
                        <div class="col-12 mt-5">
                            
                            <br>
                    
                        <div class="wrap-input100 validate-input" data-validate="Data requerida">
						    <span class="label-input100">Data de Abertura</span>
						    <input class="input100" type="date" id="abertura" name="dataf">
						    <span class="focus-input100" data-symbol="&#10004;"></span>
					    </div>
					    <br>
					    <br>
                        <br>
					    <div class="wrap-input100 validate-input" data-validate="Data requerida">
						    <span class="label-input100">Data de Fechamento</span>
						    <input class="input100" type="date" id="fechamento" name="dataa">
						    <span class="focus-input100" data-symbol="&#10006;"></span>
					    </div>
					        <br>
                            <button type="button" class=" mt-5 btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModal1" id="criar">Perguntas</button>                       
                        </div>
                        <br>
                        <br>
                    
                      </div>
        
    
                    </div>
                </div>

    <!-- Inserindo modal para informar cadastro de formulario realizado com sucesso -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"  >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close"  id="#r" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Cadastrado com sucesso!</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="r" >Perguntas</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="front_end/form.js"></script>
</body>

</html>
