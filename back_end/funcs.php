<?php
include('conexao.php');

// FUNÇÃO PARA OPERAÇÃO DO BANCO DE DADOS
// Todas as funções não possuem header, ou seja é necessario redirecionar o usuario após a operação
// no banco de dados.

CadastraUsuario('Wesllen', 'weslleb2000@gmail.com', '2000-05-08', 'abc123', 'no-replay@hotmail.com');

// Cadastrar usuario
function CadastraUsuario($nome, $email, $nascimento, $senha, $email_rec) {
    $sql = 'INSERT INTO `TB_USUARIO`(`CD_USUARIO`, `NM_USUARIO`, `DS_EMAIL`, `DT_NASCIMENTO`, `DS_SENHA`, `DS_EMAIL_RECUPERACAO`) VALUES(null, "'.$nome.'", "'.$email.'", "'.$nascimento.'", "'.$senha.'", "'.$email_rec.'")';
    $res = $GLOBALS['conn']->query($sql);
};
// -----------------

function AddCategoria($categoria){
    $sql = 'INSERT INTO `TB_CATEGORIA`(`CD_CATEGORIA`, `NM_CATEGORIA`) VALUES (null, "'.$categoria.'")';
    $res = $GLOBALS['conn']->query($sql);
    if ($res) {
        echo 'Ok!';
    }else{
        echo 'Erro!';
    }
}

?>