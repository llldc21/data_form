<?php
include "back_end/funcs.php";
session_start();

if(isset($_FILES['img_usuario'])){
    AtualizarImg($_POST['email'], $_FILES['img_usuario'], $_SESSION['cd']);
}
if(isset($_POST['nome'])){
   AtualizarUsuario($_POST['nome'],$_POST['data'], $_SESSION['cd']);
}


if($_POST){
 EditarForm($_POST['n'], $_POST['dataa'], $_POST['dataf'], $_POST['id_cat'], $_POST['ds'], $_SESSION['cd'], $_POST['cd_form']);   
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
    <title>Data Form | <?php echo $nome[0].' '.$nome[1]?></title>
    <?php };?>
    <!-- Bootstrap core CSS -->
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="front_end/css/main.css">
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
                   <form action="user.php" method="post" enctype="multipart/form-data">

                        <?php
                            $dados = ListarDadosUsuario($_SESSION['cd']);
                            while ($dado = $dados->fetch_array()){
                            ?>
                    <div class="modal-body">
                        <h3>Alterar foto</h3>
                        <div class="custom-file">
                            <!-- Passando e-mail para o Post, para mudar o nome da foto -->
                            <input type="hidden" name="email" value="<?php echo $dado['DS_EMAIL'];?>">
                            <input type="file" name="img_usuario" class="custom-file-input" id="customFileLang" lang="pt-br">
                            <label class="custom-file-label" id="foto_nova" for="customFileLang">Selecione o arquivo...</label>    
                            <input class="form-control" name="nome" type="text" value="<?php echo $dado['NM_USUARIO']?>" style="margin-top: 10px">
                            <input class="form-control" name="data" type="date" value="<?php echo $dado['DT_NASCIMENTO']?>" style="margin-top: 10px">    
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-success" value="salvar" />
                        <?php
                            };
                        ?>
                    </div>
                </form>
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
                <button type="button" class="btn btn-primary btn-block"> <a href="docs/Manual do Usuario.docx" target="_blank" style="color:white;" > Manual de Usuário</a></button>
                </div>
                </div>
                
                <?php };?>
            </div>
            
            
            <div class="col-12 col-md-8 offset-md-1" id="conteudo">
                <br>
                <div class="row">
                    <div class="col-md-12 col-12">
                    <h3 class="h3 text-center">Editar formulario</h3>
                    <hr>
                        <form action="edit_form.php" method="post">
                            <?php
                                $usuario = $_SESSION['cd'];
                                $formulario = $_GET['form'];

                                if (isset($formulario)) {
                                    $form = ListarFormsEspecifico($usuario, $formulario);
                                    while ($forms = $form->fetch_array()) {
                                        echo 'Nome do formulario:<br>
                                        <input type="hidden" class="form-control" name="cd_form"  value="'.$forms['CD_FORMULARIO'].'"><br>
                                        <input type="text" class="form-control" name="n"  value="'.$forms['NM_FORMULARIO'].'"><br>',
                                        '<input type="text" class="form-control" name="id_cat" value="'.$forms['ID_CATEGORIA'].'"><br>',
                                        '<input type="text" class="form-control" name="ds" value="'.$forms['DS_FORMULARIO'].'">';
                                }
                                
                                ListaPerguntasPorForm($formulario);
                            ?>
                    <a href="user.php"> <button  type="button" class="btn btn-danger" style="margin-top: 20px">Fechar</button> </a>    
                        <button type="submit" class="btn btn-success" style="margin-top: 20px">Salvar</button>
                        </form>
                    </div>
                </div>
                <!-- FORM -->
                <div class="row">
                </div> <!-- ROW -->
                    <?php };?>
            </div>
        </div>
    <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>