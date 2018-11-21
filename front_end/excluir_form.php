<?php
    include('../back_end/funcs.php');
    ExcluirForm($_GET['cd']);
    header('location: user.php');
    
?>