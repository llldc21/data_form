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
            <a class="navbar-brand" href="../index.html"><img src="../front_end/img/img.png" height="50px"> Data Form</a>
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
                    <button type="button" class="btn btn-light btn-block">Perfil</button>
                    <br>
                </div>
                <?php };?>
            </div>
            <div class="col-10">
                <br>
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <div class="text-center">
                            <h2>Criação de Formulário</h2>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
                <hr>
                <form action="forms.php" method="post">
                        <h3 class="h3 text-center">Insira o nome do formulario:</h3>
                        <input type="text" class="form-control" name="nome_form" id="nome_form" require>
                        <br>
                        <h3 class="h3 text-center">Descreva seu formulario:</h3>
                        <textarea name="desc_form" id="desc_form" class="form-control" cols="30" rows="1" require></textarea>
                        <br>
                    <div class="row">
                        <div class="col-4">
                            <h3 class="h3 text-center">Data de abertura:</h3>
                            <input type="date" class="form-control" name="data_abertura" id="data_abertura">
                        </div>
                        <div class="col-4">
                            <h3 class="h3 text-center">Categoria</h3>
                            <select name="categoria" class="form-control" id="categoria">
                            <?php
                                $dados = ListarCategoria($_SESSION['cd']);
                                while ($dado = $dados->fetch_array()){
                            ?>
                                <option value="<?php echo $dado['CD_CATEGORIA'];?>" class="form-control"><?php echo $dado['NM_CATEGORIA'];}?></option>
                            </select>
                        </div>
                        <div class="col-4">
                            <h3 class="h3 text-center">Data de fechamento:</h3>
                            <input type="date" class="form-control" name="data_fechamento" id="data_fechamento">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <button class="btn btn-primary btn-block perguntas">Criar Formulário</button>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <h5>Cadastro de perguntas</h5>
          <hr>
            ...
          </div>
        </div>
    </div>

    <div class="footer">
        <i data-toggle="modal" data-target=".bd-example-modal-lg" class="fas fa-plus icone fa-3x"></i>
        <i class="fas fa-check icone fa-3x vai"><button type="submit"></button></i>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).on('click', '.perguntas', function(params) {

        })
    </script>
</body>

</html>