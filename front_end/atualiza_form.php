<?php
include ('../back_end/funcs.php');

AtualizaForm($_POST['nome_form'], $_POST['data_abertura'], $_POST['data_fechamento'], $_POST['categoria'], $_POST['desc_form'], $_POST['cd_usuario'], $_POST['cd_form']);
?>