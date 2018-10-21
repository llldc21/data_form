<?php
include "../back_end/funcs.php";
session_start();
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
    <link href="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../front_end/css/main.css">
    <link href="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
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

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="../index.php?logado"><img src="../front_end/img/img.png" height="50px"> Data Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="input-group" >
                <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Recipient's username"
                    aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" style="font-family: 'Catamaran'">Pesquisar</button>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../back_end/sair.php">Sair</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link respo" data-toggle="modal" data-target="#examModal">Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 h-100" id="user">
                <?php
                $dados = ListarDadosUsuario($_SESSION['cd']);
                while ($dado = $dados->fetch_array()){
                    $nome = explode(' ', $dado['NM_USUARIO'])
                ?>
                <div class="foto">
                    <img src="<?php echo $dado['IMG_USUARIO']?>" class="rounded-circle" width="100%" height="28%">
                
                </div>
                <div style="margin-top: 20px;"> 
                <h3 class="h3 text-center" id="nome-user">
                        <?php echo $nome[0].' '.$nome[1]?>
                </h3>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Editar dados</button>
                <button type="button" class="btn btn-primary btn-block">Gerenciar Formulários</button>
                <br>
                </div>
                
                <?php };?>
            </div>
            
            
            <div class="col-12 col-md-10 offset-md-0" id="conteudo">
                <br>
                <div class="row">
                    <div class="col-md-12">
                    <h2 class="h2 text-center">Editar formulario</h2>
                    <hr>
                        <form action="edit_form.php" method="post">
                            <?php
                                $usuario = $_SESSION['cd'];
                                $formulario = $_GET['form'];

                                if (isset($formulario)) {
                                    $form = ListarFormsEspecifico($usuario, $formulario);
                                    while ($forms = $form->fetch_array()) {
                                        echo 'Nome do formulario:<br><input type="text" class="form-control" name="nome_form" id="nome_form" placeholder="'.$forms['NM_FORMULARIO'].'">';
                                }

                                ListaPerguntasPorForm($formulario);
                            ?>
                        </form>
                    </div>
                </div>
                <!-- FORM -->
                <div class="row">
                </div> <!-- ROW -->
                    <?php };?>
            </div>
        </div>
    </div>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>