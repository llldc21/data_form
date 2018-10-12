<?php

include 'funcs.php';

if (isset($_POST['data.nome_form'])) {
    AtualizaForm($_POST['data.nome_form'], $_POST['data.data_abertura'], $_POST['data.data_fechamento'], $_POST['data.categoria'], $_POST['data.desc_form'], $_POST['data.cd_usuario'], $_POST['data.cd_form']);
}else if(isset($_POST['pergunta'])){
    CadastraPerguntas($_POST['pergunta'], $_POST['id_tipo_pergunta'], $_POST['id_formulario']);
}else if(isset($_POST['alternativa'])){
    CadastrarAlternativa($_POST['alternativa'], $_POST['id_pergunta']);
};

?>