<?php

include('back_end/funcs.php');
?>


<form action="pesquisa.php" method="post">
    Pesquise: <input type="text" name="pes">
    <a href="" ></a>
</form>

<?php

if(isset($_POST['pes'])){
    $sql = 'SELECT * FROM TB_FORMULARIO';
    $sql.=' WHERE NM_FORMULARIO like"%'.$_POST['pes'].'%",
    NM_CATEGORIA="'.$cat.'",
    DS_FORMULARIO="'.$desc.'"';
    
    
    $res = $conn->query($sql);
while($form = $res->fetch_array()){
    echo "<li>".$form['NM_FORMULARIO']."</li>";
}
// captura o valor do link asssim    $variavel ='AND ID_CATEGORIA ='.$_get['ovalor']
?>



