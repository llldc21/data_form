<?php
include ('back_end/funcs.php');
session_start();

if(isset($_FILES['img_usuario'])){
    AtualizarImg($_POST['email'], $_FILES['img_usuario'], $_SESSION['cd']);
}
if(isset($_POST['nome'])){
   AtualizarUsuario($_POST['nome'],$_POST['data'], $_SESSION['cd']);
}


if($_POST){
 EditarForm($_POST['n'],$_POST['dataa'],$_POST['dataf'],$_POST['id_cat'], $_POST['ds'], $_SESSION['cd'], $_POST['cd_form']);   
 echo $_POST['id_cat'];
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
                <button onclick="user.php" type="button" class="btn btn-dark btn-block" > <a href="user.php" style="color:white;" >Meus Formulários</a>  </button>
                <button type="button" class="btn btn-dark btn-block"> <a href="docs/Manual do Usuario.docx" target="_blank" style="color:white;" > Manual de Usuário</a></button>
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
                                //      $form = ListarFormsEspecifico($usuario, $formulario);
                                //     while ($forms = $form->fetch_array()) {
                                //         echo 'Nome do formulario:<br>
                                //         <input type="hidden" class="form-control" name="cd_form"  value="'.$forms['CD_FORMULARIO'].'"><br>
                                //         <input type="text" class="form-control" name="n"  value="'.$forms['NM_FORMULARIO'].'"><br>
                                //         <input type="text" class="form-control" name="id_cat" value="'.$forms['ID_CATEGORIA'].'"><br>
                                //         <input type="text" class="form-control" name="ds" value="'.$forms['DS_FORMULARIO'].'">
                                //          <input type="date" class="form-control" name="dataa" value="'.$forms['DT_ABERTURA_FORM'].'"><br>
                                //         <input type="date" class="form-control" name="dataf" value="'.$forms['DT_FECHAMENTO_FORM'].'">';
                                // }
                                $form = ListarFormsEspecifico($usuario, $formulario);
                                    while ($forms = $form->fetch_array()) {
                                        echo '
                                        <input type="hidden" class="form-control" name="cd_form"  value="'.$forms['CD_FORMULARIO'].'">
                                        
                                        <div class="wrap-input100 validate-input m-b-23">
                        						<span class="label-input100">Nome do Formulário</span>
                        						<input class="input100" type="text" name="n"  value="'.$forms['NM_FORMULARIO'].'">
                        						<span class="focus-input100" data-symbol="&#9776;"></span>
                        				</div>
                        				
                        				<br>
                                        
                                        <div class="wrap-input100 validate-input m-b-23">
                    						<span class="label-input100">Descrição do Formulário</span>
                    						    <input class="input100" type="text" name="ds" value="'.$forms['DS_FORMULARIO'].'">
                    						<span class="focus-input100" data-symbol="&#9776;"></span>
                    					</div>
                    					
                    					<br>
                    					
                    					<div class="wrap-input100 validate-input" data-validate="Data requerida">
                						    <span class="label-input100">Data de Abertura</span>
                						    <input class="input100" type="date" name="dataa" value="'.$forms['DT_ABERTURA_FORM'].'">
                						    <span class="focus-input100" data-symbol="&#10004;"></span>
                					    </div>
                    					
                                        <br>
                                        
                                        <div class="wrap-input100 validate-input" data-validate="Data requerida">
                						    <span class="label-input100">Data de Fechamento</span>
                						    <input class="input100" type="date" name="dataf" value="'.$forms['DT_FECHAMENTO_FORM'].'">
                						    <span class="focus-input100" data-symbol="&#10006;"></span>
                					    </div>
                                        ';
                                        
                                        ?>
                                        <select name="id_cat" class="form-control mt-3">
                                            <?php $dados = ListarCategoria($forms['CD_FORMULARIO']);
                                             while ($dado = $dados->fetch_array()){
                                             ?>
                                                 <option value="<?php echo $dado['CD_CATEGORIA']; ?>" <?php if($forms['ID_CATEGORIA'] == $dado['CD_CATEGORIA']){ echo "selected"; } ?> id="categoria" class="form-control"> <?php echo $dado['NM_CATEGORIA']; ?></option>';
                                             <?php
                                                 
                                                 }
                                              echo '</select>';
                                                  }     
                                                ListaPerguntasPorForm($formulario);
                                            ?>
                            
                            
                            <br>
                    <a href="user.php"> <button  type="button" class="btn btn-outline-dark" style="margin-top: 20px">Fechar</button> </a>    
                        <button type="submit" class="btn btn-outline-dark" style="margin-top: 20px">Salvar</button>
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