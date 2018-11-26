<?php
include('conexao.php');

// FUNÇÃO PARA OPERAÇÃO DO BANCO DE DADOS
// Todas as funções não possuem header, ou seja é necessario redirecionar o usuario após a operação
// no banco de dados.

// FUNÇÕES PARA USUARIO
// -- Cadastro
function CadastraUsuario($nome, $email, $nascimento, $senha, $email_rec, $img_usuario) {
    $cadastrado = '';
    if ($img_usuario) {
        // Modificando a data
        $n_nascimento = FormataData($nascimento);
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
        
};
// -- Login
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
// -- Listar dados
function ListarDadosUsuario($cd){
    $sql = 'SELECT * FROM `TB_USUARIO` WHERE `CD_USUARIO` ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    return $res;
};
// -- Atualizar dados
function AtualizarImg($email,$img_usuario,$cd){
    $caminho = $img_usuario;
    if (isset($img_usuario['tmp_name'])) {
        $ext = explode('.', $img_usuario['name']);
        $novo_nome = $email.'.'.$ext[1];
        $caminho = '../back_end/fotos/'.$novo_nome;
        move_uploaded_file($img_usuario['tmp_name'], $caminho); //Fazer upload do arquivo
    };
	$sql = 'UPDATE TB_USUARIO SET
    IMG_USUARIO = "'.$caminho.'"
	WHERE CD_USUARIO = '.$cd;
	$res = $GLOBALS['conn']->query($sql);
	echo $sql;
}
function AtualizarNome($nome,$cd){
    $sql = 'UPDATE TB_USUARIO SET NM_USUARIO ="'.$nome.'"
    WHERE CD_USUARIO='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    echo $sql;
}
function AtualizarEmail($email,$cd){
    $sql = 'UPDATE TB_USUARIO SET DS_EMAIL="'.$email.'"
    WHERE CD_USUARIO='.$cd;
    $res = $GLOBALS['conn']->query($sql);
}
function AtualizarDataNascimento($data,$cd){
    $sql = 'UPDATE TB_USUARIO SET DT_NASCIMENTO="'.$data.'"
    WHERE CD_USUARIO='.$cd;
    $res = $GLOBALS['conn']->query($sql);
  
}
// --

// FUNÇÕES PARA FORMULARIO
// -- Cadastro
function CadastrarFormulario(){
    $sql = 	'INSERT INTO TB_FORMULARIO VALUES (null, "Meu form", null, null, '.$_SESSION['cd'].', 1, "Descreva...")';
	$res = $GLOBALS['conn']->query($sql);
	if($res){
        $_SESSION['form'] = $GLOBALS['conn']->insert_id;
    }else{
	    echo "Erro ao cadastrar";
	}
};
function CadastraPerguntas($pergunta, $id_tipo_pergunta, $id_form){
    $sql = 'INSERT INTO `TB_PERGUNTA` VALUES (null,"'.$pergunta.'" ,"'.$id_tipo_pergunta.'","'.$id_form.'")';
    $res = $GLOBALS['conn']->query($sql);
    if($res){
        echo $GLOBALS['conn']->insert_id;
    }else{
        echo 'Erro';
    }
};
function CadastrarAlternativa($alternativa, $id_pergunta){
    $sql = 'INSERT INTO `TB_ALTERNATIVA` VALUES (null,"'.$alternativa.'",'.$id_pergunta.')';
    $res = $GLOBALS['conn']->query($sql);
    if ($res) {
        // echo 'OK';
    }else{
        echo $sql;
    }
};
// FIM DO ATUALIZA FORMULARIO

//  deleta form
    function ExcluirForm($cd){
        $sql = 'DELETE from TB_FORMULARIO where CD_FORMULARIO= '.$cd;
        $res = $GLOBALS['conn']->query($sql);
       
    }
// fim deleta form

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
// -- Listar
function ListarCategoria(){
	$sql = 'SELECT * FROM TB_CATEGORIA';
	$res = $GLOBALS['conn']->query($sql);
	return $res;
};
function ListarTipoPergunta(){
    $sql = 'SELECT * FROM `TB_TIPO_PERGUNTA`';
    $res = $GLOBALS['conn']->query($sql);
    return $res;
};
function ListaPerguntasPorForm($id_form){
    $sql = "SELECT TB_PERGUNTA.NM_PERGUNTA FROM TB_PERGUNTA, TB_FORMULARIO, TB_TIPO_PERGUNTA WHERE TB_PERGUNTA.ID_FORMULARIO = TB_FORMULARIO.CD_FORMULARIOAND TB_FORMULARIO.CD_FORMULARIO =".$id_form;
    $res = $GLOBALS['conn']->query($sql);
    if($res->num_rows>0){
        $form = $res->fetch_array();
        return $form;
    }
};
function ListarForms($cd){
    $sql = 'SELECT * FROM `TB_FORMULARIO` WHERE `ID_USUARIO` ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    return $res;
};
function ListarFormsEspecifico($cd_usuario, $cd_formulario){
    $sql = "SELECT * FROM `TB_FORMULARIO` WHERE `CD_FORMULARIO` = $cd_formulario AND `ID_USUARIO` = $cd_usuario ";
    $res = $GLOBALS['conn']->query($sql);
    return $res;
};
// -- Excluir
function ExcluirForm($cd){
    $sql = 'DELETE from TB_FORMULARIO where CD_FORMULARIO= '.$cd;
    $res = $GLOBALS['conn']->query($sql);
};
// --

function CadastrarAlternativa($alternativa, $id_pergunta){
    $sql = 'INSERT INTO `TB_ALTERNATIVA` VALUES (null,"'.$alternativa.'",'.$id_pergunta.')';
    $res = $GLOBALS['conn']->query($sql);
    if ($res) {
        // echo 'OK';
    }else{
        echo $sql;
    }
}

function ListarTipoPergunta(){
    $sql = 'SELECT * FROM `TB_TIPO_PERGUNTA`';
    $res = $GLOBALS['conn']->query($sql);
    return $res;
}



function ListaPerguntasPorForm($id_form){
    $sql = "SELECT TB_FORMULARIO.CD_FORMULARIO,TB_TIPO_PERGUNTA.CD_TIPO_PERGUNTA, TB_PERGUNTA.CD_PERGUNTA, TB_PERGUNTA.NM_PERGUNTA FROM TB_PERGUNTA, TB_FORMULARIO, TB_TIPO_PERGUNTA WHERE TB_PERGUNTA.ID_FORMULARIO = TB_FORMULARIO.CD_FORMULARIO AND TB_TIPO_PERGUNTA.CD_TIPO_PERGUNTA = TB_PERGUNTA.ID_TIPO_PERGUNTA AND TB_FORMULARIO.CD_FORMULARIO=".$id_form;
    $res = $GLOBALS['conn']->query($sql);
   
    return $res;
}

function ListarAlternativasPorPergunta($id_pergunta){
    $sql = "SELECT TB_ALTERNATIVA.NM_ALTERNATIVA, TB_ALTERNATIVA.CD_ALTERNATIVA  FROM TB_PERGUNTA, TB_ALTERNATIVA WHERE TB_PERGUNTA.CD_PERGUNTA = TB_ALTERNATIVA.ID_PERGUNTA AND TB_ALTERNATIVA.ID_PERGUNTA=".$id_pergunta;
    $res = $GLOBALS['conn']->query($sql);
    return $res;
}

function EncriptarSenha($senha){
    $codificada = md5($senha);
    return $codificada;
};


function ResponderPergunta($cd){
    $sql = 'INSERT INTO TB_RESPOSTA VALUES(NULL,'.$cd.')';
     $res = $GLOBALS['conn']->query($sql);
}

function ExibirRespostas(){
    $sql = 'SELECT SELECT * FROM TB_RESPOSTA r 
INNER JOIN TB_ALTERNATIVA as a 
ON r.ID_ALTERNATIVA = a.CD_ALTERNATIVA
INNER JOIN TB_PERGUNTA as p 
ON a.ID_PERGUNTA = p.CD_PERGUNTA
INNER JOIN TB_FORMULARIO as f 
ON p.ID_FORMULARIO = f.CD_FORMULARIO
WHERE f.CD_FORMULARIO = 130';
}
function ResponderForm($cd){
     $form = ListaPerguntasPorForm($cd);
                       while($forms = $form->fetch_array()){
                          switch($forms['CD_TIPO_PERGUNTA']){
                            case 1 :
                              if( "" != $_POST[$forms['CD_PERGUNTA']]){
                                $sql = "INSERT INTO TB_ALTERNATIVA  VALUES (NULL,'".$_POST[$forms['CD_PERGUNTA']]."','".$forms['CD_PERGUNTA']."')";
                                $GLOBALS['conn']->query($sql);
                                 $alt = ListarAlternativasPorPergunta($forms['CD_PERGUNTA']);
                                 while($alts = $alt->fetch_array()){
                                 ResponderPergunta($alts['CD_ALTERNATIVA']);
                                 }
                              }
                              
                              break;
                            case 2:
                             if( "" != $_POST[$forms['CD_PERGUNTA']]){
                                $sql = "INSERT INTO TB_ALTERNATIVA  VALUES (NULL,'".$_POST[$forms['CD_PERGUNTA']]."','".$forms['CD_PERGUNTA']."')";
                                $GLOBALS['conn']->query($sql);
                                 $alt = ListarAlternativasPorPergunta($forms['CD_PERGUNTA']);
                                 while($alts = $alt->fetch_array()){
                                 ResponderPergunta($alts['CD_ALTERNATIVA']);
                                 }
                              }
                              break; 
                            case 3:
                              if(isset($_POST[$forms['CD_PERGUNTA']])){
                                   ResponderPergunta($_POST[$forms['CD_PERGUNTA']]);
                                }
                               
                              break;
                            case 4:
                                   if(isset( $_POST['alternativa'])){
                                     $a = $_POST['alternativa'];
                                     for($i=0;$i<count($a);$i++){
                                        
                                        ResponderPergunta($a[$i]);
                                     }
                                   }

                              break;
                          }
                     }
}
// ------------------------------------------------------------------------

// -- Auxilio Alert
function Alert($msg){
	echo '<script>alert("'.$msg.'"); </script>'; 
};
// -- Formatação de data
function FormataData($data){
    $edit = explode("-", $data);
    $date = $edit[2]."-".$edit[1]."-".$edit[0];
    echo date('d-m-Y', strtotime($date)); 
}
?>


