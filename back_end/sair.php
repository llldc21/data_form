<?php
//INICIAR A SESSÃO
session_start();
//LIMPANDO DADOS DA SESSÃO
unset($_SESSION['nome']);
//ENCERRANDO A SESSÃO
session_destroy();
//REDIRECIONANDO
header('location:index.php');
?>