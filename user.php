<?php
session_start();
include('back_end/funcs.php');

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
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="front_end/css/main.css">
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
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
                    
                    <img src="<?php echo $dado['IMG_USUARIO']?>" id = "testImage" class="rounded-circle img-responsive img-fluid">
                    
                    </div>
                    

                <div style="margin-top: 20px;"> 
                <h4 class="h4 text-center " id="nome-user">
                        <?php echo $nome[0].' '.$nome[1];?>
                </h4>

                <button type="button" class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModal"><a href="#" style="color:white;"> Editar dados </a></button>
                <button type="button" class="btn btn-dark btn-block"> <a href="docs/Manual do Usuario.docx" target="_blank" style="color:white;" > Manual de Usuário</a></button>



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
                            <a href="forms.php?criar" class="btn btn-outline-dark form-control align-items-center btn-block">Criar Formulário</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-10 offset-1 offset-md-0 painel">
                        <div class="text-center">
                            <h4>Meus Formulários</h4>
                        </div>
                    </div>
                    <div class="col-md-4 col-10 offset-1 offset-md-0 painel">
                        <div class="text-center">
                            <div class="form-group">
                                
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
                        $date = $dado['DT_FECHAMENTO_FORM'];
                        echo'<div class="col-md-4 offset-md-0 col-10 offset-1" > 
                         <div class="card" style="width: 100%;">
                         <a href="exibir_resposta.php?cdform='.$dado['CD_FORMULARIO'].'">
                         <div class="card-body">
                         <h5 class="card-title">'.$dado['NM_FORMULARIO'].'</h5>
                         <p class="card-text">'.$dado['DS_FORMULARIO'].'</p>
                          <p class="card-text">Data de fechamento: '.$date.'</p>
                         <hr>
                         <a href="edit_form.php?form='.$dado['CD_FORMULARIO'].'" class="card-link btn btn-outline-dark">Editar</a>
                         <a href="excluir_form.php?cd='.$dado['CD_FORMULARIO'].'" class="btn btn-outline-dark">Excluir</a>
                         <a href="exibir_form.php?cdform='.$dado['CD_FORMULARIO'].'" class="card-link btn btn-outline-dark">Responder</a>
                         
                         </div>
                         </div>
                         </div>
                         </a>';               
                    }
                    
                    ?>
                </div>
                </div>
            </div> <!-- col-md-10 -->
    </div>

 
    
    
    <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>