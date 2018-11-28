<?php

$host = 'llldc21.profrodolfo.com';
$port = '2082';
$user = 'llldc21';
$password = 'Lucas@23';
$db = 'llldc21_data_form';

$con = new mysqli($host, $user, $password, $db);
?>


<form >
     
 Pesquisa:<br>
  <input type="text" name="q" style="width: 300px">
  
  
</form>

<?php
$sql = 'SELECT * FROM TB_FORMULARIO';
if(isset($_GET['q'])){
    $sql.=' WHERE NM_FORMULARIO like"%'.$_GET['q'].'%"';
}

$res = $con->query($sql);
while($busca = $res->fetch_array()){
    echo $busca['NM_FORMULARIO']."<br>";
}
?>

