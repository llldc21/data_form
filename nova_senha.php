<?php
include('back_end/funcs.php');
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <!--<meta charset="utf-8">-->
  <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
  <!--<meta name="description" content="">-->
  <!--<meta name="author" content="">-->

  <title>Esqueci minha Senha | Data Form</title>

  <!-- Bootstrap core CSS -->
  <!--<link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

  <!-- Custom fonts for this template -->
  <!--<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">-->
  <!--<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">-->

  <!-- Custom styles for this template -->
  <!--<link rel="stylesheet" href="front_end/css/main.css">-->
  <!--<link href="front_end/temas/startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.css" rel="stylesheet">-->


</head>

<body>
</body>

<?php
$email = $_POST['email'];
?>


 <form action="nova_senha.php" method="post" >
     <?php
     if(isset($_POST['email'])){
        $sql = 'SELECT * FROM TB_USUARIO WHERE DS_EMAIL="'.$email.'"';
        $res = $GLOBALS['conn']->query($sql);

        if($res->num_rows >0){
            echo "FOI" .$sql;
             $s = $res->fetch_array();
             $_SESSION['email'] = $s['DS_EMAIL'];
             $_SESSION['cpf'] = $s['CPF'];
            echo '<input type="text" name="cpf" id="cpf" placeholder="Insira seu cpf"><br>';
        }
        }
        elseif(isset($_POST['cpf'])){
            if($_POST['cpf'] == $_SESSION ['cpf']){
          
                echo '<input type="text" name="s1" id="s1" placeholder="Insira seu s1"><br>';
                echo '<input type="text" name="s2" id="s2" placeholder="Insira seu s2">';
            }
        }    
            
        elseif(isset($_POST['s2'])){
            if($_POST['s2'] == $_POST['s2']){
                $sql = 'UPDATE TB_USUARIO SET DS_SENHA="'.$_POST['s2'].'" WHERE CPF="'.$_SESSION['cpf'].'"';
                $res = $GLOBALS['conn']->query($sql);
                echo 'Sua senha foi alterada';
                echo $sql;
                
                }else{
                 echo "Senha incompativeis, por favor digite novamente a senha !";
                }
        }else{
            echo '<input type="email" name="email" id="email" placeholder="Insira seu email">';
        }
        
        
        
     // if do email isset
     ?>
     <br>

    <button type="submit">Enviar</button>
</form>
</html>

