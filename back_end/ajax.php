<?php
include 'funcs.php';

if (isset($_POST['nome'])) {
    AtualizarForm($_POST['nome'],$_POST['descricao'],$_POST['categoria'],$_POST['abertura'],$_POST['fechamento'],$_POST['id_usuario'],$_POST['id_formulario']);
}else if(isset($_POST['pergunta'])){
    echo 'Pergunta inserida';
}else if(isset($_POST['alternativa'])){
    echo 'Alternativa inserida';
}
?>