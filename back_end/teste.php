<?php
$host = 'llldc21.profrodolfo.com';
$user = 'llldc21';
$password = '91555830Luc@s';
$db = 'llldc21_data_form';
$conn = new mysqli($host, $user, $password, $db);

$a = "SELECT `IMG_USUARIO` FROM TB_USUARIO WHERE CD_USUARIO = 16";
$query = $conn->query($a);
$q = mysqli_fetch_array($query);
echo '<img src="'.$q[0].'" alt="" >';
?>