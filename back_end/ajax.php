<?php
include 'funcs.php';

if (isset($_POST['nome'])) {
    AtualizarForm($_POST['nome'],$_POST['descricao'],$_POST['categoria'],$_POST['abertura'],$_POST['fechamento'],$_POST['id_usuario'],$_POST['id_formulario']);
}else if(isset($_POST['pergunta'])){
    CadastraPerguntas($_POST['pergunta'], $_POST['tipo'],$_POST['id_form']);
}else if(isset($_POST['alternativa'])){
    CadastrarAlternativa($_POST['alternativa'], $_POST['id_formulario']);
}
?>