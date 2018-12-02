<?php

$host = 'llldc21.profrodolfo.com';
$port = '2082';
$user = 'llldc21';
$password = 'Lucas@23';
$db = 'llldc21_data_form';

$conn = new mysqli($host, $user, $password, $db);
?>


<form action="pesquisa.php" method="post">
    Pesquise: <input type="text" name="pes">
</form>

<?php

if(isset($_POST['pes'])){
    $sql = 'SELECT * FROM TB_FORMULARIO';
    $sql.=' WHERE NM_FORMULARIO like"%'.$_POST['pes'].'%"';
    
    $res = $conn->query($sql);
while($form = $res->fetch_array()){
    echo "<li>".$form['NM_FORMULARIO']."</li>";
}
}

?>



