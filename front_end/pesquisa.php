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


<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" aria-label="...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" aria-label="...">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
