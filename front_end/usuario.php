<meta charset="utf-8">
<?php
session_start();
include('../../back_end/funcs.php');
include('../../back_end/sair.php');
include("../../back_end/config_db.php");
include("../../back_end/conexao.php");

if(!isset($_SESSION['UsuarioLog'])){
    header("location: login.php");
    session_destroy();
}

echo "Você está logado, Parabéns!!!";
?>
<br>
<button href="sair.php" type="submit"> Sair</button>