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

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="../index.php?logado" ><img src="../front_end/img/img.png" height="50px"> Data Form</a>
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
                <div>
                        <h3 class="h3 text-center">Insira o nome do formulario:</h3>
                        <input type="hidden" name="" id="cd_usuario" value="<?php echo $_SESSION['cd']?>">
                        <input type="hidden" name="" id="cd_form" value="<?php echo $_SESSION['form']?>">
                        
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
                            <select name="categoria" class="form-control">
                            <?php
                                $dados = ListarCategoria($_SESSION['cd']);
                                while ($dado = $dados->fetch_array()){
                            ?>
                                <option value="<?php echo $dado['CD_CATEGORIA'];?>" id="categoria" class="form-control"><?php echo $dado['NM_CATEGORIA'];}?></option>
                            </select>
                        </div>
                        <div class="col-4">
                            <h3 class="h3 text-center">Data de fechamento:</h3>
                            <input type="date" class="form-control" name="data_fechamento" id="data_fechamento">
                        </div>
                        <div class="col-12" id="conteudo">
                            <br>
                            
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-block" id="novo" data-toggle="modal" data-target=".bd-example-modal-lg">Perguntas</button>
                            <button type="button" class="btn btn-success btn-block" id="fin">Finalizar</button><br>                            
                            <button class="btn btn-primary btn-block perguntas" id="criar">Criar Formulário</button><br>
                        </div>
                        <div class="col-4"></div>
                        <div id="caixa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="h5">Editar perguntas</h5>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-6">
                      <h5 class="h5 text-center">Perguntas</h5>
                      <?php
                        $tipo = ListarTipoPergunta();
                        while($tipos = $tipo->fetch_array()){
                      ?>
                      <button class="btn btn-dark btn-block campo" id="<?echo $_SESSION['form']?>"   val="<?php echo $tipos['CD_TIPO_PERGUNTA']?>" ><?php echo $tipos['NM_TIPO_PERGUNTA']?></button>
                        <?php };?>
                  </div>
                  <div class="col-6">
                      <h5 class="h5 text-center">Exemplos</h5>
                      <input type="text" class="form-control" name="" id="" disabled>
                      <input type="text" class="form-control" name="" id="" disabled style="margin-top: 10px;">
                      <input type="checkbox" name="" id="" disabled style="margin-top: 9px;">
                      <input type="checkbox" name="" id="" disabled style="margin-top: 9px;">
                      <input type="checkbox" name="" id="" disabled style="margin-top: 9px;">
                      <input type="checkbox" name="" id="" disabled style="margin-top: 9px;">
                      <input type="checkbox" name="" id="" disabled style="margin-top: 9px;">
                      <br>
                      <input type="radio" name="" id="" disabled style="margin-top: 25px;">
                      <input type="radio" name="" id="" disabled style="margin-top: 25px;">
                      <input type="radio" name="" id="" disabled style="margin-top: 25px;">
                      <input type="radio" name="" id="" disabled style="margin-top: 25px;">
                      <input type="radio" name="" id="" disabled style="margin-top: 25px;">
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
 
    var curta = '';
    var longa = '';
    var m_escolha = '';
    var c_selecao = '';
    var data = {};
    $(document).ready(function(){
     $('#novo').hide();  
     $('#fin').hide(); 

    

    });

    var cd = "";

    function GravaPergunta(pergunta, id_tipo_pergunta, id_formulario){
                $.ajax({
                type: "POST",
                url: 'insere_perguntas.php',
                data: {
                    pergunta,
                    id_tipo_pergunta,
                    id_formulario
                },
                success: function(back){
                    cd = back;
                }
            });                
            }

      $(document).on('click','#criar',function(){
                 //var dados = $('#meu').serialize();
                 data.nome_form = $('#nome_form').val();
                 data.desc_form = $('#desc_form').val();
                 data.data_abertura = $('#data_abertura').val();
                 data.categoria = $('#categoria').val();
                 data.data_fechamento = $('#data_fechamento').val();
                 data.cd_usuario = $('#cd_usuario').val();
                 data.cd_form = $('#cd_form').val();
                 console.log(data);

                 $.ajax({
                    type: "POST",
                    url: 'atualiza_form.php',
                    data: data,
                    success: function(back){
                        alert(back)
                    }
                });
                 
             $(this).hide();
             $('#novo').show();
             $('#fin').show();
      });
  </script>
  <script>
        $(document).on('click', '.campo', function (cd) {
            var campo = "";               
            var tipo = $(this).attr('val');
            var form = $(this).attr('id');

            switch (parseInt(tipo)) {
                case 1:
                    curta = prompt('Qual é a pergunta?');
                    if (curta.length <= 2) {
                        alert(`Pergunta muito curta...`);
                    }else{
                        alert(`Pergunta salva!`);
                        campo = '<form method="post" action="../back_end/processa.php"><h5 class="h5 text-center">' + curta + '</h5><input type="text" name="campo[]" class="form-control" placeholder="' + curta + '" disabled><br>';
                        GravaPergunta(curta, tipo, data.cd_form);
                        GravaAlternativa(tipo, cd);
                    }
                    break;
                case 2:
                    longa = prompt('Qual é a pergunta?');
                    if (longa.length <= 2){
                        alert(`Pergunta muito curta...`);
                    }else{
                        alert(`Pergunta salva!`);
                        campo = '<h5 class="h5 text-center">' + longa + '</h5><textarea class="form-control" name="campo[]" placeholder="'+ longa +'" disabled></textarea><br>';
                        GravaPergunta(longa, tipo, data.cd_form);
                        GravaAlternativa(tipo, cd);
                    }
                    break;
                case 3:
                    m_escolha = prompt("Qual é a pergunta?");
                    if (m_escolha.length <= 2) {
                        alert(`Pergunta obrigatoria`);
                    }else{
                        alert(`Pergunta salva!`);
                        campo = '<h5 class="h5 text-center">' + m_escolha + '</h5>';
                        GravaPergunta(m_escolha, tipo, data.cd_form);                        
                    }
                    var qtd_me = parseInt(prompt('Quantas escolhas deseja?'));
                        for (let i = 1; i <= qtd_me; i++) {
                            var alternativa_me = prompt(`Digite a escolha ${i}:`);
                            campo += '<input type="radio" class="text-center" name="campo[]" disabled>' + alternativa_me[i] + '<br>';
                            GravaAlternativa(alternativa_me, cd);
                        }
                        break;

                    case 4:
                    c_selecao = prompt("Qual é a pergunta?");
                        if (c_selecao.length <= 2) {
                            alert(`Pergunta obrigatoria`);
                        }else{
                            alert(`Pergunta salva!`);
                            campo = '<h5 class="h5 text-center">' + c_selecao + '</h5>';
                            GravaPergunta(c_selecao, tipo, data.cd_form);
                        }
                    var qtd_cx = parseInt(prompt('Quantas alternativas deseja?'));
                        for (let i = 1; i <= qtd_cx; i++) {
                            var alternativa_cx = prompt(`Digite a alternativa ${i}:`);
                            campo += '<input type="checkbox" class="text-center" name="campo[]" disabled>' + alternativa_cx[i] + '<br>';
                            GravaAlternativa(alternativa_cx, cd);
                        }
                        break;            
                default:
                    break;
            };
            $('#conteudo').append(campo);
            
            function GravaAlternativa(alternativa, id_pergunta){
                $.ajax({
                type: "POST",
                url: 'insere_perguntas.php',
                data: {
                    "alternativa" : alternativa,
                    "id_pergunta" : id_pergunta
                },
                success: function(back){
                    alert(back);
                }
            });                
            }

            
        });

    </script>

</body>

</html>