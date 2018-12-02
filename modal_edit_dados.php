    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                   <form action="user.php" method="post" enctype="multipart/form-data">

                        <?php
                            $dados = ListarDadosUsuario($_SESSION['cd']);
                            while ($dado = $dados->fetch_array()){
                            ?>
                    <div class="modal-body">
                        <h3>Alterar foto</h3>
                        <div class="custom-file">
                            <!-- Passando e-mail para o Post, para mudar o nome da foto -->
                            <input type="hidden" name="email" value="<?php echo $dado['DS_EMAIL'];?>">
                            <input type="file" name="img_usuario" class="custom-file-input" id="customFileLang" lang="pt-br">
                            <label class="custom-file-label" id="foto_nova" for="customFileLang">Selecione o arquivo...</label>    
                            <input class="form-control" name="nome" type="text" value="<?php echo $dado['NM_USUARIO']?>" style="margin-top: 10px">
                            <input class="form-control" name="data"  type="date" value="<?php echo $dado['DT_NASCIMENTO']?>" style="margin-top: 10px">    
                        </div>
                        
                    </div>
                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-success" value="salvar" />
                        <?php
                            };
                        ?>
                    </div>
                    
                    
     
                </form>
            </div>
        </div>
    </div>