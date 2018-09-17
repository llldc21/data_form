<?php
$host = 'localhost';
$user = 'lucas';
$password = '91555830l';
$db = 'teste';
$conn = new mysqli($host, $user, $password, $db);

// Criando pasta
$pasta = 'foto/';
if (!file_exists($pasta)) {
    mkdir($pasta);
}

if (isset($_FILES['img_usuario'])) {
    $caminho = 'foto/';
    $arquivo = $_FILES['img_usuario'];
    $sql = 'INSERT INTO teste VALUES (null, "'.$caminho.$arquivo.'")';

    $inserir = $conn->query($sql);
    if($inserir){
        echo 'ok';
    }else{
        echo 'erro';
    };
}

?>
<!-- Formulario -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
</head>
<body>
<form action="teste.php" method="post">
    <input type="file" name="img_usuario" id="img_usuario">
    <button type="submit">Enviar</button>
</form>
</body>
</html>