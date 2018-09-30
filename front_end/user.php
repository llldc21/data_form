<?php
session_start();
include('../back_end/funcs.php');

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
                            <img src="img/eu.jpg" class="img-fluid rounded-circle">
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
                    <button class="btn btn-outline-info" type="button" style="font-family: 'Catamaran'">Pesquisar</button>
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
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="user">
                <?php
                $dados = ListarDadosUsuario($_SESSION['cd']);
                while ($dado = $dados->fetch_array()){
                    $nome = explode(' ', $dado['NM_USUARIO'])
                ?>
                <div class="foto">
                    <img src="img/eu.jpg" class="img-fluid rounded-circle" id="img-user">
                </div>
                
                <div style="margin-top: 20px;"> 
                <h3 class="h3 text-center" id="nome-user">
                        <?php echo $nome[0].' '.$nome[1]?>
                </h3>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Editar dados</button>
                <button type="button" class="btn btn-light btn-block">Gerenciar Formulários</button>
                </div>
                
                <?php };?>
            </div>
            <div class="col-10 col-md-10 offset-md-0 offset-1">
                <br>
                <div class="row">
                    <div class="col-md-4 col-10 offset-1 offset-md-0 form painel">
                        <div class="text-center">
                            <a href="forms.php?criar" class="btn btn-success form-control align-items-center btn-block">Criar Formulário</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-10 offset-1 offset-md-0 painel">
                        <div class="text-center">
                            <h4>Painel de Controle</h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-10 offset-1 offset-md-0 painel">
                        <div class="text-center">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Data de criação</option>
                                    <option>Ordem alfabética</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <!-- CARDS -->
                <div class="row">

                    <div class="col-md-4 offset-md-0 col-12 ">
                        <div class="card">
                            <h5 class="card-header">Nome do Formulário</h5>
                            <div class="card-body">
                                <div class="contcard">
                                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- COL 4 -->
                    
                    <div class="col-md-4 offset-md-0 col-12 ">
                        <div class="card">
                            <h5 class="card-header">Nome do Formulário</h5>
                            <div class="card-body">
                                <div class="contcard">
                                    <p class="card-text">	sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- COL 4 -->

                </div> <!-- ROW -->
            </div>
        </div>
    </div>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>