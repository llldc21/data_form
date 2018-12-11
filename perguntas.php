<?php
session_start();
include('back_end/funcs.php');

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
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="front_end/css/main.css">
    <link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="css/criaform.css" type="text/css" />-->
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
    
            <!--    Include     ------------------   Modal  -->
        
            <?php include('modal_edit_dados.php'); ?>
            
            
            <!--    Include     ------------------   Modal  -->
    
    


        
            <!------ INCLUDE NAV BAR ------->
            
                <?php include('navbar.php'); ?>
            
            <!------ INCLUDE NAV BAR ------->



    <div class="row">
        <div class="col-md-12">
            <br>
        </div>
    </div>
          
            <div class="container-fluid">
              <div class="row">
                
                
                <!-- FORMULARIO -->
                 <div class="col-md-7 scrou offset-md-1" style="background-color:#fff;border-radius:5px;margin-bottom:20px; border:1px solid rgb(223,223,223)">
                     <div class="row">
                  <?php
                        $tipo = ListarNomeF($_GET['id']);
                        while($tipos = $tipo->fetch_array()){
                    ?>
                         <h3 style="padding-top:10px;padding-left:20px;" ><?php echo $tipos['NM_FORMULARIO']; ?></h3>
                          <?php };?>
                     </div><!-- row -->
                     <div style="padding-top:5px;border-bottom:1px solid #ccc;"></div>
                     
                     <div class="row conteudo container-fluid" style="padding:20px;">
                        <div class="container-fluid">     
                            <div class="form-group" id="conteudo" >
                             <!-- forms vai aqui -->
                             </div>
                        </div>     
                     </div>
                     
                     
                 </div><!-- fim col 5 -->
                <!-- FORMULARIO -->
                
                     
                  <div class="col-md-1" style="padding:0;">
                     
                  </div><!-- div exemplos -->
                
                <div class="col-md-2 pergun sticky-top" style="background-color:#fff;border-radius:5px;border:1px solid rgb(223,223,223)">
                     <div class="row">
                      <h3 style="padding-top:10px;padding-left:20px;">Perguntas</h3>
                      </div>
                       <div style="padding-top:5px;border-bottom:1px solid #ccc;"></div>
                       <br>
                      <?php
                        $tipo = ListarTipoPergunta();
                        while($tipos = $tipo->fetch_array()){
                      ?>
                      <button class="btn btn-outline-dark mt-1 mb-1 btn-block campo" id="<?echo $_SESSION['form']?>"   val="<?php echo $tipos['CD_TIPO_PERGUNTA']?>" data-toggle="tooltip" data-placement="left" title="<?php echo $tipos['NM_TIPO_PERGUNTA']?>"> <?php echo $tipos['NM_TIPO_PERGUNTA']?> </button>
                        <?php };?>
                        <br>
                      <a href="user.php"><button type="button" onclick="myFunction()" class="btn btn-dark btn-block">Finalizar</button></a>
                        <br>
  
                </div>
      </div>
      
</div>     

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="front_end/form.js"></script>
    <script type="text/javascript">
        function myFunction() {
    alert("Perguntas cadastradas com sucesso");
}
    </script>
</body>
</html>



<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>