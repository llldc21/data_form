<?php
include('../back_end/funcs.php');

function NovaSenha($email){
    $sql = 'SELECT * FROM TB_USUARIO WHERE DS_EMAIL="'.$email.'"';
    $res = $GLOBALS['conn']->query($sql);
    // echo $sql;
    // echo " t: ".count($res);
    if($res->num_rows >0){
      $s = $res->fetch_array();
      $pass = md5(date('d/m/Y h:m'));
      $sqll = 'UPDATE TB_USUARIO SET DS_SENHA='.$pass.'"';
      $ress = $GLOBALS['conn']->query($sqll);
      if($res){
           //EMAIL
    include_once("class.phpmailer.php");
    $destino = $email;
    $body = "Sua senha temporária";
    $subject = "assunto";

	$mail = new PHPMailer();
	$mail->SMTPDebug = 3; // descomente  essas linhas e veja o debug para encontrar algum erro

	$mail->Debugoutput = 'html'; //essa linha também
	$mail->setLanguage('br'); //vc sabe (aqui no caso varia de acordo com o servidor, gmail por exemplo usa "br" não "pt" e não acusa erro, e tambem nao envia email)
	$mail->isSMTP(); //envio autenticado
	$mail->Host = 'smtp.gmail.com'; //geralmente, precisa ver no painel de controle do site qual é o endereço 
	//$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls'; //normalmente é c (gmail..etc), aqui deixei esse protocolo que era o indicado pelo servidor
	$mail->Username = 'dataform2018@gmail.com'; // login 
	$mail->Password = 'dataform1234'; // senha
	$mail->Port = 587; //porta pode variar, verifique também
 	$mail->CharSet = 'utf-8'; //vc sabe
	$mail->setFrom('dataform2018@gmail.com','Data Form'); //exemplos..esse email é o que aparece na descrição, normalmente o mesmo apontado no passo do login
	$mail->addReplyTo('no-reply@site.com.br'); // caso queira apontar algum email pra respostas..coloque aqui,
	$mail->addAddress($destino); //email do cliente
	// // //$mail->addCC('email@email.com.br', 'Cópia');
	// // //$mail->addBCC('email@email.com.br', 'Cópia Oculta')

	$mail->isHTML(true); //vai usar html no corpo do email?? eu usei..
	$mail->Subject = $subject;
	$mail->Body    = $body;
	//$mail->AltBody = 'Para visualizar essa mensagem acesse: ...'//opcional

	if(!$mail->send()) {
    	//echo 'Não foi possível enviar a mensagem.<br>';
    	echo 'Erro: ' . $mail->ErrorInfo;    	
	} else {		
	    echo 'Mensagem enviada.';
	}	
	//muito importante, sem limpar os recipientes vc não conseguirá enviar muitos emails..mesmo q não seja de uma vez só..ele lota a fila (as vezes não deixa enviar mais q 3..5 e..sem q esvazie a pasta de saida e etc..)
    $mail->ClearAllRecipients();
      }
    }else{
      echo " n existe";
    }
    
}

?>
<?php

if(isset($_POST['email'])){
   NovaSenha($_POST['email']);
}


?>





 <form action="nova_senha.php" method="post" >
    <input type="text" name="email" placeholder="Insira seu email">
    <button type="submit">Enviar</button>
</form>

