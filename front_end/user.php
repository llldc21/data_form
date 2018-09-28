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

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="../index.php?logado"><img src="../front_end/img/img.png" height="50px"> Data Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="input-group" style="margin-left: 30px; margin-right: 30px;">
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" id="user">
                <?php
                $dados = ListarDadosUsuario($_SESSION['cd']);
                while ($dado = $dados->fetch_array()){
                    $nome = explode(' ', $dado['NM_USUARIO'])
                ?>
                <div class="foto">
                    <img src="<?php echo $dado['IMG_USUARIO']?>" class="img-fluid rounded-0" id="img-user">
                    <h3 class="h3 text-center" id="nome-user">
                        <?php echo $nome[0].' '.$nome[1]?>
                    </h3>
                    <button type="button" class="btn btn-light btn-block" data-toggle="modal" data-target="#exampleModal">Editar
                        Dados</button>
                    <button type="button" class="btn btn-light btn-block">Gerenciar Formulários</button>
                    <br>
                </div>
                <?php };?>
            </div>
            <div class="col-10">
                <br>
                <div class="row">
                    <div class="col-4">
                        <div class="text-center">
                            <a href="forms.php?criar" class="btn btn-success align-items-center btn-block">Criar Formulário</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <h2>Painel de Controle</h2>
                        </div>
                    </div>
                    <div class="col-4">
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
                    <div class="col-4">
                        <div class="card">
                            <h5 class="card-header">Nome do Formulário</h5>
                            <div class="card-body">
                                <p class="card-text">Descrição do formulário.</p>
                                <hr>
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary align-items-center btn-block">Detalhes</a>
                                    <a href="#" class="btn btn-danger align-items-center btn-block">Apagar</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- COL 4 -->
                    <div class="col-4">
                        <div class="card">
                            <h5 class="card-header">Nome do Formulário</h5>
                            <div class="card-body">
                                <p class="card-text">Descrição do formulário.</p>
                                <hr>
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary align-items-center btn-block">Detalhes</a>
                                    <a href="#" class="btn btn-danger align-items-center btn-block">Apagar</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- COL 4 -->
                    <div class="col-4">
                        <div class="card">
                            <h5 class="card-header">Nome do Formulário</h5>
                            <div class="card-body">
                                <p class="card-text">Descrição do formulário.</p>
                                <hr>
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary align-items-center btn-block">Detalhes</a>
                                    <a href="#" class="btn btn-danger align-items-center btn-block">Apagar</a>
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