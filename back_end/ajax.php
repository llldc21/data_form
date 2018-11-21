<?php

include 'funcs.php';

if (isset($_POST['nome_form'])) {
    AtualizaForm($_POST['nome_form'], $_POST['data_abertura'], $_POST['data_fechamento'], $_POST['categoria'], $_POST['desc_form'], $_POST['cd_usuario'], $_POST['cd_form']);
}else if(isset($_POST['pergunta'])){
    CadastraPerguntas($_POST['pergunta'], $_POST['id_tipo_pergunta'], $_POST['id_formulario']);
}else if(isset($_POST['alternativa'])){
    CadastrarAlternativa($_POST['alternativa'], $_POST['id_pergunta']);
};

?>