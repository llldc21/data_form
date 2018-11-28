<?php

$host = 'llldc21.profrodolfo.com';
$port = '2082';
$user = 'llldc21';
$password = 'Lucas@23';
$db = 'llldc21_data_form';

$con = new mysqli($host, $user, $password, $db);
?>


<form>
    <select name="categoria" id="categoria"> 
    <?php
    $sql = 'SELECT * FROM TB_CATEGORIA';
    $res = $con->query($sql);
    while($catLinha = $res->fetch_array()){
        echo '<option value="'.$catLinha['CD_CATEGORIA'].'">'.$catLinha['NM_CATEGORIA'].'</option> ';
    }
    ?>
    </select>
    <!--<select name="form" id="form">-->
    <!--    Selecione...-->
    <!--</select>-->

    Pesquise: <input type="text" name="q">
</form>

<?php
$sql = 'SELECT * FROM TB_FORMULARIO';
if(isset($_GET['q'])){
    $sql.=' WHERE NM_FORMULARIO like"%'.$_GET['q'].'%"';
}
$res = $con->query($sql);
while($form = $res->fetch_array()){
    echo "<li>".$form['NM_FORMULARIO']."</li>";
}
?>



