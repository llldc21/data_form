<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
include('conexao.php');

// FUNÇÃO PARA OPERAÇÃO DO BANCO DE DADOS
// Todas as funções não possuem header, ou seja é necessario redirecionar o usuario após a operação
// no banco de dados.

// Cadastrar usuario
function CadastraUsuario($nome, $email, $nascimento, $senha, $email_rec) {
    $sql = 'INSERT INTO `TB_USUARIO`(`CD_USUARIO`, `NM_USUARIO`, `DS_EMAIL`, `DT_NASCIMENTO`, `DS_SENHA`, `DS_EMAIL_RECUPERACAO`) VALUES(null, "'.$nome.'", "'.$email.'", "'.$nascimento.'", "'.$senha.'", "'.$email_rec.'")';
    $res = $GLOBALS['conn']->query($sql);
};
// -----------------


// Funções de controle administrativo, o usuario não deve ter acesso a elas
function AddCategoria($categoria){
    $sql = 'INSERT INTO `TB_CATEGORIA`(`CD_CATEGORIA`, `NM_CATEGORIA`) VALUES (null, "'.$categoria.'")';
    $res = $GLOBALS['conn']->query($sql);
    if ($res) {
        echo 'Ok!';
    }else{
        echo 'Erro!';
    }
}
// ------------------------------------------------------------------------

?>