<?php
session_start();
include('../back_end/funcs.php');

// if($_POST){
//     ExcluirForm($_GET['cd']);
// }
if(isset($_FILES['img_usuario'])){
    AtualizarImg($_POST['email'], $_FILES['img_usuario'], $_SESSION['cd']);
}
if(isset($_POST['nome'])){
   AtualizarUsuario($_POST['nome'],$_POST['data'], $_SESSION['cd']);
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
    <link href="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../front_end/css/main.css">
    <link href="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript">
        
    $(document).on('click', '.delete', function(){
	var id = $(this).attr('cd');
	$('#cd').val(id);

    });

    $(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#SelecionarTudo").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#SelecionarTudo").prop("checked", false);
		}
	});
    });
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
            <div class="col-md-2 " id="user">
                
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
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">Editar dados</button>
                <button type="button" class="btn btn-primary btn-block">Gerenciar Formulários</button>
                <button type="button" class="btn btn-primary btn-block"> <a href="manual.php" style="color:white;"> Manual de Usuário</a></button>
                </div>
                </div>
                
                <?php };?>
            </div>
            
            
            <div class="col-12 col-md-10 col-1 contuser" id="conteudo">
                <br>
                <div class="container">
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
                <!-- CARDS -->
                
                
                <div class="row">    
                    <?php
                    $dados = ListarForms($_SESSION['cd']);
                    while ($dado = $dados->fetch_array()){
                        echo'<div class="col-md-4 offset-md-0 col-10 offset-1"> 
                         <div class="card" style="width: 100%;">
                         <div class="card-body">
                         <h5 class="card-title">'.$dado['NM_FORMULARIO'].'</h5>
                         <p class="card-text">'.$dado['DS_FORMULARIO'].'</p>
                         <hr>
                         <a href="edit_form.php?form='.$dado['CD_FORMULARIO'].'" class="card-link btn btn-success">Editar</a>
                         <a href="excluir_form.php?cd='.$dado['CD_FORMULARIO'].'" class="btn btn-danger"><span>Apagar</span></a>
                         <a href="exibir_form.php?cdform='.$dado['CD_FORMULARIO'].'" class="card-link btn btn-primary">Enviar</a>
                         </div>
                         </div>
                         </div>';               
                    }
                    
                    ?>
                </div>
                </div>
            </div> <!-- col-md-10 -->
    </div>
    
    
    
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="../front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>