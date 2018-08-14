<?php
include_once ('config_db.php');

$conexao = new mysqli($host, $user, $password, $db);
//LIDANDO COM ERROS DE CODIFICAÇÃO DE CARACTERES EM UTF-8
$conexao->query("SET NAMES 'utf8'");
$conexao->query('SET character_set_connection=utf8');
$conexao->query('SET character_set_client=utf8');
$conexao->query('SET character_set_results=utf8');
?>