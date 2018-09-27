<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?php
include('conexao.php');

// FUNÇÃO PARA OPERAÇÃO DO BANCO DE DADOS
// Todas as funções não possuem header, ou seja é necessario redirecionar o usuario após a operação
// no banco de dados.

// CADASTRAR USUARIO
function CadastraUsuario($nome, $email, $nascimento, $senha, $email_rec, $img_usuario) {
    $cadastrado = '';
    if ($img_usuario) {
        // Modificando a data
        $n_nascimento = @date('Y/m/d', strtotime($nascimento));
        // ------------------

        // Encryptando senha
        $encriptada = EncriptarSenha($senha);
        // -----------------

        // Salvando foto do usuario
        if (isset($img_usuario)) {
            $ext = explode('.', $img_usuario['name']);
            $novo_nome = $email.'.'.$ext[1];
            $caminho = '../back_end/fotos/'.$novo_nome;
            move_uploaded_file($img_usuario['tmp_name'], $caminho); //Fazer upload do arquivo
        };
        
        // ------------------------
        $sql = 'INSERT INTO `TB_USUARIO`(`CD_USUARIO`, `NM_USUARIO`, `DS_EMAIL`, `DT_NASCIMENTO`, `DS_SENHA`, `DS_EMAIL_RECUPERACAO`, `IMG_USUARIO`) VALUES (null, "'.$nome.'", "'.$email.'", "'.$n_nascimento.'", "'.$encriptada.'", "'.$email_rec.'","'.$caminho.'")';
        $res = $GLOBALS['conn']->query($sql);
        if ($res) {
            echo "<script> alert('Cadastro realizado!') </script>";
            echo "<script> window.location='login.php' </script>";
        }else{
            echo "<script> alert('Erro ao cadastrar!') </script>";
            echo "<script> window.location='cadastro.php' </script>";
        };
    };
        
}
// FIM - CADASTRO USUÁRIO

// LISTAR DADOS DO USUARIO
function ListarDadosUsuario($cd){
    $sql = 'SELECT * FROM `TB_USUARIO` WHERE `CD_USUARIO` ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    return $res;
}
// FIM - LISTAR
// LOGIN
function Login($email, $senha){
    $encriptada = EncriptarSenha($senha);
    $sql = 'SELECT *  FROM `TB_USUARIO` WHERE `DS_EMAIL` = "'.$email.'" AND `DS_SENHA` = "'.$encriptada.'"';
    $res = $GLOBALS['conn']->query($sql);
    if($res->num_rows>0){
    $usuario = $res->fetch_array();
    $_SESSION['UsuarioLog'] = true;
    $_SESSION['email'] = $usuario ['DS_EMAIL'];
    $_SESSION['cd'] = $usuario ['CD_USUARIO'];
    $_SESSION['senha'] = $usuario['DS_SENHA'];
    header("location: user.php");
    }else{
        echo ' <script> alert("Erro"); </script>';
    }; 
};
// FIM - LOGIN

// CADASTRO DO FORMULARIO 
function CadastrarFormulario(){
    $n_abertura = @date('Y/m/d', strtotime($data_abertura));
    $n_fechamento = @date('Y/m/d', strtotime($data_fechamento));
    
    $sql = 	'INSERT INTO TB_FORMULARIO VALUES (null, "Meu form", null, null, '.$_SESSION['cd'].', 1, "Descreva...")';
	$res = $GLOBALS['conn']->query($sql);
	if($res){
        $_SESSION['form'] = $GLOBALS['conn']->insert_id;
    }else{
	echo "Erro ao cadastrar" .$sql ;
	}
}
// FIM DO CADASTRA FORMULARIO


// Funções de controle administrativo, o usuario não deve ter acesso a elas
function AddCategoria($categoria){
    $sql = 'INSERT INTO `TB_CATEGORIA`(`CD_CATEGORIA`, `NM_CATEGORIA`) VALUES (null, "'.$categoria.'")';
    $res = $GLOBALS['conn']->query($sql);
    if ($res) {
        echo 'OK';
    }else{
        echo 'Erro!';
    }
};

function CriaTipoPergunta($valor){
    switch (($valor)) {
        case '1':
            # code...
            break;
        
        default:
            # code...
            break;
    }
}

function MostraFoto($cd_usuario){
    $a = "SELECT `IMG_USUARIO` FROM TB_USUARIO WHERE CD_USUARIO =".$cd_usuario;
    $query = $GLOBALS['conn']->query($a);
    $q = mysqli_fetch_array($query);
    echo '<img src="'.$q[0].'" alt="" >';
};

function ListarCategoria(){
	$sql = 'SELECT * FROM TB_CATEGORIA';
	$res = $GLOBALS['conn']->query($sql);
	return $res;
};

function EncriptarSenha($senha){
    $codificada = md5($senha);
    return $codificada;
};
// ------------------------------------------------------------------------

?>