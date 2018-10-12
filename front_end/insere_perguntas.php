<?php
include '../back_end/funcs.php';


if (isset($_POST['pergunta'])) {
    CadastraPerguntas($_POST['pergunta'], $_POST['id_tipo_pergunta'], $_POST['id_formulario']);
}else if(isset($_POST['alternativa'])){
    echo $_POST['alternativa'].'-'.$_POST['id_pergunta'];
    CadastrarAlternativa($_POST['alternativa'], $_POST['id_pergunta']);
}

?>