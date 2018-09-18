<?php
//INICIAR A SESSÃO
session_start();
//LIMPANDO DADOS DA SESSÃO
unset($_SESSION['UsuarioLog']);
//ENCERRANDO A SESSÃO
session_destroy();
//REDIRECIONANDO
header('location: ../front_end/login.php');
?>